@extends('layouts.app')

@section('content')
    <h1 class="text-center pt-3">Lista dei progetti</h1>
    <div class="text-center mt-3">
        <a href={{route("admin.projects.create")}} class="btn btn-outline-dark">Aggiungi un nuovo progetto</a>
    </div>

    <div class="container mt-4">
        <div class="row">
            @foreach ($projects as $project)
                <div class="col-4">
                    <div class="card">
                        <img src="{{ asset('/storage/' . $project->imageURL)}}" class="card-img-top" alt="...">
                        <div class="card-body">
                          <h5 class="card-title">Nome Progetto: {{$project->title}}</h5>
                          <a href="{{route('admin.projects.show', $project->slug)}}" class="btn btn-outline-dark">Dettagli progetto</a>
                        </div>
                      </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection