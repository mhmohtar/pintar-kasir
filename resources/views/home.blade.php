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
            <div class="col-lg-12">
                <div class="card p-3">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama Reimbust</th>
                                <th scope="col">Deskrispi</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">File Pendukung</th>
                                <th scope="col">Status</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no=1;
                            @endphp
                            @foreach ($reimbustment as $data)
                            <tr>
                                <th scope="row">{{$no++}}</th>
                                <td>{{$data->nama_reimbursement}}</td>
                                <td>{{$data->deskripsi}}</td>
                                <td>{{$data->created_at}}</td>
                                <td style="width:20%">
                                    @if (Str::contains($data->file, ['.jpg', '.jpeg', '.png']))
                                        <a href="{{ asset('uploads/' . $data->file) }}" target="_blank">
                                            <img src="{{ asset('uploads/' . $data->file) }}" alt="{{ $data->file }}" style="width:20%">
                                        </a>
                                    @elseif (Str::contains($data->file, '.pdf'))
                                        <a href="{{ asset('uploads/' . $data->file) }}" target="_blank">{{ $data->file }}</a>
                                    @else
                                        File tidak didukung
                                    @endif
                                <td>
                                    @php
                                        $ket = '';
                                        switch ($data->status) {
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
                                    <a href="{{ route('terima', ['id' => $data->id]) }}" class="btn btn-primary">Terima</a>
                                    <a href="{{ route('tolak', ['id' => $data->id]) }}" class="btn btn-danger">Tolak</a>
                                </td> 
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @elseif(Auth::user()->jabatan == 'FINANCE') 
        <div class="row">
            <div class="col-lg-12">
                <div class="card p-3">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama Reimbust</th>
                                <th scope="col">Deskrispi</th>
                                <th scope="col">File Pendukung</th>
                                <th scope="col">Status</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Ket</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no=1;
                            @endphp
                            @foreach ($reimbust as $post)
                            <tr>
                                <th scope="row">{{$no++}}</th>
                                <td>{{$post->nama_reimbursement}}</td>
                                <td>{{$post->deskripsi}}</td>
                                <td style="width:20%">
                                    @if (Str::contains($post->file, ['.jpg', '.jpeg', '.png']))
                                        <!-- <img src="{{ asset('uploads/' . $post->file) }}" alt="{{ $post->file }}" style="width:20%"> -->
                                        <a href="{{ asset('uploads/' . $post->file) }}" target="_blank">
                                            <img src="{{ asset('uploads/' . $post->file) }}" alt="{{ $post->file }}" style="width:20%">
                                        </a>
                                    @elseif (Str::contains($post->file, '.pdf'))
                                        <a href="{{ asset('uploads/' . $post->file) }}" target="_blank">{{ $post->file }}</a>
                                    @else
                                        File tidak didukung
                                    @endif
                                <td>
                                    @php
                                        $ket = '';
                                        switch ($post->status) {
                                            case 1:
                                                $ket = '<span class="bg-danger px-2 rounded-pill text-light">Ditolak</span>';
                                                break;
                                            case 2:
                                                $ket = '<span class="bg-primary px-2 rounded-pill text-light">Belom Disetujui</span>';
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
                                <td>{{ $post->created_at }}</td>
                                <td>
                                <!-- start modal -->
                                @if($post->status == 1)
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal1">
                                        Detail
                                    </button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel1">Detail Reimbust</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <h5>Pengajuan Reimbusment Ditolak</h5>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tutup</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @elseif($post->status == 2) 
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal2">
                                        Detail
                                    </button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Detail Reimbust</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <h5>Masih dalam pengajuan</h5>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tutup</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @elseif($post->status == 3) 
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal3">
                                        Detail
                                    </button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel3" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel3">Detail Reimbust</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <h5>Segera Lakukan pembayaran karena status Disetujui oleh Direktur</h5>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tutup</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                <!-- end modal -->
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @elseif(Auth::user()->jabatan == 'STAFF')
        <div class="row">
            <div class="col-lg-4">
                <div class="card p-4">
                    <form method="post" action="{{ route('store') }}" enctype="multipart/form-data">
                    @csrf
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Reimbursement</label>
                            <input type="nama" class="form-control" name="nama" id="nama" placeholder="Nama Reimbursement">
                        </div>
                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <textarea class="form-control" id="deksripsi" rows="3" name="deskripsi"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="file" class="form-label">File</label>
                            <input type="file" class="form-control" id="file" name="file" accept=".jpg,.jpeg,.png,.pdf">
                        </div>
                        <button type="submit" class="btn btn-primary">Ajukan</button>
                    </form>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card p-3">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama Reimbust</th>
                                <th scope="col">Deskrispi</th>
                                <th scope="col">File Pendukung</th>
                                <th scope="col">Status</th>
                                <th scope="col">Tanggal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no=1;
                            @endphp
                            @foreach ($reimbust as $post)
                            <tr>
                                <th scope="row">{{$no++}}</th>
                                <td>{{$post->nama_reimbursement}}</td>
                                <td>{{$post->deskripsi}}</td>
                                <td style="width:20%">
                                @if (Str::contains($post->file, ['.jpg', '.jpeg', '.png']))
                                    <!-- <img src="{{ asset('uploads/' . $post->file) }}" alt="{{ $post->file }}" style="width:20%"> -->
                                    <a href="{{ asset('uploads/' . $post->file) }}" target="_blank">
                                        <img src="{{ asset('uploads/' . $post->file) }}" alt="{{ $post->file }}" style="width:20%">
                                    </a>
                                @elseif (Str::contains($post->file, '.pdf'))
                                    <a href="{{ asset('uploads/' . $post->file) }}" target="_blank">{{ $post->file }}</a>
                                @else
                                    File tidak didukung
                                @endif
                                </td>
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
                                    {{$post->created_at}}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endif
@endsection