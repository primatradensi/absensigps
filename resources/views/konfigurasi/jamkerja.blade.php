@extends('layouts.admin.tabler')
@section('content')
<div class="page-header d-print-none">
  <div class="container-xl">
    <div class="row g-2 align-items-center">
      <div class="col">
        <!-- Page pre-title -->

        <h1 class="page-title">
          Konfigurasi Jam Kerja
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
                            <a href="#" class="btn btn-success" id="btnTambahJamKerja"> 
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
                                Tambah Data
                            </a>
                        </div>
                    </div>
                
                <div class="row mt-2">
                    <div class="col-12">
                    <table class="table table-bordered">
                <thead> 
                    <tr>
                        <th>No</th>
                        <th>Kode Jam Kerja</th>
                        <th>Nama Jam Keja</th>
                        <th>Awal Jam Masuk</th>
                        <th>Jam Masuk</th>
                        <th>akhir Jam Masuk</th>
                        <th>Jam Pulang</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($jam_kerja as $d)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $d->kode_jam_kerja }}</td>
                        <td>{{ $d->nama_jam_kerja }}</td>
                        <td>{{ $d->awal_jam_masuk }}</td>
                        <td>{{ $d->jam_masuk }}</td>
                        <td>{{ $d->akhir_jam_masuk }}</td>
                        <td>{{ $d->jam_pulang }}</td>
                        <td>
                            <div class="btn-group">
                            <a href="#" class="edit btn btn-info btn-sm" kode_jam_kerja="{{ $d->kode_jam_kerja }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" /><path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" /><path d="M16 5l3 3" />
                            </svg>
                            </a>
                            <form action="/konfigurasi/{{ $d->kode_jam_kerja }}/delete" method="POST"  style="margin-left: 7px">
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

<div class="modal modal-blur fade" id="modal-inputjamkerja" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Tambah Data Jam Kerja</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action="/konfigurasi/storejamkerja" method="POST" id="frmJamKerja">
                @csrf
                <div class="row">
                    <div class="col-12">
                    <div class="input-icon mb-3">
                                <span class="input-icon-addon">
                                  <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                                  <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-barcode" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7v-1a2 2 0 0 1 2 -2h2" /><path d="M4 17v1a2 2 0 0 0 2 2h2" /><path d="M16 4h2a2 2 0 0 1 2 2v1" /><path d="M16 20h2a2 2 0 0 0 2 -2v-1" /><path d="M5 11h1v2h-1z" /><path d="M10 11l0 2" /><path d="M14 11h1v2h-1z" /><path d="M19 11l0 2" /></svg>
                                </span>
                                <input type="text" value="" id="kode_jam_kerja" class="form-control" name="kode_jam_kerja" placeholder="Kode Jam Kerja">
                              </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                    <div class="input-icon mb-3">
                                <span class="input-icon-addon">
                                  <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                                  <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-building-estate" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 21h18" /><path d="M19 21v-4" /><path d="M19 17a2 2 0 0 0 2 -2v-2a2 2 0 1 0 -4 0v2a2 2 0 0 0 2 2z" /><path d="M14 21v-14a3 3 0 0 0 -3 -3h-4a3 3 0 0 0 -3 3v14" /><path d="M9 17v4" /><path d="M8 13h2" /><path d="M8 9h2" /></svg>
                                </span>
                                <input type="text" value="" id="nama_jam_kerja" class="form-control" name="nama_jam_kerja" placeholder="Nama Jam Kerja">
                              </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                    <div class="input-icon mb-3">
                                <span class="input-icon-addon">
                                  <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                                  <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-clock-hour-6" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" /><path d="M12 12v3.5" /><path d="M12 7v5" /></svg>
                                </span>
                                <input type="text" value="" id="awal_jam_masuk" class="form-control" name="awal_jam_masuk" placeholder="Awal Jam Masuk">
                              </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                    <div class="input-icon mb-3">
                                <span class="input-icon-addon">
                                  <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                                  <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-clock-hour-7" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" /><path d="M12 12l-2 3" /><path d="M12 7v5" /></svg>
                                </span>
                                <input type="text" value="" id="jam_masuk" class="form-control" name="jam_masuk" placeholder="Jam Masuk">
                              </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                    <div class="input-icon mb-3">
                                <span class="input-icon-addon">
                                  <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                                  <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-clock-hour-11" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" /><path d="M12 12l-2 -3" /><path d="M12 7v5" /></svg>
                                </span>
                                <input type="text" value="" id="akhir_jam_masuk" class="form-control" name="akhir_jam_masuk" placeholder="Akhir Jam Masuk">
                              </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                    <div class="input-icon mb-3">
                                <span class="input-icon-addon">
                                  <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                                  <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-clock-off" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5.633 5.64a9 9 0 1 0 12.735 12.72m1.674 -2.32a9 9 0 0 0 -12.082 -12.082" /><path d="M12 7v1" /><path d="M3 3l18 18" /></svg>
                                </span>
                                <input type="text" value="" id="jam_pulang" class="form-control" name="jam_pulang" placeholder="Jam Pulang">
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
<div class="modal modal-blur fade" id="modal-editjamkerja" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Edit Data Jam Kerja</h5>
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

        $("#awal_jam_masuk, #jam_masuk, #akhir_jam_masuk, #jam_pulang").mask("00:00");

        $("#btnTambahJamKerja").click(function() {       
            $("#modal-inputjamkerja").modal("show");
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

        $("#frmJamKerja").submit(function() {
            var kode_jam_kerja = $("#kode_jam_kerja").val();
            var nama_jam_kerja = $("#nama_jam_kerja").val();
            var awal_jam_masuk = $("#awal_jam_masuk").val();
            var jam_masuk = $("#jam_masuk").val();
            var akhir_jam_masuk = $("#akhir_jam_masuk").val();
            var jam_pulang = $("#jam_pulang").val();

            if(kode_jam_kerja == "") {  
                Swal.fire({
                title: 'Ooops!'
                , text: 'Kode Jam Kerja Masih Kosong, Harus Diisi'
                , icon: 'error'
                , confirmButtonText: 'OK'
                }).then((result) => {
                    $("#kode_jam_kerja").focus();
                });

                return false;
            } else if (nama_jam_kerja == "") {  
                Swal.fire({
                title: 'Ooops!'
                , text: 'Nama Jam Kerja Masih Kosong, Harus Diisi'
                , icon: 'error'
                , confirmButtonText: 'OK'
                }).then((result) => {
                    $("#nama_jam_kerja").focus();
                });

                return false;
            } else if (awal_jam_masuk == "") {  
                Swal.fire({
                title: 'Ooops!'
                , text: 'Awal Jam Kerja Masih Kosong, Harus Diisi'
                , icon: 'error'
                , confirmButtonText: 'OK'
                }).then((result) => {
                    $("#awal_jam_masuk").focus();
                });

                return false;
            } else if (jam_masuk == "") {  
                Swal.fire({
                title: 'Ooops!'
                , text: 'Jam Masuk Masih Kosong, Harus Diisi'
                , icon: 'error'
                , confirmButtonText: 'OK'
                }).then((result) => {
                    $("#jam_masuk").focus();
                });

                return false;
            } else if (akhir_jam_masuk == "") {  
                Swal.fire({
                title: 'Ooops!'
                , text: 'Akhir Jam Masuk Masih Kosong, Harus Diisi'
                , icon: 'error'
                , confirmButtonText: 'OK'
                }).then((result) => {
                    $("#akhir_jam_masuk").focus();
                });

                return false;
            } else if (jam_pulang == "") {  
                Swal.fire({
                title: 'Ooops!'
                , text: 'Jam Pulang Masih Kosong, Harus Diisi'
                , icon: 'error'
                , confirmButtonText: 'OK'
                }).then((result) => {
                    $("#jam_pulang").focus();
                });

                return false;
            }
        });

        $(".edit").click(function() {     
            var kode_jam_kerja = $(this).attr('kode_jam_kerja'); 
            $.ajax({
                type: 'POST',
                url: '/konfigurasi/editjamkerja',
                cache: false,
                data:{
                    _token: "{{ csrf_token(); }}",
                     kode_jam_kerja : kode_jam_kerja 
                },
                success: function(respond){
                    $("#loadeditform").html(respond);
                }
            }); 
            $("#modal-editjamkerja").modal("show");
        });
    });
</script>
@endpush