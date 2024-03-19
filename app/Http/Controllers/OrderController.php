<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function show_order(){
        return view('client.order');
    }
    public function show_editorder(){
        return view('client.editorder');
    }
}
