@extends('layouts.admin')

@section("content")
<a href="{{route("admin.projects.create")}}" type="button" class="btn btn-primary">Crea nuovo project</a>
<table class="table">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Titolo</th>
        <th scope="col">Slug</th>
        <th scope="col">Tipo</th> 
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
        @foreach($projects as $project)
      <tr>
        <th scope="row">{{$project->id}}</th>
        <th scope="row">{{$project->title}}</th>
        <td>{{$project->slug}}</td>
        <td>{{$project->type?->name}}</td>
        <td class="d-flex">
            <a href="{{route("admin.projects.show", ["project" => $project->slug])}}" type="button" class="btn btn-primary m-1">Vedi</a>
            <a href="{{route("admin.projects.edit", ["project" => $project->slug])}}" type="button" class="btn btn-warning m-1">Modifica</a>

            <form class="form_delete_post" action="{{route('admin.projects.destroy', ['project' => $project->slug])}}" method="POST">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger m-1">Elimina</button>
            </form>

        </td>
      </tr>
      @endforeach
    </tbody>
  </table>

@endsection