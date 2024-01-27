<style>
    .historicontent {
        display: flex;
        margin-top: 15px;
    }

    .dataabsensi {
        margin-left: 10px;
    }
    
    .card {
        margin-top: 7px;
        border: 1px solid rgb(21, 163, 45);
    }
</style>

@if ($history->isEmpty())
<div class="alert alert-outline warning" style="margin-top: 17px">
    <p>Data Yang Anda Cari Belum Ada</p>
</div>
@endif
@foreach ($history as $d)
@if ($d->status == "h")
                        <div class="card">
                            <div class="card-body">
                                <div class="historicontent">
                                    <div class="iconabsensi">
                                        <ion-icon name="finger-print-outline" style="font-size: 47px;" class="text-success"></ion-icon>
                                    </div>
                                    <div class="dataabsensi">
                                        <h3 style="line-height: 2px;">{{ $d->nama_jam_kerja }}</h3>
                                        <h4 style="margin:0px !important">{{ date("d-m-Y", strtotime($d->tgl_presensi)) }}</h4>
                                        <span>
                                            {!! $d->jam_in != null ? date("H:i",strtotime($d->jam_in)) : '<span class="text-danger">Belum Absen</span>' !!}
                                        </span>
                                        <span>
                                            {!! $d->jam_out != null ? "-". date("H:i",strtotime($d->jam_out)) : '<span class="text-danger">- Belum Absen</span>' !!}
                                        </span>
                                        <div id="keterangan" ></div>
                                        @php
                                        $jam_in = date("H:i", strtotime($d->jam_in));

                                        $jam_masuk = date("H:i", strtotime($d->jam_masuk));

                                        $jadwal_jam_masuk = $d->tgl_presensi." ".$jam_masuk;
                                        $jam_presensi = $d->tgl_presensi." ".$jam_in;
                                        @endphp
                                        @if ($jam_in > $jam_masuk)
                                        @php
                                            $jmlterlambat = hitungjamterlambat($jadwal_jam_masuk,$jam_presensi);
                                            $jmlterlambatdesimal = hitungjamterlambatdesimal($jadwal_jam_masuk,$jam_presensi);
                                        @endphp
                                        <span class="danger">Terlambat - {{ $jmlterlambat }} menit ({{ $jmlterlambatdesimal }} jam)</span>
                                        @else
                                        <span style="color: green">Tepat Waktu</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        @elseif ($d->status == "i")
                        <div class="card">
                            <div class="card-body">
                                <div class="historicontent">
                                    <div class="iconabsensi">
                                        <ion-icon name="document-text-outline" style="font-size: 47px;" class="text-primary"></ion-icon>
                                    </div>
                                    <div class="dataabsensi">
                                        <h3 style="line-height: 2px;">I Z I N - {{ $d->kode_izin }}</h3>
                                        <h4 style="margin:0px !important">{{ date("d-m-Y", strtotime($d->tgl_presensi)) }}</h4>
                                        <span>
                                            {{ $d->keterangan }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @elseif ($d->status == "s")
                        <div class="card">
                            <div class="card-body">
                                <div class="historicontent">
                                    <div class="iconabsensi">
                                        <ion-icon name="medkit-outline" style="font-size: 47px;" class="text-danger"></ion-icon>
                                    </div>
                                    <div class="dataabsensi">
                                        <h3 style="line-height: 2px;">S A K I T - {{ $d->kode_izin }}</h3>
                                        <h4 style="margin:0px !important">{{ date("d-m-Y", strtotime($d->tgl_presensi)) }}</h4>
                                        <span>
                                            {{ $d->keterangan }}
                                        </span>
                                        <br>
                                        <span style="color: rgba(204, 40, 11, 0.863)">
                                            <ion-icon name="document-attach-outline"></ion-icon> Lihat DSID
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
@endforeach