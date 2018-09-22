@extends('layouts.app2')

@section('content')
<!--==========================
    Menu Utama
  ============================-->
<section class="hero wow fadeIn">
	<div class="hero-container">
		<img src="{{asset('template_source/img/image-Klik/icon.png')}}" alt="Hero Imgs">

		 <!--==========================
		    Search Menu
		  ============================-->
		<div class="container">
		<div class="row justify-content-center">
			<form class="form-inline">
				<div class="col-auto my-1">
					<label for="lokasiSelectDoctor">Lokasi</label>
					<select name="lokasi" class="custom-select" id="lokasiSelectRoom">
						<option selected>Choose...</option>
						@foreach($allKotaRS as $item)
						<option value="{{$item->kota}}">{{$item->kota}}</option>
						@endforeach
					</select>
				</div>
				<div class="col-auto my-1">
					<label for="rsSelectDoctor">Rumah Sakit</label>
					<select name="rs" class="custom-select" id="tipeSelectRoom">
						<option selected>Choose...</option>
			        	@foreach($allRS as $item)
						<option value="{{$item->nama}}">{{$item->nama}}</option>
						@endforeach
					</select>
				</div>
				<div class="col-auto my-1">
					<label for="spesialisSelectDoctor">Spesialis</label>
					<select name="spesialis" class="custom-select" id="kamarSelectRoom">
						<option selected>Choose...</option>
			        	@foreach($allSpesialis as $item)
						<option value="{{$item->nama}}">{{$item->nama}}</option>
						@endforeach
					</select>
				</div>
				<button type="submit" class="btn btn-primary">Cari</button>
			</form>
		</div>
		<div class="row justify-content-center">
			<form class="form-inline d-flex flex-column">
				<label class="my-1 mr-2" for="namadokterSelectDoctor">Nama Dokter</label>
				<div class="input-group">
				<input class="my-1 mr-2" id="namadokterSelectDoctor" type="text" name=""/>
				<button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
				</div>
			</form>
		</div>
	</div>
		<!--==========================
		    End Search Menu
		  ============================-->

		  <!--==========================
    		List Dokter
  		  ============================-->  
  		<div class="container">
  			@foreach($allDokter as $item)
  			<div class="row justify-content-center">
  			<a href="{{url('/klik-doctor/detail_doctor/').'/'.$item->id}}" style="text-decoration: none;">
		 		<div class="card">
		 			<div class="row no-gutters">
			            <div class="col-auto">
			                <img src="//placehold.it/200" class="img-fluid" alt="">
			            </div>
			            <div class="col">
			                <div class="card-block px-2">
			                    <h4 class="card-title">{{$item->nama}}</h4>
			                    <h4 class="card-title"><b>Spesialis: &nbsp;</b>{{$item->spesialis->nama}}</h4>
			                    <div class="row">
				                    <div class="col"> <!-- Logo RS -->
				                    	<img src="//placehold.it/200" class="img-fluid" alt="">
				                    </div>
				                    <div class="col"><!-- Logo Praktek -->
				                    	<img src="//placehold.it/200" class="img-fluid" alt="">
				                    </div>
			                    </div>
			                    <div class="row justify-content-center">
				                    <div class="col">
				                    	<!-- Tampilkan praktek RS manasaja -->
				                    	@foreach($item->dokterrumahsakits as $item2)
				                    		<p><span>{{$item2->rumahsakit->nama}}</span></p>
				                    	@endforeach
				                    </div>
				                    <div class="col">
				                    	<!-- Tampilkan praktek Klinik manasaja -->
				                    	@foreach($item->dokterkliniks as $item2)
				                    		<p><span>{{$item2->klinik->nama}}</span></p>
				                    	@endforeach
				                    </div>
			                    </div>
			                </div>
			            </div>
		        	</div>
		 		</div>
	 		</a>
	 		</div>
	 		@endforeach

  			<!-- Todo Loop -->
  			Contoh Dummy
	 		<div class="row justify-content-center"> 
	 		<a href="{{url('/klik-doctor/detail_doctor/1')}}" style="text-decoration: none;">
		 		<div class="card">
		 			<div class="row no-gutters">
			            <div class="col-auto">
			                <img src="//placehold.it/200" class="img-fluid" alt="">
			            </div>
			            <div class="col">
			                <div class="card-block px-2">
			                    <h4 class="card-title">Rumah Sakit Husada Utama</h4>
			                    <h4 class="card-title">Tipe B</h4>
			                    <div class="row">
				                    <div class="col">
				                    	<img src="//placehold.it/200" class="img-fluid" alt="">
				                    </div>
				                    <div class="col">
				                    	<img src="//placehold.it/200" class="img-fluid" alt="">
				                    </div>
			                    </div>
			                    <div class="row justify-content-center">
				                    <div class="col">
				                    	<p><span>RS. Premier Surabaya</span></p>
				                    	<p><span>RS. Premier Surabaya</span></p>
				                    </div>
				                    <div class="col">
				                    	<p><span>RS. Premier Surabaya</span></p>
				                    	<p><span>RS. Premier Surabaya</span></p>
				                    </div>
			                    </div>
			                </div>
			            </div>
		        	</div>
		 		</div>
	 		</a>
	 		</div>
	 	</div>
	 
	 <!--==========================
	    End List Doctor
	  ============================-->  
		</div>
	

</section>
<!--==========================
    End Menu Utama
  ============================-->

<style type="text/css">
	p{
		margin:0;
	}
</style>
@endsection