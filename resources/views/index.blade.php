@extends('layouts.nav')
@section('content')
<h1 class="text-center m-3"> Artikel</h1>
    <div class="row">
        @foreach($data as $view)
        <div class="col">
            <div class="card" style="width: 18rem;">
                <img src="{{ asset('storage/'.$view->foto) }}" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">{{$view->judul}}</h5>
                  <p class="card-text">{{$view->isi}}</p>
                  <a href="{{url('detail/'.$view->id)}}" class="btn btn-primary">Read more</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
@endsection

