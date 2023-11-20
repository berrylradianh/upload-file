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
        return view('invoice_pending', compact('datas'));
    }
    public function upload_file_invoice($id){
        $data = Invoice::findorfail($id);
        return view('upload_file_invoice', compact('data'));
    }
    public function table(){
        $datas = Invoice::all();
        return view('table', compact('datas'));
    }
}
