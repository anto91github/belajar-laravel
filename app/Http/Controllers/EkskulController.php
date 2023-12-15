<?php

namespace App\Http\Controllers;

use App\Models\Ekskul;
use Illuminate\Http\Request;

class EkskulController extends Controller
{
    public function index(){
        $ekskul = Ekskul::with('student')->get();

        // dd($ekskul);

        return view('ekskul',[
            'pageTitle' => 'ekskul',
            'ekskulList' => $ekskul
        ]);
    }
}
