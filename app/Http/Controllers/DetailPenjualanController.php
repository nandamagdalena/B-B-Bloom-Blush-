<?php

namespace App\Http\Controllers;

// app/Http/Controllers/DetailPenjualanController.php
namespace App\Http\Controllers;

use App\Models\DetailPenjualan;
use App\Models\Penjualan;
use App\Models\Barang;
use Illuminate\Http\Request;

class DetailPenjualanController extends Controller
{
    public function index(Request $request)
    {
        $sort = $request->get('sort', 'asc');

        $detailPenjualans = DetailPenjualan::with(['penjualan', 'barang'])
            ->orderBy('created_at', $sort)
            ->paginate(10)
            ->withQueryString();

        return view('detail_penjualans.index', compact('detailPenjualans', 'sort'));
    }

    public function create()
    {
        $penjualans = Penjualan::all();
        $barangs = Barang::all();
        return view('detail_penjualans.create', compact('penjualans', 'barangs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'penjualan_id' => 'required|exists:penjualans,id',
            'barang_id' => 'required|exists:barangs,id',
            'jumlah' => 'required|integer|min:1',
            'total_harga' => 'required|string',
        ]);

        DetailPenjualan::create($request->all());

        return redirect()->route('detail-penjualans.index')->with('success', 'Detail penjualan berhasil ditambahkan.');
    }

    public function edit(DetailPenjualan $detailPenjualan)
    {
        $penjualans = Penjualan::all();
        $barangs = Barang::all();
        return view('detail_penjualans.edit', compact('detailPenjualan', 'penjualans', 'barangs'));
    }

    public function update(Request $request, DetailPenjualan $detailPenjualan)
    {
        $request->validate([
            'penjualan_id' => 'required|exists:penjualans,id',
            'barang_id' => 'required|exists:barangs,id',
            'jumlah' => 'required|integer|min:1',
            'total_harga' => 'required|string',
        ]);

        $detailPenjualan->update($request->all());

        return redirect()->route('detail-penjualans.index')->with('success', 'Detail penjualan berhasil diperbarui.');
    }

    public function destroy(DetailPenjualan $detailPenjualan)
    {
        $detailPenjualan->delete();

        return redirect()->route('detail-penjualans.index')->with('success', 'Detail penjualan berhasil dihapus.');
    }
}

