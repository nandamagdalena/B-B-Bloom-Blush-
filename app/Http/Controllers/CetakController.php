<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Penjualan;

class CetakController extends Controller
{
    public function cetakPdf(Request $request)
{
    $penjualans = Penjualan::with('user', 'detailPenjualans.barang')->latest()->get();

    $pdf = Pdf::loadView('penjualans.laporan_pdf', compact('penjualans'));
    return $pdf->download('laporan-penjualan.pdf');
}
}
