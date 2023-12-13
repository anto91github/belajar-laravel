<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\ClassRoom;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Schema;

class ClassSeeder extends Seeder
{
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        ClassRoom::truncate();
        Schema::enableForeignKeyConstraints();

        $data = [
            ['name' => '1A'],
            ['name' => '1B'],
            ['name' => '1C'],
            ['name' => '2A'],
        ];

        foreach ($data as $key => $value) {
            ClassRoom::insert([
                'name' => $value['name'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }

        
    }
}
