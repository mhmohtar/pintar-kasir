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
        <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Reimbust</th>
                        <th scope="col">Deskripsi</th>
                        <th scope="col">status</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php 
                        $no=1;
                    @endphp
                    @foreach ($direktur as $post)
                    <tr>
                        <th scope="row">{{$no++}}</th>
                        <td>{{$post->nama_reimbursement}}</td>
                        <td>{{$post->deskripsi}}</td>
                        <td>
                        @php
                            $ket = '';
                            switch ($post->status) {
                                case 1:
                                    $ket = '<span class="bg-danger px-2 rounded-pill text-light">Ditolak</span>';
                                    break;
                                case 2:
                                    $ket = '<span class="bg-primary px-2 rounded-pill text-light">Diajukan</span>';
                                    break;
                                case 3:
                                    $ket = '<span class="bg-success px-2 rounded-pill text-light">Disetujui</span>';
                                    break;
                                default:
                                    $ket = '<span class="bg-primary px-2">Status tidak valid</span>';
                            }
                        @endphp
                        {!! $ket !!}
                        </td>
                        <td>
                        <a href="{{ route('update', ['id' => $post->id]) }}" class="btn btn-primary">Terima</a>
                            <a href="#" class="btn btn-danger">Tolak</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection