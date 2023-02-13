@extends('layouts.app')

@section('content')

<div class="my-4 d-grid gap-2 d-md-flex justify-content-md-end">
    <button class="btn btn-primary btn-sm text-end">
        <i class="fa-solid fa-rotate-left"></i>
        <a href="{{route('admin.projects.index')}}" class="text-reset">Tutti i progetti</a>
    </button>
</div>

<div class="row justify-content-center">
    <div class="col-md-10 d-flex my-5">
        <div class="img-container">
            {{-- @dump($project->image) --}}
            <img src="{{asset('storage/' . $project->image)}}" >
        </div>
        
        
        <div class="ms-4">
            <h3 class="card-title py-4">{{$project->title}}</h3>
            <p class="card-text">{{$project->description}}</p>

            @if($project->link_github)
                <a href="{{$project->link_github}}" class="d-block">Codice GitHub</a>
            @endif

            @if($project->type)
                <div class="py-3">
                    <h6>Tipologia:</h6>
                    <div class="badge text-bg-secondary">{{Str::upper($project->type->name)}}</div>
                </div>
            @endif


            <div class="mt-5">
                <a href="{{route('admin.projects.edit', $project->id)}}" class="btn btn-outline-primary mb-3">Modifica progetto</a>
    
                <form action="{{route('admin.projects.destroy', $project->id)}}" method="POST" id="form-delete">
                    @csrf
        
                    @method('delete')
        
                    <button class="btn btn-outline-danger">Elimina Progetto</button>
                </form>
            </div>
        </div>
    
        <script>
            const formDelete = document.getElementById("form-delete");
    
            formDelete.addEventListener("submit", function(event) {
                event.preventDefault();
    
                const conferma = confirm("Vuoi cancellare questo progetto?");
    
                if (conferma === true) {
                formDelete.submit();
                }
            })
        </script>
    </div>
</div>




@endsection