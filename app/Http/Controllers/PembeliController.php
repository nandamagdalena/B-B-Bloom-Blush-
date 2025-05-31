<?php

namespace App\Http\Controllers;

use App\Models\Pembeli;
use Illuminate\Http\Request;

class PembeliController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $sort = $request->get('sort', 'asc');

        $pembelis = Pembeli::orderBy('nama', $sort)
            ->paginate(10)
            ->withQueryString();

        return view('pembelis.index', compact('pembelis', 'sort'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pembelis.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $request->validate([
            'nama' => 'required|string|max:100',
            'jenis_kelamin' => 'required|in:L,P',
            'alamat' => 'nullable|string|max:255',
            'no_hp' => 'nullable|string|max:20',
        ]);

        $pembeli = Pembeli::create([
            'nama' => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp
        ]);

        return redirect()->route('pembelis.index')->with('success', 'Data pembeli berhasil ditambahkan.');





    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
        {
            $pembeli = Pembeli::findOrFail($id);
            return view('pembelis.edit', compact('pembeli'));
        }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pembeli $pembeli)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'jenis_kelamin' => 'required|in:L,P',
            'alamat' => 'nullable|string|max:255',
            'telepon' => 'nullable|string|max:20',
        ]);

        $pembeli->update([
            'nama' => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'no_hp' => $request->telepon,
        ]);

        return redirect()->route('pembelis.index')->with('success', 'Pembeli berhasil diperbarui.');
    }

    /**
     * Hapus data pembeli.
     */
    public function destroy(Pembeli $pembeli)
    {
        $pembeli->delete();
        return redirect()->route('pembelis.index')->with('success', 'Pembeli berhasil dihapus.');
    }
}
