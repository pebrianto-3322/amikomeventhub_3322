<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Katalog Event</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-100 flex flex-col items-center py-10 min-h-screen">
    
    <div class="bg-white px-6 py-4 rounded-full shadow-md mb-8 flex space-x-4">
        <a href="/" class="text-slate-500 hover:text-indigo-600 font-semibold transition">Home</a>
        <a href="/profil" class="text-slate-500 hover:text-indigo-600 font-semibold transition">Profil</a>
        <a href="/katalog" class="text-indigo-600 font-bold transition">Katalog</a>
        <a href="/bantuan" class="text-slate-500 hover:text-indigo-600 font-semibold transition">Bantuan</a>
        <a href="/kontak" class="text-slate-500 hover:text-indigo-600 font-semibold transition">Kontak</a>
    </div>

    <h1 class="text-3xl font-bold text-slate-800 mb-8">Katalog AmikomEventHub</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 max-w-4xl w-full px-4">
        <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-xl border border-slate-200 transition">
            <div class="h-32 bg-blue-100 rounded-lg mb-4 flex items-center justify-center text-blue-500 font-bold">Banner Event 1</div>
            <h2 class="text-xl font-bold text-slate-800">Seminar AI Modern</h2>
            <p class="text-sm text-slate-500 mt-2">12 Desember 2026 | Ruang Citra</p>
        </div>
        <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-xl border border-slate-200 transition">
            <div class="h-32 bg-green-100 rounded-lg mb-4 flex items-center justify-center text-green-500 font-bold">Banner Event 2</div>
            <h2 class="text-xl font-bold text-slate-800">Workshop Web Dev</h2>
            <p class="text-sm text-slate-500 mt-2">15 Desember 2026 | Lab Komputer</p>
        </div>
    </div>

</body>
</html>