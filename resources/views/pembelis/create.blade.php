@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 sm:px-6 lg:px-8 py-6">
    <h1 class="text-2xl font-bold text-white mb-6">Tambah Pembeli</h1>

    <form action="{{ route('pembelis.store') }}" method="POST" class="bg-transparent shadow rounded-lg p-6 space-y-6">
        @csrf

        <div>
            <label class="block text-sm font-medium text-white">Nama</label>
            <input type="text" name="nama" value="{{ old('nama') }}" required
                class="mt-1 block w-full rounded-md border-none bg-transparent  shadow-xl focus:ring-blue-500 focus:border-blue-500">
            @error('nama')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-white">Jenis kelamin</label>
            <input type="text" name="jenis_kelamin" value="{{ old('jenis_kelamin') }}" required
                class="mt-1 block w-full rounded-md border-none bg-transparent shadow-lg focus:ring-blue-500 focus:border-blue-500">
            @error('jenis_kelamin')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-white">Telepon</label>
            <input type="text" name="telepon" value="{{ old('telepon') }}" required
                class="mt-1 block w-full rounded-md border-none  bg-transparent  shadow-lg focus:ring-blue-500 focus:border-blue-500">
            @error('no_hp')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-white">Alamat</label>
            <input type="text" name="alamat" value="{{ old('alamat') }}" required
                class="mt-1 block w-full rounded-md border-none  bg-transparent  shadow-lg focus:ring-blue-500 focus:border-blue-500">
            @error('alamat')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex justify-end">
            <a href="{{ route('pembelis.index') }}" class="bg-gray-900 hover:bg-gray-800 text-white text-sm px-4 py-2 rounded mr-2">Batal</a>
            <button type="submit" class="bg-green-600 hover:bg-green-700 text-white text-sm px-4 py-2 rounded">Simpan</button>
        </div>
    </form>
</div>
@endsection
