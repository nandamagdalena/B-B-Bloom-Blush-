@extends('layouts.app')

@section('content')
<div class="text-white p-6">
    <h1 class="text-2xl font-bold mb-4">Data Barang</h1>

    <a href="{{ route('barangs.create') }}" class="bg-green-600 hover:bg-green-700 px-4 py-2 rounded inline-block mb-4">+ Tambah Barang</a>

    @if(session('success'))
        <div class="bg-green-800 p-3 rounded mb-4">{{ session('success') }}</div>
    @endif

    <div class="bg-gray-800 rounded shadow overflow-auto">

        <table class="w-full text-left text-white">
            <thead class="bg-gray-700 uppercase text-sm">
                <tr>
                    <th class="px-4 py-2">Nama</th>
                    <th class="px-4 py-2">Gambar</th>
                    <th class="px-4 py-2">Kategori</th>
                    <th class="px-4 py-2">Stok</th>
                    <th class="px-4 py-2">Harga</th>
                    <th class="px-4 py-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($barangs as $barang)
                    <tr class="border-t border-gray-600">
                        <td class="px-4 py-2">{{ $barang->nama }}</td>
                        <td class="px-4 py-2">
                            @if($barang->gambar)
                                <img src="{{ asset('storage/'.$barang->gambar) }}" class="w-16 h-16 object-cover rounded">
                            @else
                                Tidak ada
                            @endif
                        </td>
                        <td class="px-4 py-2">{{ $barang->kategori->nama }}</td>
                        <td class="px-4 py-2">{{ $barang->stok }}</td>
                        <td class="px-4 py-2">Rp {{ number_format($barang->harga, 0, ',', '.') }}</td>
                        <td class="px-4 py-2 space-x-2">
                            <a href="{{ route('barangs.edit', $barang) }}" class="bg-yellow-500 hover:bg-yellow-600 px-3 py-1 rounded">Edit</a>
                            <form action="{{ route('barangs.destroy', $barang) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin hapus?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-600 hover:bg-red-700 px-3 py-1 rounded">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-4 py-2 text-center">Tidak ada data barang.</td>
                        </tr>
                    @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-4">
    {{ $barangs->links() }}
    </div>
</div>
@endsection
