<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Akun Admin
        \App\Models\User::firstOrCreate(
            ['email' => 'admin@amikom.ac.id'],
            [
                'name'     => 'Admin Amikom',
                'password' => bcrypt('password'),
                'role'     => 'admin',
            ]
        );

        // === 3 KATEGORI ===
        $cat1 = \App\Models\Category::firstOrCreate(
            ['slug' => 'seminar-it'],
            ['name' => 'Seminar IT']
        );
        $cat2 = \App\Models\Category::firstOrCreate(
            ['slug' => 'entertainment'],
            ['name' => 'Entertainment']
        );
        $cat3 = \App\Models\Category::firstOrCreate(
            ['slug' => 'workshop'],
            ['name' => 'Workshop']
        );

        // === 6 EVENT ===
        \App\Models\Event::firstOrCreate(['title' => 'Jazz Night 2026'], [
            'category_id' => $cat2->id,
            'description' => 'Nikmati malam indah dengan alunan musik jazz.',
            'date'        => '2026-06-10 19:00:00',
            'location'    => 'Amikom Baru',
            'price'       => 50000,
            'stock'       => 100,
            'poster_path' => 'assets/concert.png',
        ]);

        \App\Models\Event::firstOrCreate(['title' => 'Hackathon — Unleash Your Dev'], [
            'category_id' => $cat1->id,
            'description' => 'Asah skill coding dan ciptakan solusi inovatif!',
            'date'        => '2026-06-15 09:00:00',
            'location'    => 'Inkubator Amikom',
            'price'       => 50000,
            'stock'       => 80,
            'poster_path' => 'assets/hackathon.png',
        ]);

        \App\Models\Event::firstOrCreate(['title' => 'AI & Future Tech Summit 2026'], [
            'category_id' => $cat1->id,
            'description' => 'Jelajahi tren AI dan teknologi masa depan bersama para ahli.',
            'date'        => '2026-07-01 13:00:00',
            'location'    => 'Cinema Unit 6',
            'price'       => 75000,
            'stock'       => 150,
            'poster_path' => 'assets/concert.png',
        ]);

        \App\Models\Event::firstOrCreate(['title' => 'UI/UX Masterclass — Figma Pro'], [
            'category_id' => $cat3->id,
            'description' => 'Workshop intensif desain antarmuka modern dengan Figma.',
            'date'        => '2026-07-05 10:00:00',
            'location'    => 'Lab Komputer A',
            'price'       => 100000,
            'stock'       => 40,
            'poster_path' => 'assets/workshop.png',
        ]);

        \App\Models\Event::firstOrCreate(['title' => 'E-Sport U-Champ 2026'], [
            'category_id' => $cat2->id,
            'description' => 'Turnamen e-sport antar universitas. Daftar sekarang!',
            'date'        => '2026-07-20 12:00:00',
            'location'    => 'Aula Amikom',
            'price'       => 30000,
            'stock'       => 200,
            'poster_path' => 'assets/hackathon.png',
        ]);

        \App\Models\Event::firstOrCreate(['title' => 'Laravel Bootcamp — Build Your First App'], [
            'category_id' => $cat3->id,
            'description' => 'Belajar Laravel dari nol hingga deploy aplikasi pertamamu.',
            'date'        => '2026-08-01 09:00:00',
            'location'    => 'Ruang Kelas B202',
            'price'       => 150000,
            'stock'       => 30,
            'poster_path' => 'assets/workshop.png',
        ]);

        // === PARTNER ===
        $partners = [
            ['name' => 'Google', 'logo_url' => 'https://play-lh.googleusercontent.com/1-hPxafOxdYpYZEOKzNIkSP43HXCNftVJVttoo4ucl7rsMASXW3Xr6GlXURCubE1tA=w3840-h2160-rw'],
            ['name' => 'About You-1975', 'logo_url' => 'https://i.scdn.co/image/ab67616d0000b2731f44db452a68e229650a302c'], 
        ];

        foreach ($partners as $partner) {
            \App\Models\Partner::firstOrCreate(
                ['name' => $partner['name']],
                ['logo_url' => $partner['logo_url']]
            );
        }
    }
}