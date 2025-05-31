@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6 text-white">
    <h1 class="text-2xl font-bold mb-6">Daftar Suplier</h1>

    <a href="{{ route('supliers.create') }}" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded mb-4 inline-block">+ Tambah Suplier</a>

    @if(session('success'))
        <div class="bg-green-800 text-white px-4 py-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-gray-800 shadow rounded-lg overflow-hidden">
        <table class="min-w-full text-white">
            <thead class="bg-gray-700 text-left text-sm uppercase">
                <tr>
                    <th class="px-4 py-2">Nama</th>
                    <th class="px-4 py-2">Alamat</th>
                    <th class="px-4 py-2">Kode Pos</th>
                    <th class="px-4 py-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($supliers as $suplier)
                    <tr class="border-t border-gray-600">
                        <td class="px-4 py-2">{{ $suplier->nama }}</td>
                        <td class="px-4 py-2">{{ $suplier->alamat }}</td>
                        <td class="px-4 py-2">{{ $suplier->kode_pos }}</td>
                        <td class="px-4 py-2 space-x-2">
                            <a href="{{ route('supliers.edit', $suplier) }}" class="bg-yellow-600 hover:bg-yellow-700 px-3 py-1 rounded text-white text-sm">Edit</a>
                            <form action="{{ route('supliers.destroy', $suplier) }}" method="POST" class="inline-block" onsubmit="return confirm('Hapus suplier ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-600 hover:bg-red-700 px-3 py-1 rounded text-white text-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-4 py-2 text-center">Tidak ada data suplier.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-4">
    {{ $supliers->links() }}
    </div>
</div>
@endsection
