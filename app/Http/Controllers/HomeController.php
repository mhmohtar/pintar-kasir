<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reimbursement;
use App\User;

class HomeController extends Controller
{
    public function index()
    {      
        //return view('home');
        //$user = User::all();
        //$reimbust = Reimbursement::where('status', 1)->get();
        //$reimbust = Reimbursement::all();
        $reimbust = Reimbursement::orderByDesc('status')->get();
        //$reimbustment = Reimbursement::orderByDesc('status')->where('status', 2)->get();
        $reimbustment = Reimbursement::where('status', 2)->orderByDesc('created_at')->get();
        return view('home', compact(['reimbust', 'reimbustment']));
    }

    public function reimbust()
    {      
        //return view('home');
        //$user = User::all();
        //$reimbust = Reimbursement::where('status', 1)->get();
        $reimbust = Reimbursement::all();
        return view('reimbust', compact('reimbust'));
    }

    public function direktur()
    {
        // $user = User::all();
        // return view('staff', compact('user'));
        $direktur = Reimbursement::all();
        return view('direktur', compact('direktur'));
    }
    public function staff()
    {
        // $user = User::all();
        // return view('staff', compact('user'));
        $reimbust = Reimbursement::all();
        return view('staff', compact('reimbust'));
    }
    public function karyawan()
    {
        $karyawan = User::all();
        return view('karyawan', compact('karyawan'));
    }

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
}