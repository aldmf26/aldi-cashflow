<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;

class KategoriChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\PieChart
    {
        $wallets = [
            ['nama' => 'Cash', 'saldo' => 100000],
            ['nama' => 'Bank BNI', 'saldo' => 500000],
            ['nama' => 'Bank BRI', 'saldo' => 1000000],
            ['nama' => 'Bank BCA', 'saldo' => 500000],
        ];
        $total = collect($wallets)->sum('saldo');
        return $this->chart->pieChart()
            ->setTitle('Dompet')
            ->setSubtitle('Total Saldo: Rp. ' . number_format($total, 0, ',', '.'))
            ->addData(collect($wallets)->pluck('saldo')->toArray())
            ->setLabels(collect($wallets)->pluck('nama')->toArray())
            ->setFontFamily('Poppins');

    }
}
