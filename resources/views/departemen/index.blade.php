@extends('layouts.admin.tabler')
@section('content')
<div class="page-header d-print-none">
  <div class="container-xl">
    <div class="row g-2 align-items-center">
      <div class="col">
        <!-- Page pre-title -->

        <h1 class="page-title">
          Data Departemen
        </h1>
      </div>

    </div>
  </div>
</div>
<div class="page-body">
    <div class="container-xl">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
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
                    </div>
                    <div class="row">
                        <div class="col">
                            <a href="#" class="btn btn-success" id="btnTambahDepartemen"> 
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
                                Tambah Data
                            </a>
                        </div>
                    </div>
                <!-- <div class="row mt-2">
                    <div class="col-12">
                    <form action="/departemen" method="GET">
                        <div class="row">
                            <div class="col-10">
                                <div class="form-group">
                                    <input type="text" name="nama_dept" id="nama_dept" class="form-control" placeholder="Departemen">
                                </div>
                            </div>
                        <div class="col-2">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-search" 
                                    width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" 
                                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                        <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" />
                                        <path d="M21 21l-6 -6" />
                                </svg>
                                Cari
                                </button>
                            </div>
                        </div>
                    </div>
                    </form>
                    </div>
                </div> -->
                <div class="row mt-2">
                    <div class="col-12">
                    <table class="table table-bordered">
                <thead> 
                    <tr>
                        <th>No</th>
                        <th>Kode Departemen</th>
                        <th>Nama Departemen</th>
                        <th>Lokasi</th>
                        <th>Radius</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($departemen as $d)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $d->kode_dept }}</td>
                        <td>{{ $d->nama_dept }}</td>
                        <td>{{ $d->lokasi_kantor }}</td>
                        <td>{{ $d->radius }} Meter</td>
                        <td>
                            <div class="btn-group">
                            <a href="#" class="edit btn btn-info btn-sm" kode_dept="{{ $d->kode_dept }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" /><path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" /><path d="M16 5l3 3" />
                            </svg>
                            </a>
                            <form action="/departemen/{{ $d->kode_dept }}/delete" method="POST"  style="margin-left: 7px">
                            @csrf
                            <a href="#" class="btn btn-danger btn-sm delete-confirm">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash-filled" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M20 6a1 1 0 0 1 .117 1.993l-.117 .007h-.081l-.919 11a3 3 0 0 1 -2.824 2.995l-.176 .005h-8c-1.598 0 -2.904 -1.249 -2.992 -2.75l-.005 -.167l-.923 -11.083h-.08a1 1 0 0 1 -.117 -1.993l.117 -.007h16z" stroke-width="0" fill="currentColor" /><path d="M14 2a2 2 0 0 1 2 2a1 1 0 0 1 -1.993 .117l-.007 -.117h-4l-.007 .117a1 1 0 0 1 -1.993 -.117a2 2 0 0 1 1.85 -1.995l.15 -.005h4z" stroke-width="0" fill="currentColor" />
                            </svg>
                            </a>
                            </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
            </div>
            </div>
        </div>
        </div>     
        </div>
        </div>
    </div>
    </div>
</div>

<div class="modal modal-blur fade" id="modal-inputdepartemen" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Tambah Data Departemen</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action="/departemen/store" method="POST" id="frmDepartemen">
                @csrf
                <div class="row">
                    <div class="col-12">
                    <div class="input-icon mb-3">
                                <span class="input-icon-addon">
                                  <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                                  <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-barcode" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7v-1a2 2 0 0 1 2 -2h2" /><path d="M4 17v1a2 2 0 0 0 2 2h2" /><path d="M16 4h2a2 2 0 0 1 2 2v1" /><path d="M16 20h2a2 2 0 0 0 2 -2v-1" /><path d="M5 11h1v2h-1z" /><path d="M10 11l0 2" /><path d="M14 11h1v2h-1z" /><path d="M19 11l0 2" /></svg>
                                </span>
                                <input type="text" value="" id="kode_dept" class="form-control" name="kode_dept" placeholder="Kode Dept">
                              </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                    <div class="input-icon mb-3">
                                <span class="input-icon-addon">
                                  <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                                  <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" /><path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" /></svg>
                                </span>
                                <input type="text" value="" id="nama_dept" class="form-control" name="nama_dept" placeholder="Nama Departemen">
                              </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                    <div class="input-icon mb-3">
                                <span class="input-icon-addon">
                                  <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                                  <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-map-pin-filled" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M18.364 4.636a9 9 0 0 1 .203 12.519l-.203 .21l-4.243 4.242a3 3 0 0 1 -4.097 .135l-.144 -.135l-4.244 -4.243a9 9 0 0 1 12.728 -12.728zm-6.364 3.364a3 3 0 1 0 0 6a3 3 0 0 0 0 -6z" stroke-width="0" fill="currentColor" />
                              </svg>
                                </span>
                                <input type="text" value="" id="lokasi_kantor" class="form-control" name="lokasi_kantor" placeholder="Lokasi Departemen">
                              </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                    <div class="input-icon mb-3">
                                <span class="input-icon-addon">
                                  <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                                  <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-radar-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" /><path d="M15.51 15.56a5 5 0 1 0 -3.51 1.44" /><path d="M18.832 17.86a9 9 0 1 0 -6.832 3.14" /><path d="M12 12v9" />
                              </svg>
                                </span>
                                <input type="text" value="" id="radius" class="form-control" name="radius" placeholder="Radius">
                              </div>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-12">
                        <div class="from-group">
                        <button class="btn btn-primary w-100">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-telegram" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M15 10l-4 4l6 6l4 -16l-18 7l4 2l2 6l3 -4" /></svg>
                            Simpan
                        </button>
                        </div>
                    </div>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>
<!-- Modal Edit -->
    <div class="modal modal-blur fade" id="modal-editdepartemen" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Edit Data Departemen</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body" id="loadeditform">

        </div>
        </div>
      </div>
    </div>
@endsection


@push('myscript')
<script>
    $(function() {
        $("#btnTambahDepartemen").click(function() {       
            $("#modal-inputdepartemen").modal("show");
        });

        $(".edit").click(function() {     
            var kode_dept = $(this).attr('kode_dept'); 
            $.ajax({
                type: 'POST',
                url: '/departemen/edit',
                cache: false,
                data:{
                    _token: "{{ csrf_token(); }}",
                     kode_dept : kode_dept 
                },
                success: function(respond){
                    $("#loadeditform").html(respond);
                }
            }); 
            $("#modal-editdepartemen").modal("show");
        });

        $(".delete-confirm").click(function(e){
            var form = $(this).closest('form');
            e.preventDefault();
            Swal.fire({
            title: "Apakah Anda Yakin?",
            text: "Anda Ingin Menghapus Data ini Secara Permanen!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ya, Hapus Data!"
            }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
                Swal.fire({
                title: "Deleted!",
                text: "Data Berhasil Dihapus.",
                icon: "success"
                });
            }
            });
        });

        $("#frmDepartemen").submit(function() {
            var kode_dept = $("#kode_dept").val();
            var nama_dept = $("#nama_dept").val();
            var lokasi_kantor = $("#lokasi_kantor").val();
            var radius = $("#radius").val();

            if(kode_dept == "") {  
                Swal.fire({
                title: 'Ooops!'
                , text: 'Kode Departemen Masih Kosong, Harus Diisi'
                , icon: 'error'
                , confirmButtonText: 'OK'
                }).then((result) => {
                    $("#kode_dept").focus();
                });

                return false;
            } else if (nama_dept=="") {
                Swal.fire({
                title: 'Ooops!'
                , text: 'Nama Departemen Masih Kosong, Harus Diisi'
                , icon: 'error'
                , confirmButtonText: 'OK'
                }).then((result) => {
                    $("#nama_dept").focus();
                });

                return false;
            } else if (lokasi_kantor =="") {
                Swal.fire({
                title: 'Ooops!'
                , text: 'Lokasi Departemen Masih Kosong, Harus Diisi'
                , icon: 'error'
                , confirmButtonText: 'OK'
                }).then((result) => {
                    $("#nama_dept").focus();
                });

                return false;
            } else if (radius =="") {
                Swal.fire({
                title: 'Ooops!'
                , text: 'Radius Masih Kosong, Harus Diisi'
                , icon: 'error'
                , confirmButtonText: 'OK'
                }).then((result) => {
                    $("#nama_dept").focus();
                });

                return false;
            }
        });
    });
</script>
@endpush