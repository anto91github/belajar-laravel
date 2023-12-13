<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Student;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StudentSeeder extends Seeder
{
    public function run()
    {
        // Schema::disableForeignKeyConstraints();
        // Student::truncate();
        // Schema::enableForeignKeyConstraints();

        // $data = [
        //     ['name' => 'Amir', 'gender' => 'L', 'nis'=> '0101001', 'class_id'=> 1],
        //     ['name' => 'Budi', 'gender' => 'L', 'nis'=> '0101002', 'class_id'=> 1],
        //     ['name' => 'Budi', 'gender' => 'P', 'nis'=> '0101003', 'class_id'=> 2],
        //     ['name' => 'Tono', 'gender' => 'L', 'nis'=> '0101004', 'class_id'=> 3],
        // ];

        // foreach ($data as $key => $value) {
        //     Student::insert([
        //         'name' => $value['name'],
        //         'gender' => $value['gender'],
        //         'nis' => $value['nis'],
        //         'class_id' => $value['class_id'],
        //         'created_at' => Carbon::now(),
        //         'updated_at' => Carbon::now()
        //     ]);
        // }

        // use StudentFactory
        Student::factory()->count(37)->create();

    }
}
