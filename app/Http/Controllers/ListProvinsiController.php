<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ListProvinsiController extends Controller
{
    public function index(){
        // $response = Http::get('https://api.rajaongkir.com/starter/province');
        
        $response = Http::withHeaders([
            'key' => 'd2066b08becc7e1e8a27e1764cf85de0'
        ])->get('https://api.rajaongkir.com/starter/province');

        // $result = $response->json()['rajaongkir']['results'];
        $result = $response['rajaongkir']['results'];

        dd($result);
    }
}
