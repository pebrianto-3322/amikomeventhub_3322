<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search');
        $categories = Category::when($search, function($q) use ($search) {
            $q->where('name', 'LIKE', '%' . $search . '%');
        })->latest()->paginate(10);
        return view('admin.categories.index', compact('categories', 'search'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        Category::create([
            'name' => $request->name,
            'slug' => \Str::slug($request->name),
        ]);
        return redirect()->route('admin.categories.index')->with('success', 'Kategori berhasil ditambahkan.');
    }

    public function edit(Category $category)
    {
         $categories = Category::all();
         return view('admin.categories.edit', compact('category', 'categories'));
    }
    public function update(Request $request, Category $category)
    {
        $request->validate(['name' => 'required|string|max:255']);
        $category->update([
            'name' => $request->name,
            'slug' => \Str::slug($request->name),
        ]);
        return redirect()->route('admin.categories.index')->with('success', 'Kategori berhasil diperbarui.');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('admin.categories.index')->with('success', 'Kategori berhasil dihapus.');
    }
}