<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - AmikomEventHub</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-50 text-slate-900 flex min-h-screen">
    <aside class="w-64 bg-indigo-900 text-indigo-100 flex flex-col p-6 space-y-8 sticky top-0 h-screen">
        <div class="flex items-center gap-3">
            <span class="text-xl font-bold text-white">AmikomEventHub</span>
        </div>
        <nav class="flex-1 space-y-2">
            <a href="/admin/events" class="flex items-center gap-3 px-4 py-3 hover:bg-indigo-800 rounded-xl font-bold transition">
                Kelola Event
            </a>
            <a href="/admin/categories" class="flex items-center gap-3 px-4 py-3 hover:bg-indigo-800 rounded-xl font-bold transition">
                Kelola Kategori
            </a>
            <a href="/admin/partners" class="flex items-center gap-3 px-4 py-3 hover:bg-indigo-800 rounded-xl font-bold transition">
                Kelola Partner
            </a>
        </nav>
    </aside>
    <main class="flex-1 p-10 overflow-y-auto">
        <header class="mb-10">
            <h1 class="text-3xl font-black">@yield('page_title', 'Dashboard')</h1>
            <p class="text-slate-500">@yield('page_subtitle', 'Selamat datang!')</p>
        </header>
        @if(session('success'))
            <div class="bg-green-100 text-green-700 p-4 rounded-xl mb-6 font-bold text-sm">
                {{ session('success') }}
            </div>
        @endif
        @yield('content')
    </main>
</body>
</html>