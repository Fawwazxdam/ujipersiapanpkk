@extends('layouts.app')
@section('content')
<h2 class="text-center m-3">Artikel</h2>
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambah">Tambah</button>
<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Judul</th>
            <th scope="col">Foto</th>
            <th scope="col">Isi</th>
            <th scope="col">Tanggal Dibuat</th>
            <th scope="col">Kategori</th>
            <th scope="col">Petugas</th>
            <th scope="col" colspan="2">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $artikel)
            <tr>
                <th scope="row">{{ $artikel->id }}</th>
                <td>{{ $artikel->judul }}</td>
                <td><img src="{{ asset('storage/'.$artikel->foto) }}" alt="" width="90px"></td>
                <td>{{ $artikel->isi }}</td>
                <td>{{ $artikel->tanggal }}</td>
                <td>{{ $artikel->kategori->nama_kategori }}</td>
                <td>{{ $artikel->users_id }}</td>
                <td><button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#edit{{$artikel->id}}">Edit</button></td>
                <td><a href="{{url('delar/'.$artikel->id)}}" class="btn btn-danger">Delete</a></td>
            </tr>

            {{-- MODAL EDIT --}}
            <div class="modal fade" id="edit{{$artikel->id}}" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Artikel</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{route('artikel.update',$artikel->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('put')
                            <div class="mb-3">
                                <label class="form-label">Judul</label>
                                <input type="text" class="form-control" name="judul" value="{{$artikel->judul}}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Foto</label><br>
                                <img src="{{ asset('storage/'.$artikel->foto) }}" alt="" width="200px">
                                <input type="file" class="form-control" name="foto" value="{{$artikel->foto}}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">isi</label>
                                <input type="text" class="form-control" name="isi" value="{{$artikel->isi}}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Tanggal</label>
                                <input type="date" class="form-control" name="tanggal" value="{{$artikel->tanggal}}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Petugas</label>
                                <input type="text" class="form-control" name="users_id" value="{{$artikel->users_id}}" disabled>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Kategori</label>
                                <select class="form-control" name="kategori_id">
                                    <option value="">Pilih Kategori</option>
                                    @foreach ($data2 as $item)
                                    <option value="{{ $item->id }}" @selected($artikel->kategori_id==$item->id) >{{ $item->nama_kategori }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-success">Submit</button>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
            {{-- END MODAL EDIT --}}

        @endforeach
    </tbody>
</table>
@endsection


{{-- MODAL TAMBAH --}}
<div class="modal fade" id="tambah" tabindex="-1" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Artikel</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="{{route('artikel.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
            <div class="mb-3">
                <label class="form-label">Judul</label>
                <input type="text" class="form-control" name="judul">
            </div>
            <div class="mb-3">
                <label class="form-label">Foto</label>
                <input type="file" class="form-control" name="foto">
            </div>
            <div class="mb-3">
                <label class="form-label">isi</label>
                <input type="text" class="form-control" name="isi">
            </div>
            <div class="mb-3">
                <label class="form-label">Tanggal</label>
                <input type="date" class="form-control" name="tanggal">
            </div>
            <div class="mb-3">
                <label class="form-label">Petugas</label>
                <input type="text" class="form-control" name="users_id" value="{{ Auth::user()->id}}" readonly>
            </div>
            <div class="mb-3">
                <label class="form-label">Kategori</label>
                <select class="form-control" name="kategori_id">
                    <option value="">Pilih Kategori</option>
                    @foreach ($data2 as $item)
                    <option value="{{ $item->id }}">{{ $item->nama_kategori }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-success">Submit</button>
        </form>
        </div>
    </div>
</div>
</div>
