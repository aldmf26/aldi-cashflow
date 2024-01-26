<table class="table stripped" id="table1">
    <thead class="bg-primary text-white">
        <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th class="text-end">Debit ({{ number_format($ttlDebit, 0) }})</th>
            <th class="text-end">Kredit ({{ number_format($ttlKredit, 0) }})</th>
            <th>Keterangan</th>
            <th class="text-center">Aksi</th>
        </tr>
    </thead>
    <tbody>

        @foreach ($datas as $no => $d)
            @php
                $debit = $d->debit;
                $kredit = $d->kredit;
            @endphp
            <tr>
                <td>{{ $no + 1 }}</td>
                <td>{{ tanggal($d->tgl) }}</td>
                <td align="right">{{ number_format($debit, 0) }}</td>
                <td align="right">{{ number_format($kredit, 0) }}</td>
                <td>{{ ucwords($d->ket) }}</td>
                <td align="right">
                    <a href="#" id_transaksi="{{ $d->id_transaksi }}"
                        class="edit btn btn-sm btn-primary"><i class="fas fa-pen"></i></a>
                    <a class="btn btn-sm btn-danger delete_nota" tgl="{{ $d->tgl }}" no_nota="{{ $d->id_transaksi }}"
                        href="#" data-bs-toggle="modal" data-bs-target="#delete"><i
                            class="fas fa-trash"></i>
                    </a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>