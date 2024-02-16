<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index(){

        $teacherList = Teacher::with('domicile')->get();
        return view('teacher',[
            'pageTitle' => 'teacher',
            'teacherList' => $teacherList
        ]);
    }

    public function show($id) {
        $teacher = Teacher::with('class.student')->findOrFail($id);
        return view('teacher-detail',[
            'pageTitle' => 'teacher',
            'teacher' => $teacher
        ]);
    }
}
