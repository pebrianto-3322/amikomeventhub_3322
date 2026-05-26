<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;

class PartnerSeeder extends Seeder
{
    public function run(): void
    {
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