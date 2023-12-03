<x-theme.app title="Dashboard" table="T">
    <x-slot name="slot">
        @php
            function getSumBulan($bulan)
            {
                $datas = DB::table('tb_transaksi as a')
                    ->where('user_id', auth()->user()->id)
                    ->whereMonth('tgl', $bulan)
                    ->whereYear('tgl', date('Y'))
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
                return $ttlDebit - $ttlKredit;
            }
            $currentMonth = date('n'); // Bulan saat ini
            $currentYear = date('Y'); // Tahun saat ini

            $listSum = [];

            $bulan = $currentMonth;
            $tahun = $currentYear;

            for ($i = 1; $i < 12; $i++) {
                $listSum[] = abs(getSumBulan($bulan));

                $bulan--;
                if ($bulan == 1) {
                    $bulan = 12;
                    $tahun--;
                }
            }
            $labels = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov'];
            $listSumJson = json_encode(array_reverse($listSum));
        @endphp
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="float-start">Uang Keluar {{ $currentYear }} </h4>
                        <a class="float-end btn btn-sm btn-primary" href="{{ route('cashflow.add') }}"><i class="fas fa-plus"></i> Cashflow</a>
                    </div>
                    <div class="card-body">
                        <canvas id="myChart" width="440" height="220"
                            style="display: block; box-sizing: border-box; height: 220px; width: 440px;"></canvas>
                    </div>
                </div>
            </div>
            {{-- <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-lg-3">
                                <h4 class="card-title">Line Chart</h4>
                            </div>
                            <div class="col-lg-9">
                                <table>
                                    <tr>
                                        <td>Bulan : </td>
                                        <td>
                                            <select class="form-control" id="selectedMonth">
                                                @php
                                                    $bulan = [
                                                        1 => 'Jan',
                                                        2 => 'Feb',
                                                        3 => 'Mar',
                                                        4 => 'Apr',
                                                        5 => 'Mei',
                                                        6 => 'Jun',
                                                        7 => 'Jul',
                                                        8 => 'Agu',
                                                        9 => 'Sep',
                                                        10 => 'Okt',
                                                        11 => 'Nov',
                                                        12 => 'Des',
                                                    ];
                                                @endphp
                                                @for ($i = 1; $i <= 12; $i++)
                                                    <option value="{{ $i }}">{{ $bulan[$i] }}</option>
                                                @endfor
                                                <!-- Tambahkan option untuk bulan 2 hingga 12 -->
                                            </select>
                                        </td>
                                        <td>Tahun : </td>
                                        <td>
                                            <select class="form-control" id="selectedYear">
                                                <option value="2022">2022</option>
                                                <option value="2023" selected>2023</option>
                                                <!-- Tambahkan option untuk tahun-tahun lainnya -->
                                            </select>
                                        </td>
                                        <td>
                                            <button class="btn btn-sm btn-primary" id="showData">Tampilkan</button>
                                        </td>
                                    </tr>

                                </table>

                            </div>

                        </div>


                    </div>
                    <div class="card-body">
                        <canvas id="line" width="440" height="220"
                            style="display: block; box-sizing: border-box; height: 220px; width: 440px;"></canvas>
                    </div>
                </div>
            </div> --}}
        </div>

        @section('scripts')
            <script>
                // Misalkan Anda memiliki data yang akan ditampilkan dalam grafik
                const labels = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des']

                const listSum = JSON.parse("{{ $listSumJson }}");

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

                function renderLineChart(data) {
                    const config2 = {
                        type: 'line',
                        data: {
                            labels: data,
                            datasets: [{
                                label: 'Total Uang Keluar',
                                data: data,
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
                        },
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        },
                    };
                    var ctx = document.getElementById('line').getContext('2d');
                    if (window.chartLine) {
                        window.chartLine.destroy();
                    }
                    window.chartLine = new Chart(ctx, config2);
                }
                $(document).on('click', '#showData', function() {
                    var bulan = $('#selectedMonth').val()
                    var tahun = $('#selectedYear').val()

                    $.ajax({
                        type: "GET",
                        url: "{{ route('cashflow.tglChart') }}",
                        data: {
                            bulan: bulan,
                            tahun: tahun,
                        },
                        dataType: 'json',
                        success: function(r) {

                            renderLineChart(r.totalTgl)


                        }
                    });
                })
            </script>
        @endsection


    </x-slot>

</x-theme.app>
