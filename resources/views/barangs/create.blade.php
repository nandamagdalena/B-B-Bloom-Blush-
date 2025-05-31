@extends('layouts.app')

@section('content')
<div class="text-white p-6">
    <h1 class="text-2xl font-bold mb-4">{{ isset($barang) ? 'Edit' : 'Tambah' }} Barang</h1>

    <form action="{{ isset($barang) ? route('barangs.update', $barang) : route('barangs.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf
        @if(isset($barang)) @method('PUT') @endif

        <div>
            <label class="block mb-1">Nama</label>
            <input type="text" name="nama" value="{{ old('nama', $barang->nama ?? '') }}" class="w-full bg-gray-800 border border-gray-600 rounded px-3 py-2 text-white">
        </div>

        <div>
            <label class="block mb-1">Kategori</label>
            <select name="kategori_id" class="w-full bg-gray-800 border border-gray-600 rounded px-3 py-2 text-white">
                @foreach($kategoris as $kategori)
                    <option value="{{ $kategori->id }}" {{ old('kategori_id', $barang->kategori_id ?? '') == $kategori->id ? 'selected' : '' }}>
                        {{ $kategori->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block mb-1">Stok</label>
            <input type="number" name="stok" value="{{ old('stok', $barang->stok ?? '') }}" class="w-full bg-gray-800 border border-gray-600 rounded px-3 py-2 text-white">
        </div>

        <div>
            <label class="block mb-1">Harga</label>
            <input type="number" name="harga" value="{{ old('harga', $barang->harga ?? '') }}" class="w-full bg-gray-800 border border-gray-600 rounded px-3 py-2 text-white">
        </div>

        <div>
            <label class="block mb-1">Gambar</label>
            <input type="file" name="gambar" class="text-white">
            @if(isset($barang) && $barang->gambar)
                <img src="{{ asset('storage/'.$barang->gambar) }}" class="w-20 mt-2">
            @endif
        </div>

        <div class="flex justify-end space-x-2">
            <a href="{{ route('barangs.index') }}" class="bg-gray-600 hover:bg-gray-500 px-4 py-2 rounded">Batal</a>
            <button type="submit" class="bg-green-600 hover:bg-green-700 px-4 py-2 rounded">Simpan</button>
        </div>
    </form>
</div>
@endsection
