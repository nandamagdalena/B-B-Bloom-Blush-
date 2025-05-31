@extends('layouts.app')

@section('content')
<div class="text-white p-6">
    <h1 class="text-2xl font-bold mb-4">{{ isset($pembelian) ? 'Edit' : 'Tambah' }} Pembelian</h1>

    <form action="{{ isset($pembelian) ? route('pembelians.update', $pembelian) : route('pembelians.store') }}" method="POST" class="space-y-4">
        @csrf
        @if(isset($pembelian)) @method('PUT') @endif

        <div>
            <label class="block mb-1">Barang</label>
            <select name="barang_id" class="w-full bg-gray-800 border border-gray-600 rounded px-3 py-2 text-white">
                @foreach($barangs as $barang)
                    <option value="{{ $barang->id }}" {{ old('barang_id', $pembelian->barang_id ?? '') == $barang->id ? 'selected' : '' }}>
                        {{ $barang->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block mb-1">Jumlah</label>
            <input type="number" name="jumlah" value="{{ old('jumlah', $pembelian->jumlah ?? 1) }}" class="w-full bg-gray-800 border border-gray-600 rounded px-3 py-2 text-white">
        </div>

        <div>
            <label class="block mb-1">Suplier</label>
            <select name="supliers_id" class="w-full bg-gray-800 border border-gray-600 rounded px-3 py-2 text-white">
                @foreach($supliers as $suplier)
                    <option value="{{ $suplier->id }}" {{ old('supliers_id', $pembelian->supliers_id ?? '') == $suplier->id ? 'selected' : '' }}>
                        {{ $suplier->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block mb-1">Tanggal</label>
            <input type="date" name="tanggal" value="{{ old('tanggal', $pembelian->tanggal ?? now()->format('Y-m-d')) }}" class="w-full bg-gray-800 border border-gray-600 rounded px-3 py-2 text-white">
        </div>

        <div>
            <label class="block mb-1">Status</label>
            <input type="text" name="status" value="{{ old('status', $pembelian->status ?? '') }}" class="w-full bg-gray-800 border border-gray-600 rounded px-3 py-2 text-white">
        </div>

        <div class="flex justify-end space-x-2">
            <a href="{{ route('pembelians.index') }}" class="bg-gray-600 hover:bg-gray-500 px-4 py-2 rounded">Batal</a>
            <button type="submit" class="bg-green-600 hover:bg-green-700 px-4 py-2 rounded">Simpan</button>
        </div>
    </form>
</div>
@endsection
