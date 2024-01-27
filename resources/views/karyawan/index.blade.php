@extends('layouts.admin.tabler')
@section('content')
<div class="page-header d-print-none">
  <div class="container-xl">
    <div class="row g-2 align-items-center">
      <div class="col">
        <!-- Page pre-title -->

        <h1 class="page-title">
          Data Karyawan
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
                            <a href="#" class="btn btn-success" id="btnTambahkaryawan"> 
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
                                Tambah Data
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">    
                    <!-- <form action="/karyawan" method="GET">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <input type="text" name="nama_karyawan" id="nama_karyawan" class="form-control" placeholder="Nama Karyawan">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <select name="kode_dept" id="kode_dept" class="form-select">
                                        <option value="">Departemen</option>
                                        @foreach($departemen as $d)
                                            <option value="{{ $d->kode_dept }}">{{ $d->nama_dept }}</option>
                                        @endforeach
                                    </select>
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
                    </form> -->
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-12">
                        <table class="table table-bordered">
                <thead> 
                    <tr>
                        <th>No</th>
                        <th>NIK</th>
                        <th>Nama</th>
                        <th>Jabatan</th>
                        <th>No. Hp</th>
                        <th>Foto</th>
                        <th>Departemen</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($karyawan as $d)
                    @php
                        $path = Storage::url('uploads/karyawan/'.$d->foto);
                    @endphp
                        <tr>
                            <td>{{ $loop->iteration + $karyawan->firstItem()-1 }}</td>
                            <td>{{ $d->nik }}</td>
                            <td>{{ $d->nama_lengkap }}</td>
                            <td>{{ $d->jabatan }}</td>
                            <td>{{ $d->no_hp }}</td>
                            <td>
                                @if (empty($d->foto))
                                <img src="{{ asset('assets/img/no_foto.jpg') }}" class="avatar" alt="">
                                @else
                                <img src="{{ url($path) }}" class="avatar" alt="">
                                @endif
                                
                            </td>
                            <td>{{ $d->nama_dept }}</td>
                            <td>
                                <div class="d-flex">
                                <div>
                                <a href="#" class="edit btn btn-info btn-sm" nik="{{ $d->nik }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" /><path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" /><path d="M16 5l3 3" />
                                    </svg>
                                </a>
                                <a href="/konfigurasi/{{ $d->nik }}/setjamkerja" class="edit btn btn-success btn-sm ml-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-settings" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10.325 4.317c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756 .426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543 -.826 3.31 -2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756 -2.924 1.756 -3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065z" /><path d="M9 12a3 3 0 1 0 6 0a3 3 0 0 0 -6 0" />
                                    </svg>
                                </a>
                                <a href="/karyawan/{{ Crypt::encrypt($d->nik)}}/resetpassword" class="btn btn-sm btn-warning">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-cloud-lock-open" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M19 18a3.5 3.5 0 0 0 0 -7h-1c.397 -1.768 -.285 -3.593 -1.788 -4.787c-1.503 -1.193 -3.6 -1.575 -5.5 -1s-3.315 2.019 -3.712 3.787c-2.199 -.088 -4.155 1.326 -4.666 3.373c-.512 2.047 .564 4.154 2.566 5.027" /><path d="M8 15m0 1a1 1 0 0 1 1 -1h6a1 1 0 0 1 1 1v3a1 1 0 0 1 -1 1h-6a1 1 0 0 1 -1 -1z" /><path d="M10 15v-2a2 2 0 0 1 3.736 -1" />
                                    </svg>
                                </a>
                                </div>
                                <div>
                                <form action="/karyawan/{{ $d->nik }}/delete" method="POST"  style="margin-left: 4px">
                                    @csrf
                                    <a href="#" class="btn btn-danger btn-sm delete-confirm">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash-filled" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M20 6a1 1 0 0 1 .117 1.993l-.117 .007h-.081l-.919 11a3 3 0 0 1 -2.824 2.995l-.176 .005h-8c-1.598 0 -2.904 -1.249 -2.992 -2.75l-.005 -.167l-.923 -11.083h-.08a1 1 0 0 1 -.117 -1.993l.117 -.007h16z" stroke-width="0" fill="currentColor" /><path d="M14 2a2 2 0 0 1 2 2a1 1 0 0 1 -1.993 .117l-.007 -.117h-4l-.007 .117a1 1 0 0 1 -1.993 -.117a2 2 0 0 1 1.85 -1.995l.15 -.005h4z" stroke-width="0" fill="currentColor" />
                                    </svg>
                                </a>
                                </form>
                                </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $karyawan->links('vendor.pagination.bootstrap-4') }}
            </div>
        </div>
        </div>     
        </div>
        </div>
    </div>
    </div>
</div>

<div class="modal modal-blur fade" id="modal-inputkaryawan" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Tambah Data Karyawan</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action="/karyawan/store" method="POST" id="frmKaryawan" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-12">
                    <div class="input-icon mb-3">
                                <span class="input-icon-addon">
                                  <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                                  <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-barcode" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7v-1a2 2 0 0 1 2 -2h2" /><path d="M4 17v1a2 2 0 0 0 2 2h2" /><path d="M16 4h2a2 2 0 0 1 2 2v1" /><path d="M16 20h2a2 2 0 0 0 2 -2v-1" /><path d="M5 11h1v2h-1z" /><path d="M10 11l0 2" /><path d="M14 11h1v2h-1z" /><path d="M19 11l0 2" /></svg>
                                </span>
                                <input type="text" maxlength="7" value="" id="nik" class="form-control" name="nik" placeholder="NIK">
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
                                <input type="text" value="" id="nama_lengkap" class="form-control" name="nama_lengkap" placeholder="Nama Karyawan">
                              </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                    <div class="input-icon mb-3">
                                <span class="input-icon-addon">
                                  <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                                  <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-building" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 21l18 0" /><path d="M9 8l1 0" /><path d="M9 12l1 0" /><path d="M9 16l1 0" /><path d="M14 8l1 0" /><path d="M14 12l1 0" /><path d="M14 16l1 0" /><path d="M5 21v-16a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v16" /></svg>
                                </span>
                                <input type="text" id="jabatan" value="" class="form-control" name="jabatan" placeholder="Jabatan">
                              </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                    <div class="input-icon mb-3">
                                <span class="input-icon-addon">
                                  <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                                  <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-phone" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 4h4l2 5l-2.5 1.5a11 11 0 0 0 5 5l1.5 -2.5l5 2v4a2 2 0 0 1 -2 2a16 16 0 0 1 -15 -15a2 2 0 0 1 2 -2" /></svg>
                                </span>
                                <input type="text" id="no_hp" value="" class="form-control" name="no_hp" placeholder="No. Hp">
                              </div>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-12">
                        <input type="file" name="foto" class="form-control">
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-12">
                    <select name="kode_dept" id="kode_dept" class="form-select">
                        <option value="">Departemen</option>
                            @foreach($departemen as $d)
                        <option {{ Request('kode_dept')==$d->kode_dept ? 'selected' : '' }} value="{{ $d->kode_dept }}">{{ $d->nama_dept }}</option>
                            @endforeach
                    </select>
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
    <div class="modal modal-blur fade" id="modal-editkaryawan" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Update Data Karyawan</h5>
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

        $("#nik").mask("0000000");
        $("#no_hp").mask("0000000000000");
        $("#btnTambahkaryawan").click(function() {       
            $("#modal-inputkaryawan").modal("show");
        });

        $(".edit").click(function() {     
            var nik = $(this).attr('nik'); 
            $.ajax({
                type: 'POST',
                url:'/karyawan/edit',
                cache:false,
                data:{
                    _token:"{{ csrf_token(); }}"
                    , nik: nik
                },
                success:function(respond){
                    $("#loadeditform").html(respond);
                }
            }); 
            $("#modal-editkaryawan").modal("show");
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

        $("#frmKaryawan").submit(function() {
            var nik = $("#nik").val();
            var nama_lengkap = $("#nama_lengkap").val();
            var jabatan = $("#jabatan").val();
            var no_hp = $("#no_hp").val();
            var kode_dept = $("#kode_dept").val();
            if(nik=="") {
                // alert('Nik Harus Diisi');
                Swal.fire({
                title: 'Ooops!'
                , text: 'Nik Masih Kosong, Harus Diisi'
                , icon: 'error'
                , confirmButtonText: 'OK'
                }).then((result) => {
                    $("#nik").focus();
                });

                return false;
            } else if (nama_lengkap=="") {
                Swal.fire({
                title: 'Ooops!'
                , text: 'Nama Karyawan Masih Kosong, Harus Diisi'
                , icon: 'error'
                , confirmButtonText: 'OK'
                }).then((result) => {
                    $("#nama_lengkap").focus();
                });

                return false;
            } else if (jabatan=="") {
                Swal.fire({
                title: 'Ooops!'
                , text: 'Jabatan Masih Kosong, Harus Diisi'
                , icon: 'error'
                , confirmButtonText: 'OK'
                }).then((result) => {
                    $("#jabatan").focus();
                });
                
                return false;
            } else if (no_hp=="") {
                Swal.fire({
                title: 'Ooops!'
                , text: 'No Hp Masih Kosong, Harus Diisi'
                , icon: 'error'
                , confirmButtonText: 'OK'
                }).then((result) => {
                    $("#jabatan").focus();
                });
                
                return false;
            }  else if (kode_dept=="") {
                Swal.fire({
                title: 'Ooops!'
                , text: 'Departemen Masih Kosong, Harus Diisi'
                , icon: 'error'
                , confirmButtonText: 'OK'
                }).then((result) => {
                    $("#kode_dept").focus();
                });
                
                return false;
            }
        });
    });
</script>
@endpush