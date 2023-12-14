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
        $studentList = Student::all();

        return view('student',[
            'pageTitle' => 'students',
            'studentList' => $studentList
        ]);

    }
}
