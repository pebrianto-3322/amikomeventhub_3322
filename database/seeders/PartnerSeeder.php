<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;

class PartnerSeeder extends Seeder
{
    public function run(): void
    {
        $partners = [
            ['name' => 'Google', 'logo_url' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/2/2f/Google_2015_logo.svg/1200px-Google_2015_logo.svg.png'],
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