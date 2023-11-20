<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    //
    public function index(){
        $datas = Invoice::all();
        // dd($datas);
        return view('invoice_pending', compact('datas'));
    }
}
