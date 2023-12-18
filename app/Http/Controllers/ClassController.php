<?php

namespace App\Http\Controllers;

use App\Models\ClassRoom;
use Illuminate\Http\Request;

class ClassController extends Controller
{
    public function index (){
        // $classList = ClassRoom::with('student', 'homeRoomTeacher')->get();
        $classList = ClassRoom::get();
        // dd($classList);

        return view('classroom',[
            'pageTitle' => 'class',
            'classList' => $classList
        ]);
    }

    public function show($id){
        $class = ClassRoom::with('student', 'homeRoomTeacher')->findOrFail($id);

        return view('class-detail',[
            'pageTitle' => 'class',
            'class' => $class
        ]);
    }
}
