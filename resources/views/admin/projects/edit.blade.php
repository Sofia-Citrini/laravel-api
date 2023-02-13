@extends('layouts.app')

@section('content')
    <h3 class="text-center pt-5">Modifica Progetto</h3>

    <div class="row justify-content-center my-3">
        <div class="col-7">
            <form action="{{route('admin.projects.update', $project->id)}}" method="POST" enctype="multipart/form-data">
                @csrf

                @method('put')

                <div class="mb-3">
                    <label class="form-label">Titolo</label>
                    <input type="text" class="form-control @error('title') is-invalid @elseif(old('title')) is-valid @enderror" 
                    name="title" value="{{old('title', $project->title)}}">

                    @error('title')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Descrizione</label>
                    <textarea class="form-control @error('description') is-invalid @elseif(old('description')) is-valid @enderror" name="description">
                        {{old('description',$project->description)}}
                    </textarea>

                    @error('description')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Tipologia progetto</label>
                    <select class="form-select" @error('type_id') is-invalid @enderror" name="type_id">
                        <option disabled selected>Open this select menu</option>
                        @foreach ($types as $type)
                            <option value={{ $type->id }} {{ $type->id === old("type", $project->type_id) ? 'selected' : '' }}>{{ $type->name }}</option>
                        @endforeach
                    </select>

                    @error('type_id')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Immagine</label>
                    <input type="file" class="form-control @error('image') is-invalid @enderror" name="image">

                    @error('image')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror

                    <div class="mt-3">
                        <img class="img-thumbnail" src="{{asset('storage/' . $project->image)}}" alt="">
                    </div>
                </div>


                <div class="mb-3">
                    <label class="form-label">GitHub link</label>
                    <input type="text" class="form-control @error('link_github') is-invalid @elseif(old('link_github')) is-valid @enderror" name="link_github" 
                    value="{{old('link_github', $project->link_github)}}">

                    @error('link_github')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
                </div>

                <button class="btn btn-primary" type="submit">Salva modifica</button>
                <a href="{{route('admin.projects.show', $project->id)}}" class="btn btn-outline-secondary">Annulla</a>
            </form>
        </div>
    </div>
@endsection