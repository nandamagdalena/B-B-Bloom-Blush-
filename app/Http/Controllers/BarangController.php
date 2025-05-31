<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BarangController extends Controller
{
    public function index(Request $request)
    {
        $sort = $request->get('sort', 'asc');
        $barangs = Barang::with('kategori')
            ->orderBy('nama', $sort)
            ->paginate(10)
            ->withQueryString();

        return view('barangs.index', compact('barangs', 'sort'));
    }

    public function create()
    {
        $kategoris = Kategori::all();
        return view('barangs.create', compact('kategoris'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|max:100',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'kategori_id' => 'required|exists:kategoris,id',
            'stok' => 'required|numeric',
            'harga' => 'required|numeric',
        ]);

        $gambarPath = $request->file('gambar') ? $request->file('gambar')->store('barangs', 'public') : null;

        Barang::create([
            'nama' => $request->nama,
            'gambar' => $gambarPath,
            'kategori_id' => $request->kategori_id,
            'stok' => $request->stok,
            'harga' => $request->harga,
        ]);

        return redirect()->route('barangs.index')->with('success', 'Barang berhasil ditambahkan.');
    }

    public function edit(Barang $barang)
    {
        $kategoris = Kategori::all();
        return view('barangs.edit', compact('barang', 'kategoris'));
    }

    public function update(Request $request, Barang $barang)
    {
        $request->validate([
            'nama' => 'required|max:100',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'kategori_id' => 'required|exists:kategoris,id',
            'stok' => 'required|numeric',
            'harga' => 'required|numeric',
        ]);

        if ($request->hasFile('gambar')) {
            if ($barang->gambar) Storage::disk('public')->delete($barang->gambar);
            $barang->gambar = $request->file('gambar')->store('barangs', 'public');
        }

        $barang->update([
            'nama' => $request->nama,
            'kategori_id' => $request->kategori_id,
            'stok' => $request->stok,
            'harga' => $request->harga,
            'gambar' => $barang->gambar
        ]);

        return redirect()->route('barangs.index')->with('success', 'Barang berhasil diperbarui.');
    }

    public function destroy(Barang $barang)
    {
        if ($barang->gambar) Storage::disk('public')->delete($barang->gambar);
        $barang->delete();
        return redirect()->route('barangs.index')->with('success', 'Barang berhasil dihapus.');
    }
}
