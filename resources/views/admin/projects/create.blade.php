@extends('layouts.app')

@section('content')

    <h1 class="text-center">Creazione nuovo Progetto</h1>

    <div class="container">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action={{route("admin.projects.store")}} method="post" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="form-label">Titolo</label>
                <input type="text" class="form-control" name="title">
            </div>
            <div class="mb-3">
                <label for="form-label">URLimmagine</label>
                <input type="file" accept="image/*" class="form-control" name="imageURL">
            </div>
            <div class="mb-3">
                <label for="form-label">Tipologia Progetto:</label>
                <select class="form-select" name="type_id">
                    @foreach ($types as $type)
                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="form-label">GithubURL</label>
                <input type="text" class="form-control" name="githubURL">
            </div>
            <div class="mb-3">
                <label for="form-label">Descrizione</label>
                <textarea class="form-control" name="description"></textarea>
            </div>
            <div class="mb-3">
                <label for="form-label">Progetto terminato:</label>
                <select class="form-select" name="finished">
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                </select>
            </div>
            <a href={{route("admin.projects.index")}} class="btn btn-outline-dark me-2">Indietro</a>
            <button class="btn btn-outline-dark">Salva</button>
        </form>
    </div>

@endsection