@extends('layouts.app')

@section('content')
<div class="p-6 text-white">
    <h1 class="text-2xl font-bold mb-4">Detail Penjualan</h1>

    <a href="{{ route('detail-penjualans.create') }}" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded mb-4 inline-block">+ Tambah Detail</a>

    @if(session('success'))
        <div class="bg-green-800 p-3 rounded mb-4">{{ session('success') }}</div>
    @endif

    <div class="bg-gray-800 rounded shadow overflow-auto">
        <table class="w-full text-white">
            <thead class="bg-gray-700">
                <tr>
                    <th class="px-4 py-2">Penjualan ID</th>
                    <th class="px-4 py-2">Barang</th>
                    <th class="px-4 py-2">Jumlah</th>
                    <th class="px-4 py-2">Total Harga</th>
                    <th class="px-4 py-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($detailPenjualans as $item)
                    <tr class="border-t border-gray-600">
                        <td class="px-4 py-2">{{ $item->penjualan_id }}</td>
                        <td class="px-4 py-2">{{ $item->barang->nama }}</td>
                        <td class="px-4 py-2">{{ $item->jumlah }}</td>
                        <td class="px-4 py-2">{{ $item->total_harga }}</td>
                        <td class="px-4 py-2 space-x-2">
                            <a href="{{ route('detail-penjualans.edit', $item) }}" class="bg-yellow-500 hover:bg-yellow-600 px-3 py-1 rounded">Edit</a>
                            <form action="{{ route('detail-penjualans.destroy', $item) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin hapus?')">
                                @csrf
                                @method('DELETE')
                                <button class="bg-red-600 hover:bg-red-700 px-3 py-1 rounded">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-4 py-2 text-center">Tidak ada data detail penjualan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
        <div class="mt-4">
    {{ $detailPenjualans->links() }}
    </div>
</div>
@endsection
