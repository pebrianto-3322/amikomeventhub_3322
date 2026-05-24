<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AmikomEventHub</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-50">
    <div class="max-w-5xl mx-auto px-6 py-16">
        <h1 class="text-4xl font-black text-slate-800 mb-2">AmikomEventHub</h1>
        <p class="text-slate-500 mb-12">Platform event terbaik Universitas AMIKOM Yogyakarta.</p>

        <h2 class="text-2xl font-black text-slate-800 mb-6">Kategori Event</h2>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-16">
            @forelse($categories as $category)
            <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-6 text-center">
                <p class="font-bold text-slate-800">{{ $category->name }}</p>
            </div>
            @empty
            <p class="text-slate-400">Belum ada kategori.</p>
            @endforelse
        </div>

        <h2 class="text-2xl font-black text-slate-800 mb-6">Partner Kami</h2>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            @forelse($partners as $partner)
            <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-6 flex flex-col items-center gap-3">
                <img src="{{ $partner->logo_url }}" alt="{{ $partner->name }}" class="h-12 object-contain" onerror="this.src='https://placehold.co/120x48'">
                <p class="font-bold text-slate-800 text-sm">{{ $partner->name }}</p>
            </div>
            @empty
            <p class="text-slate-400">Belum ada partner.</p>
            @endforelse
        </div>
    </div>
</body>
</html>