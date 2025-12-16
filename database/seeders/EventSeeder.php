<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Event;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Event::create([
            'nama_event' => 'Workshop 2025',
            'deskripsi' => 'Workshop 2025',
            'lokasi' => 'SMKN 1 Cirebon',
            'tanggal' => '2025-12-25 19:00:00',
            'stok' => 20,
            'harga' => 20000
            
        ]);

        Event::create([
            'nama_event' => 'Seminar Rakit AI 2025',
            'deskripsi' => 'Seminar Rakit AI 2025',
            'lokasi' => 'SMKN 1 Cirebon',
            'tanggal' => '2025-12-25 19:00:00',
            'stok' => 20,
            'harga' => 20000
        ]);
    }
}
