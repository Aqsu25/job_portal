<?php

namespace Database\Seeders;

use App\Models\Degree;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Seeder;

class DegreesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = File::get(database_path('json/degrees.json'));
        $data = json_decode($json, true);

        foreach ($data['degrees'] as $group) {
            foreach ($group['list'] as $degree) {
                Degree::create([
                    'level' => $group['level'],
                    'code' => $group['code'] ?? null, // ✅ use null if code does not exist
                    'name' => $degree
                ]);
            }
        }
    }
}
