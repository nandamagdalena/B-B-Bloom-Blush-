<?php

namespace App\Http\Controllers;


use App\Models\Pembelian;
use App\Models\Barang;
use App\Models\Suplier;
use Illuminate\Http\Request;

class PembelianController extends Controller
{
   public function index(Request $request)
{
    $sort = $request->get('sort', 'asc');

    $pembelians = Pembelian::with('barang')
        ->orderBy('tanggal', $sort)
        ->paginate(10)
        ->withQueryString();

    return view('pembelians.index', compact('pembelians', 'sort'));
}


    public function create()
    {
        $barangs = Barang::all();
        $supliers = Suplier::all();
        return view('pembelians.create', compact('barangs', 'supliers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'barang_id' => 'required|exists:barangs,id',
            'jumlah' => 'required|numeric|min:1',
            'supliers_id' => 'required|exists:supliers,id',
            'tanggal' => 'required|date',
            'status' => 'required|string',
        ]);

        Pembelian::create($request->all());

        return redirect()->route('pembelians.index')->with('success', 'Data pembelian berhasil ditambahkan.');
    }

    public function edit(Pembelian $pembelian)
    {
        $barangs = Barang::all();
        $supliers = Suplier::all();
        return view('pembelians.edit', compact('pembelian', 'barangs', 'supliers'));
    }

    public function update(Request $request, Pembelian $pembelian)
    {
        $request->validate([
            'barang_id' => 'required|exists:barangs,id',
            'jumlah' => 'required|numeric|min:1',
            'supliers_id' => 'required|exists:supliers,id',
            'tanggal' => 'required|date',
            'status' => 'required|string',
        ]);

        $pembelian->update($request->all());

        return redirect()->route('pembelians.index')->with('success', 'Data pembelian berhasil diperbarui.');
    }

    public function destroy(Pembelian $pembelian)
    {
        $pembelian->delete();
        return redirect()->route('pembelians.index')->with('success', 'Data pembelian berhasil dihapus.');
    }
}
