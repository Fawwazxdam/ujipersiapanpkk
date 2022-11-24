@extends('layouts.nav')
@section('content')
    <h1 class="display-6">{{$artikel->judul}}</h1>
    <img src="{{ asset('storage/'.$artikel->foto) }}" alt="" width="300px">
    <p>{{$artikel->isi}}</p>
    <p>{{$artikel->tanggal}}</p>
@endsection