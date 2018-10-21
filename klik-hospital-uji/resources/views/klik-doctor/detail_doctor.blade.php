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
							<input type="hidden" name="namaHosp" value="{{$item->hospital->nama}}"/>
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
							<input type="hidden" name="namaKli" value="{{$item->clinic->nama}}"/>
						</div>
					@endforeach
				@endforeach
				</div>
			@endforeach
		</div>
	</div>
</section>

<div class="modal fade" id="modalPesanClinic" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
	  <div class="modal-content">
		<div class="modal-header">
		  <h5 class="modal-title" id="exampleModalLabel"></h5>
		  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		  </button>
		</div>
		<form id="formPesanClinic">
			<div class="modal-body">
				<div class="form-row">
					Jadwal Pilihan : <span id="jadwalPilihan"></span>
				</div>
				<div class="form-row">
					<div class="form-group col-md-6">
						<label>Nama Pasien</label>
						<input type="text" class="form-control" name="namaPasien" placeholder="Nama Pasien">
					</div>
					<div class="form-group col-md-6">
						<label>No Telepon</label>
						<input type="text" class="form-control" name="noTelepon" placeholder="Nomor Telepon">
					</div>
				</div>
			<div class="form-group">
			  <label>Tanggal Lahir</label>
			  <input class="form-control" type="date" name="bdate">
			</div>
				<div class="form-group">
					<label>Alamat</label>
					<textarea class="form-control" name="alamatPasien" placeholder="Alamat"></textarea>
				</div>
				<div class="form-group">
					<label>Alasan Kunjungan</label>
					<textarea class="form-control" name="alasanKunjungan" placeholder="Alasan Kunjungan"></textarea>
				</div>
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-primary">Pesan</button>
			</div>
		</form>
	</div>
  </div>
</div>
  
<div id="konfirmasiPesanClinic" class="modal fade" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content text-center">
		<div class="modal-header">
			<h5 class="modal-title">Konfirmasi Data Pesanan</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<div class="modal-body">
			<p>Apakah anda yakin dengan data yang anda isikan adalah benar?</p>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
			<button type="button" id="btnSetujuDataBenar" data-dismiss="modal" class="btn btn-primary">Setuju</button>
		</div>
		</div>
	</div>
</div>

<div id="afterKonfirmasiClinic" class="modal fade" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content text-center">
		<div class="modal-header">
			<h5 class="modal-title">Pemesanan Berhasil</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<div class="modal-body">
			<p>Pemesanan berhasil dilakukan.</p>
			<p>Tim dari klik-hospital memproses pesanan anda</p>
		</div>
		<div class="modal-footer">
			<button type="button" id="btnTutupPesanClinic" class="btn btn-primary" data-dismiss="modal">Tutup</button>
		</div>
		</div>
	</div>
</div>

<script>
	$(document).ready(function(){
		var arrData;
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});

		$(".transClinicHospital").click(function(e){
			console.log("Arr Hospital");
			arrData = [];
			arrData.push("ClinicHos");
			$.each($(this).find(":input"), function (index, value) {
				arrData.push($(value).val());
			});
			//console.log(arrData[4]);
			$("#exampleModalLabel").text('Klinik Rumah Sakit - '+arrData[4]);
			$("#jadwalPilihan").text(' Hari '+arrData[2]+', Jam '+arrData[3]);
			$("#modalPesanClinic").modal('show');
		});

		$(".transClinic").click(function(e){
			console.log("Arr Clinic");
			arrData = [];
			arrData.push("Clinic");
			$.each($(this).find(":input"), function (index, value) {
				arrData.push($(value).val());
			});
			$("#exampleModalLabel").text('Klinik - '+arrData[4]);
			$("#jadwalPilihan").text(' Hari '+arrData[2]+', Jam '+arrData[3]);
			$("#modalPesanClinic").modal('show');
		});
		
		$("#formPesanClinic").submit(function(e)
		{
			e.preventDefault();
			$("#konfirmasiPesanClinic").modal('show');
		});

		$("#btnSetujuDataBenar").click(function(e)
		{
			e.preventDefault();
			var data = $("#formPesanClinic").serializeArray();
			//console.log(data);
			var dataSubmit = {
				'namaPas': data[0].value,
				'noTelepon': data[1].value,
				'alamat':data[3].value,
				'alasan':data[4].value,
				'bdate':data[2].value,
				'dataRoom':arrData,
			};
			console.log(dataSubmit);
			//Trans Klinik Hospital
			if(arrData[0]=="ClinicHos"){
				$.ajax({
					url : "{{url('hospitalclinicTransaction')}}",
					type : "POST",
					data : dataSubmit,
					success: function(result){
						console.log(result);
					},
					error: function(data){
						console.log(data);
					}
				});
			}
			else
			{
				$.ajax({
					// url : "{{url('roomTransaction')}}",
					// type : "POST",
					// data : dataSubmit,
					// success: function(result){
					// 	console.log(result);
					// },
					// error: function(data){
					// 	console.log(data);
					// }
				});
			}
			$('#modalPesanClinic').modal('hide');
			$("#afterKonfirmasiClinic").modal('show');
		});
		
		$("#btnTutupPesanClinic").click(function(e)
		{
			e.preventDefault();
			window.location.href = "{{url('/')}}";
		});
	});
</script>
@endsection