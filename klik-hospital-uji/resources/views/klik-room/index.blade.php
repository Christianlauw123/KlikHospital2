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
					<label for="lokasiSelectRoom">Lokasi</label>
					<select name="lokasi" class="custom-select" id="lokasiSelectRoom">
						<option selected>Choose...</option>
						@foreach($allKotaRS as $item)
							<option value="{{$item->kota}}">{{$item->kota}}</option>
						@endforeach
					</select>
				</div>
				<div class="col-auto my-1">
					<label for="tipeSelectRoom">Tipe Rumah Sakit</label>
					<select name="tipe" class="custom-select" id="tipeSelectRoom">
						<option selected>Choose...</option>
			        	@foreach($allTipeRS as $item)
							<option value="{{$item->tipe}}">{{$item->tipe}}</option>
						@endforeach
					</select>
				</div>
				<div class="col-auto my-1">
					<label for="kamarSelectRoom">Tipe Kamar</label>
					<select name="kamar" class="custom-select" id="kamarSelectRoom">
						<option selected>Choose...</option>
			        	@foreach($allTipeKamar as $item)
							<option value="{{$item->nama}}">{{$item->nama}}</option>
						@endforeach
					</select>
				</div>
				<button type="submit" class="btn btn-primary">Cari</button>
			</form>
		</div>
		<div class="row justify-content-center">
			<form class="form-inline d-flex flex-column">
				<label class="my-1 mr-2" for="namaRSSelectRoom">Nama Rumah Sakit</label>
				<div class="input-group">
				<input class="my-1 mr-2" id="namaRSSelectRoom" type="text" name=""/>
				<button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
				</div>
			</form>
		</div>
	</div>
		<!--==========================
		    End Search Menu
		  ============================-->

		  <!--==========================
    		List RS
  		  ============================-->  
  		  <div class="w-100"></div>
  		<div class="container">
  			@foreach($allRS as $item)
  			<div class="row justify-content-center">
  			<a href="{{url('/klik-room/detail_rs/').'/'.$item->id}}" style="text-decoration: none;">
		 		<div class="card">
		 			<div class="row no-gutters">
			            <div class="col-auto">
			                <img src="//placehold.it/200" class="img-fluid" alt="">
			            </div>
			            <div class="col">
			                <div class="card-block px-2">
			                    <h4 class="card-title">Rumah Sakit Husada Utama</h4>
			                    <h4 class="card-title">Tipe B</h4>
			                    <p class="card-text">Description</p>
			                </div>
			            </div>
		        	</div>
		 		</div>
	 		</a>
	 	</div>
	 		@endforeach
	 		<div class="row justify-content-center" > 
	 		<a href="{{url('/klik-room/detail_rs/1')}}" style="text-decoration: none;">
		 		<div class="card">
		 			<div class="row no-gutters">
			            <div class="col-auto">
			                <img src="//placehold.it/200" class="img-fluid" alt="">
			            </div>
			            <div class="col">
			                <div class="card-block px-2">
			                    <h4 class="card-title">Rumah Sakit Husada Utama</h4>
			                    <h4 class="card-title">Tipe B</h4>
			                    <p class="card-text">Description</p>
			                </div>
			            </div>
		        	</div>
		 		</div>
	 		</a>
	 		</div>
	 	</div>
	 	</div>
	 
	 <!--==========================
	    End List RS
	  ============================-->  
		</div>
	

</section>
<!--==========================
    End Menu Utama
  ============================-->


@endsection