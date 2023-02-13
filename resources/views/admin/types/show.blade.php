@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card flex-row my-5">

            <div class="card-body">
                <h3 class="card-title py-4">{{$type->name}}</h3>

                <p class="card-text">{{$type->description}}</p>

                <a href="{{route('admin.types.edit', $type->id)}}" class="btn btn-outline-primary mt-5 mb-3">Modifica tipologia</a>
        
                <form action="{{route('admin.types.destroy', $type->id)}}" method="POST" id="form-delete">
                    @csrf
        
                    @method('delete')
        
                    <button class="btn btn-outline-danger">Elimina tipologia</button>
                </form>

                <div class="text-end">
                    <a href="{{route('admin.types.index')}}">Tutte le tipologie</a>
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
</div>




@endsection