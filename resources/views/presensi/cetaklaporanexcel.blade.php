<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Laporan Absensi</title>

  <!-- Normalize or reset CSS with your favorite library -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/7.0.0/normalize.min.css">

  <!-- Load paper.css for happy printing -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.4.1/paper.css">

  <!-- Set page size here: A5, A4 or A3 -->
  <!-- Set also "landscape" if you need -->
  <style>
    @page { 
        size: A4 
    }

    h3{
        font-family: Arial, Helvetica, sans-serif
    }

    .tabeldatakaryawan{
        margin-top: 20px;
    }

    .tabeldatakaryawan td{
        padding: 5px;
    }

    .tabelabsensi{
        width: 100%;
        margin-top: 20px;
        border-collapse: collapse;
    }

    .tabelabsensi tr th {
        border: 1px solid #131212;
        padding: 7px;
        background-color: #dbdbdb;
    }

    .tabelabsensi tr td {
        border: 1px solid #131212;
        padding: 4px;
        font-size: 14px;
    }

    .foto {
        width: 50px;
        height: 40px;
    }
    
  </style>
</head>

<!-- Set "A5", "A4" or "A3" for class name -->
<!-- Set also "landscape" if you need -->
<body class="A4">
    <?php
    function selisih($jam_in, $jam_out)
    {
        list($h, $m, $s) = explode(":", $jam_in);
        $dtAwal = mktime($h, $m, $s, "1", "1", "1");
        list($h, $m, $s) = explode(":", $jam_out);
        $dtAkhir = mktime($h, $m, $s, "1", "1", "1");
        $dtSelisih = $dtAkhir - $dtAwal;
        $totalmenit = $dtSelisih / 60;
        $jam = explode(".", $totalmenit / 60);
        $sisamenit = ($totalmenit / 60) - $jam[0];
        $sisamenit2 = $sisamenit * 60;
        $jml_jam = $jam[0];
        return $jml_jam . ":" . round($sisamenit2);
    }
    ?>
  <!-- Each sheet element should have the class "sheet" -->
  <!-- "padding-**mm" is optional: you can set 10, 15, 20 or 25 -->
  <section class="sheet padding-10mm">

    <table style="width: 100%">
        <tr>
            <td style="width: 40px">
                <img src="{{ asset('assets/img/logoabsensi.png') }}" width="130" height="67" alt="logo Absens KPT">
            </td>
            <td>
                <h3>
                    LAPORAN ABSENSI KARYAWAN <br>
                    PERIODE {{ strtoupper($namabulan[$bulan]) }} {{ $tahun }} <br>
                    KACE PRIMA TRADENSI <br> 
                </h3>
            </td>
        </tr>
    </table>
    <table class="tabeldatakaryawan">
        <tr>
            <td>NIK</td>
            <td>:</td>
            <td>{{ $karyawan->nik }}</td>
        </tr>
        <tr>
            <td>Nama Karyawan</td>
            <td>:</td>
            <td>{{ $karyawan->nama_lengkap }}</td>
        </tr>
        <tr>
            <td>Jabatan</td>
            <td>:</td>
            <td>{{ $karyawan->jabatan }}</td>
        </tr>
        <tr>
            <td>Departemen</td>
            <td>:</td>
            <td>{{ $karyawan->nama_dept }}</td>
        </tr>
        <tr>
            <td>No Hp</td>
            <td>:</td>
            <td>{{ $karyawan->no_hp }}</td>
        </tr>
    </table>
    <table class="tabelabsensi">
        <tr>
            <th>No.</th>
            <th>Tanggal</th>
            <th>Jam Masuk</th>
            <th>Jam Pulang</th>
            <th>Keterangan</th>
            <th>Jumlah Jam</th>
        </tr>
        @foreach ($presensi as $d)
        @php
            $jamterlambat = selisih('07:00:00', $d->jam_in);
        @endphp
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ date("d-m-Y",strtotime($d->tgl_presensi)) }}</td>
            <td>{{ $d->jam_in }}</td>

            <td>{{ $d->jam_out != null ? $d->jam_out : 'Belum Absen' }}</td>

            <td>
                @if($d->jam_in > '07:00')
                Terlambat {{ $jamterlambat }}
                @else
                Tepat Waktu
                @endif
            </td>
            <td>
                @if($d->jam_out != null)
                    @php
                        $jmljamkerja = selisih($d->jam_in,$d->jam_out);
                    @endphp
                    @else
                    @php
                        $jmljamkerja = 0;
                    @endphp
                @endif
                {{ $jmljamkerja }}
            </td>
        </tr>
        @endforeach
    </table>
    <table width="100%" style="margin-top:100px">
    <tr>
        <td colspan="2" style="text-align: right;">Kalimantan Timur, {{ date('d-m-Y') }}</td>
    </tr>
    <tr>
        <td style="text-align: center; vertical-align:bottom" height="150px">
            <u>{{ $karyawan->nama_lengkap }}</u><br>
            <i><b>{{ $karyawan->jabatan }}</b></i>
        </td>
        <td style="text-align: center;  vertical-align:bottom">
            <u>Arif Budiman</u><br>
            <i><b>Direktur</b></i>
        </td>
    </tr>
    
    </table>
    
  </section>

</body>

</html>