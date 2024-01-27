@extends('layouts.admin.tabler')
@section('content')
<div class="page-header d-print-none">
  <div class="container-fluid">
    <div class="row g-2 align-items-center">
      <div class="col">
        <!-- Page pre-title -->

        <h1 class="page-title">
            Monitoring Absensi
        </h1>
      </div>

    </div>
  </div>
</div>
<div class="page-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        {{-- <div class="row">
                            <div class="col-12">
                                @if (Session::get('success'))
                                <div class="alert alert-success">
                                    {{ Session::get('success') }}
                                </div>
                                @endif
    
                                @if (Session::get('warning'))
                                <div class="alert alert-warning">
                                    {{ Session::get('warning') }}
                                </div>
                                @endif
                            </div>
                        </div> --}}
                        <div class="row">
                            <div class="col-6">
                            <div class="input-icon mb-3">
                                <span class="input-icon-addon">
                                  <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                                  <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-calendar-time" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M11.795 21h-6.795a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v4" /><path d="M18 18m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" /><path d="M15 3v4" /><path d="M7 3v4" /><path d="M3 11h16" /><path d="M18 16.496v1.504l1 1" /></svg>
                                </span>
                                <input type="text"  id="tanggal" value="{{ date("Y-m-d") }}" name="tanggal" value="" class="form-control" placeholder="Tanggal Absensi" autocomplete="off">
                              </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <select name="kode_dept" id="kode_dept" class="form-select">
                                        <option value="">Semua Departemen</option>
                                        @foreach ($departemen as $d)
                                            <option
                                            {{ Request('kode_dept') == $d->kode_dept ? 'selected' : '' }}
                                            value = "{{ $d->kode_dept }}">
                                            {{ strtoupper($d->nama_dept) }}</option>
                                        @endforeach
                                    </select>
                                  </div>
                                </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nik</th>
                                            <th>Nama Karyawan</th>
                                            <th>Departemen</th>
                                            <th>Jadwal</th>
                                            <th>Jam Masuk</th>
                                            <th>Foto</th>
                                            <th>Jam Pulang</th>
                                            <th>Foto</th>
                                            <th>Status</th>
                                            <th>Keterangan</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody id="loadpresensi"></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 
</div>
<div class="modal modal-blur fade" id="modal-tampilkanpeta" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Lokasi Absen karyawan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="loadmap">

            </div>
        </div>
    </div>
</div>
<div class="modal modal-blur fade" id="modal-koreksiabsensi" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Koreksi Absensi</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" id="loadkoreksiabsensi">

      </div>
      </div>
    </div>
  </div>
@endsection
@push('myscript')
<script>
    $(function () {
        $("#tanggal").datepicker({ 
        autoclose: true, 
        todayHighlight: true,
        format:"yyyy-mm-dd"
    });


    function loadpresensi() {
        var tanggal = $("#tanggal").val();
        var kode_dept = $("#kode_dept").val();
        $.ajax({
            type:'POST',
            url:'/getpresensi',
            data:{
                _token:"{{ csrf_token() }}",
                tanggal: tanggal,
                kode_dept : kode_dept
            },
            cache:false,
            success:function(respond){
                $("#loadpresensi").html(respond);
            }
        });
    }
    $("#tanggal").change(function(e) {
        loadpresensi();
    });

    $("#kode_dept").change(function(e) {
        loadpresensi();
    });
    loadpresensi();

});
</script>
@endpush