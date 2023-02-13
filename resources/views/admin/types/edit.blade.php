@extends('layouts.app')

@section('content')
    <h3 class="text-center pt-5">Modifica Progetto</h3>

    <div class="row justify-content-center my-3">
        <div class="col-7">
            <form action="{{route('admin.types.update', $type->id)}}" method="POST">
                @csrf

                @method('put')

                <div class="mb-3">
                    <label class="form-label">Titolo</label>
                    <input type="text" class="form-control @error('name') is-invalid @elseif(old('name')) is-valid @enderror" name="name" 
                    value="{{old('name', $type->name)}}">

                    @error('name')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Descrizione</label>
                    <textarea class="form-control @error('description') is-invalid @elseif(old('description')) is-valid @enderror" name="description">
                        {{old('description',$type->description)}}
                    </textarea>

                    @error('description')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
                </div>

                <button class="btn btn-primary" type="submit">Salva modifica</button>
                <a href="{{route('admin.types.show', $type->id)}}" class="btn btn-outline-secondary">Annulla</a>
            </form>
        </div>
    </div>
@endsection