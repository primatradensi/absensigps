<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Laporan Rekap Absensi</title>

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
        font-size: 10px;
    }

    .tabelabsensi tr td {
        border: 1px solid #131212;
        padding: 2px;
        font-size: 14px;
    }

    .foto {
        width: 50px;
        height: 40px;
    }
    
    body.A4.landscape.sheet {
        width: 297mm !important;
        height: auto !important;
    }
  </style>
</head>

<!-- Set "A5", "A4" or "A3" for class name -->
<!-- Set also "landscape" if you need -->
<body class="A4 landscape">
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
                    REKAP ABSENSI KARYAWAN <br>
                    PERIODE {{ strtoupper($namabulan[$bulan]) }} {{ $tahun }} <br>
                    KACE PRIMA TRADENSI <br> 
                </h3>
            </td>
        </tr>
    </table>
    <table class="tabelabsensi">
        <tr>
            <th rowspan="2">Nik</th>
            <th rowspan="2">Nama Karyawan</th>
            <th colspan="{{ $jmlhari }}">Bulan {{ $namabulan[$bulan] }}</th>
            <th rowspan="2">H</th>
            <th rowspan="2">I</th>
            <th rowspan="2">S</th>
            <th rowspan="2">A</th>
        </tr>
        <tr>
            @foreach ($rangetanggal as $d )
            @if ($d != NULL)
            <th>{{ date("d", strtotime($d)) }}</th>
            @endif
            @endforeach
        </tr>

        @foreach ($rekap as $r) 
        <tr>
            <td>{{ $r->nik }}</td>
            <td>{{ $r->nama_lengkap }}</td>
                <?php
                    $jml_hadir = 0;
                    $jml_izin = 0;
                    $jml_sakit = 0;
                    $jml_alpa = 0;
                    $color = 0;
                    for($i=1; $i<=$jmlhari; $i++ ) {
                        $tgl = 'tgl_'.$i;
                        $datapresensi = explode("|", $r->$tgl);
                        if($r->$tgl != NULL) {
                            $status = $datapresensi[2]; 
                        }else {
                            $status = "";
                        }

                        if($status == "h") {
                            $jml_hadir += 1;
                            $color = "#FFC0CB";
                        } 

                        if($status == "i") {
                            $jml_izin += 1;
                            $color = "#ffbb00";
                        } 

                        if($status == "s") {
                            $jml_sakit += 1;
                            $color = "#34a1eb";
                        } 

                        if(empty($status)) {
                            $jml_alpa += 1;
                            $color = "red";
                        } 
                ?>
                <td style="background-color: {{$color}}">
                    {{ $status }}
                </td>
                <?php
                    }
                ?>
                <td>{{ !empty($jml_hadir) ? $jml_hadir : "" }}</td>
                <td>{{ !empty($jml_izin) ? $jml_izin : "" }}</td>
                <td>{{ !empty($jml_sakit) ? $jml_sakit : "" }}</td>
                <td>{{ !empty($jml_alpa) ? $jml_alpa : "" }}</td>
                
        </tr>
        @endforeach
    </table>
    
    <table width="100%" style="margin-top:30px">
    <tr>
        <td  style="text-align: right;">Kalimantan Timur, {{ date('d-m-Y') }}</td>
    </tr>
    <tr>
        <td  style="text-align: right;  vertical-align:bottom" height="110px;">
            <u>Arif Budiman</u><br>
            <i><b>Direktur</b></i>
        </td>
    </tr>
    </table>
  </section>

</body>

</html>