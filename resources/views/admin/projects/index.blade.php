@extends('layouts.admin')

@section('page-title', 'progetti')

@section('content')
    <div class="container-md">
        <div class="row mb-4">
            <div class="col d-flex align-items-center mt-4">
                <h1 style="font-family: 'Kanit', sans-serif;" class="text-white flex-grow-1 m-0">
                    {{ __('Progetti') }}
                </h1>
                <a class="text-decoration-none" href="{{ route('admin.projects.create') }}">
                    <button title="Add" class="cssbuttons-io-button">
                        <svg height="25" width="25" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M11 11V5h2v6h6v2h-6v6h-2v-6H5v-2z" fill="currentColor"></path>
                        </svg>
                        <span>Crea un nuovo progetto</span>
                    </button>
                </a>
            </div>
        </div>

        <table class="table table-info table-hover table-bordered table-responsive">
            <thead>
                <tr class="text-center">
                    <th scope="col"></th>
                    <th scope="col">NOME</th>
                    <th scope="col">LINK</th>
                    <th scope="col">DESCRIZIONE PROGETTO</th>
                    <th scope="col">IMMAGINE</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($projects as $project)
                    <tr class="text-center">
                        <th scope="row">{{ $project->id }}</th>
                        <td class="col-3">
                            <a style="text-decoration: none; color:black;"
                                href="{{ route('admin.projects.show', ['project' => $project->id]) }}">{{ $project->name }}</a>
                        </td>
                        <td>
                            <a href="{{ $project->link_github }}"><i class="fs-2 fa-brands fa-github mb-3"></i></a>
                            <a href="{{ $project->link_website }}"><i class="fs-4 fa-solid fa-link"></i></a>
                        </td>
                        <td>
                            <a style="text-decoration: none; color:black;"
                                href="{{ route('admin.projects.show', ['project' => $project->id]) }}">{{ $project->content }}</a>
                        </td>
                        <td>
                            <a style="text-decoration: none; color:black;"
                                href="{{ route('admin.projects.show', ['project' => $project->id]) }}">
                                @if (str_contains($project->cover_image, 'http'))
                                    <img width="150px" src="{{ $project->cover_image }}">
                                @else
                                    <img width="150px" src="{{ asset('storage/' . $project->cover_image) }}"
                                        alt="">
                                @endif
                            </a>
                        </td>
                        <td>
                            <div class="d-flex flex-column gap-1">
                                <div>
                                    <a href="{{ route('admin.projects.show', ['project' => $project->id]) }}">
                                        <button class="btn btn-primary">
                                            <i class="fa-solid fa-arrows-to-eye"></i>
                                        </button>
                                    </a>
                                </div>
                                <div class="d-flex justify-content-center gap-1">
                                    <a href="{{ route('admin.projects.edit', ['project' => $project->id]) }}">
                                        <button class="btn btn-warning">
                                            <i class="fa-solid fa-pen"></i>
                                        </button>
                                    </a>

                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal_{{ $project->id }}">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal_{{ $project->id }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Elimina il progetto
                                                    </h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Sei sicuro di voler eliminare questo progetto?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Annulla</button>
                                                    <form
                                                        action="{{ route('admin.projects.destroy', ['project' => $project->id]) }}"
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
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endsection
