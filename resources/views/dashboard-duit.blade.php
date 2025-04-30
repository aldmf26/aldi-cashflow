<x-theme.app title="Dashboard" table="T">
    <x-slot name="slot">
        <h5>Hi, {{ auth()->user()->name }}</h5>
        <p style="font-size: 14px">Ini ringkasan aktivitas kamu di bulan <span class="badge bg-primary">{{bulan(date('m')) . date(' Y')}}</span></p>
        <div class="row">
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title"><i class="fas fa-arrow-down"></i> Total Pemasukan</p>
                        <h5 class="card-text">
                            @php
                                $query = DB::selectOne(
                                    'SELECT sum(debit) as debit, sum(kredit) as kredit FROM tb_transaksi WHERE user_id = ' .
                                        auth()->user()->id .
                                        ' AND MONTH(tgl) = ' .
                                        date('m') .
                                        ' AND YEAR(tgl) = ' .
                                        date('Y'),
                                );
                                $totalMasuk = $query->debit;
                                $totalKeluar = $query->kredit;
                            @endphp
                            Rp {{ number_format($totalMasuk, 0, ',', '.') }}
                        </h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title"><i class="fas fa-arrow-up"></i> Total Pengeluaran</p>
                        <h5 class="card-text">
                            Rp {{ number_format($totalKeluar, 0, ',', '.') }}
                        </h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title"><i class="fas fa-balance-scale"></i> Total Saldo</p>
                        <h5 class="card-text">
                            Rp {{ number_format($totalMasuk - $totalKeluar, 0, ',', '.') }}
                        </h5>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="card">
        <div class="row card-body">
            <div class="col-lg-6" >
                {!! $chart->container() !!}
            </div>

            <div class="col-lg-6">
                {!! $chart2->container() !!}
            </div>
        </div>
    </div>
        <script src="{{ $chart->cdn() }}"></script>
        <script src="{{ $chart2->cdn() }}"></script>

        {{ $chart->script() }}
        {{ $chart2->script() }}
       
    </x-slot>

</x-theme.app>
