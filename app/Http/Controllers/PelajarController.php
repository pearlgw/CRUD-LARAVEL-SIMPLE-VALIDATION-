<?php

namespace App\Http\Controllers;

use App\Models\Pelajar;
use App\Http\Requests\StorePelajarRequest;
use App\Http\Requests\UpdatePelajarRequest;

class PelajarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pelajar.data')->with([
            'pelajars' => Pelajar::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePelajarRequest $request)
    {
        $validate = $request->validated();

        $pelajar = new Pelajar();
        $pelajar->idPelajar = $request->txtid;
        $pelajar->nama_lengkap = $request->txtnamalengkap;
        $pelajar->jenis_kelamin = $request->txtjeniskelamin;
        $pelajar->alamat = $request->txtalamat;
        $pelajar->email = $request->txtemail;
        $pelajar->no_hp = $request->txtnohp;
        $pelajar->save();

        return redirect('pelajar')->with('msg', 'Berhasil di tambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pelajar $pelajar)
    {
        $idPelajar = $pelajar->idPelajar;
        $data = $pelajar->find($idPelajar);
        return view('pelajar.formedit')->with([
            'txtid' => $idPelajar,
            'txtnamalengkap' => $data->nama_lengkap,
            'txtjeniskelamin' => $data->jenis_kelamin,
            'txtalamat' => $data->alamat,
            'txtemail' => $data->email,
            'txtnohp' => $data->no_hp
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePelajarRequest $request, Pelajar $pelajar)
    {
        $idPelajar = $pelajar->idPelajar;
        $data = $pelajar::find($idPelajar);
        $data->nama_lengkap = $request->txtnamalengkap;
        $data->jenis_kelamin = $request->txtjeniskelamin;
        $data->alamat = $request->txtalamat;
        $data->email = $request->txtemail;
        $data->no_hp = $request->txtnohp;
        $data->save();

        return redirect('pelajar')->with('msg', 'Data dengan nama ' . $data->nama_lengkap . ' berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pelajar $pelajar)
    {
        $idpelajar = $pelajar->idPelajar;
        $data = $pelajar::find($idpelajar);
        $data->delete();

        return redirect('pelajar')->with('msg', 'Data dengan nama ' . $data->nama_lengkap . ' berhasil dihapus');
    }
}
