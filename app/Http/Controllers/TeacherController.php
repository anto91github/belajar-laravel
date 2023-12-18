<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index(){

        $teacherList = Teacher::all();
        return view('teacher',[
            'pageTitle' => 'teacher',
            'teacherList' => $teacherList
        ]);
    }
}
