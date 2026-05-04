<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;

class MahasiswaController extends Controller
{
    public function create()
    {
        return view('mahasiswa.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'nim' => 'required',
            'jurusan' => 'required',
        ]);

        Mahasiswa::create($request->all());

        return redirect('/mahasiswa/create')->with('success', 'Data berhasil ditambahkan');
    }
}