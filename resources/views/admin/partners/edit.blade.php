@extends('layouts.admin')
@section('page_title', 'Edit Partner')
@section('page_subtitle', 'Ubah data partner.')
@section('content')
@use('Illuminate\Support\Facades\Storage')
<div class="bg-white p-8 rounded-2xl border border-slate-100 shadow-sm max-w-xl">
    <form action="{{ route('admin.events.update', $event->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')
        <div>
            <label class="block text-sm font-bold text-slate-700 mb-2">Nama Partner</label>
            <input type="text" name="name" value="{{ old('name', $partner->name) }}" class="w-full px-5 py-4 bg-slate-50 border-2 border-slate-100 rounded-2xl outline-none font-medium" required>
            @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>
        <div>
            <label class="block text-sm font-bold text-slate-700 mb-2">Logo Partner</label>
            {{-- Tampilkan logo lama --}}
            @if($partner->logo_url)
                <img src="{{ $partner->logo_url }}" alt="Logo saat ini" class="h-12 mb-3 rounded">
                <p class="text-xs text-slate-400 mb-2">Logo saat ini. Upload baru untuk mengganti.</p>
            @endif
            <input type="file" name="logo" accept="image/*" class="w-full px-5 py-4 bg-slate-50 border-2 border-slate-100 rounded-2xl outline-none font-medium">
            @error('logo') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>
        <div>
    <label class="block text-sm font-bold text-slate-700 mb-2">Poster Event</label>
            @if($event->poster_path)
            <img src="{{ Storage::url($event->poster_path) }}" alt="Poster saat ini" class="h-32 mb-3 rounded-xl object-cover">
            <p class="text-xs text-slate-400 mb-2">Poster saat ini. Upload baru untuk mengganti.</p>
             @endif
             <input type="file" name="poster" accept="image/*" class="w-full px-5 py-4 bg-slate-50 border-2 border-slate-100 rounded-2xl outline-none font-medium">
            @error('poster') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>
        <div class="flex justify-end gap-4 pt-4 border-t border-slate-100">
            <a href="{{ route('admin.partners.index') }}" class="px-6 py-4 text-slate-500 font-bold hover:text-slate-800 transition">Batal</a>
            <button type="submit" class="px-8 py-4 bg-indigo-600 text-white rounded-2xl font-bold hover:bg-indigo-700 transition">Simpan Perubahan</button>
        </div>
    </form>
</div>
@endsection