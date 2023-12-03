<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;

class CashflowController extends Controller
{
    public function index(Request $r)
    {
        $tgl = tanggalFilter($r);
        $tgl1 =  $tgl['tgl1'];
        $tgl2 =  $tgl['tgl2'];
        $datas = DB::table('tb_transaksi as a')
            ->where('user_id', auth()->user()->id)
            ->whereBetween('tgl', [$tgl1, $tgl2])
            ->orderBy('id_transaksi', 'DESC')
            ->get();

        $ttlDebit = 0;
        $ttlKredit = 0;
        foreach ($datas as $d) {
            $debit = $d->debit;
            $kredit = $d->kredit;
            $ttlDebit += $debit;
            $ttlKredit += $kredit;
        }

        $data = [
            'title' => "Cashflow",
            'tgl1' => $tgl1,
            'tgl2' => $tgl2,
            'datas' => $datas,
            'ttlDebit' => $ttlDebit,
            'ttlKredit' => $ttlKredit,
            'sisa' =>  $ttlDebit - $ttlKredit,
        ];
        return view('cashflow.cashflow', $data);
    }



    public function add()
    {
        
        $data = [
            'title' => 'Tambah Cashflow'
        ];
        return view('dashboard', $data);
    }

    public function keluar(Request $r)
    {
        $nominal = str_replace('.', '', $r->nominal);
        $pilihan = $r->pilihan;
        $nol = 0;
        DB::table('tb_transaksi')->insert([
            'user_id' => auth()->user()->id,
            'debit' => $pilihan == 'uangMasuk' ? $nominal : $nol,
            'kredit' => $pilihan == 'uangMasuk' ? $nol : $nominal,
            'tgl' => $r->tgl,
            'ket' => $r->ket
        ]);
    }

    public function edit(Request $r)
    {
        $data = [
            'detail' => DB::table('tb_transaksi')->where('id_transaksi', $r->id_transaksi)->first()
        ];
        return view('cashflow.edit', $data);
    }

    public function update(Request $r)
    {
        $debit = str()->remove(',', $r->debit);
        $kredit = str()->remove(',', $r->kredit);
        DB::table('tb_transaksi')->where('id_transaksi', $r->id_transaksi)->update([
            'debit' => $debit,
            'kredit' => $kredit,
            'tgl' => $r->tgl,
            'ket' => $r->ket
        ]);
        return redirect()->route('cashflow.index', [
            'period' => 'costume',
            'tgl1' => date('Y-m-01', strtotime($r->tgl)),
            'tgl2' => date('Y-m-t', strtotime($r->tgl))
        ])->with('sukses', 'Berhasil update data');
    }

    public function destroy(Request $r)
    {
        DB::table('tb_transaksi')->where('id_transaksi', $r->no_nota)->delete();
        return redirect()->route('cashflow.index', [
            'period' => 'costume',
            'tgl1' => date('Y-m-01', strtotime($r->tglDelete)),
            'tgl2' => date('Y-m-t', strtotime($r->tglDelete))
        ])->with('sukses', 'Berhasil hapus data');
    }

    public function tglChart(Request $r)
    {
        $datas = DB::table('tb_transaksi as a')
            ->where('user_id', auth()->user()->id)
            ->whereMonth('tgl', $r->bulan)
            ->whereYear('tgl', $r->tahun)
            ->orderBy('id_transaksi', 'DESC')
            ->get();

        $ttlDebit = 0;
        $ttlKredit = 0;

        foreach ($datas as $d) {
            $debit = $d->debit;
            $kredit = $d->kredit;
            $ttlDebit += $debit;
            $ttlKredit += $kredit;
        }
        $totalTgl = cal_days_in_month(CAL_GREGORIAN, $r->bulan, $r->tahun);
        $daysArray = range(1, $totalTgl);
        return json_encode([
            'total' => $ttlDebit - $ttlKredit,
            'totalTgl' => $daysArray
        ]);
    }
}
