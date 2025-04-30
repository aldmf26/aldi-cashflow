<?php

namespace App\Http\Controllers;

use App\Charts\KategoriChart;
use App\Charts\MonthlyUsersChart;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(MonthlyUsersChart $chart, KategoriChart $chart2)
    {
        $data = [
            'title' => 'Dashboard',
            'chart' => $chart->build(),
            'chart2' => $chart2->build(),
        ];

        return view('dashboard-duit', $data);
    }
}
