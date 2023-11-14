@extends('layouts.admin')

@section('page-title', 'progetto')

@section('content')
    <div class="container-md py-5">

        <table class="table table-info table-hover table-bordered table-responsive">
            <thead>
                <tr class="text-center">
                    <th scope="col"></th>
                    <th scope="col">NOME</th>
                    <th scope="col">LINK</th>
                    <th scope="col">DESCRIZIONE PROGETTO</th>
                    <th scope="col">IMMAGINE</th>
                </tr>
            </thead>
            <tbody>
                <tr class="text-center">
                    <th scope="row">{{ $project->id }}</th>
                    <td class="col-3">{{ $project->name }}</td>
                    <td class="col">
                        <a href="{{ $project->link_github }}"><i class="fs-2 fa-brands fa-github mb-4"></i></a>
                        <a href="{{ $project->link_website }}"><i class="fs-4 fa-solid fa-link"></i></a>
                    </td>
                    <td>{{ $project->content }}</td>
                    <td>
                        @if (str_contains($project->cover_image, 'http'))
                            <img width="300px" src="{{ $project->cover_image }}">
                        @else
                            <img width="300px" src="{{ asset('storage/' . $project->cover_image) }}" alt="">
                        @endif
                    </td>
                </tr>

            </tbody>
        </table>

        <div class="d-flex justify-content-center gap-2">
            <a href="{{ route('admin.projects.edit', ['project' => $project->id]) }}">
                <button class="btn btn-warning">
                    <i class="fa-solid fa-pen"></i> Modifica
                </button>
            </a>

            <!-- Button trigger modal -->
            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                data-bs-target="#exampleModal_{{ $project->id }}">
                <i class="fa-solid fa-trash"></i> Elimina
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal_{{ $project->id }}" tabindex="-1"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Elimina il progetto</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Sei sicuro di voler eliminare questo progetto?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                            <form action="{{ route('admin.projects.destroy', ['project' => $project->id]) }}"
                                method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Elimina</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
