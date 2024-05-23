<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    public function index()
    {
        $karyawans = Karyawan::all();
        return view('karyawan', compact('karyawans'))->with('title', 'Data Karyawan');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string',
            'alamat' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'jabatan' => 'required|string',
            'gaji' => 'required|numeric',
            'status' => 'required',
            'mulai_kerja' => 'required|date'
        ]);

        $karyawan = new Karyawan();
        $karyawan->nama = $request->input('nama');
        $karyawan->alamat = $request->input('alamat');
        $karyawan->tanggal_lahir = $request->input('tanggal_lahir');
        $karyawan->jabatan = $request->input('jabatan');
        $karyawan->gaji = $request->input('gaji');
        $karyawan->status = $request->input('status');
        $karyawan->mulai_kerja = $request->input('mulai_kerja');
        $karyawan->save();

        return redirect()->back()->with('store', 'Berhasil Menambah Data');
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string',
            'alamat' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'jabatan' => 'required|string',
            'gaji' => 'required|numeric',
            'status' => 'required',
            'mulai_kerja' => 'required|date'
        ]);

        $karyawan = Karyawan::findOrFail($id);
        $karyawan->nama = $request->input('nama');
        $karyawan->alamat = $request->input('alamat');
        $karyawan->tanggal_lahir = $request->input('tanggal_lahir');
        $karyawan->jabatan = $request->input('jabatan');
        $karyawan->gaji = $request->input('gaji');
        $karyawan->status = $request->input('status');
        $karyawan->mulai_kerja = $request->input('mulai_kerja');
        $karyawan->save();

        return redirect()->back()->with('update', 'Data Berhasil Diperbarui');
    }

    public function destroy($id)
    {
        $karyawan = Karyawan::findOrFail($id);
        $karyawan->delete();

        return redirect()->back()->with('destroy', 'Berhasil Menghapus Data');
    }
}
