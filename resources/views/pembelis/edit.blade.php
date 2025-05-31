@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 sm:px-6 lg:px-8 py-6">
    <h1 class="text-2xl font-bold text-white mb-6">Edit Pembeli</h1>

    <form action="{{ route('pembelis.update', $pembeli->id) }}" method="POST" class="bg-transparent ashadow rounded-lg p-6 space-y-6">
        @csrf
        @method('PUT')

        <div>
            <label class="block text-sm font-medium text-white">Nama</label>
            <input type="text" name="nama" value="{{ old('nama', $pembeli->nama) }}" required
                class="mt-1 block w-full rounded-md border-none bg-transparent shadow-lg focus:ring-blue-500 focus:border-blue-500">
            @error('nama')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-white">Jenis Kelamin</label>
            <input type="text" name="jenis_kelamin" value="{{ old('jenis_kelamin', $pembeli->jenis_kelamin) }}" required
                class="mt-1 block w-full rounded-md border-none bg-transparent shadow-lg focus:ring-blue-500 focus:border-blue-500">
            @error('jenis_kelamin')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-white">Telepon</label>
            <input type="text" name="telepon" value="{{ old('no_hp', $pembeli->no_hp) }}" required
                class="mt-1 block w-full rounded-md border-none bg-transparent shadow-lg focus:ring-blue-500 focus:border-blue-500">
            @error('no_hp')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-white">Alamat</label>
            <input type="text" name="alamat" value="{{ old('no_hp', $pembeli->alamat) }}" required
                class="mt-1 block w-full rounded-md border-none bg-transparent shadow-lg focus:ring-blue-500 focus:border-blue-500">
            @error('alamat')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex justify-end">
            <a href="{{ route('pembelis.index') }}" class="bg-gray-200 hover:bg-gray-300 text-gray-700 text-sm px-4 py-2 rounded mr-2">Batal</a>
            <button type="submit" class="bg-green-600 hover:bg-green-700 text-white text-sm px-4 py-2 rounded">Update</button>
        </div>
    </form>
</div>
@endsection
