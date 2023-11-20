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
            $file = $request->file("file_nomor_tanda_terima");
            $destination = "uploads";

            // Simpan file dengan nama yang unik
            $fileName = uniqid() . '_' . $file->getClientOriginalName();
            $file->move($destination, $fileName);

            // Buat objek Invoice dengan menggunakan model Invoice
            $invoice = new Invoice([
                'nomor_invoice' => $request->input('nomor_invoice'),
                'tanggal_invoice' => $request->input('tanggal_invoice'),
                'jenis_pengiriman' => $request->input('jenis_pengiriman'),
                'total_invoice' => $request->input('total_invoice'),
                'file_nomor_tanda_terima' => $destination . '/' . $fileName,
                'tanggal_pengiriman' => $request->input('tanggal_pengiriman'),
                'status' => 'upload',
            ]);

            // Simpan ke database
            if ($invoice->save()) {
                return redirect()->route('invoice_pending')->with('success', 'File uploaded and data saved successfully');
            } else {
                return redirect()->route('invoice_pending')->with('error', 'File upload failed');
            }
        } catch (Exception $e) {
            // Cetak pesan error
            dd($e->getMessage());
        }
    }

    public function edit($id)
    {
        $data = Invoice::findorfail($id);
        // dd($invoice);
        return view('upload_file_invoice', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $file = $request->file("foto_bukti_tanda_terima");
        $destination = "uploads";

        // Simpan file dengan nama yang unik
        $fileName = uniqid() . '_' . $file->getClientOriginalName();
        $file->move($destination, $fileName);

        // dd($request->all());
        $data = Invoice::findorfail($id);
        Invoice::where('id', $id)->update([
            'status'   => $request->status,
            'foto_bukti_tanda_terima' => $destination . '/' . $fileName,
        ]);
        return redirect()->route('table')->with('success', 'File uploaded and data saved successfully');
    }
}
