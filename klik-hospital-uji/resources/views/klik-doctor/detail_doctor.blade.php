@extends('layouts.app2')

@section('content')
<section class="hero">
	<h1>Detail Dokter</h1>
	<p>Masih Dummy</p>
	<a href="#about-us" class="btn btn-default scrollto">Profil</a>
	{{$getDoctor}}
	<h5>{{$getDoctor->nama}}</h5>
	<h5>{{$getDoctor->spesialist->nama}}</h5>

	<section id="about-us">
		<h1>{{$getDoctor->profil}}</h1>
	</section>

	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<h2>Pendidikan</h2>
				@foreach(explode(',',$getDoctor->pendidikan) as $item)
					<p>{{$item}}</p>
				@endforeach
			</div>
			<div class="col-md-6">
				<h2>Pengalaman</h2>
				@foreach(explode(',',$getDoctor->pengalaman) as $item)
					<p>{{$item}}</p>
				@endforeach
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<h1>TODO JADWAL PRAKTEK</h1>
			<h2>Jadwal di RS<h2>
			@foreach($getDoctor->doctorhospitals as $item)
				{{-- RS APA --}}
				{{$item->hospital->nama}}
				<div class="container">
				{{-- Tampil jadwal --}}
				@foreach(explode(',',$item->hari_praktek) as $jadwal)
					@foreach(explode(',',$item->jam_praktek) as $jamPrak))
						<div class="card transClinicHospital">
							<h5>Hari : {{$jadwal}}</h5>
							<h5>Jam Praktek : {{$jamPrak}}</h5>
							<input type="hidden" value="{{$item->id}}" name="idDocHospital"/>
							<input type="hidden" name="hariPrak" value="{{$jadwal}}"/>
							<input type="hidden" name="jamPrak" value="{{$jamPrak}}"/>
						</div>
					@endforeach
				@endforeach
				</div>
			@endforeach
			<h2>Jadwal di Clinic<h2>
			@foreach($getDoctor->doctorclinics as $item)
				{{-- RS APA --}}
				{{$item->clinic->nama}}
				<div class="container">
				{{-- Tampil jadwal --}}
				@foreach(explode(',',$item->hari_praktek) as $jadwal)
					@foreach(explode(',',$item->jam_praktek) as $jamPrak))
						<div class="card transClinic">
							<h5>Hari : {{$jadwal}}</h5>
							<h5>Jam Praktek : {{$jamPrak}}</h5>
							<input type="hidden" value="{{$item->id}}" name="idDocClinic"/>
							<input type="hidden" name="hariPrak" value="{{$jadwal}}"/>
							<input type="hidden" name="jamPrak" value="{{$jamPrak}}"/>
						</div>
					@endforeach
				@endforeach
				</div>
			@endforeach
		</div>
	</div>
</section>
<script>
	$(document).ready(function(){
		$(".transClinicHospital").click(function(){
			console.log("Arr Hospital");
			var arr = [];
			$.each($(this).find(":input"), function (index, value) {
				arr.push($(value).val());
			});
			console.log(arr);
		});

		$(".transClinic").click(function(){
			console.log("Arr Clinic");
			var arr = [];
			$.each($(this).find(":input"), function (index, value) {
				arr.push($(value).val());
			});
			console.log(arr);
		});
	})
</script>
@endsection