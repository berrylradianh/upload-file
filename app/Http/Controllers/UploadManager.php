<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use Exception;
use Illuminate\Http\Request;

class UploadManager extends Controller
{
    function upload()
    {
        return view('form_invoice', compact('data'));
    }


    public function uploadPost(Request $request)
    {
        try {
            $file = $request->file("file_invoice");
            $destination = "uploads";

            $fileName = uniqid() . '_' . $file->getClientOriginalName();
            $file->move($destination, $fileName);

            $invoice = new Invoice([
                'nomor_invoice' => $request->input('nomor_invoice'),
                'tanggal_invoice' => $request->input('tanggal_invoice'),
                'jenis_pengiriman' => $request->input('jenis_pengiriman'),
                'nominal_invoice' => $request->input('nominal_invoice'),
                'file_invoice' => $destination . '/' . $fileName,
                'tanggal_pengiriman' => $request->input('tanggal_pengiriman'),
                'status' => 'uploaded',
            ]);

            if ($invoice->save()) {
                return redirect()->route('invoice_pending')->with('success', 'File uploaded and data saved successfully');
            } else {
                return redirect()->route('invoice_pending')->with('error', 'File upload failed');
            }
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    public function edit($id)
    {
        try {
            $data = Invoice::findorfail($id);
            return view('upload_file_invoice', compact('data'));
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $file = $request->file("bukti_pembayaran");
            $destination = "uploads";

            $fileName = uniqid() . '_' . $file->getClientOriginalName();
            $file->move($destination, $fileName);

            Invoice::where('id', $id)->update([
                'status'   => $request->status,
                'bukti_pembayaran' => $destination . '/' . $fileName,
            ]);
            return redirect()->route('table')->with('success', 'File uploaded and data saved successfully');
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
