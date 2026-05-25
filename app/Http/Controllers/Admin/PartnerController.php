<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PartnerController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search');
        $partners = Partner::when($search, function($q) use ($search) {
            $q->where('name', 'LIKE', '%' . $search . '%');
        })->latest()->paginate(10);
        return view('admin.partners.index', compact('partners', 'search'));
    }

    public function create()
    {
        return view('admin.partners.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'logo' => 'required|image|mimes:jpg,jpeg,png,svg,webp|max:2048',
        ]);

        $path = $request->file('logo')->store('logos', 'public');

        Partner::create([
            'name'     => $request->name,
            'logo_url' => Storage::url($path),
        ]);

        return redirect()->route('admin.partners.index')->with('success', 'Partner berhasil ditambahkan.');
    }

    public function edit(Partner $partner)
    {
        return view('admin.partners.edit', compact('partner'));
    }

    public function update(Request $request, Partner $partner)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpg,jpeg,png,svg,webp|max:2048',
        ]);

        $data = ['name' => $request->name];

        if ($request->hasFile('logo')) {
            // Hapus logo lama
            $oldPath = str_replace('/storage/', '', $partner->logo_url);
            Storage::disk('public')->delete($oldPath);

            // Simpan logo baru
            $path = $request->file('logo')->store('logos', 'public');
            $data['logo_url'] = Storage::url($path);
        }

        $partner->update($data);

        return redirect()->route('admin.partners.index')->with('success', 'Partner berhasil diperbarui.');
    }

    public function destroy(Partner $partner)
    {
        // Hapus file logo saat partner dihapus
        if ($partner->logo_url) {
            $oldPath = str_replace('/storage/', '', $partner->logo_url);
            Storage::disk('public')->delete($oldPath);
        }

        $partner->delete();
        return redirect()->route('admin.partners.index')->with('success', 'Partner berhasil dihapus.');
    }
}