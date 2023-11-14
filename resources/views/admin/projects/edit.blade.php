@extends('layouts.admin')

@section('page-title', 'modifica progetto')

@section('content')
    <div class="row my-3">
        <div class="col d-flex align-items-center mt-4">
            <h1 style="font-family: 'Kanit', sans-serif;" class="text-white flex-grow-1 m-0">
                {{ __('Modifica progetto') }}
            </h1>
        </div>
    </div>

    <form action="{{ route('admin.projects.update', $project) }}" method="POST" enctype="multipart/form-data">

        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label text-warning">Nome</label>
            <input type="text" class="form-control" name="name" id="name" aria-describedby="helpId"
                placeholder="Acolyte Eco Battle staff" value="{{ old('name', $project->name) }}">
            <small id="nameHelper" class="form-text text-white">
                <i class="fa-solid fa-circle-exclamation"></i>
                Digitare il nome qui

                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </small>
        </div>

        <div class="mb-3">
            <label for="link_github" class="form-label text-warning">Link Github</label>
            <input type="text" class="form-control" name="link_github" id="link_github"
                aria-describedby="link_githubHelper" placeholder="https://www.example.com"
                value="{{ old('link_github', $project->link_github) }}">
            <small id="link_githubHelper" class="form-text text-white">
                <i class="fa-solid fa-circle-exclamation"></i>
                Digitare il link di Github qui

                @error('link_github')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </small>
        </div>

        <div class="mb-3">
            <label for="link_website" class="form-label text-warning">Link Sito Web</label>
            <input type="text" class="form-control" name="link_website" id="link_website"
                aria-describedby="link_websiteHelper" placeholder="https://www.example.com"
                value="{{ old('link_website', $project->link_website) }}">
            <small id="link_websiteHelper" class="form-text text-white">
                <i class="fa-solid fa-circle-exclamation"></i>
                Digitare il link del sito Web qui

                @error('link_website')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </small>
        </div>


        <div class="mb-3">
            <label for="content" class="form-label text-warning">Descrizione</label>
            <input type="text" class="form-control" name="content" id="content" aria-describedby="helpId"
                placeholder="Acolyte is a action movies with..." value="{{ old('content', $project->content) }}">
            <small id="contentHelper" class="form-text text-white">Inserisci la descrizione del progetto qui</small>
        </div>

        <div class="mb-3">
            <label for="type_id" class="form-label text-warning">Tipologia di file</label>
            <select class="form-select @error('type_id') is-invalid  @enderror" name="type_id" id="type_id">
                <option selected disabled>Seleziona una tipologia di file</option>

                @forelse ($types as $type)
                    <option value="{{ $type->id }}" {{ $type->id == old('type_id') ? 'selected' : '' }}>
                        {{ $type->name }}</option>
                @empty
                @endforelse
            </select>

            @error('type_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        

        <div class="mb-3">
            <label for="cover_image" class="form-label text-warning">Scegli immagine</label>
            <input type="file" class="form-control" name="cover_image" id="cover_image" placeholder=""
                aria-describedby="cover_image_helper">
            <div id="cover_image_helper" class="form-text text-white">
                Carica un'immagine per il progetto corrente
            </div>
        </div>

        <button type="submit" class="btn btn-primary my-2">
            MODIFICA
        </button>
    </form>

    <div class="form-text text-white mb-5">
        <i class="fa-solid fa-circle-exclamation"></i> =campi richiesti
    </div>
@endsection
