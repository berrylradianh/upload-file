<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    //
    public function invoice_pending(){
        $datas = Invoice::all();
        // dd($datas);
        return view('invoice_pending', compact('datas'));
    }
    public function upload_file_invoice($id){
        $data = Invoice::findorfail($id);
        // dd($invoice);
        return view('upload_file_invoice', compact('data'));
    }
    public function table(){
        $datas = Invoice::all();
        // dd($datas);
        return view('table', compact('datas'));
    }
}
