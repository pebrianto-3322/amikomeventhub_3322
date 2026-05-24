@extends('layouts.admin')
@section('page_title', 'Kelola Kategori')
@section('page_subtitle', 'Tambah dan atur kategori event.')
@section('content')
<div class="mb-4 flex justify-between items-center">
    <form method="GET" action="{{ route('admin.categories.index') }}" class="flex gap-2">
        <input type="text" name="search" value="{{ $search }}" placeholder="Cari kategori..." class="px-4 py-2 bg-white border border-slate-200 rounded-xl outline-none text-sm">
        <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-xl text-sm font-bold hover:bg-indigo-700 transition">Cari</button>
    </form>
    <a href="{{ route('admin.categories.create') }}" class="px-6 py-3 bg-indigo-600 text-white rounded-2xl font-bold hover:bg-indigo-700 transition">+ Tambah Kategori</a>
</div>
<div class="bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
    <table class="w-full text-left">
        <thead class="bg-slate-50 text-slate-400 uppercase text-xs font-black tracking-widest">
            <tr>
                <th class="px-6 py-4">No</th>
                <th class="px-6 py-4">Nama Kategori</th>
                <th class="px-6 py-4">Dibuat</th>
                <th class="px-6 py-4">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y">
            @forelse($categories as $index => $category)
            <tr class="hover:bg-slate-50 transition">
                <td class="px-6 py-4">{{ $categories->firstItem() + $index }}</td>
                <td class="px-6 py-4 font-bold">{{ $category->name }}</td>
                <td class="px-6 py-4 text-slate-500 text-sm">{{ $category->created_at->format('d M Y') }}</td>
                <td class="px-6 py-4">
                    <div class="flex gap-2">
                        <a href="{{ route('admin.categories.edit', $category->id) }}" class="px-3 py-1 bg-indigo-50 text-indigo-600 rounded-lg hover:bg-indigo-600 hover:text-white transition text-sm font-bold">Edit</a>
                        <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" onsubmit="return confirm('Hapus kategori ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="px-3 py-1 bg-rose-50 text-rose-600 rounded-lg hover:bg-rose-600 hover:text-white transition text-sm font-bold">Hapus</button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr><td colspan="4" class="px-6 py-10 text-center text-slate-400">Belum ada kategori.</td></tr>
            @endforelse
        </tbody>
    </table>
    <div class="px-6 py-4 border-t">{{ $categories->links() }}</div>
</div>
@endsection