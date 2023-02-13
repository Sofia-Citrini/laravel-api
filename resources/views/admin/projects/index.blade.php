@extends('layouts.app')

@section('content')

<h3 class="text-center pt-5 pb-4">Tutti i progetti</h3>

<a href="{{route('admin.projects.create')}}" class="btn btn-danger mb-5"><i class="fa-solid fa-plus"></i> Aggiungi progetto</a>

<table class="table table-striped">
    <thead>
        <tr>
          <th scope="col">Nome</th>
          <th scope="col">Descrizione</th>
          <th scope="col">Tipologia</th>
          <th scope="col">Tecnologia</th>
          <th scope="col">Img</th>
          <th scope="col">Link GitHub</th>
          <th scope="col">Modifica</th>
          <th scope="col">Elimina</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($projects as $project)
            <tr>
                <td><a href="{{route('admin.projects.show', $project->id)}}">{{$project->title}}</a></td>
                <td>{{Str::limit($project->description, 60)}}</td>
                <td>{{$project->type ? Str::upper($project->type->name) : '/'}}</td>
                <td>{{Str::upper($project->technologies->implode('name', ','))}}</td>
                <td><img src="{{asset('storage/' . $project->image)}}" style="width:50px" alt=""></td>
                <td><a href="">{{($project->link_github)}}</a></td>
                <td>
                  <a href="{{route('admin.projects.edit', $project->id)}}" class="text-decoration-none btn btn-outline-dark">
                    <i class="fa-solid fa-pencil"></i>
                  </a>
                </td>
                <td>
                    <form action="{{route('admin.projects.destroy', $project->id)}}" method="POST" class="d-inline-block delete-form">
                      @csrf
          
                      @method('delete')
          
                      <button class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></button>
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