@extends('layouts.app')

@section('content')
    <h3 class="text-center py-3">Inserisci nuova Tipologia</h3>

    <div class="row justify-content-center my-3">
        <div class="col-7">
            <form action="{{route('admin.types.store')}}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Nome Tipologia</label>
                    <input type="text" class="form-control @error('name') is-invalid @elseif(old('name')) is-valid @enderror" 
                    name="name" value="{{$errors->has('name') ? '' : old('name')}}">

                    @error('name')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Descrizione</label>
                    <textarea class="form-control @error('description')is-invalid @enderror" name="description"> {{old('description')}}</textarea>

                    @error('description')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
                </div>

                <button class="btn btn-primary" type="submit">Salva Tipologia</button>
                <a href="{{route('admin.types.index')}}" class="btn btn-outline-secondary">Annulla</a>
            </form>
        </div>
    </div>
@endsection