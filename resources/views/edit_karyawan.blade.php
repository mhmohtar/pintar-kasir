@extends('master')

@section('konten')
    <h4 class="py-3">
        Selamat Datang 
        <b>{{ Auth::user()->nama }}</b>, 
        Anda Login sebagai 
        <b>{{ Auth::user()->jabatan }}</b>
    </h4>

    <div class="row">
        <div class="col-lg-12">
            <div class="card p-4">
                <h3>Edit Data Karyawan</h3>
                <form method="post" action="{{ route('update_karyawan', ['id' => $data->id]) }}">
                @csrf
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Karyawan</label>
                        <input type="text" class="form-control" name="nama" id="nama" value="{{ $data->nama}}" placeholder="Nama Reimbursement">
                    </div>
                    <div class="mb-3">
                        <label for="nip" class="form-label">Nip</label>
                        <input type="text" class="form-control" name="nip" id="nip" value="{{ $data->nip}}" placeholder="Masukkan NIP">
                    </div>
                    <div class="mb-3">
                        <label for="jabatan" class="form-label">Jabatan</label>
                        <select class="form-select" name="jabatan" id="jabatan" aria-label="Default select example">
                            <!-- <option selected>Pilih Jabatan</option>
                            <option value="DIREKTUR">DIREKTUR</option>
                            <option value="FINANCE">FINANCE</option>
                            <option value="STAFF">STAFF</option> -->
                            <option value="DIREKTUR" @if($data->jabatan == 'DIREKTUR') selected @endif>DIREKTUR</option>
                            <option value="FINANCE" @if($data->jabatan == 'FINANCE') selected @endif>FINANCE</option>
                            <option value="STAFF" @if($data->jabatan == 'STAFF') selected @endif>STAFF</option>
                        </select>
                    </div>
                    <!-- <div class="mb-3">
                        <label for="nip" class="form-label">Password Login</label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                    </div> -->
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
        
    </div> 

@endsection
