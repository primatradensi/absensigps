<form action="/storekoreksiabsensi" method="POST" id="formKoreksiabsensi">
    @csrf
    <input type="hidden" name="nik" value="{{ $karyawan->nik }}">
    <input type="hidden" name="nik" value="{{ $tanggal }}">
    <table class="table">
        <tr>
            <td>Nik</td>
            <td>{{ $karyawan->nik }}</td>
        </tr>
        <tr>
            <td>Nama Karyawan</td>
            <td>{{ $karyawan->nama_lengkap }}</td>
        </tr>
        <tr>
            <td>Tanggal</td>
            <td>{{ date('d-m-Y', strtotime($tanggal)) }}</td>
        </tr>
    </table>
    <div class="row mb-2">
        <div class="col-12">
            <div class="input-icon">
                <span class="input-icon-addon">
                <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-clock-check" width="24" 
                        height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" 
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path d="M20.942 13.021a9 9 0 1 0 -9.407 7.967" />
                        <path d="M12 7v5l3 3" />
                        <path d="M15 19l2 2l4 -4" />
                    </svg>
                </span>
                <input type="text" id="jam_in" class="form-control" name="jam_in" 
                    placeholder="Jam Masuk">
            </div>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-12">
            <div class="input-icon">
                <span class="input-icon-addon">
                <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-clock-check" width="24" 
                        height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" 
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path d="M20.942 13.021a9 9 0 1 0 -9.407 7.967" />
                        <path d="M12 7v5l3 3" />
                        <path d="M15 19l2 2l4 -4" />
                    </svg>
                </span>
                <input type="text" id="jam_out" class="form-control" name="jam_out" 
                    placeholder="Jam Pulang">
            </div>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-12">
            <div class="form-group">
                <select name="kode_jam_kerja" id="kode_jam_kerja" class="form-select">
                    <option value="">Pilih Jam Kerja</option>
                    @foreach ($jamkerja as $d)
                        <option value="{{ $d->kode_jam_kerja }}">{{ $d->nama_jam_kerja }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-12">
            <div class="form-group">
                <select name="status" id="status" class="form-select">
                    <option value="">Pilih Status Kehadiran</option>
                    <option value="h"> Hadir </option>
                    <option value="a"> Alfa </option>
                </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="form-group">
                <button class="btn btn-success w-100"> Simpan </button>
            </div>
        </div>
    </div>
</form>

<script>
    $(function() {
        $("#formKoreksiabsensi").submit(function() {
            var kode_jam_kerja = $("#kode_jam_kerja").val();
            var status = $("#status").val();

            if(kode_jam_kerja=="") {
                Swal.fire({
                title: 'Ooops!'
                , text: 'Kode Jam Kerja, Harus Dipilih'
                , icon: 'error'
                , confirmButtonText: 'OK'
                }).then((result) => {
                    $("#kode_jam_kerja").focus();
                });
                return false;
            }else if(status=="") {
                Swal.fire({
                title: 'Ooops!'
                , text: 'Status Masih Kosong, Harus Dipilih'
                , icon: 'error'
                , confirmButtonText: 'OK'
                }).then((result) => {
                    $("#status").focus();
                });
                return false;
            }
        });
    });
</script>