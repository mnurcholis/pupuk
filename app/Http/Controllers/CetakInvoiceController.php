<?php

namespace App\Http\Controllers;

use App\Models\TransaksiBeli;
use App\Models\TransaksiJualPagi;
use Illuminate\Http\Request;

class CetakInvoiceController extends Controller
{
    public function printInvoiceBeli($invoice)
    {
        $data = TransaksiBeli::where('invoice', $invoice)->first();
        return view('print', compact('data'));
    }
    
    public function printInvoicePagi($invoice)
    {
        $data = TransaksiJualPagi::where('invoice', $invoice)->first();
        return view('print_pagi', compact('data'));
    }
}
