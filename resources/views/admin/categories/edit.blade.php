@extends('layouts.admin')
@section('page_title', 'Edit Kategori')
@section('page_subtitle', 'Ubah nama kategori event.')
@section('content')
<div class="bg-white p-8 rounded-2xl border border-slate-100 shadow-sm max-w-lg">
    <form action="{{ route('admin.categories.update', $category->id) }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')
        <div>
            <label class="block text-sm font-bold text-slate-700 mb-2 uppercase tracking-wide">Nama Kategori</label>
            <input type="text" name="name" value="{{ old('name', $category->name) }}"
                class="w-full px-5 py-4 bg-slate-50 border-2 border-slate-100 rounded-2xl outline-none transition font-medium" required>
            @error('name') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
        </div>
        <div class="pt-4 flex justify-end gap-4 border-t border-slate-100">
            <a href="{{ route('admin.categories.index') }}" class="px-6 py-4 text-slate-500 font-bold hover:text-slate-800 transition">Batal</a>
            <button type="submit" class="px-8 py-4 bg-indigo-600 text-white rounded-2xl font-bold hover:bg-indigo-700 transition">Simpan Perubahan</button>
        </div>
    </form>
</div>
@endsection