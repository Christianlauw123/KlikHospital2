@extends('layouts.app2')

@section('content')
<section class="hero">
	<h1>History Transaksi</h1>
	<p>
        <button class="btn btn-primary" type="button" data-toggle="collapse" id="btnHistoryRoom">Transaksi Room</button>
        <button class="btn btn-primary" type="button" data-toggle="collapse" id="btnHistoryDoctorClinic" >Transaksi Doctor Clinic</button>
        <button class="btn btn-primary" type="button" data-toggle="collapse" id="btnHistoryDoctorClinicHospital" >Transaksi Doctor Clinic Hospital</button>
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
            $("#loadingModal").modal('show');
            $("#accordion").html("");
            $.ajax({
                url : "{{url('roomTransaction')}}",
                type : "GET",
                success: function(result){
                    //console.log(result.myTrax);
                    var new1 = "<h1>Transaksi Room</h1>";
                    $("#accordion").append(new1);
                    $.each(result.myTrax,function(i,item)
                    {
                        console.log(item);
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
                        //append += "<p>Nama Pasien: "+item.pasien_id+"</p>";
                        if(item.pasien_id==null)
                        {
                            $.ajaxSetup({async:false});
                            $.ajax({
                                url : '{{url("/detailUser")}}/'+item.user_id,
                                type : "GET",
                                success: function(result){
                                    append += "<p>Nama Pasien: "+result.dataUs['nama']+"</p>";
                                }
                            });
                            $.ajaxSetup({async:true});
                        }
                        else
                        {
                            $.ajaxSetup({async:false});
                            $.ajax({
                                url : '{{url("/detailPasien")}}/'+item.pasien_id,
                                type : "GET",
                                success: function(result){
                                    append += "<p>Nama Pasien: "+result.dataPas['nama']+"</p>";
                                }
                            });
                            $.ajaxSetup({async:true});
                        }
                        
                        append += "</div>";
                        append += "</div>";
                        append += "</div>";
                        $("#accordion").append(append);
                    });
                    $("#loadingModal").modal('hide');
                    // console.log(result.myTrax);
                },
                error: function(data){
                    console.log(data);
                    $("#loadingModal").modal('hide');
                }
                
            });
        });

        $("#btnHistoryDoctorClinic").click(function(){
            $("#loadingModal").modal('show');
            $("#accordion").html("");
            $.ajax({
                url : "{{url('clinicTransaction')}}",
                type : "GET",
                success: function(result){
                    //console.log(result.myTrax);
                    var new1 = "<h1>Transaksi Doctor</h1>";
                    $("#accordion").append(new1);
                    $.each(result.myTraxClinic,function(i,item)
                    {
                        console.log(item);
                        var append = "";
                        append += "<div class=\"card\">";
                        append += "<div class=\"card-header\">";
                        append += "<h5 class=\"mb-0\">";
                        append += "<button class=\"btn btn-link\" data-toggle=\"collapse\" data-target=\"#collapse"+i+"\" aria-expanded=\"true\" aria-controls=\"collapse"+i+"\">";
                        append += "Klinik Trans-"+i;
                        append += "</button>";
                        append += "</h5>";
                        append += "</div>";
            
                        append += "<div id=\"collapse"+i+"\" class=\"collapse show\"  data-parent=\"#accordion\">";
                        append += "<div class=\"card-body\">";
                        //append += "<p>Nama Pasien: "+item.pasien_id+"</p>";
                        if(item.pasien_id==null)
                        {
                            $.ajaxSetup({async:false});
                            $.ajax({
                                url : '{{url("/detailUser")}}/'+item.user_id,
                                type : "GET",
                                success: function(result){
                                    append += "<p>Nama Pasien: "+result.dataUs['nama']+"</p>";
                                }
                            });
                            $.ajaxSetup({async:true});
                        }
                        else
                        {
                            $.ajaxSetup({async:false});
                            $.ajax({
                                url : '{{url("/detailPasien")}}/'+item.pasien_id,
                                type : "GET",
                                success: function(result){
                                    append += "<p>Nama Pasien: "+result.dataPas['nama']+"</p>";
                                }
                            });
                            $.ajaxSetup({async:true});
                        }
                        
                        append += "</div>";
                        append += "</div>";
                        append += "</div>";
                        $("#accordion").append(append);
                    });
                    $("#loadingModal").modal('hide');
                    // console.log(result.myTrax);
                },
                error: function(data){
                    console.log(data);
                    $("#loadingModal").modal('hide');
                }
                
            });
        });
        $("#btnHistoryDoctorClinicHospital").click(function(){
            $("#loadingModal").modal('show');
            $("#accordion").html("");
            $.ajax({
                url : "{{url('hospitalclinicTransaction')}}",
                type : "GET",
                success: function(result){
                    //console.log(result.myTrax);
                    var new1 = "<h1>Transaksi Doctor Hospital</h1>";
                    $("#accordion").append(new1);
                    $.each(result.myTraxHospitalClinic,function(i,item)
                    {
                        console.log(item);
                        var append = "";
                        append += "<div class=\"card\">";
                        append += "<div class=\"card-header\">";
                        append += "<h5 class=\"mb-0\">";
                        append += "<button class=\"btn btn-link\" data-toggle=\"collapse\" data-target=\"#collapse"+i+"\" aria-expanded=\"true\" aria-controls=\"collapse"+i+"\">";
                        append += "Klinik Hospital Trans-"+i;
                        append += "</button>";
                        append += "</h5>";
                        append += "</div>";
            
                        append += "<div id=\"collapse"+i+"\" class=\"collapse show\"  data-parent=\"#accordion\">";
                        append += "<div class=\"card-body\">";
                        //append += "<p>Nama Pasien: "+item.pasien_id+"</p>";
                        $.ajaxSetup({async:false});
                        if(item.pasien_id==null)
                        {
                            $.ajax({
                                url : '{{url("/detailUser")}}/'+item.user_id,
                                type : "GET",
                                success: function(result){
                                    append += "<p>Nama Pasien: "+result.dataUs['nama']+"</p>";
                                }
                            });
                        }
                        else
                        {
                            $.ajax({
                                url : '{{url("/detailPasien")}}/'+item.pasien_id,
                                type : "GET",
                                success: function(result){
                                    append += "<p>Nama Pasien: "+result.dataPas['nama']+"</p>";
                                }
                            });
                        }
                        $.ajaxSetup({async:true});
                        
                        append += "</div>";
                        append += "</div>";
                        append += "</div>";
                        $("#accordion").append(append);
                    });
                    $("#loadingModal").modal('hide');
                    // console.log(result.myTrax);
                },
                error: function(data){
                    console.log(data);
                    $("#loadingModal").modal('hide');
                }
                
            });
        });
    });
</script>
@endsection