<?php

namespace App\Http\Controllers;
// app/Http/Controllers/PenjualanController.php
namespace App\Http\Controllers;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Penjualan;
use App\Models\Pembeli;
use App\Models\User;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    public function index(Request $request)
    {
        $sort = $request->get('sort', 'asc');

        $penjualans = Penjualan::with(['user', 'pembeli'])
            ->orderBy('tanggal_pesan', $sort)
            ->paginate(10)
            ->withQueryString();

        return view('penjualans.index', compact('penjualans', 'sort'));
    }

    public function create()
    {
        $pembelis = Pembeli::all();
        $users = User::all();
        return view('penjualans.create', compact('pembelis', 'users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'pembeli_id' => 'required|exists:pembelis,id',
            'user_id' => 'required|exists:users,id',
            'tanggal_pesan' => 'required|date',
        ]);

        Penjualan::create($request->all());

        return redirect()->route('penjualans.index')->with('success', 'Data penjualan berhasil ditambahkan.');
    }

    public function edit(Penjualan $penjualan)
    {
        $pembelis = Pembeli::all();
        $users = User::all();
        return view('penjualans.edit', compact('penjualan', 'pembelis', 'users'));
    }

    public function update(Request $request, Penjualan $penjualan)
    {
        $request->validate([
            'pembeli_id' => 'required|exists:pembelis,id',
            'user_id' => 'required|exists:users,id',
            'tanggal_pesan' => 'required|date',
        ]);

        $penjualan->update($request->all());

        return redirect()->route('penjualans.index')->with('success', 'Data penjualan berhasil diperbarui.');
    }
    public function show(Penjualan $penjualan)
{
    $penjualan->load('user', 'pembeli', 'detailPenjualans.barang');

    return view('penjualans.show', compact('penjualan'));
}


    public function destroy(Penjualan $penjualan)
    {
        $penjualan->delete();
        return redirect()->route('penjualans.index')->with('success', 'Data penjualan berhasil dihapus.');
    }




public function cetakPdf(Request $request)
{
    $penjualans = Penjualan::with('user', 'detailPenjualans.barang')->latest()->get();

    $pdf = Pdf::loadView('penjualans.laporan_pdf', compact('penjualans'));
    return $pdf->download('laporan-penjualan.pdf');
}

}

