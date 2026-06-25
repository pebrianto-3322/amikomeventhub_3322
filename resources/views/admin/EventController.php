<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Category;
use Illuminate\Http\Request;

class EventController extends Controller
{
    // 1. MENAMPILKAN DAFTAR EVENT
    public function index()
    {
        $events = Event::with('category')->latest()->paginate(10);
        return view('admin.events.index', compact('events'));
    }

    // 2. MENAMPILKAN FORM TAMBAH EVENT
    public function create()
    {
        $categories = Category::all();
        return view('admin.events.create', compact('categories'));
    }

    // 3. MEMPROSES SIMPAN EVENT BARU + BYPASS UPLOAD TO PUBLIC
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'description' => 'required|string',
            'date'        => 'required',
            'location'    => 'required|string',
            'price'       => 'required|numeric|min:0',
            'stock'       => 'required|integer|min:1',
            'poster'      => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        if ($request->hasFile('poster')) {
            $file = $request->file('poster');
            $filename = time() . '_' . $file->getClientOriginalName();
            
            // Pindahkan langsung ke folder public/posters tanpa lewat storage link
            $file->move(public_path('posters'), $filename);
            $validated['poster_path'] = 'posters/' . $filename;
        }

        Event::create($validated);

        return redirect()->route('admin.events.index')->with('success', 'Event baru berhasil ditambahkan!');
    }

    // 4. MENAMPILKAN FORM EDIT EVENT
    public function edit(Event $event)
    {
        $categories = Category::all();
        return view('admin.events.edit', compact('event', 'categories'));
    }

    // 5. MEMPROSES UPDATE EVENT
    public function update(Request $request, Event $event)
    {
        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'description' => 'required|string',
            'date'        => 'required',
            'location'    => 'required|string',
            'price'       => 'required|numeric|min:0',
            'stock'       => 'required|integer|min:1',
            'poster'      => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        if ($request->hasFile('poster')) {
            $file = $request->file('poster');
            $filename = time() . '_' . $file->getClientOriginalName();
            
            // Hapus file lama jika ada di folder public
            if ($event->poster_path && file_exists(public_path($event->poster_path))) {
                @unlink(public_path($event->poster_path));
            }

            $file->move(public_path('posters'), $filename);
            $validated['poster_path'] = 'posters/' . $filename;
        }

        $event->update($validated);

        return redirect()->route('admin.events.index')->with('success', 'Data event berhasil diperbarui!');
    }

    // 6. MEMPROSES HAPUS EVENT
    public function destroy(Event $event)
    {
        if ($event->poster_path && file_exists(public_path($event->poster_path))) {
            @unlink(public_path($event->poster_path));
        }

        $event->delete();

        return redirect()->route('admin.events.index')->with('success', 'Event berhasil dihapus!');
    }
}