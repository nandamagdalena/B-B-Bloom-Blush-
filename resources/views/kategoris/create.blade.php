@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6 text-white">
    <h1 class="text-2xl font-bold mb-6">Tambah Kategori</h1>

    <form action="{{ route('kategoris.store') }}" method="POST" class="space-y-4">
        @csrf

        <div>
            <label class="block mb-1">Nama</label>
            <input type="text" name="nama" class="w-full bg-gray-800 border border-gray-600 rounded px-3 py-2 text-white">
        </div>

        <div class="flex justify-end space-x-2">
            <a href="{{ route('kategoris.index') }}" class="bg-gray-700 hover:bg-gray-600 px-4 py-2 rounded">Batal</a>
            <button type="submit" class="bg-green-600 hover:bg-green-700 px-4 py-2 rounded">Simpan</button>
        </div>
    </form>
</div>
@endsection
