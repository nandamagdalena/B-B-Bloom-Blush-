<?php


namespace App\Http\Controllers;

use App\Models\Suplier;
use Illuminate\Http\Request;

class SuplierController extends Controller
{
    public function index(Request $request)
    {
        $sort = $request->get('sort', 'asc');

        $supliers = Suplier::orderBy('nama', $sort)
            ->paginate(10)
            ->withQueryString();

        return view('supliers.index', compact('supliers', 'sort'));
    }

    public function create()
    {
        return view('supliers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'nullable|string|max:100',
            'alamat' => 'nullable|string|max:255',
            'kode_pos' => 'nullable|string|max:20',
        ]);

        Suplier::create($request->all());

        return redirect()->route('supliers.index')->with('success', 'Suplier berhasil ditambahkan.');
    }

    public function edit(Suplier $suplier)
    {
        return view('supliers.edit', compact('suplier'));
    }

    public function update(Request $request, Suplier $suplier)
    {
        $request->validate([
            'nama' => 'nullable|string|max:100',
            'alamat' => 'nullable|string|max:255',
            'kode_pos' => 'nullable|string|max:20',
        ]);

        $suplier->update($request->all());

        return redirect()->route('supliers.index')->with('success', 'Suplier berhasil diperbarui.');
    }

    public function destroy(Suplier $suplier)
    {
        $suplier->delete();

        return redirect()->route('supliers.index')->with('success', 'Suplier berhasil dihapus.');
    }
}
