<?php

namespace App\Http\Controllers;

use App\Models\ClassRoom;
use Illuminate\Http\Request;

class ClassController extends Controller
{
    public function index (){
        $classList = ClassRoom::with('student', 'homeRoomTeacher')->get();
        // dd($classList);

        return view('classroom',[
            'pageTitle' => 'class',
            'classList' => $classList
        ]);
    }
}