<x-theme.app title="Dashboard" table="T">
    <x-slot name="slot">
        @php
            function getSumBulan($bulan, $tahun)
            {
                $id = auth()->user()->id;
                $data = DB::selectOne("select sum(debit) as debit, sum(kredit) as kredit 
                            from tb_transaksi 
                            WHERE MONTH(tgl) = '$bulan' AND  YEAR(tgl) = '$tahun' AND user_id = '$id'
                            ");

                return $data->debit - $data->kredit;
            }
            $currentMonth = date('n'); // Bulan saat ini
            $currentYear = request()->get('tahun') ?? date('Y'); // Tahun saat ini

            $listSum = [];

            $bulan = $currentMonth;
            $tahun = $currentYear;

            for ($i = 0; $i < 12; $i++) {
                // Pastikan $bulan selalu antara 1 dan 12
                // if ($bulan < 1) {
                //     $bulan = 12;
                // }
                $listSum[] = abs(getSumBulan($bulan, $tahun));

                // Debugging statements
                $bulan++;

                if ($bulan == 0) {
                    $bulan = 12;
                }
            }
            $listSumJson = json_encode($listSum);
        @endphp
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="float-start">Uang Keluar {{ $tahun }} </h4>
                        <a class="float-end btn btn-sm btn-primary" href="{{ route('cashflow.add') }}"><i
                                class="fas fa-plus"></i> Cashflow</a>
                    </div>
                    <div class="card-body">
                        <canvas id="myChart" width="440" height="220"
                            style="display: block; box-sizing: border-box; height: 220px; width: 440px;"></canvas>
                    </div>
                </div>
            </div>
        </div>

        @section('scripts')
            <script>
                // Misalkan Anda memiliki data yang akan ditampilkan dalam grafik
                const labels = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des']
                console.log(labels)
                const listSum = JSON.parse("{{ $listSumJson }}");
                console.log(listSum)

                const data = {
                    labels: labels,
                    datasets: [{
                        label: 'Total Uang Keluar',
                        data: listSum,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(255, 159, 64, 0.2)',
                            'rgba(255, 205, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(201, 203, 207, 0.2)'
                        ],
                        borderColor: [
                            'rgb(255, 99, 132)',
                            'rgb(255, 159, 64)',
                            'rgb(255, 205, 86)',
                            'rgb(75, 192, 192)',
                            'rgb(54, 162, 235)',
                            'rgb(153, 102, 255)',
                            'rgb(201, 203, 207)'
                        ],
                        borderWidth: 1
                    }]
                };
                const config = {
                    type: 'bar',
                    data: data,
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    },
                };
                const config2 = {
                    type: 'line',
                    data: data,
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    },
                };

                // Inisialisasi grafik
                window.onload = function() {
                    var ctx = document.getElementById('myChart').getContext('2d');
                    var myChart = new Chart(ctx, config);


                };
               
            </script>
        @endsection


    </x-slot>

</x-theme.app>
