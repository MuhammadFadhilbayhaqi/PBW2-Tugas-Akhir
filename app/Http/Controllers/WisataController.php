<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wisata;
use Yajra\DataTables\DataTables;

class WisataController extends Controller
{
    public function store(Request $request)
    {
        // $request->validate([
        //     'nama' => 'required|max:100',
        //     'nohp' => 'required|max:100',
        //     'alamatEmail' => 'required|max:100',
        //     'alamatLengkap' => 'required|max:100',
        //     'detail' => 'required|max:100',
        //     'kota' => 'required|max:100',
        //     'provinsi' =>  'required|max:100',
        //     'kecamatan' =>  'required|max:100',
        //     // 'jadwal' =>  'required|max:100',
        //     'jumlahTiket' =>  'required|max:100',
        //     'info' =>  'required|max:100',
        //     'syarat' =>  'required|max:100',
        //     // 'image' =>  'required|max:100',
        // ]);


        Wisata::create([
            'nama' => $request->nama,
            'noHp' => $request->noHp,
            'alamatEmail' => $request->alamatEmail,
            'alamatLengkap' => $request->alamatLengkap,
            'detail' => $request->detail,
            'kota' => $request->kota,
            'provinsi'  => $request->provinsi,
            'kecamatan'  => $request->kecamatan,
            // 'jadwal'  => $request->jadwal,
            'jumlahTiket' => $request->jumlahTiket,
            'informasi'  => $request->informasi,
            'syarat'  => $request->syarat,
            // 'image'  => $request->image,
        ]);

        // dd($request);

        // Set pesan flash untuk memberi tahu pengguna bahwa data telah berhasil ditambahkan
     session()->flash('success', 'Data koleksi berhasil ditambahkan.');

    // // Alihkan pengguna ke rute daftar koleksi
    return view('mitra.dashboard');
    // return redirect()->route('mitra')->with('success', 'Data koleksi berhasil ditambahkan.');
        // return redirect()->route('koleksi.registrasi')->with('success', 'Koleksi telah ditambahkan.');
    }

    public function index(){
        return view('mitra.regist');
    }
    public function kelola(){
        return view('mitra.kelola');
    }
    public function informasi(){
        return view('wisatawan.informasi');
    }
    public function pemesanan(){
        return view('wisatawan.pemesanan');
    }
    public function getWisata(){
        $data = Wisata::all();
        return Datatables::of($data)->make(true);
    }


}
