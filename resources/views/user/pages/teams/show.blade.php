@extends('user.layouts.app')

@section('page-title', '')

@section('page-before-title-content')
    <a href="{{ url()->previous() }}" class="btn btn-light btn-icon-split m-1">
        <span class="icon text-white-50">
            <i class="fa fa-arrow-left"></i>
        </span>
        <span class="text">
            Voltar
        </span>
    </a>
@endsection

@section('page-content')

    <div class="card border-0">
        <div class="card-header d-flex align-items-center">
            <h4>
                <strong>Turma {{ $team->title }} - {{ $team->activity->title }}</strong>
            </h4>
            <span class="ml-4">
                <a class="btn btn-sm btn-outline-secondary" href="{{ route('turmas.edit', $team->id) }}">
                    <i class="fa fa-edit"></i> Editar turma
                </a>
            </span>
        </div>
        <div class="card-body">
            <h5 class=""><strong>Informações sobre o evento</strong></h5>

            <div class="mt-4">
                <p>
                    <strong>Nº de Participantes:</strong>
                    <span class="text-gray-600">
                        {{ $team->students->count() }}
                    </span>
                </p>
                <p>
                    <strong>Período de Realização:</strong>
                    <span class="text-gray-600">
                        {{ date('d/m/Y', strtotime($team->start)) }} -
                        {{ date('d/m/Y', strtotime($team->end)) }}
                    </span>
                </p>
                <p>
                    <strong>Carga horária:</strong>
                    <span class="text-gray-600">
                        {{ $team->activity->workload }} Horas
                    </span>
                </p>
                <p>
                    <strong class="mr-2">Modelo de certificado: </strong>
                    <span>
                        <a href="{{ route('mostrar.certificado', $team->id) }}" class="badge badge-info p-2"
                            target="_blank">
                            Visualizar
                        </a>

                        <a href="" class="badge badge-info p-2" data-toggle="modal" data-target="#changeCertificateModal">
                            Alterar Modelo
                        </a>
                        @error('file')
                            <span class="badge badge-danger">{{ $message }}</span>
                        @enderror

                        @include('user.pages.teams.change-certificate')
                    </span>
                </p>
            </div>
        </div>
    </div>

    <br>

    <div class="card border-0">
        <div class="card-body">
            <div class="d-flex justify-content-center mt-4">
                <button class="btn btn-secondary m-1" data-toggle="modal" data-target="#createStudentModal">
                    Adicionar Participante
                </button>

                <button class="btn btn-secondary m-1" data-toggle="modal" data-target="#importStudentModal">
                    Importar Participantes
                </button>

                <button class="btn btn-secondary m-1" disabled>
                    Enviar Certificado por E-mail
                </button>
            </div>

            @include('user.pages.students.create')
            @include('user.pages.students.import')

            <div class="d-flex mt-1">
                <button class="btn btn-danger btn-icon-split m-1" disabled>
                    <span class="icon text-white-50">
                        <i class="fa fa-trash"></i>
                    </span>
                    <span class="text">
                        Remover selecionados
                    </span>
                </button>
            </div>

            @include('user.pages.students.list')
        </div>
    </div>

@endsection
