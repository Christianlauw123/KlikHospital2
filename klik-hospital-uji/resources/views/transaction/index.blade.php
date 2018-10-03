@extends('layouts.app2')

@section('content')
<section class="hero">
	<h1>History Transaksi</h1>
	<p>
        <button class="btn btn-primary" type="button" data-toggle="collapse" id="btnHistoryRoom">Transaksi Room</button>
        <button class="btn btn-primary" type="button" data-toggle="collapse" id="btnHistoryDoctor" >Transaksi Doctor</button>
    </p>
    <div class="container">
        <div id="accordion">
        </div>
    </div>
</section>
<script>
    $(document).ready(function()
    {
        $("#btnHistoryRoom").click(function(){
            $("#accordion").html("");
            $.get('{{url("roomTransaction")}}/',function(data,status)
			{
                var new1 = "<h1>Transaksi Room</h1>";
                $("#accordion").append(new1);
                $.each(data.myTrax,function(i,item)
                {
                    var append = "";
                    append += "<div class=\"card\">";
                    append += "<div class=\"card-header\">";
                    append += "<h5 class=\"mb-0\">";
                    append += "<button class=\"btn btn-link\" data-toggle=\"collapse\" data-target=\"#collapse"+i+"\" aria-expanded=\"true\" aria-controls=\"collapse"+i+"\">";
                    append += "RoomTrans-"+i;
                    append += "</button>";
                    append += "</h5>";
                    append += "</div>";
          
                    append += "<div id=\"collapse"+i+"\" class=\"collapse show\"  data-parent=\"#accordion\">";
                    append += "<div class=\"card-body\">";
                    append += "<p>Nama Pasien: "+item.pasien_id+"</p>";
                    append += "</div>";
                    append += "</div>";
                    append += "</div>";
                    $("#accordion").append(append);
                    
                });
                console.log(data.myTrax);
            });
        });

        $("#btnHistoryDoctor").click(function(){
            //TODO
            $("#accordion").html("");
            var new1 = "<h1>Transaksi Doctor</h1>";
            $("#accordion").append(new1);
        });
    });
</script>
@endsection