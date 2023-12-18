<?php

namespace App\Http\Controllers;

use App\Models\Ekskul;
use Illuminate\Http\Request;

class EkskulController extends Controller
{
    public function index(){
        // $ekskul = Ekskul::with('student')->get();
        $ekskul = Ekskul::get();

        // dd($ekskul);

        return view('ekskul',[
            'pageTitle' => 'ekskul',
            'ekskulList' => $ekskul
        ]);
    }

    public function show($id){
        $ekskul = Ekskul::with('student')->findOrFail($id);

        return view('ekskul-detail',[
            'pageTitle' => 'ekskul',
            'ekskul' => $ekskul
        ]);

    }
}
