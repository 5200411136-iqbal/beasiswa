<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\mahasiswa;

class MahasiswaController extends Controller
{
    public function index(){
        return mahasiswa::all();
    }

    public function create(request $request){
        $mahasiswa = new mahasiswa;
        // $mahasiswa->nim = $request->nim;
        $mahasiswa->nama = $request->nama;
        $mahasiswa->ipk = $request->ipk;
        // $mahasiswa->gaji_ortu = $request->gaji_ortu;
        $mahasiswa->save();

        return "Data Berhasil Masuk";
    }

    public function update(request $request, $id){
        $mahasiswa->nim = $request->nim;
        $mahasiswa->nama = $request->nama;
        $mahasiswa->ipk = $request->ipk;
        $mahasiswa->gaji_ortu = $request->gaji_ortu;

        $mahasiswa = mahasiswa::find($id);
        $mahasiswa->nim = $request->nim;
        $mahasiswa->nama = $request->nama;
        $mahasiswa->ipk = $request->ipk;
        $mahasiswa->gaji_ortu = $request->gaji_ortu;
        $mahasiswa->save();

        return "Data Berhasil di Update";
    }

    public function delete($id){
        $mahasiswa = mahasiswa::find($idd);
        $mahasiswa->delete();

        return "Data Berhasil di Hapus";
    }
}
