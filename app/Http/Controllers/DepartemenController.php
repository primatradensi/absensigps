<?php

namespace App\Http\Controllers;

use App\Models\Departemen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class DepartemenController extends Controller
{
    public function index() 
    {
        $departemen = DB::table('departemen')->orderBy('kode_dept')->get();
        return view('departemen.index', compact('departemen'));
    }


    public function store(Request $request)
    {
        $kode_dept = $request->kode_dept;
        $nama_dept = $request->nama_dept;
        $lokasi_kantor = $request->lokasi_kantor;
        $radius = $request->radius;

        try {
            $data = [
                'kode_dept' => $kode_dept,
                'nama_dept' => $nama_dept,
                'lokasi_kantor' => $lokasi_kantor,
                'radius' => $radius
            ];

            $cek = DB::table('departemen')->where('kode_dept',$kode_dept)->count();
            if($cek > 0) {
                return Redirect::back()->with(['warning' => 'Data Dengan Kode Departemen'. $kode_dept. 'Sudah Ada']);
            }
            $simpan = DB::table('departemen')->insert($data);
            return Redirect::back()->with(['success' => 'Data Berhasil Disimpan']);
        } catch (\Exception $e) {
            return Redirect::back()->with(['warning' => 'Data Gagal Disimpan']);
        }
    }

    public function edit(Request $request) 
    {
        $kode_dept = $request->kode_dept;
        $departemen = DB::table('departemen')->where('kode_dept', $kode_dept)->first();
        return view('departemen.edit', compact('departemen'));

    }

    public function update($kode_dept, Request $request) 
    {
        
        $nama_dept = $request->nama_dept;
        $lokasi_kantor = $request->lokasi_kantor;
        $radius = $request->radius;
        $data = [
            'nama_dept' => $nama_dept,
            'lokasi_kantor' => $lokasi_kantor,
            'radius' => $radius
        ];

        $update = DB::table('departemen')->where('kode_dept', $kode_dept)->update($data);
        if($update) {
            return Redirect::back()->with(['success' => 'Data Berhasil Diupdate']);
        } else {
            return Redirect::back()->with(['warning' => 'Data Gagal Diupdate']);
        }
    }

    public function delete($kode_dept){
        $delete = DB::table('departemen')->where('kode_dept',$kode_dept)->delete();
        if($delete){
            return Redirect::back()->with(['success' => 'Data Berhasil Dihapus']);
        }else{
            return Redirect::back()->with(['warning' => 'Data Gagal Dihapus']);
        }
    }
}
