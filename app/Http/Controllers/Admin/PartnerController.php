<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Partner;
use Illuminate\Http\Request;

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
            'name'     => 'required|string|max:255',
            'logo_url' => 'required|string|max:255',
        ]);
        Partner::create($request->only('name', 'logo_url'));
        return redirect()->route('admin.partners.index')->with('success', 'Partner berhasil ditambahkan.');
    }

    public function edit(Partner $partner)
    {
        return view('admin.partners.edit', compact('partner'));
    }

    public function update(Request $request, Partner $partner)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'logo_url' => 'required|string|max:255',
        ]);
        $partner->update($request->only('name', 'logo_url'));
        return redirect()->route('admin.partners.index')->with('success', 'Partner berhasil diperbarui.');
    }

    public function destroy(Partner $partner)
    {
        $partner->delete();
        return redirect()->route('admin.partners.index')->with('success', 'Partner berhasil dihapus.');
    }
}