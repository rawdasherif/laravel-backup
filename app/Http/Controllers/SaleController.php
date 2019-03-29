<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sale;
use App\Gym;
use App\Package;
use App\User;

class SaleController extends Controller
{
    public function index(){
        return view('sale.index');
    }

    public function get_saledata(){
        return datatables()->of(Sale::with('Gym','User','Package'))->toJson();
    }
}
