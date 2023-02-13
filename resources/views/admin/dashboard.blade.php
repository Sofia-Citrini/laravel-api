@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center my-3">

        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>

        <div class="col-md-8 mt-5">
            <h3>{{Str::title(Auth::user()->name)}}</h3>
        </div>


        <div class="col-md-8 d-flex gap-5">
            <div class="d-inline-flex flex-column justify-content-center align-items-center my-4">
                <div class="h3">{{$projects}}</div>
                <div>Progetti</div>
            </div>
    
            <div class="my-4 d-flex flex-column">
                <a href="{{route('admin.projects.index')}}" class="btn btn-outline-danger mb-3">Tutti i tuoi progetti</a>

                <a href="{{route('admin.projects.create')}}" class="btn btn-outline-danger">Pubblica un nuovo progetto</a>
            </div>
        </div>

        <div class="col-md-8 d-flex gap-5">
            <div class="d-inline-flex flex-column justify-content-center align-items-center my-4">
                <div class="h3">{{$types}}</div>
                <div>Tipologie</div>
            </div>
    
            <div class="my-4 d-flex flex-column">
                <a href="{{route('admin.types.index')}}" class="btn btn-outline-danger mb-3">Tutte le tipologie</a>

                <a href="{{route('admin.types.create')}}" class="btn btn-outline-danger">Crea una nuova tipologia</a>
            </div>
        </div>
        
    </div>
</div>
@endsection