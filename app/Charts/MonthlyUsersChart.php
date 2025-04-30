<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use Illuminate\Support\Facades\DB;

class MonthlyUsersChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\BarChart
    {
        
        $datas = DB::table('tb_transaksi')->selectRaw("SUM(debit) as debit, SUM(kredit) as kredit, MONTH(tgl) as bulan")
            ->where('user_id', auth()->user()->id)
            ->whereYear('tgl', date('Y'))
            ->groupByRaw("MONTH(tgl)")
            ->orderByRaw("MONTH(tgl)")
            ->get();

        $labels = [];
        $debit = [];
        $kredit = [];

        $bulan = [
            '1' => 'Januari',
            '2' => 'Februari',
            '3' => 'Maret',
            '4' => 'April',
            '5' => 'Mei',
            '6' => 'Juni',
            '7' => 'Juli',
            '8' => 'Agustus',
            '9' => 'September',
            '10' => 'Oktober',
            '11' => 'November',
            '12' => 'Desember',
        ];

        foreach ($datas as $data) {
            $labels[] = $bulan[$data->bulan];
            $debit[] = $data->debit;
            $kredit[] = $data->kredit;
        }

        return $this->chart->barChart()
            ->setTitle('Pemasukan dan Pengeluaran per Bulan')
            ->setSubtitle('Tahun ' . date('Y'))
            ->addData('Pemasukan', $debit)
            ->addData('Pengeluaran', $kredit)
            ->setFontFamily('Poppins')
            ->setXAxis($labels)
            ->setGrid()
            ->setMarkers(['#FF5722', '#E040FB'], 7, 10);
    }
}
