<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wisata;
use App\Models\Transaction;
use Yajra\DataTables\DataTables;
use Auth;


class WisataController extends Controller
{
    public function store(Request $request)
    {
        // $request->validate([
        //     'nama' => 'required|string|max:255',
        //     'noHp' => 'required|string|max:255',
        //     'alamatEmail' => 'required|string|email|max:255',
        //     'alamatLengkap' => 'required|string|max:255',
        //     'detail' => 'required|string|max:255',
        //     'kota' => 'required|string|max:255',
        //     'provinsi'  => 'required|string|max:255',
        //     'kecamatan'  => 'required|string|max:255',
        //     'jumlahTiket' => 'required|integer|min:0',
        //     'informasi'  => 'required|string|max:255',
        //     'syarat'  => 'required|string|max:255',
        //     'image'  => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        //     // Add any other validations you need
        // ]);
         // Ambil nilai jadwal dari checkbox dan gabungkan menjadi string
         $jadwal = implode(',', $request->input('jadwal', []));
        $imagePath = null;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('public/images', $filename);
            // Save the image path to the database
            $imagePath = 'images/' . $filename;
        }

        Wisata::create([
            'user_id' => auth()->id(),
            'nama' => $request->nama,
            'noHp' => $request->noHp,
            'alamatEmail' => $request->alamatEmail,
            'alamatLengkap' => $request->alamatLengkap,
            'detail' => $request->detail,
            // 'kota' => $request->kota,
            'provinsi'  => $request->provinsi,
            'kecamatan'  => $request->kecamatan,
            'harga'  => $request->harga,
            'jumlahTiket' => $request->jumlahTiket,
            'jadwal' => $jadwal,
            'informasi'  => $request->informasi,
            'syarat'  => $request->syarat,
            'image'  => $imagePath, // Save the image path to the database
        ]);

        session()->flash('success', 'Data koleksi berhasil ditambahkan.');

        return redirect()->route('mitra')->with('success', 'Wisata berhasil diupdate.');
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
    public function mitra(){
        $user_id = auth()->id();

        // Mengambil maksimal 3 wisata untuk user yang sedang login
        $wisatas = Wisata::where('user_id', $user_id)->take(3)->get();
        return view('mitra.dashboard', compact('wisatas'));
    }
    public function getWisata(){
        $data = Wisata::all();
        return Datatables::of($data)->make(true);
    }
    public function asal(){
        $data = Wisata::all();
        return Datatables::of($data)->make(true);
    }

    public function search(Request $request)
{
    $keyword = $request->input('search');

    $wisatas = Wisata::where('nama', 'LIKE', '%' . $keyword . '%')
        ->orWhere('alamatLengkap', 'LIKE', '%' . $keyword . '%')
        ->orWhere('provinsi', 'LIKE', '%' . $keyword . '%')
        ->get();

    if ($wisatas->isEmpty()) {
        return redirect()->back()->with('error', 'Tidak ada hasil ditemukan untuk kata kunci "' . $keyword . '"');
    }

    return view('wisatawan.informasi', compact('wisatas'));
}


    // public function show(Wisata $Wisata) //tampilan view buat ngedit
    // {
    //     return view('mitra.editWisata', compact('wisata'));
    // }


    public function edit($id)
{
    $wisata = Wisata::findOrFail($id);
    return view('mitra.editWisata', compact('wisata'));
}


public function update(Request $request, $id)
{
    $request->validate([
        'nama' => 'required',
        'harga' => 'required|numeric',
        'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Sesuaikan dengan kebutuhan validasi gambar Anda
        // Tambahkan validasi untuk field lainnya sesuai kebutuhan
    ]);

    $wisata = Wisata::findOrFail($id);

    // Update data yang tidak termasuk dalam gambar
    $wisata->update([
        'nama' => $request->input('nama'),
        'harga' => $request->input('harga'),
        // Tambahkan field lainnya sesuai kebutuhan
    ]);

    // Update gambar jika ada
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('images', 'public');
        $wisata->update(['image' => $imagePath]);
    }

    return redirect()->route('wisata.index')->with('success', 'Data wisata berhasil diperbarui.');
}

public function delete($id)
{
    $wisata = Wisata::findOrFail($id);
    $wisata->delete();

    return redirect()->route('mitra')->with('success', 'Wisata berhasil dihapus.');
}


// public function historyTransactions()
// {
//     // Mendapatkan user yang sedang login
//     $user = Auth::user();


//     // Mendapatkan transaksi berdasarkan user ID
//     $transactions = Transaction::where('user_id', $user->id)->get();

//     return view('wisatawan.history_transactions', compact('transactions'));
// }

public function historyTransactions()
{
    // Mendapatkan user yang sedang login
    $user = Auth::user();

    // Mendapatkan transaksi berdasarkan user ID dengan informasi wisata terkait
    $transactions = Transaction::with('wisata')
        ->where('user_id', $user->id)
        ->get();

    return view('wisatawan.history_transactions', compact('transactions'));
}







}
