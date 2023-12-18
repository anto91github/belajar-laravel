<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    public function index()
    {
       // $student = DB::table('students')->get();
        
        // insert using query builder
        // DB::table('students')->insert([
        //     'name' => 'qiqi',
        //     'gender' => 'P',
        //     'nis' => '0102458',
        //     'class_id' => 2
        // ]);

        // insert using eloquent
        // Student::create([
        //     'name' => 'Ei',
        //     'gender' => 'P',
        //     'nis' => '0102459',
        //     'class_id' => 1
        // ]);

        // update using query builder
        // DB::table('students')->where('id', 43)->update([
        //     'name' => 'qiqi_updated',
        //     'class_id' => 3
        // ]);

        // update using eloquent
        // Student::find(44)->update([
        //     'name' => 'Ei_updated',
        //     'class_id' => 2
        // ]);

        // delete using query builder
        // DB::table('students')->where('id', 43)->delete();

        // delete using eloquent
        // Student::find(44)->delete();

        // dd($student);

        // $studentList = Student::all(); // Lazy Loading
        $studentList = Student::with(['class.homeRoomTeacher', 'ekskul'])->get(); // Eager loading (recomended)

        $nilai = [1,2,3,4,5,6,7,8,9];
        $nilai2 = [1,1,2,3,4,5,6,7,8];
        $doubleArray = [
            ['product_id' => 'prod-100', 'name' => 'Desk'],
            ['product_id' => 'prod-200', 'name' => 'Chair'],
        ];

        $nilairata2 = collect($nilai)->avg();

        $mengandung = collect($nilai)->contains(9);
        $mengandung2 = collect($nilai)->contains(function($val){
            return $val>11;
        });

        $perbedaan = collect($nilai)->diff($nilai2);

        $filter = collect($nilai)->filter(function($val) {
            return $val > 5;
        });

        $memetik = collect($doubleArray)->pluck('name')->all();

        $multiplied = collect($nilai)->map(function ($val) {
            return $val*2;
        });

        // dd($multiplied);

        return view('student',[
            'pageTitle' => 'students',
            'studentList' => $studentList
        ]);

    }
}
