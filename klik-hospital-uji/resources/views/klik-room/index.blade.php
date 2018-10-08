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
		@if(Auth::user()->hospital)
			<div class="container">
				<p>
					<button class="btn btn-primary" type="button" data-toggle="collapse" id="btnHistoryRoom">Transaksi Room</button>
					<button class="btn btn-primary" type="button" data-toggle="collapse" id="btnHistoryDoctor" >Transaksi Doctor</button>
				</p>
				<div class="container">
					<div id="RoomTrans">
					</div>
				</div>
			</div>
			
			
			Transaksi Klinik RS
		@else
		<div class="container">
		<div class="row justify-content-center">
			<form class="form-inline">
				<div class="col-auto my-1">
					<label for="lokasiSelectRoom">Lokasi</label>
					<select name="lokasi" class="custom-select" id="lokasiSelectRoom">
						<option selected value=''>Choose...</option>
						@foreach($allKotaRS as $item)
							<option value="{{$item->id}}">{{$item->nama}}</option>
						@endforeach
					</select>
				</div>
				<div class="col-auto my-1">
					<label for="tipeSelectRoom">Tipe Rumah Sakit</label>
					<select name="tipe" class="custom-select" id="tipeSelectRoom">
						<option selected value=''>Choose...</option>
			        	
					</select>
				</div>
				
				<div class="col-auto my-1">
					<label for="kamarSelectRoom">Tipe Kamar</label>
					<select name="kamar" class="custom-select" id="kamarSelectRoom">
						<option selected value=''>Choose...</option>
			        	
					</select>
				</div>
				<!-- <button type="submit" class="btn btn-primary">Cari</button> -->
			</form>
		</div>
		<div class="row justify-content-center">
			<form class="form-inline d-flex flex-column">
				<label class="my-1 mr-2" for="namaRSSelectRoom">Nama Rumah Sakit</label>
				<div class="input-group">
				<input class="my-1 mr-2" id="namaRSSelectRoom" type="text" value=''/>
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
  		<div id="listRS" class="container">
  			@foreach($allRS as $item)
  			<div class="row justify-content-center">
  			<a href="{{url('klik-room').'/'.$item->id}}" style="text-decoration: none;">
		 		<div class="card">
		 			<div class="row no-gutters">
			            <div class="col-auto">
			                <img src="//placehold.it/200" class="img-fluid" alt="">
			            </div>
			            <div class="col">
			                <div class="card-block px-2">
			                    <h4 class="card-title">{{$item->nama}}</h4>
			                    <h4 class="card-title">Tipe B</h4>
			                    <p class="card-text">Description</p>
			                </div>
			            </div>
		        	</div>
		 		</div>
	 		</a>
	 		</div>
	 		@endforeach
	 	</div>
	 	</div>
	 
	 <!--==========================
	    End List RS
	  ============================-->  
		</div>
	@endif
</section>
<!--==========================
    End Menu Utama
  ============================-->
		 		
<script type="text/javascript">
	//Lokasi Change
	$( document ).ready(function() {
		//Liat Transaksi
		$.ajaxSetup({async:false});
		function getRoomTransAdmin()
		{
			$.get('{{url("roomTransactionAdmin")}}/',function(data,status)
			{
				console.log(data.roomTrans);
                var new1 = "<h1>Transaksi Room</h1>";
				new1 += "<table class=\"table\">";
				new1 += "<thead>";
					new1 += "<tr>";
						new1 += "<th scope=\"col\">No_Transaksi</th>";
						new1 += "<th scope=\"col\">Nama Pasien</th>";
						new1 += "<th scope=\"col\">No Telepon</th>";
						new1 += "<th scope=\"col\">Ruangan</th>";
						new1 += "<th scope=\"col\">Dokter Jaga</th>";
						new1 += "<th scope=\"col\">Lama Inap</th>";
						new1 += "<th scope=\"col\">Total Biaya</th>";
						new1 += "<th scope=\"col\" colspan=\"2\">Status</th>";
					new1 += "</tr>";
				new1 += "</thead><tbody>";
                $("#RoomTrans").append(new1);
                $.each(data.roomTrans,function(i,item)
                {
                    new1 = "<tr>";
					new1 += "<th scope=\"row\">"+(i+1)+"</th>";
					
					$.get('{{url("detailPasien/")}}/'+item['pasien_id'],function(data)
					{
						//console.log(data.dataPas);
						new1 += "<td class=\"col\">"+data.dataPas.nama+"</td>";
						new1 += "<td class=\"col\">"+data.dataPas.no_telepon+"</td>";
					});

					$.get('{{url("detailRuang/")}}/'+item['room_id'],function(data)
					{
						console.log(data);
						new1 += "<td class=\"col\">"+data.dataRuang.nama+"</td>";
					});
					if(item['statusTransaksi']==0)
						new1 += "<td class=\"col\">Belum Tersedia</td>";
					else
					{

					}
					new1 += "<td class=\"col\">"+item['lamaInap'] +"Hari</td>";
					new1 += "<td class=\"col\">Rp "+item['totalBiaya']+",00</td>";

					if(item['statusTransaksi']==0)
					{
						new1 += "<td class=\"col\"><button class=\"btn btn-primary\">Setujui</button></td>";
						new1 += "<td class=\"col\"><button class=\"btn btn-secondary\">Tolak</button></td>";
					}
					else
					{

					}
					
					new1 += "</tr>";
					$("#RoomTrans").append(new1);
                });
				new1 = "</tbody></table>";
				new1 += "</thead><tbody>";
				$("#RoomTrans").append(new1);
                
            });
		}
		getRoomTransAdmin();
		$("#btnHistoryRoom").click(function(){
            $("#RoomTrans").html("");
			//getRoomTransAdmin();
        });

        $("#btnHistoryDoctor").click(function(){
            //TODO
            $("#accordion").html("");
            var new1 = "<h1>Transaksi Doctor</h1>";
            $("#accordion").append(new1);
        });

		//Jika Lokasi Berubah
		$("#lokasiSelectRoom").change(function()
		{
			var idLokasi = $("#lokasiSelectRoom").val();
			var idTipeKamar = $("#kamarSelectRoom").val();
			var idTipeRS = $("#tipeSelectRoom").val();
			$("#listRS").html("");
			//alert('{{url("hospitalData")}}/' +idLokasi+'/'+idTipeRS+'/'+idTipeKamar);
			$.get('{{url("hospitalData")}}/' +idLokasi+'/'+idTipeRS+'/'+idTipeKamar,function(data,status)
			{
				//console.log(data);
				
				for(var i in data)
				{
					var append = "";
					append += "<div class=\"row justify-content-center\">";
					append += "<a href=\""+"{{url('/klik-room')}}/"+data[i].id+"\" style=\"text-decoration: none;\">";
					append += "<div class=\"card\">";
					append += "<div class=\"row no-gutters\">";
					
					append += "<div class=\"col-auto\">";
					append += "<img src=\"//placehold.it/200\" class=\"img-fluid\" alt=\"\">";
					append +="</div>";

					append += "<div class=\"col\">";
					append += "<div class=\"card-block px-2\">";
					append += "<h4 class=\"card-title\">"+data[i].nama+"</h4>";
					append += "<h4 class=\"card-title\">TODO TIPE</h4>";
					append += "<p class=\"card-text\">TODO JENI KAMAR</h4>";
					append += "</div>";
					append += "</div>";

					append +="</div>";
					append +="</div>";
					append += "</a>";
					append +="</div>";
					$("#listRS").append(append);
				}
			});
		});

		//Jika Tipe Kamar Berubah
		$("#kamarSelectRoom").change(function()
		{
			var idLokasi = $("#lokasiSelectRoom").val();
			var idTipeKamar = $("#kamarSelectRoom").val();
			var idTipeRS = $("#tipeSelectRoom").val();
			$("#listRS").html("");
			//alert('{{url("hospitalData")}}/' +idLokasi+'/'+idTipeRS+'/'+idTipeKamar);
			$.get('{{url("hospitalData")}}/' +idLokasi+'/'+idTipeRS+'/'+idTipeKamar,function(data,status)
			{
				//console.log(data);
				
				for(var i in data)
				{
					var append = "";
					append += "<div class=\"row justify-content-center\">";
					append += "<a href=\""+"{{url('/klik-room')}}/"+data[i].id+"\" style=\"text-decoration: none;\">";
					append += "<div class=\"card\">";
					append += "<div class=\"row no-gutters\">";
					
					append += "<div class=\"col-auto\">";
					append += "<img src=\"//placehold.it/200\" class=\"img-fluid\" alt=\"\">";
					append +="</div>";

					append += "<div class=\"col\">";
					append += "<div class=\"card-block px-2\">";
					append += "<h4 class=\"card-title\">"+data[i].nama+"</h4>";
					append += "<h4 class=\"card-title\">TODO TIPE</h4>";
					append += "<p class=\"card-text\">TODO JENI KAMAR</h4>";
					append += "</div>";
					append += "</div>";

					append +="</div>";
					append +="</div>";
					append += "</a>";
					append +="</div>";
					$("#listRS").append(append);
				}
			});
		});

		//Jika Tipe RS Berubah
		$("#tipeSelectRoom").change(function()
		{
			var idLokasi = $("#lokasiSelectRoom").val();
			var idTipeKamar = $("#kamarSelectRoom").val();
			var idTipeRS = $("#tipeSelectRoom").val();
			$("#listRS").html("");
			//alert('{{url("hospitalData")}}/' +idLokasi+'/'+idTipeRS+'/'+idTipeKamar);
			$.get('{{url("hospitalData")}}/' +idLokasi+'/'+idTipeRS+'/'+idTipeKamar,function(data,status)
			{
				//console.log(data);
				
				for(var i in data)
				{
					var append = "";
					append += "<div class=\"row justify-content-center\">";
					append += "<a href=\""+"{{url('/klik-room')}}/"+data[i].id+"\" style=\"text-decoration: none;\">";
					append += "<div class=\"card\">";
					append += "<div class=\"row no-gutters\">";
					
					append += "<div class=\"col-auto\">";
					append += "<img src=\"//placehold.it/200\" class=\"img-fluid\" alt=\"\">";
					append +="</div>";

					append += "<div class=\"col\">";
					append += "<div class=\"card-block px-2\">";
					append += "<h4 class=\"card-title\">"+data[i].nama+"</h4>";
					append += "<h4 class=\"card-title\">TODO TIPE</h4>";
					append += "<p class=\"card-text\">TODO JENI KAMAR</h4>";
					append += "</div>";
					append += "</div>";

					append +="</div>";
					append +="</div>";
					append += "</a>";
					append +="</div>";
					$("#listRS").append(append);
				}
			});
		});

		$("#namaRSSelectRoom").bind("change paste keyup",function(){
			var kataKunci = $(this).val();
			console.log(kataKunci);
			$("#listRS").html("");
			//alert('{{url("hospitalData")}}/' +idLokasi+'/'+idTipeRS+'/'+idTipeKamar);
			$.get('{{url("hospitalData")}}/' +kataKunci,function(data,status)
			{
				console.log(data);
				for(var i in data)
				{
					var append = "";
					append += "<div class=\"row justify-content-center\">";
					append += "<a href=\""+"{{url('/klik-room')}}/"+data[i].id+"\" style=\"text-decoration: none;\">";
					append += "<div class=\"card\">";
					append += "<div class=\"row no-gutters\">";
					
					append += "<div class=\"col-auto\">";
					append += "<img src=\"//placehold.it/200\" class=\"img-fluid\" alt=\"\">";
					append +="</div>";

					append += "<div class=\"col\">";
					append += "<div class=\"card-block px-2\">";
					append += "<h4 class=\"card-title\">"+data[i].nama+"</h4>";
					append += "<h4 class=\"card-title\">TODO TIPE</h4>";
					append += "<p class=\"card-text\">TODO JENI KAMAR</h4>";
					append += "</div>";
					append += "</div>";

					append +="</div>";
					append +="</div>";
					append += "</a>";
					append +="</div>";
					$("#listRS").append(append);
				}
			});
		});
	});

</script>
@endsection