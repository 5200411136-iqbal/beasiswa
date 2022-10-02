<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\mahasiswa;
use Illuminate\Support\Facades\DB;

class MahasiswaController extends Controller
{
    public function index(){
        return mahasiswa::all();

    }

    public function testing($id){
        $users = DB::table('mahasiswas')->where([
            ['id', '=', '1']
        ])->get();
        return $users->count();
    }

    public function scoringBeasiswa(request $request, $id)
    {
        $IPK_Scroring = 3.5;
        $GajiOrtu = 4000000;
        // Get Mahasiswa By Id
        $mhs = DB::table('mahasiswas')->where([
            ['id', '=', $id]
        ])->get();
        
        //get data mahasiswa by mahasiswaid ->$check_mhs
        $check_mhs = mahasiswa::find($id);
        // code......

        //cek mahasiswa ada atau tidak
        if($check_mhs = []){
            return "Data Mhs tidak ada";
        }else{
            //mahasiswa ada
            if(($check_mhs->ipk >= $IPK_Scroring) and ($check_mhs->gaji_ortu <= $GajiOrtu)){
                return "Mahasiswa ".$check_mhs->nama." dengan NIM ".$check_mhs->nim." memenuhi syarat mendapatkan beasiswa";
            }else{
                return "Mahasiswa ".$check_mhs->nama." dengan NIM ".$check_mhs->nim." TIDAK memenuhi syarat mendapatkan beasiswa";
            }
        }
    }

    //fungsi create
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
        // $mahasiswa->nim = $request->nim;
        // $mahasiswa->nama = $request->nama;
        // $mahasiswa->ipk = $request->ipk;
        // $mahasiswa->gaji_ortu = $request->gaji_ortu;

        $mahasiswa = mahasiswa::find($id);
        $mahasiswa->nim = $request->nim;
        $mahasiswa->nama = $request->nama;
        $mahasiswa->ipk = $request->ipk;
        $mahasiswa->gaji_ortu = $request->gaji_ortu;
        $mahasiswa->save();

        return "Data Berhasil di Update";
    }

    public function delete($id){
        $mahasiswa = mahasiswa::find($id);
        $mahasiswa->delete();

        return "Data Berhasil di Hapus";
    }
}
