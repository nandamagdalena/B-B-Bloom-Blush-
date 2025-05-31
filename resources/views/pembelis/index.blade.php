@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 sm:px-6 lg:px-8 py-6">
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-bold text-white">Daftar Pembeli</h1>
        <a href="{{route('pembelis.create')}}" class="inline-block bg-green-600 hover:bg-green-700 text-white text-sm px-4 py-2 rounded-lg transition">
            Tambah Pembeli
        </a>
    </div>

    <div class="overflow-x-auto bg-gray-900 shadow rounded-lg">
        <table class="min-w-full divide-y divide-gray-900">
            <thead class="bg-gray-900">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-white uppercase tracking-wider">No</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-white uppercase tracking-wider">Nama</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-white uppercase tracking-wider">Email</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-white uppercase tracking-wider">Telepon</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-white uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-gray-900 divide-y divide-gray-200">
                @forelse ($pembelis as $index => $pembeli)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-white">{{ $index + 1 }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-white">{{ $pembeli->nama }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-white">{{ $pembeli->email }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-white">{{ $pembeli->telepon }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm space-x-2">
                        <a href="{{ route('pembelis.edit', $pembeli->id) }}" class="text-blue-500 hover:underline">Edit</a>

                        <form action="" method="POST" class="inline-block" onsubmit="return confirm('Yakin ingin menghapus pembeli ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-900 text-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-6 py-4 text-center text-gray-500 text-sm">Tidak ada data pembeli.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
        <div class="mt-4">
    {{ $pembelis->links() }}
    </div>
</div>
@endsection
