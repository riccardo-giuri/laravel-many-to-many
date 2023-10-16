@extends('layouts.app')

@section('content')
    <h1 class="text-center pt-3">Dettagli del progetto</h1>

    <div class="container">
        <div class="row">
            <div class="col-6">
                <img src="{{ asset('/storage/' . $project->imageURL)}}" alt="" class="w-100">
            </div>

            <div class="col-6">
                <ul class="comicDetails">
                    <li>
                        <span class="list_item_title">Titolo: </span>
                        <span>{{$project->title}}</span>
                    </li>
                    <li>
                        <span class="list_item_title">Descrizione: </span>
                        <span>{{$project->description}}</span>
                    </li>
                    <li>
                        <span class="list_item_title">Link progetto: </span>
                        <span><a href="{{ $project->githubURL }}">{{$project->githubURL}}</a></span>  
                    </li>
                    <li>
                        <span class="list_item_title">Tipologia di progetto: </span>
                        <span>{{$project->type->name}}</span>  
                    </li>
                    <li>
                        <div class="route_buttons d-flex gap-2 mt-2">
                            <a href="{{route('admin.projects.edit', $project->slug)}}" class="btn btn-outline-dark">Modifica Progetto</a>
                            <form action="{{route('admin.projects.destroy', $project->slug)}}" method="POST">
                                @csrf

                                @method('delete')

                                <input type="submit" value="Cancella Progetto" class="btn btn-outline-dark">
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>

@endsection