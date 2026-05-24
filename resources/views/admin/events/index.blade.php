@extends('layouts.admin')

@section('page_title', 'Kelola Event')
@section('page_subtitle', 'Buat dan atur acara seru Anda di sini.')

@section('content')
<div class="mb-4 text-right">
    <a href="{{ route('admin.events.create') }}" class="inline-block px-6 py-3 bg-indigo-600 text-white rounded-2xl font-bold shadow-lg hover:bg-indigo-700 transition">
        + Tambah Event Baru
    </a>
</div>

<div class="bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
    <table class="w-full text-left">
        <thead class="bg-slate-50 text-slate-400 uppercase text-xs font-black tracking-widest">
            <tr>
                <th class="px-6 py-4">No</th>
                <th class="px-6 py-4">Event</th>
                <th class="px-6 py-4">Kategori</th>
                <th class="px-6 py-4">Harga</th>
                <th class="px-6 py-4">Stok</th>
                <th class="px-6 py-4">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y">
            @forelse($events as $index => $event)
            <tr class="hover:bg-slate-50 transition">
                <td class="px-6 py-4">{{ $events->firstItem() + $index }}</td>
                <td class="px-6 py-4 font-bold">{{ $event->title }}</td>
                <td class="px-6 py-4 text-slate-500">{{ $event->category->name ?? '-' }}</td>
                <td class="px-6 py-4 text-indigo-600 font-bold">Rp {{ number_format($event->price, 0, ',', '.') }}</td>
                <td class="px-6 py-4">{{ $event->stock }}</td>
                <td class="px-6 py-4">
                    <div class="flex gap-2">
                        <a href="{{ route('admin.events.edit', $event->id) }}" class="px-3 py-1 bg-indigo-50 text-indigo-600 rounded-lg hover:bg-indigo-600 hover:text-white transition text-sm font-bold">Edit</a>
                        <form action="{{ route('admin.events.destroy', $event->id) }}" method="POST" onsubmit="return confirm('Hapus event ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="px-3 py-1 bg-rose-50 text-rose-600 rounded-lg hover:bg-rose-600 hover:text-white transition text-sm font-bold">Hapus</button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="px-6 py-10 text-center text-slate-400">Belum ada event.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
    <div class="px-6 py-4 border-t">
        {{ $events->links() }}
    </div>
</div>
@endsection