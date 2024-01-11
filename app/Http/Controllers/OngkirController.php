<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class OngkirController extends Controller
{
    public function index()
    {
        $response_city = Http::withHeaders([
            'key' => 'd2066b08becc7e1e8a27e1764cf85de0'
        ])->get('https://api.rajaongkir.com/starter/city');

        $cities = $response_city['rajaongkir']['results'];

        
        return view('cek-ongkir',[
            'cities' => $cities,
            'ongkir' => '',
            'pageTitle' => 'Cek Ongkir',
        ]);
    }

    public function cekOngkir(Request $request)
    {
        $response_city = Http::withHeaders([
            'key' => 'd2066b08becc7e1e8a27e1764cf85de0'
        ])->get('https://api.rajaongkir.com/starter/city');
        $cities = $response_city['rajaongkir']['results'];

        $response_post =  Http::withHeaders([
            'key' => 'd2066b08becc7e1e8a27e1764cf85de0'
        ])->post('https://api.rajaongkir.com/starter/cost', [
            'origin' => $request->origin,
            'destination' => $request->destination,
            'weight' => $request->weight,
            'courier' => $request->courier,
        ]);
        $ongkir = $response_post['rajaongkir'];

        return view('cek-ongkir',[
            'cities' => $cities,
            'ongkir' => $ongkir,
            'pageTitle' => 'Cek Ongkir',
        ]);
    }

    public function testUpdate()
    {
        $response = Http::withToken('eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1c2VybmFtZSI6ImFkbWluIiwiaWF0IjoxNzA0ODU3NTMwLCJleHAiOjE3MDQ4NzU1MzB9.teQUrlJvPXdUU-GaZdvoiUOyrQjgir6twXvgXLPNqOk')
                    ->put('http://localhost:8080/auth/edituser/14',[
                        "name" => "bobi2",
                        "alamat" => "jkt",
                        "umur" => "18",
                        "nohp" => "777"
                    ]);
        dd($response['metadata']);
    }

    public function testDelete()
    {
        $response = Http::withToken('eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1c2VybmFtZSI6ImFkbWluIiwiaWF0IjoxNzA0ODU3NTMwLCJleHAiOjE3MDQ4NzU1MzB9.teQUrlJvPXdUU-GaZdvoiUOyrQjgir6twXvgXLPNqOk')
                    ->delete('http://localhost:8080/auth/deleteuser/13');
        dd($response->json());
    }

    public function testSignIn()
    {
        $response = Http::post('http://localhost:8080/auth/signin',[
            'username' => 'admin',
            'password' => '12345'
        ]);
        dd($response->json());
    }
}
