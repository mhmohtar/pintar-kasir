<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\User;
use Alert;

class KaryawanController extends Controller
{
    public function tambah_karyawan(Request $request)
    {
        $request->validate([
            'nama' => 'required|max:255',
            'nip' => 'required|numeric',
            'jabatan' => 'required',
            'password' => 'required',
        ]);

        DB::table('users')->insert([
            'nama' => $request->nama,
            'nip' => $request->nip,
            'jabatan' => $request->jabatan,
            'password' => Hash::make($request->password),
            'created_at' => date("Y-m-d H:i:s"),
        	'updated_at' => date("Y-m-d H:i:s"),
        ]);
        Alert::success('Sukses', 'Karyawan berhasil disimpan');
        return redirect('/karyawan');
    }

    public function hapus_karyawan($id)
    {
        DB::table('users')->where('id', $id)->delete();
        Alert::success('Sukses', 'Karyawan berhasil dihapus');
        return redirect('/karyawan');
    }

    public function edit_karyawan($id)
    {
        $data = User::findOrFail($id);
        return view('edit_karyawan', compact('data'));
    }   

    public function update_karyawan(Request $request, $id)
    {
        $data = User::findOrFail($id);
        $data->update($request->all()); 
        Alert::success('Sukses', 'Data user berhasil disimpan');
        return redirect('/karyawan');
    }
}
