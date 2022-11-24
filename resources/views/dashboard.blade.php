@extends('layouts.app')
@section('content')
    <h2 class="text-center">BIODATA UJK</h2>
    <div class="row">
        <div class="col">
            <form action="{{ route('dashboard.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text" class="form-control" name="nama" value="{{old('nama')}}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Tinggi Badan</label>
                    <input type="text" class="form-control" name="tb" value="{{old('tb')}}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Berat Badan</label>
                    <input type="text" class="form-control" name="bb" value="{{old('bb')}}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Hobi</label>
                    <div class="row">
                        <div class="col"><input type="text" class="form-control" name="hobi1" value="{{old('hobi1')}}"></div>
                        <div class="col"><input type="text" class="form-control" name="hobi2" value="{{old('hobi2')}}"></div>
                        <div class="col"><input type="text" class="form-control" name="hobi3" value="{{old('hobi3')}}"></div>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Tahun Lahir</label>
                    <input type="text" class="form-control" name="lahir" value="{{old('lahir')}}">
                </div>
                <button type="submit" class="btn btn-success">CHECK</button>
            </form>
        </div>
        <div class="col">
            <h4 class="text-end">Data Anda Akan Ditampilkan Disini</h4>
            @isset($data)
            <form action="">
            <div class="mb-3">
                <label class="form-label">Nama</label>
                <input type="text" class="form-control" name="nama1" value="{{$data['nama']}}">
            </div>
            <div class="mb-3">
                <label class="form-label">BMI</label>
                <input type="text" class="form-control" name="bmi" value="{{$data['bmi']}}">
            </div>
            <div class="mb-3">
                <label class="form-label">Status Berat Badan</label>
                <input type="text" class="form-control" name="status" value="{{$data['status']}}">
            </div>
            <div class="mb-3">
                <label class="form-label">Hobi</label>
                <input type="text" class="form-control" name="hobi" value="{{$data['hobi']}}">
            </div>
            <div class="mb-3">
                <label class="form-label">Umur</label>
                <input type="text" class="form-control" name="umur" value="{{$data['umur']}}">
            </div>
            <div class="mb-3">
                <label class="form-label">Konsultasi Gratis</label>
                <input type="text" class="form-control" name="konsultasi" value="{{$data['konsultasi']}}">
            </div>
            </form>
            @endisset
        </div>
    </div>
@endsection
