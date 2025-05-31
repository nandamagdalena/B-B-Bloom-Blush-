@extends('layouts.app')

@section('content')
<div class="p-6 text-white">
    <h1 class="text-2xl font-bold mb-4">{{ isset($detailPenjualan) ? 'Edit' : 'Tambah' }} Detail Penjualan</h1>

    <form action="{{ isset($detailPenjualan) ? route('detail-penjualans.update', $detailPenjualan) : route('detail-penjualans.store') }}" method="POST" class="space-y-4">
        @csrf
        @if(isset($detailPenjualan)) @method('PUT') @endif

        <div>
            <label class="block mb-1">Penjualan</label>
            <select name="penjualan_id" class="w-full bg-gray-800 border border-gray-600 rounded px-3 py-2 text-white">
                @foreach($penjualans as $penjualan)
                    <option value="{{ $penjualan->id }}" {{ old('penjualan_id', $detailPenjualan->penjualan_id ?? '') == $penjualan->id ? 'selected' : '' }}>
                        #{{ $penjualan->id }} - {{ $penjualan->pembeli->nama ?? 'Tanpa Nama' }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block mb-1">Barang</label>
            <select name="barang_id" class="w-full bg-gray-800 border border-gray-600 rounded px-3 py-2 text-white">
                @foreach($barangs as $barang)
                    <option value="{{ $barang->id }}" {{ old('barang_id', $detailPenjualan->barang_id ?? '') == $barang->id ? 'selected' : '' }}>
                        {{ $barang->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block mb-1">Jumlah</label>
            <input type="number" name="jumlah" value="{{ old('jumlah', $detailPenjualan->jumlah ?? 1) }}" class="w-full bg-gray-800 border border-gray-600 rounded px-3 py-2 text-white">
        </div>

        <div>
            <label class="block mb-1">Total Harga</label>
            <input type="text" name="total_harga" value="{{ old('total_harga', $detailPenjualan->total_harga ?? '0') }}" class="w-full bg-gray-800 border border-gray-600 rounded px-3 py-2 text-white">
        </div>

        <div class="flex justify-end space-x-2">
            <a href="{{ route('detail-penjualans.index') }}" class="bg-gray-600 hover:bg-gray-500 px-4 py-2 rounded">Batal</a>
            <button type="submit" class="bg-green-600 hover:bg-green-700 px-4 py-2 rounded">Simpan</button>
        </div>
    </form>
</div>
@endsection
