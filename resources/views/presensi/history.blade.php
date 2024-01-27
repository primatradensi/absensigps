@extends('layouts.presensi')
@section('header')

<div class="appHeader bg-success text-light">
    <div class="left">
        <a href="javascript:;" class="headerButton goBack">
            <ion-icon name="chevron-back-outline"></ion-icon>
        </a>
    </div>
    <div class="pagetitle">History</div>
    <div class="right"></div>
</div>

@endsection
@section('content')
<div class="row" style="margin-top:70px">
    <div class="col">
        <div class="row">
            <div class="col-6">
                <div class="from-group">
                    <select name="bulan" id="bulan" class="form-control">
                        <option value="">Bulan</option>
                        @for ($i=1; $i <= 12; $i++) <option value="{{ $i }}" {{ date("m") == $i ? 'selected' : '' }}>{{ $namabulan[$i] }}</option>
                        @endfor
                    </select>
                </div>
            </div>
            <div class="col-6">
                <div class="from-group">
                    <select name="tahun" id="tahun" class="form-control">
                        <option value="">Tahun</option>
                        @php
                        $tahunmulai = 2022;
                        $tahunsekarang = date("Y");
                        @endphp
                        @for ($tahun=$tahunmulai; $tahun <= $tahunsekarang; $tahun++) <option value="{{ $tahun }}" {{ date("Y") == 
                        $tahun ? 'selected' : '' }}>{{ $tahun }}
                        @endfor
                    </select>
                </div>
            </div>
        </div>
        <div class="row" style="margin-top: 17px">
            <div class="col-12">
                <div class="from-group">
                    <button class="btn btn-success btn-block" id="getdata">
                        <ion-icon name="search-circle-outline"></ion-icon>Search
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row mt-2" style="position: fixed; width:100%; margin:auto; overflow-y:scroll; height:430px">
    <div class="col" id="showhistory"></div>
</div>
@endsection


@push('myscript')
<script>
    $(function() {
        $("#getdata").click(function(e) {
            var bulan = $("#bulan").val ();
            var tahun = $("#tahun").val ();
            $.ajax({
                type:'POST'
                , url:'/gethistory'
                , data:{
                    _token: "{{ csrf_token() }}"
                    , bulan: bulan
                    , tahun: tahun
                }
                , cache:false
                , success:function(respond) {
                    $("#showhistory").html(respond);
                }
            });
        });
    });

</script>
@endpush