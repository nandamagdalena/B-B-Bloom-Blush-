@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6 text-white">
    <h1 class="text-2xl font-bold mb-6">Edit Suplier</h1>

    <form action="{{ route('supliers.update', $suplier) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label class="block mb-1">Nama</label>
            <input type="text" name="nama" value="{{ $suplier->nama }}" class="w-full bg-gray-800 border border-gray-600 rounded px-3 py-2 text-white">
        </div>

        <div>
            <label class="block mb-1">Alamat</label>
            <input type="text" name="alamat" value="{{ $suplier->alamat }}" class="w-full bg-gray-800 border border-gray-600 rounded px-3 py-2 text-white">
        </div>

        <div>
            <label class="block mb-1">Kode Pos</label>
            <input type="text" name="kode_pos" value="{{ $suplier->kode_pos }}" class="w-full bg-gray-800 border border-gray-600 rounded px-3 py-2 text-white">
        </div>

        <div class="flex justify-end space-x-2">
            <a href="{{ route('supliers.index') }}" class="bg-gray-700 hover:bg-gray-600 px-4 py-2 rounded">Batal</a>
            <button type="submit" class="bg-green-600 hover:bg-green-700 px-4 py-2 rounded">Update</button>
        </div>
    </form>
</div>
@endsection
