@extends('layouts.app')

@section('content')
<div class="p-6 text-white">
    <h1 class="text-2xl font-bold mb-4">{{ isset($penjualan) ? 'Edit' : 'Tambah' }} Penjualan</h1>

    <form action="{{ isset($penjualan) ? route('penjualans.update', $penjualan) : route('penjualans.store') }}" method="POST" class="space-y-4">
        @csrf
        @if(isset($penjualan)) @method('PUT') @endif

        <div>
            <label class="block mb-1">Pembeli</label>
            <select name="pembeli_id" class="w-full bg-gray-800 border border-gray-600 rounded px-3 py-2 text-white">
                @foreach($pembelis as $pembeli)
                    <option value="{{ $pembeli->id }}" {{ old('pembeli_id', $penjualan->pembeli_id ?? '') == $pembeli->id ? 'selected' : '' }}>
                        {{ $pembeli->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block mb-1">User</label>
            <select name="user_id" class="w-full bg-gray-800 border border-gray-600 rounded px-3 py-2 text-white">
                @foreach($users as $user)
                    <option value="{{ $user->id }}" {{ old('user_id', $penjualan->user_id ?? '') == $user->id ? 'selected' : '' }}>
                        {{ $user->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block mb-1">Tanggal Pesan</label>
            <input type="datetime-local" name="tanggal_pesan" value="{{ old('tanggal_pesan', isset($penjualan) ? \Carbon\Carbon::parse($penjualan->tanggal_pesan)->format('Y-m-d\TH:i') : now()->format('Y-m-d\TH:i')) }}" class="w-full bg-gray-800 border border-gray-600 rounded px-3 py-2 text-white">
        </div>

        <div class="flex justify-end space-x-2">
            <a href="{{ route('penjualans.index') }}" class="bg-gray-600 hover:bg-gray-500 px-4 py-2 rounded">Batal</a>
            <button type="submit" class="bg-green-600 hover:bg-green-700 px-4 py-2 rounded">Simpan</button>
        </div>
    </form>
</div>
@endsection
