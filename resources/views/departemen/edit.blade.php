<form action="/departemen/{{ $departemen->kode_dept }}/update" method="POST" id="frmDepartemenEdit">
                @csrf
                <div class="row">
                    <div class="col-12">
                    <div class="input-icon mb-3">
                                <span class="input-icon-addon">
                                  <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                                  <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-barcode" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7v-1a2 2 0 0 1 2 -2h2" /><path d="M4 17v1a2 2 0 0 0 2 2h2" /><path d="M16 4h2a2 2 0 0 1 2 2v1" /><path d="M16 20h2a2 2 0 0 0 2 -2v-1" /><path d="M5 11h1v2h-1z" /><path d="M10 11l0 2" /><path d="M14 11h1v2h-1z" /><path d="M19 11l0 2" /></svg>
                                </span>
                                <input type="text" value="{{ $departemen->kode_dept }}" id="nik" class="form-control" name="kode_dept" placeholder="Kode Dept" readonly>
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
                                <input type="text" value="{{ $departemen->nama_dept }}" id="nama_dept" class="form-control" name="nama_dept" placeholder="Nama Departemen">
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
                                <input type="text" value="{{ $departemen->lokasi_kantor }}" id="lokasi_kantor" class="form-control" name="lokasi_kantor" placeholder="Lokasi Departemen">
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
                                <input type="text" value="{{ $departemen->radius }}" id="radius" class="form-control" name="radius" placeholder="Lokasi Departemen">
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
          <script>
            $("#frmDepartemenEdit").submit(function() {
            var kode_dept = $("#frmDepartemenEdit").find("#kode_dept").val();
            var nama_dept = $("#frmDepartemenEdit").find("#nama_dept").val();
            var lokasi_kantor = $("#frmDepartemenEdit").find("#lokasi_kantor").val();
            var radius = $("#frmDepartemenEdit").find("#radius").val();

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
    </script>