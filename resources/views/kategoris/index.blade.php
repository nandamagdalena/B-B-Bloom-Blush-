@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6 text-white">
    <h1 class="text-2xl font-bold mb-6">Daftar Kategori</h1>

    <a href="{{ route('kategoris.create') }}" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded mb-4 inline-block">+ Tambah Kategori</a>

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
                    <th class="px-4 py-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($kategoris as $kategori)
                    <tr class="border-t border-gray-600">
                        <td class="px-4 py-2">{{ $kategori->nama }}</td>
                        <td class="px-4 py-2 space-x-2">
                            <a href="{{ route('kategoris.edit', $kategori) }}" class="bg-yellow-600 hover:bg-yellow-700 px-3 py-1 rounded text-white text-sm">Edit</a>
                            <form action="{{ route('kategoris.destroy', $kategori) }}" method="POST" class="inline-block" onsubmit="return confirm('Hapus kategori ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-600 hover:bg-red-700 px-3 py-1 rounded text-white text-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="2" class="px-4 py-2 text-center">Tidak ada data kategori.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
        <div class="mt-4">
    {{ $kategoris->links() }}
    </div>
</div>
@endsection
