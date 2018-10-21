@extends('layouts.app2')

@section('content')
<!--==========================
    Menu Utama
  ============================-->
<section class="hero wow fadeIn">
	<div class="hero-container">
		<img src="{{asset('template_source/img/image-Klik/icon.png')}}" alt="Hero Imgs">

		@if(Auth::user()->hospital)
		<div class="container">
			<div id="transClinicHospital">

			</div>
		</div>
		@elseif(Auth::user()->clinic)

		@else
		 <!--==========================
		    Search Menu
		  ============================-->
		<div class="container">
		<div class="row justify-content-center">
			<form class="form-inline">
				<div class="col-auto my-1">
					<label for="lokasiSelectDoctor">Lokasi</label>
					<select name="lokasi" class="custom-select" id="lokasiSelectDoctor">
						<option selected value=''>Choose...</option>
						@foreach($allKotaRS as $item)
							<option value="{{$item->id}}">{{$item->nama}}</option>
						@endforeach
					</select>
				</div>
				<div class="col-auto my-1">
					<label for="rsSelectDoctor">Rumah Sakit</label>
					<select name="rs" class="custom-select" id="rsSelectDoctor">
						<option selected value=''>Choose...</option>
			        	@foreach($allRS as $item)
							<option value="{{$item->id}}">{{$item->nama}}</option>
						@endforeach
					</select>
				</div>
				<div class="col-auto my-1">
					<label for="spesialisSelectDoctor">Spesialis</label>
					<select name="spesialis" class="custom-select" id="spesialisSelectDoctor">
						<option sselected value=''>Choose...</option>
			        	@foreach($allSps as $item)
						<option value="{{$item->id}}">{{$item->nama}}</option>
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
		<div id="listDokter">
  			@foreach($allDokter as $item)
  			<div class="row justify-content-center">
  			<a href="{{url('/doctor').'/'.$item->id}}" style="text-decoration: none;">
		 		<div class="card">
		 			<div class="row no-gutters">
			            <div class="col-auto">
			                <img src="//placehold.it/200" class="img-fluid" alt="">
			            </div>
			            <div class="col">
			                <div class="card-block px-2">
			                    <h4 class="card-title">{{$item->nama}}</h4>
			                    <h4 class="card-title"><b>Spesialis: &nbsp;</b>{{$item->spesialist->nama}}</h4>
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
				                    	
				                    </div>
				                    <div class="col">
				                    	<!-- Tampilkan praktek Klinik manasaja -->
				                    	
				                    </div>
			                    </div>
			                </div>
			            </div>
		        	</div>
		 		</div>
	 		</a>
	 		</div>
			@endforeach
		</div>
	 	</div>
	 @endif
	 <!--==========================
	    End List Doctor
	  ============================-->  
		</div>
	
</section>
<!--==========================
    End Menu Utama
  ============================-->
<script>
	$(document).ready(function()
	{
		$("#spesialisSelectDoctor").change(function()
		{
			var spesialisDoctor = $("#spesialisSelectDoctor").val();
			var lokasiDoctor = $("#lokasiSelectDoctor").val();
			$("#listDokter").html("");
			console.log('{{url('doctorDetail')}}/'+lokasiDoctor+'/'+spesialisDoctor);
			$.get('{{url('doctorDetail')}}/'+lokasiDoctor+'/'+spesialisDoctor,function(data,status){
				
				for(var i in data)
				{
					var append = "<div class=\"row justify-content-center\">";
					append += "<a href=\"{{url('/doctor')}}/"+data[i].id+"\" style=\"text-decoration: none;\">";
					append += "<div class=\"card\">";
					append += "<div class=\"row no-gutters\">";
					
					append += "<div class=\"col-auto\">";
						append += "<img src=\"//placehold.it/200\" class=\"img-fluid\" alt=\"\">";
					append += "</div>";

					append += "<div class=\"col\">";
						append += "<div class=\"card-block px-2\">";
							append += "<h4 class=\"card-title\">"+data[i].nama+"</h4>";
							append += "<h4 class=\"card-title\"><b>Spesialis: &nbsp;</b>TODO Get SPS</h4>";
							
							append += "<div class=\"row\">";
								append += "<div class=\"col\">"; //<!-- Logo RS -->
									append += "<img src=\"//placehold.it/200\" class=\"img-fluid\" alt=\"\">";
								append += "</div>";
								append += "<div class=\"col\">"; //<!-- Logo Praktek -->
									append += "<img src=\"//placehold.it/200\" class=\"img-fluid\" alt=\"\">";
								append += "</div>";
							append += "</div>";
							
							append += "<div class=\"row justify-content-center\">";
								append += "<div class=\"col\">";
											//<!-- Tampilkan praktek RS manasaja -->
								append += "</div>";
								append += "<div class=\"col\">";
											//<!-- Tampilkan praktek Klinik manasaja -->
								append += "</div>";
							append += "</div>";
						append += "</div>";
					append += "</div>";
					
					append += "</div>";
					append += "</div>";
					append += "</a>";
					append += "</div>";
					$("#listDokter").append(append);
				}
			});

		});

		$("#lokasiSelectDoctor").change(function()
		{
			var spesialisDoctor = $("#spesialisSelectDoctor").val();
			var lokasiDoctor = $("#lokasiSelectDoctor").val();
			$("#listDokter").html("");
			$.get('{{url('doctorDetail')}}/'+lokasiDoctor+'/'+spesialisDoctor,function(data,status){
				
				for(var i in data)
				{
					var append = "<div class=\"row justify-content-center\">";
					append += "<a href=\"{{url('/doctor')}}/"+data[i].id+"\" style=\"text-decoration: none;\">";
					append += "<div class=\"card\">";
					append += "<div class=\"row no-gutters\">";
					
					append += "<div class=\"col-auto\">";
						append += "<img src=\"//placehold.it/200\" class=\"img-fluid\" alt=\"\">";
					append += "</div>";

					append += "<div class=\"col\">";
						append += "<div class=\"card-block px-2\">";
							append += "<h4 class=\"card-title\">"+data[i].nama+"</h4>";
							append += "<h4 class=\"card-title\"><b>Spesialis: &nbsp;</b>TODO Get SPS</h4>";
							
							append += "<div class=\"row\">";
								append += "<div class=\"col\">"; //<!-- Logo RS -->
									append += "<img src=\"//placehold.it/200\" class=\"img-fluid\" alt=\"\">";
								append += "</div>";
								append += "<div class=\"col\">"; //<!-- Logo Praktek -->
									append += "<img src=\"//placehold.it/200\" class=\"img-fluid\" alt=\"\">";
								append += "</div>";
							append += "</div>";
							
							append += "<div class=\"row justify-content-center\">";
								append += "<div class=\"col\">";
											//<!-- Tampilkan praktek RS manasaja -->
								append += "</div>";
								append += "<div class=\"col\">";
											//<!-- Tampilkan praktek Klinik manasaja -->
								append += "</div>";
							append += "</div>";
						append += "</div>";
					append += "</div>";
					
					append += "</div>";
					append += "</div>";
					append += "</a>";
					append += "</div>";
					$("#listDokter").append(append);
				}
			});
		});

		//Kalau ini dipilih hilangkan yg klinik tampilkan yg di RS saja
		$("#rsSelectDoctor").change(function()
		{
			var spesialisDoctor = $("#spesialisSelectDoctor").val();
			var lokasiDoctor = $("#lokasiSelectDoctor").val();
			var idRs = $("#rsSelectDoctor").val();
			alert(spesialisDoctor);
			alert(lokasiDoctor);
			alert(idRs);
			$("#listDokter").html("");
			$.get('{{url('doctorDetail')}}/'+lokasiDoctor+'/'+spesialisDoctor,function(data,status){
				
				for(var i in data)
				{
					var append = "<div class=\"row justify-content-center\">";
					append += "<a href=\"{{url('/doctor')}}/"+data[i].id+"\" style=\"text-decoration: none;\">";
					append += "<div class=\"card\">";
					append += "<div class=\"row no-gutters\">";
					
					append += "<div class=\"col-auto\">";
						append += "<img src=\"//placehold.it/200\" class=\"img-fluid\" alt=\"\">";
					append += "</div>";

					append += "<div class=\"col\">";
						append += "<div class=\"card-block px-2\">";
							append += "<h4 class=\"card-title\">"+data[i].nama+"</h4>";
							append += "<h4 class=\"card-title\"><b>Spesialis: &nbsp;</b>TODO Get SPS</h4>";
							
							append += "<div class=\"row\">";
								append += "<div class=\"col\">"; //<!-- Logo RS -->
									append += "<img src=\"//placehold.it/200\" class=\"img-fluid\" alt=\"\">";
								append += "</div>";
								append += "<div class=\"col\">"; //<!-- Logo Praktek -->
									append += "<img src=\"//placehold.it/200\" class=\"img-fluid\" alt=\"\">";
								append += "</div>";
							append += "</div>";
							
							append += "<div class=\"row justify-content-center\">";
								append += "<div class=\"col\">";
											//<!-- Tampilkan praktek RS manasaja -->
								append += "</div>";
								append += "<div class=\"col\">";
											//<!-- Tampilkan praktek Klinik manasaja -->
								append += "</div>";
							append += "</div>";
						append += "</div>";
					append += "</div>";
					
					append += "</div>";
					append += "</div>";
					append += "</a>";
					append += "</div>";
					$("#listDokter").append(append);
				}
			});
		});
		function getHospitalClinicTransAdmin()
		{
			$("#loadingModal").modal('show');
			$.ajax({
                url : "{{url('hospitalclinicTransactionAdmin')}}",
                type : "GET",
                success: function(result){
					var new1 = "<h1>Transaksi Klinik Hospital</h1>";
					new1 += "<table class=\"table\">";
					new1 += "<thead>";
						new1 += "<tr>";
							new1 += "<th scope=\"col\">No_Transaksi</th>";
							new1 += "<th scope=\"col\">Nama Pasien</th>";
							new1 += "<th scope=\"col\">No Telepon</th>";
							new1 += "<th scope=\"col\">Hari Kunjungan</th>";
							new1 += "<th scope=\"col\">Jam Kunjungan</th>";
							new1 += "<th scope=\"col\">Dokter Praktek</th>";
							new1 += "<th scope=\"col\">Alasan Kunjungan</th>";
							new1 += "<th scope=\"col\" colspan=\"2\">Aksi</th>";
						new1 += "</tr>";
					new1 += "</thead><tbody>";
					$("#transClinicHospital").append(new1);
					$.each(result.hospClinicTrans,function(i,item)
					{
						new1 = "<tr>";
						new1 += "<th scope=\"row\">"+(i+1)+"</th>";
						
						//Nama dan No Telepon
						$.ajaxSetup({async:false});
						if(item.pasien_id==null)
						{
							$.ajax({
								url : '{{url("detailUser/")}}/'+item.user_id,
								type : "GET",
								success:function(result){
									//console.log(result);
									new1 += "<td class=\"col\">"+result.dataUs['nama']+"</td>";
									new1 += "<td class=\"col\">"+result.dataUs['telepon']+"</td>";
								},
							});
						}
						else
						{
							$.ajax({
								url : '{{url("detailPasien/")}}/'+item.pasien_id,
								type : "GET",
								success:function(result){
									//console.log(result);
									new1 += "<td class=\"col\">"+result.dataPas['nama']+"</td>";
									new1 += "<td class=\"col\">"+result.dataPas['telepon']+"</td>";
								},
							});
						}
						//Hari Kunj + Jam Kunj
						new1 += "<td class=\"col\">"+item.hari_praktek+"</td>";
						new1 += "<td class=\"col\">"+item.jam_praktek+"</td>";

						$.ajax({
							url : '{{url("doctorHospitalDoc/")}}/'+item.doctorhospital_id,
							type : "GET",
							success:function(result){
								console.log(result);
								new1 += "<td class=\"col\">"+result.datadocHosp['nama']+"</td>";
							},
						});
						$.ajaxSetup({async:true});

						new1 += "<td class=\"col\">"+item.alasan_kunjungan+"</td>";

						if(item['statusTransaksi']==0)
						{
							new1 += "<td class=\"col\"><button class=\"btn btn-primary\">Setujui</button></td>";
							new1 += "<td class=\"col\"><button class=\"btn btn-secondary\">Tolak</button></td>";
						}
						else
						{

						}
						
						new1 += "</tr>";
						$("#transClinicHospital").append(new1);
					});

					new1 = "</tbody></table>";
					new1 += "</thead><tbody>";
					$("#transClinicHospital").append(new1);
					$("#loadingModal").modal('hide');
				},
			});
		}
		getHospitalClinicTransAdmin();
	});
</script>
@endsection


