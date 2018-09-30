@extends('layouts.app2')

@section('content')
<section id="screenshots" class="padd-section text-center wow fadeInUp">

    <div class="row">
    	<div class="col-6 col-md-6">
    		<div class="container">
    		<div class="owl-carousel owl-theme">
		        <div><img src="{{asset('template_source/img/screen/1.jpg')}}" alt="img"></div>
		        <div><img src="{{asset('template_source/img/screen/2.jpg')}}" alt="img"></div>
		        <div><img src="{{asset('template_source/img/screen/3.jpg')}}" alt="img"></div>
				<div><img src="{{asset('template_source/img/screen/4.jpg')}}" alt="img"></div>
				<div><img src="{{asset('template_source/img/screen/5.jpg')}}" alt="img"></div>
				<div><img src="{{asset('template_source/img/screen/6.jpg')}}" alt="img"></div>
				<div><img src="{{asset('template_source/img/screen/7.jpg')}}" alt="img"></div>
				<div><img src="{{asset('template_source/img/screen/8.jpg')}}" alt="img"></div>
				<div><img src="{{asset('template_source/img/screen/9.jpg')}}" alt="img"></div>
			</div>
   			</div>
    	</div>
    	<div class="col-6 col-md-6">
    		<div class="container">
    			<div >
    				<img class="map"  width="628px" height="280px" src="{{asset('template_source/img/screen/1.jpg')}}" alt="img">
    			</div>
    		</div>
		</div>
    </div>
    <div class="container">
        <h1>{{$dataHosp->nama}}</h1>
        <h1><b>Alamat: </b>{{$dataHosp->alamat}}</h1>
        <h1>Profil TODO</h1>

        <!-- TODO ROOM LIST Card View-->
        @foreach($dataHosp->rooms as $item)
            @if($item->isActive)
            <a href="{{url('/rooms/').'/'.$item->id}}" style="text-decoration: none;">
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title">Nama: {{$item->nama}}</h5>
                    <h5 class="card-title">Kapasitas Pasien: {{$item->jum_pasien}}</h5>
                    <h5 class="card-title">Kapasitas Penunggu: {{$item->jum_penunggu}}</h5>
                    <h5 class="card-title">Biaya: {{$item->harga}}</h5>
                    <h5 class="card-title">Rating: {{$item->rating}}</h5>
                    <h5 class="card-title">Fasilitas:
                    @foreach(explode(',', $item->fasilitas) as $itemFasilitas)
                        {{$itemFasilitas}},
                    @endforeach
                    </h5>
                  </div>
                </div>
            </a>
            @endif
        @endforeach
        
    </div>
  </section>
@endsection
