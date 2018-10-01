@extends('layouts.app2')

@section('content')
<section class="hero wow fadeIn">
	<div class="hero-container">
		<img src="{{asset('template_source/img/image-Klik/icon.png')}}" alt="Hero Imgs">

		 <!--==========================
		    Detail Kamar
		  ============================-->
		<div class="container">
			<div class="row">
				{{$roomData->nama}}<br/>
				{{$roomData->hospital->nama}}<br/>
				{{$roomData->harga}}<br/>
				Rating: {{$roomData->rating}}<br/>
			</div>
			<h1>FASILITAS :</h1>
			<div class="row text-center">
				@foreach(explode(',', $roomData->fasilitas) as $item)
					<div class="column">
						<figure class="figure">
						  <img src="{{asset('template_source/img/image-Klik/icon.png')}}" class="figure-img img-fluid rounded" alt="">
						  <figcaption class="figure-caption">{{$item}}</figcaption>
						</figure>
					</div>
				@endforeach
			</div>
		</div>
		<!--==========================
		    End Detail Kamar
		  ============================-->
		 <div class="w-100"></div>
		 <!-- pesan -->
		 <button data-toggle="modal" data-target="#modalPesanRoom" class="btn btn-primary">Pesan</button>
	</div>
</section>

<!-- Modal -->
<div class="modal fade" id="modalPesanRoom" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{$roomData->nama}} - {{$roomData->hospital->nama}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="formPesanRoom">
      	<div class="modal-body">
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
      			<label>Alamat</label>
      			<textarea class="form-control" name="alamatPasien" placeholder="Alamat"></textarea>
      		</div>
      		<div class="form-group">
      			<label>Alasan Kunjungan</label>
      			<textarea class="form-control" name="alasanKunjungan" placeholder="Alasan Kunjungan"></textarea>
      		</div>
      		<div class="form-row">
      			<div class="form-group col-md-6">
      				<label>Lama Inap</label>
      				<input type="number" min="1" value="1" class="form-control" id="lamaInap">
      			</div>
      			<div class="form-group col-md-4">
      				<label for="inputState">Total Biaya:</label>
      				<input type="number" min="1" disabled value="{{$roomData->harga}}" class="form-control" id="biayaTotal">
      			</div>
      		</div>
      	</div>
      	<div class="modal-footer">
      		<button type="submit" class="btn btn-primary">Pesan</button>
      	</div>
      </form>
  </div>
</div>
</div>
<script type="text/javascript">
	$("#lamaInap").change(function()
	{
		$("#biayaTotal").val({{$roomData->harga}}*$(this).val());
	});
</script>
@endsection