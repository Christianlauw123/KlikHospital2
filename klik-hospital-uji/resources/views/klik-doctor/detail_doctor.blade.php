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
	<h1>TODO JADWAL PRAKTEK</h1>
</section>
@endsection