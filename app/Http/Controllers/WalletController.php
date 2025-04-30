<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WalletController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Dompet',
        ];
        return view('wallet.index',$data);
    }
}
