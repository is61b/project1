<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use App\Models\Jurusan;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $nomor = 1;
        $mhs = Mahasiswa::all(); //eloquent ORM
        return view('mahasiswa.index',compact('nomor','mhs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jur = Jurusan::all();
        return view('mahasiswa.form',compact('jur'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'nim' => 'required|unique:mahasiswas,nim',
            'nama' => 'required',
            'foto' => 'required|image|max:10000',
        ],[
            'required' => ':attribute Tidak Boleh Kosong',
            'unique' => ':attribute Sudah Digunakan',
        ]);

        $mhs = new Mahasiswa;
        $mhs->nim = $request->nim;
        $mhs->nama = $request->nama;
        $mhs->tempatLahir = $request->tempat;
        $mhs->tanggalLahir = $request->tanggal;
        $mhs->jenisKelamin = $request->jk;
        $mhs->agama = $request->agama;
        $mhs->password = bcrypt($request->password);
        $mhs->jurusans_id = $request->jurusan;
        $mhs->foto = $request->foto->getClientOriginalName();
        $mhs->save();

        $request->foto->move('foto',$request->foto->getClientOriginalName());

        return redirect('/mahasiswa/');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
