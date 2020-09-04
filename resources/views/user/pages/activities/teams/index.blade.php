@extends('user.layouts.app')

@section('page-title', '')

@section('page-title-content')

    <a href="{{ route('teams.create', $activity->id) }}" class="btn btn-success btn-icon-split m-1 ">
        <span class="icon text-white-50">
            <i class="fa fa-plus"></i>
        </span>
        <span class="text">
            Cadastrar Nova Turma
        </span>
    </a>

@endsection

@section('page-content')

    {{-- <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('user.dashboard') }}">Dashboard</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Turmas</li>
        </ol>
    </nav> --}}

    @if (count($teams) < 1)
        <div class="alert alert-primary">
            <i class="fa fa-info-circle"></i> Nenhuma turma cadastrada
        </div>
    @else
        @foreach ($teams as $team)
            <div class="card border-left-secondary mb-4 ">
                <div class="card-body">
                    <h4 class="d-flex align-items-center my-2">
                        <strong class="mr-4">
                            {{ $team->activity->title }}
                        </strong>

                        <span class="">
                            <strong>Turma:</strong>
                            {{ $team->title }}
                        </span>
                    </h4>

                    <div class="d-flex my-3">
                        <h5 class="mr-4">
                            <strong>Participantes:</strong>
                            <span class="text-gray-600">{{ $team->students->count() }}</span>
                        </h5>
                        <h5 class="mr-4">
                            <strong>Período de Realização:</strong>
                            <span class="text-gray-600">
                                {{ date('d/m/Y', strtotime($team->start)) }} - {{ date('d/m/Y', strtotime($team->end)) }}
                            </span>
                        </h5>
                        <h5 class="mr-4">
                            <strong>Carga Horária:</strong>
                            <span class="text-gray-600">
                                {{ $team->activity->workload }} Horas
                            </span>
                        </h5>
                    </div>

                    <div class="d-flex">
                        <a href="{{ route('turmas.show', $team->id) }}" class="btn btn-secondary btn-icon-split m-1">
                            <span class="icon text-white-50">
                                <i class="fa fa-search"></i>
                            </span>
                            <span class="text">
                                Detalhes
                            </span>
                        </a>


                        <a href="{{ route('turmas.edit', $team->id) }}" class="btn btn-secondary btn-icon-split m-1 ">
                            <span class="icon text-white-50">
                                <i class="fa fa-edit"></i>
                            </span>
                            <span class="text">
                                Editar
                            </span>
                        </a>

                        <a href="#" class="btn btn-danger btn-icon-split m-1 " data-toggle="modal"
                            data-target="#deleteModal-{{ $team->id }}">
                            <span class="icon text-white-50">
                                <i class="fa fa-trash"></i>
                            </span>
                            <span class="text">
                                Excluir
                            </span>
                        </a>

                        <x-delete-modal modalId="deleteModal-{{ $team->id }}" message="Deseja realmente excluir?"
                            btnText="Excluir"
                            formAction="{{ route('teams.destroy', ['id' => $activity->id, 'team' => $team->id]) }}"
                            formName="deleteForm{{ $team->id }}" />
                    </div>
                </div>
            </div>
        @endforeach
    @endif

@endsection
