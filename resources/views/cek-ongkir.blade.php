@extends('layout.mainlayout')
@section('title', 'Cek Ongkir')

@section('content')
<div class="container col-8 m-auto">
    <h2 class="text-center">
        Cek Ongkir
    </h2>

    <form action="" method="POST">
        @csrf
        <div class="mt-3">
            <label for="origin">Asal Kota</label>
            <select name='origin' id='origin' class="form-control" required>
                <option value="">Pilih Kota Asal</option>
                @foreach ($cities as $city)
                    <option value="{{$city['city_id']}}">{{$city['city_name']}}</option>
                @endforeach
            </select>
        </div>
        <div class="mt-3">
            <label for="destination">Tujuan Kota</label>
            <select name='destination' id='destination' class="form-control" required>
                <option value="">Pilih Kota Tujuan</option>
                @foreach ($cities as $city)
                    <option value="{{$city['city_id']}}">{{$city['city_name']}}</option>
                @endforeach
            </select>
        </div>
        <div class="mt-3">
            <label for="weight">Berat Paket (gram)</label>
            <input type="number" name="weight" id="weight" class="form-control" required>
        </div>
        <div class="mt-3">
            <label for="courier">Kurir</label>
            <select name='courier' id='courier' class="form-control" required>
                <option value="">Pilih Kurir</option>
                <option value="jne">JNE</option>
                <option value="pos">POS</option>
                <option value="tiki">TIKI</option>
            </select>
        </div>
        <div class="mt-3">
            <input type="submit" name="cekOngkir" class="btn btn-primary w-100">
        </div>
        <div class="mt-5">
            @if($ongkir !='')
                <h3>Rincian Ongkir</h3>
                <h4>
                    <ul>
                        <li>Asal Kota : {{$ongkir['origin_details']['city_name']}}</li>
                        <li>Tujuan Kota : {{$ongkir['destination_details']['city_name']}}</li>
                        <li>Weight : {{$ongkir['query']['weight']}}</li> 
                    </ul>
                </h4>

                @foreach ($ongkir['results'] as $item)
                    <div>
                        <label for="name">{{$item['name']}}</label>
                    </div>
                    @foreach ($item['costs'] as $cost)
                        <div>
                            <label for="service">Service:{{$cost['service']}}</label>
                        </div>

                        @foreach($cost['cost'] as $harga)
                            <div  class="mb-3">
                                <label for="harga">Cost:{{$harga['value']}} ({{$harga['etd']}}) hari</label>
                            </div>
                        @endforeach
                    @endforeach
                @endforeach
            @endif
        </div>
    </form>
</div>
@endsection