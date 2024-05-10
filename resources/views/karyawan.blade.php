@extends('master')

@section('konten')
    <h4 class="py-3">
        Selamat Datang 
        <b>{{ Auth::user()->nama }}</b>, 
        Anda Login sebagai 
        <b>{{ Auth::user()->jabatan }}</b>
    </h4>

    @if(Auth::user()->jabatan == 'DIREKTUR') 
        <div class="row">
            <div class="col-lg-4">
                <div class="card p-4">
                    <form method="post" action="{{ route('tambah_karyawan') }}">
                    @csrf
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Karyawan</label>
                            <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Reimbursement">
                        </div>
                        <div class="mb-3">
                            <label for="nip" class="form-label">Nip</label>
                            <input type="text" class="form-control" name="nip" id="nip" placeholder="Masukkan NIP">
                        </div>
                        <div class="mb-3">
                            <label for="jabatan" class="form-label">Jabatan</label>
                            <select class="form-select" name="jabatan" id="jabatan" aria-label="Default select example">
                                <option selected>Pilih Jabatan</option>
                                <option value="DIREKTUR">DIREKTUR</option>
                                <option value="FINANCE">FINANCE</option>
                                <option value="STAFF">STAFF</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="nip" class="form-label">Password Login</label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card p-3">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Nip</th>
                                <th scope="col">Jabatan</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no=1;
                            @endphp
                            @foreach ($karyawan as $post)
                            <tr>
                                <th scope="row">{{$no++}}</th>
                                <td>{{$post->nama}}</td>
                                <td>{{$post->nip}}</td>
                                <td>{{$post->jabatan}}</td>
                                <td>
                                    <a href="{{ route('edit_karyawan', ['id' => $post->id]) }}" class="btn btn-primary">Edit</a>
                                    <a href="{{ route('hapus_karyawan', ['id' => $post->id]) }}" class="btn btn-danger">Hapus</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div> 
    @else 
        <div class="row">
            <div class="col-lg-12">
                <div class="card p-3">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Nip</th>
                                <th scope="col">Jabatan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no=1;
                            @endphp
                            @foreach ($karyawan as $post)
                            <tr>
                                <th scope="row">{{$no++}}</th>
                                <td>{{$post->nama}}</td>
                                <td>{{$post->nip}}</td>
                                <td>{{$post->jabatan}}</td>  
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div> 
    @endif
@endsection
