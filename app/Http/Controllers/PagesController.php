<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use Exception;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function invoice_pending()
    {
        try {
            $datas = Invoice::all();
            return view('invoice_pending', compact('datas'));
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
    public function upload_file_invoice($id)
    {
        try {
            $data = Invoice::findorfail($id);
            return view('upload_file_invoice', compact('data'));
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
    public function table()
    {
        try {
            $datas = Invoice::all();
            return view('table', compact('datas'));
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
