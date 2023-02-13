@extends('layouts.app')

@section('content')

<h3 class="text-center pt-5 pb-4">Tipologie</h3>

<a href="{{route('admin.types.create')}}" class="btn btn-danger mb-5">+ Aggiungi tipologia</a>

<table class="table table-striped">
    <thead>
        <tr>
          <th scope="col">Nome</th>
          <th scope="col">Descrizione</th>
          <th scope="col">Modifica</th>
          <th scope="col">Elimina</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($types as $type)
            <tr>
              <td><a href="{{route('admin.types.show', $type->id)}}">{{Str::title($type->name)}}</a></td>
              <td>{{Str::limit($type->description, 60)}}</td>
              <td>
                <a href="{{route('admin.types.edit', $type->id)}}" class="text-decoration-none btn btn-outline-dark">
                  <i class="fa-solid fa-pencil"></i>
                  Modifica
                </a>
              </td>
              <td>
                  <form action="{{route('admin.types.destroy', $type->id)}}" method="POST" class="d-inline-block delete-form">
                    @csrf
        
                    @method('delete')
        
                    <button class="btn btn-danger"><i class="fa-solid fa-trash-can"></i>Elimina</button>
                  </form>
              </td>  
            </tr>
        @endforeach
      </tbody>
</table>

<script>
  const formDelete = document.querySelectorAll(".delete-form");
  formDelete.forEach((form) => {
    
    form.addEventListener("submit", function(event) {
      event.preventDefault();

      const conferma = confirm("Vuoi cancellare questo progetto?");
      
      if (conferma === true) {
        form.submit();
      }
    })
  })
</script>

@endsection