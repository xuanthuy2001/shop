<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        return view('customer.main', [
            'title' => 'Shop bán thời trang'
        ]);
    }
}