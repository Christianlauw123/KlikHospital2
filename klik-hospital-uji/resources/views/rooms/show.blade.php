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
    @guest

    @else
      <button data-toggle="modal" data-target="#modalPesanRoom" class="btn btn-primary">Pesan</button>
    @endguest
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
            <div class="custom-control custom-radio custom-control-inline">
              <input type="radio" checked value="0" class="custom-control-input pilihanPesan" id="defaultInline1" name="inlineDefaultRadiosExample">
              <label class="custom-control-label" for="defaultInline1">Diri Sendiri</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
              <input type="radio" value="1" class="custom-control-input pilihanPesan" id="defaultInline2" name="inlineDefaultRadiosExample">
              <label class="custom-control-label" for="defaultInline2">Pasien Baru</label>
            </div>
          </div>
          <div id="dataPasien">
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
          </div>
      		<div class="form-group">
      			<label>Alasan Kunjungan</label>
      			<textarea class="form-control" name="alasanKunjungan" placeholder="Alasan Kunjungan"></textarea>
      		</div>
      		<div class="form-row">
      			<div class="form-group col-md-6">
      				<label>Lama Inap</label>
      				<input type="number" min="1" value="1" class="form-control" name="lamaInap" id="lamaInap">
      			</div>
      			<div class="form-group col-md-4">
      				<label for="inputState">Total Biaya:</label>
      				<input type="number" min="1" readonly name="biayaTotal" value="{{$roomData->harga}}" class="form-control" id="biayaTotal">
              <input type="hidden" name="idRoom" value="{{$roomData->id}}">
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

<div id="konfirmasiPesanRoom" class="modal fade" tabindex="-1" role="dialog">
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

<div id="afterKonfirmasiRoom" class="modal fade" tabindex="-1" role="dialog">
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
        <button type="button" id="btnTutupPesanRoom" class="btn btn-primary" data-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  $(document).ready(function(){
    $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    $.ajaxSetup({async:false});
    $("#dataPasien").hide();
    $("#formPesanRoom .pilihanPesan").change(function()
    {
      if($(this).val()==0)
        $("#dataPasien").hide();
      else
      {
        $("#dataPasien").show();
        alert("PAs Baru");
      }
    })
    $("#lamaInap").change(function()
    {
      $("#biayaTotal").val({{$roomData->harga}}*$(this).val());
    });

    $("#formPesanRoom").submit(function(e)
    {
      e.preventDefault();
      $("#konfirmasiPesanRoom").modal('show');
    })
    $("#btnSetujuDataBenar").click(function(e)
    {
      e.preventDefault();
      var data = $("#formPesanRoom").serializeArray();
      console.log("data");
      console.log(data);
      var dataSubmit;
      
      //DiriSendiri
      if(data[0].value==0)
      {
        dataSubmit = {
          'jenis':data[0].value,
          'alasan':data[5].value,
          'lamaInap':data[6].value,
          'biayaTotal':data[7].value,
          'idRoom':data[8].value
        };
      }
      else
      {
        dataSubmit = {
          'jenis':data[0].value,
          'namaPas': data[1].value, 
          'noTelepon': data[2].value,
          'bdate':data[3].value,
          'alamat':data[4].value,
          'alasan':data[5].value,
          'lamaInap':data[6].value,
          'biayaTotal':data[7].value,
          'idRoom':data[8].value
        };
      }
      console.log(dataSubmit);
      $.ajax({
          url : "{{url('roomTransaction')}}",
          type : "POST",
          data : dataSubmit,
          success: function(result){
              console.log(result);
          },
          error: function(data){
            console.log(data);
          }
      });


      // $('#btnSetujuDataBenar').modal('hide');
      $('#modalPesanRoom').modal('hide');
      $("#afterKonfirmasiRoom").modal('show');
    })
    $("#btnTutupPesanRoom").click(function(e)
    {
      e.preventDefault();
      window.location.href = "{{url('/')}}";
    })
  });
</script>
@endsection