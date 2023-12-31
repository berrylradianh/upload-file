<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{
    public function index()
    {
        try {
            // dd(Auth::user());
            return view('welcome');
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
    public function profile()
    {
        try {
            return view('profile');
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
    public function login()
    {
        try {
            // dd(Auth::user());
            return view('login');
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
    public function home()
    {
        try {
            return view('home');
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
    public function form_invoice()
    {
        try {
            return view('form_invoice');
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
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
