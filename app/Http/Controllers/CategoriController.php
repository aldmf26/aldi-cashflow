<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoriController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Kategori',
        ];
        return view('kategori.index',$data);
    }
}
