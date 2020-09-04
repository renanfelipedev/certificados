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
        <div class="card-header">
            <h4>
                <strong>Turma {{ $team->title }} - {{ $team->activity->title }}</strong>
            </h4>
        </div>
        <div class="card-body">
            <strong>Informações sobre o evento:</strong>

            <div class="mt-4">
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
                        <a href="#" class="badge badge-info p-2">
                            Visualizar
                        </a>

                        <a href="#" class="badge badge-info p-2">
                            Alterar Modelo
                        </a>
                    </span>
                </p>
            </div>
        </div>
    </div>

    <br>

    <div class="card border-0">
        <div class="card-body">
            <strong>Participantes: </strong>
            <div class="d-flex justify-content-center mt-4">
                <button class="btn btn-secondary m-1" data-toggle="modal" data-target="#createStudentModal">
                    Adicionar Participante
                </button>

                <button class="btn btn-secondary m-1" data-toggle="modal" data-target="#importStudentModal">
                    Importar Participantes
                </button>

                <button class="btn btn-secondary m-1">
                    Enviar Certificado por E-mail
                </button>
            </div>

            @include('user.pages.students.create')
            @include('user.pages.students.import')

            <div class="d-flex mt-1">
                <button class="btn btn-danger btn-icon-split m-1">
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
