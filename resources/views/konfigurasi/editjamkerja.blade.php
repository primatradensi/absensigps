<form action="/konfigurasi/updatejamkerja" method="POST" id="frmJamKerja">
                @csrf
                <div class="row">
                    <div class="col-12">
                    <div class="input-icon mb-3">
                                <span class="input-icon-addon">
                                  <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                                  <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-barcode" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7v-1a2 2 0 0 1 2 -2h2" /><path d="M4 17v1a2 2 0 0 0 2 2h2" /><path d="M16 4h2a2 2 0 0 1 2 2v1" /><path d="M16 20h2a2 2 0 0 0 2 -2v-1" /><path d="M5 11h1v2h-1z" /><path d="M10 11l0 2" /><path d="M14 11h1v2h-1z" /><path d="M19 11l0 2" /></svg>
                                </span>
                                <input type="text" value="{{ $jamkerja->kode_jam_kerja }}" id="kode_jam_kerja" class="form-control" name="kode_jam_kerja" placeholder="Kode Jam Kerja">
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
                                <input type="text" value="{{ $jamkerja->nama_jam_kerja }}" id="nama_jam_kerja" class="form-control" name="nama_jam_kerja" placeholder="Nama Jam Kerja">
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
                                <input type="text" value="{{ $jamkerja->awal_jam_masuk }}" id="awal_jam_masuk" class="form-control" name="awal_jam_masuk" placeholder="Awal Jam Masuk">
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
                                <input type="text" value="{{ $jamkerja->jam_masuk }}" id="jam_masuk" class="form-control" name="jam_masuk" placeholder="Jam Masuk">
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
                                <input type="text" value="{{ $jamkerja->akhir_jam_masuk }}" id="akhir_jam_masuk" class="form-control" name="akhir_jam_masuk" placeholder="Akhir Jam Masuk">
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
                                <input type="text" value="{{ $jamkerja->jam_pulang }}" id="jam_pulang" class="form-control" name="jam_pulang" placeholder="Jam Pulang">
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