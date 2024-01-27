@extends('layouts.presensi')
@section('header')

<div class="appHeader bg-success text-light">
    <div class="left">
        <a href="javascript:;" class="headerButton goBack">
            <ion-icon name="chevron-back-outline"></ion-icon>
        </a>
    </div>
    <div class="pagetitle">Data Izin / Sakit</div>
    <div class="right"></div>
</div>

<style>
    .historicontent {
        display: flex;
        gap: 1px;
    }
    
    .dataabsensi {
        margin-left: 7px;
    }          
    
    .status {
        position: absolute;
        right: 17px;
    }

    .card {
                                border: 1px solid blue;
                            }
</style>

@endsection
@section('content')
<div class="row" style="margin-top:70px;">
    <div class="col">
        @php
        $messagesuccess = Session::get('success');
        $messageerror = Session::get('error');
        @endphp
        @if(Session::get('success'))
        <div class="alert alert-success">
            {{ $messagesuccess }}
        </div>
        @endif
        @if(Session::get('error'))
        <div class="alert alert-danger">
            {{ $messageerror }}
        </div>
        @endif
    </div>
</div>
<div class="row" style="position: fixed; width:100%; margin:auto; overflow-y:scroll; height:430px">
<div class="col">
@foreach ($dataizin as $d)
@php
    if($d->status == "i") {
        $status = "Izin";
    } else if($d->status == "s") {
        $status = "Sakit";
    } else {
        $status = "Not Found";
    }
@endphp
<div class="card mt-1 card_izin" kode_izin="{{ $d->kode_izin }}" status_approved="{{ $d->status_approved }}" data-toggle="modal" data-target="#actionSheetIconed">
    <div class="card-body">
        <div class="historicontent">
            <div class="iconabsensi">
                @if ($d->status == "i")
                <ion-icon name="document-text-outline" style="font-size: 47px;" class="text-success"></ion-icon>  
                @elseif ($d->status == "s")
                <ion-icon name="medkit-outline" style="font-size: 47px;" class="text-danger"></ion-icon>
                @elseif ($d->status == "c")
                <ion-icon name="airplane-outline" style="font-size: 47px;" class="text-warning"></ion-icon>
                @endif                
            </div>
            <div class="dataabsensi">
                <h3 style="line-height: 2px;">{{ date("d-m-Y", strtotime($d->tgl_izin_dari)) }} ({{ $status }})</h3>
                <small>{{ date("d-m-Y", strtotime($d->tgl_izin_dari)) }} s/d {{ date("d-m-Y", strtotime($d->tgl_izin_sampai)) }}</small>
                <p>
                    {{ $d->keterangan }}
                    <br>
                    {{-- @if ($d->status == "c")
                        <span class="badge bg-warning">{{ $d->nama_cuti }}</span>
                        <br>
                    @endif --}}
                @if (!empty($d->sid))
                <span style="color: rgba(204, 40, 11, 0.863)">
                <ion-icon name="document-attach-outline"></ion-icon> Lihat DSID
                </span>
                @endif
                </p>
            </div>
                <div class="status">
                    @if ($d->status_approved == 0)
                    <span class="badge bg-warning">Menunggu</span>
                    @elseif ($d->status_approved == "1")
                    <span class="badge bg-primary">Disetujui</span>
                    @elseif ($d->status_approved == "2")
                    <span class="badge bg-danger">Ditolak</span>
                    @endif
                    <p style="margin-top: 5px; font-weight: bold;">{{ hitunghari($d->tgl_izin_dari, $d->tgl_izin_sampai) }} Hari</p>
                </div>
        </div>
    </div>
</div>
<!-- <ul class="listview image-listview">
    <li>
        <div class="item">
            <div class="in">
                <div>
                    <b>{{ date("d-m-Y", strtotime($d->tgl_izin_dari)) }} ({{ $d->status == 's' ? "Sakit" : "Izin" }})</b><br>
                    <small class="text-muted">{{ $d->keterangan }}</small>
                </div>
                @if ($d->status_approved == 0)
                    <span class="badge bg-warning">Menunggu persetujuan</span>
                @elseif($d->status_approved == 1)
                <span class="badge bg-success">Disetujui</span>
                @elseif($d->status_approved == 2)
                <span class="badge bg-danger">Ditolak</span>
                @endif
            </div>
        </div>
    </li>
</ul> -->
@endforeach
</div>
</div>
<div class="fab-button animate bottom-right dropdown" style="margin-bottom:70px">
    <a href="#" class="fab bg-success" data-toggle="dropdown">
        <ion-icon name="add-outline" role ="img" class="my hydrated" aria-label= "add outline"></ion-icon>
    </a>
    <div class="dropdown-menu">
        <a class="dropdown-item bg-success" href="/izinabsen">
            <ion-icon name="document-outline" role ="img" class="my hydrated" aria-label="image outline"></ion-icon>
            <p>Izin</p>
        </a>

        <a class="dropdown-item bg-success" href="/izinsakit">
        <ion-icon name="document-outline" role ="img" class="my hydrated" aria-label= "videocam outline"></ion-icon>
        <p>Sakit</p>
        </a>

        {{-- <a class="dropdown-item bg-success" href="/izincuti">
        <ion-icon name="document-outline" role ="img" class="my hydrated" aria-label= "videocam outline"></ion-icon>
        <p>Cuti</p>
        </a> --}}
    </div>
</div>
 
<div class="modal fade action-sheet" id="actionSheetIconed" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Aksi</h5>
            </div>
            <div class="modal-body" id="showact">
 
            </div>
        </div>
    </div>
</div>

<div class="modal fade dialogbox" id="deleteConfirm" data-backdrop="static" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Yakin Dihapus ?</h5>
            </div>
            <div class="modal-body">
                Data Pengajuan Izin Akan dihapus
            </div>
            <div class="modal-footer">
                <div class="btn-inline">
                    <a href="#" class="btn btn-text-secondary" data-dismiss="modal">Batalkan</a>
                    <a href="" class="btn btn-text-primary" id="hapuspengajuan">Hapus</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('myscript')
    <script>
        $(function () {
           $(".card_izin").click(function(e) {
            var kode_izin = $(this).attr("kode_izin");
            var status_approved = $(this).attr("status_approved");
            
            if (status_approved == 1) {
                Swal.fire({
                    title: 'Ooops !'
                    , text: 'Data Sudah Disetujui, Sudah Tidak Dapat Di Ubah'
                    , icon: 'error'
                })
            } else {
                $("#showact").load('/izin/' + kode_izin + '/showact');
            }
            }); 
        });
    </script>
@endpush