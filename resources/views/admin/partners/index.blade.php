@extends('layouts.admin')
@section('page_title', 'Kelola Partner')
@section('page_subtitle', 'Tambah dan atur partner.')
@section('content')
<div class="mb-4 flex justify-between items-center">
    <form method="GET" action="{{ route('admin.partners.index') }}" class="flex gap-2">
        <input type="text" name="search" value="{{ $search }}" placeholder="Cari partner..." class="px-4 py-2 bg-white border border-slate-200 rounded-xl outline-none text-sm">
        <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-xl text-sm font-bold hover:bg-indigo-700 transition">Cari</button>
    </form>
    <a href="{{ route('admin.partners.create') }}" class="px-6 py-3 bg-indigo-600 text-white rounded-2xl font-bold hover:bg-indigo-700 transition">+ Tambah Partner</a>
</div>
<div class="bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
    <table class="w-full text-left">
        <thead class="bg-slate-50 text-slate-400 uppercase text-xs font-black tracking-widest">
            <tr>
                <th class="px-6 py-4">No</th>
                <th class="px-6 py-4">Nama Partner</th>
                <th class="px-6 py-4">Logo URL</th>
                <th class="px-6 py-4">Dibuat</th>
                <th class="px-6 py-4">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y">
            @forelse($partners as $index => $partner)
            <tr class="hover:bg-slate-50 transition">
                <td class="px-6 py-4">{{ $partners->firstItem() + $index }}</td>
                <td class="px-6 py-4 font-bold">{{ $partner->name }}</td>
                <td class="px-6 py-4 text-slate-500 text-sm">
                    <img src="{{ $partner->logo_url }}" alt="{{ $partner->name }}" class="h-8 object-contain" onerror="this.src='https://placehold.co/80x32'">
                </td>
                <td class="px-6 py-4 text-slate-500 text-sm">{{ $partner->created_at->format('d M Y') }}</td>
                <td class="px-6 py-4">
                    <div class="flex gap-2">
                        <a href="{{ route('admin.partners.edit', $partner->id) }}" class="px-3 py-1 bg-indigo-50 text-indigo-600 rounded-lg hover:bg-indigo-600 hover:text-white transition text-sm font-bold">Edit</a>
                        <form action="{{ route('admin.partners.destroy', $partner->id) }}" method="POST" onsubmit="return confirm('Hapus partner ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="px-3 py-1 bg-rose-50 text-rose-600 rounded-lg hover:bg-rose-600 hover:text-white transition text-sm font-bold">Hapus</button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr><td colspan="5" class="px-6 py-10 text-center text-slate-400">Belum ada partner.</td></tr>
            @endforelse
        </tbody>
    </table>
    <div class="px-6 py-4 border-t">{{ $partners->links() }}</div>
</div>
@endsection