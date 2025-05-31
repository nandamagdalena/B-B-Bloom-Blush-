@extends('layouts.app')

@section('content')
<div class="text-white p-6">
    <h1 class="text-2xl font-bold mb-4">Daftar Pembelian</h1>

    <a href="{{ route('pembelians.create') }}" class="bg-green-600 hover:bg-green-700 px-4 py-2 rounded mb-4 inline-block">+ Tambah Pembelian</a>

    @if(session('success'))
        <div class="bg-green-800 p-3 rounded mb-4">{{ session('success') }}</div>
    @endif

    <div class="bg-gray-800 rounded shadow overflow-auto">
        <table class="w-full text-left text-white">
            <thead class="bg-gray-700">
                <tr>
                    <th class="px-4 py-2">Barang</th>
                    <th class="px-4 py-2">Jumlah</th>
                    <th class="px-4 py-2">Suplier</th>
                    <th class="px-4 py-2">
                            <a href="{{ route('pembelians.index', ['sort' => $sort === 'asc' ? 'desc' : 'asc']) }}" class="hover:underline flex items-center space-x-1">
                                <span>Tanggal</span>
                                @if($sort === 'asc')
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" />
                                    </svg>
                                @else
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                    </svg>
                                @endif
                        </a>
                    </th>
                    <th class="px-4 py-2">Status</th>
                    <th class="px-4 py-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($pembelians as $pembelian)
                    <tr class="border-t border-gray-600">
                        <td class="px-4 py-2">{{ $pembelian->barang->nama }}</td>
                        <td class="px-4 py-2">{{ $pembelian->jumlah }}</td>
                        <td class="px-4 py-2">{{ $pembelian->suplier }}</td>
                        <td class="px-4 py-2">{{ $pembelian->tanggal }}</td>
                        <td class="px-4 py-2">{{ $pembelian->status }}</td>
                        <td class="px-4 py-2 space-x-2">
                            <a href="{{ route('pembelians.edit', $pembelian) }}" class="bg-yellow-500 hover:bg-yellow-600 px-3 py-1 rounded">Edit</a>
                            <form action="{{ route('pembelians.destroy', $pembelian) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin hapus?')">
                                @csrf
                                @method('DELETE')
                                <button class="bg-red-600 hover:bg-red-700 px-3 py-1 rounded">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-4 py-2 text-center">Tidak ada data pembelian.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
        <div class="mt-4">
    {{ $pembelians->links() }}
    </div>
</div>
@endsection
