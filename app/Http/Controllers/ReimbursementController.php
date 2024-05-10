<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Reimbursement;
use Alert;

class ReimbursementController extends Controller
{
    public function index()
    {
      $reimbust = Reimbursement::all();
      return view('staff', compact('reimbust'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|max:255',
            'deskripsi' => 'required',
            'file' => 'required|mimes:jpeg,jpg,png,pdf|max:2048',
        ]);
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $fileName);
    
            DB::table('reimbursement')->insert([
                'nama_reimbursement' => $request->nama,
                'deskripsi' => $request->deskripsi,
                'status' => 2,
                'file' => $fileName,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ]);
    
            Alert::success('success', 'berhasil disimpan');
            return redirect('/home');
        } else {
            Alert::error('error', 'File tidak ditemukan');
            return redirect('/home');
        }
        // DB::table('reimbursement')->insert([
        //     'nama_reimbursement' => $request->nama,
        //     'deskripsi' => $request->deskripsi,
        //     'status' => 2,
        //     'file' => $fileName,
        //     'created_at' => date("Y-m-d H:i:s"),
        // 	'updated_at' => date("Y-m-d H:i:s"),
        // ]);
        // Alert::success('success', 'berhasil disimpan');
        // return redirect('/staff');
        // return redirect('/staff')->with('success', 'Data Successfully Added');
    }

    public function terima(Request $request, $id)
    {
        $data = Reimbursement::findOrFail($id);
        //$data->update($request->all()); 
        $data->update(['status' => 3]);
        Alert::success('success', 'berhasil disimpan');
        return redirect('/direktur');
        // return redirect('data_employee')->with('success', 'Reimbust berhasil diajukan');
    }
    public function tolak(Request $request, $id)
    {
        $data = Reimbursement::findOrFail($id);
        //$data->update($request->all()); 
        $data->update(['status' => 1]);
        Alert::success('Ditolak', 'Permintaan ditolak');
        return redirect('/direktur');
        // return redirect('data_employee')->with('success', 'Reimbust berhasil diajukan');
    }
}
