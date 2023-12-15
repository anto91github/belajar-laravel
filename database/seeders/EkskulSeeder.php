<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Ekskul;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EkskulSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name' => 'Basket'],
            ['name' => 'Voli'],
            ['name' => 'Pramuka'],
            ['name' => 'Band'],
        ];

        foreach ($data as $key => $value) {
            Ekskul::insert([
                'name' => $value['name'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}
