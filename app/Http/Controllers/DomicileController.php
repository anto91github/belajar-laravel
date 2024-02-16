<?php

namespace App\Http\Controllers;

use App\Models\Domicile;
use Illuminate\Http\Request;

class DomicileController extends Controller
{
    public function index()
    {
        $domicile = Domicile::all();
        dd($domicile);
    }
}
