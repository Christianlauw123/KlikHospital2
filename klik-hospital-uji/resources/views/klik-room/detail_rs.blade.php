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
    
  </section>
@endsection
