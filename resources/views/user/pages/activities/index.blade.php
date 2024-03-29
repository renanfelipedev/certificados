@extends('user.layouts.app')

@section('page-title', '')

@section('page-title-content')

    <a href="{{ route('activities.create') }}" class="btn btn-success btn-icon-split m-1 ">
        <span class="icon text-white-50">
            <i class="fa fa-plus"></i>
        </span>
        <span class="text">
            Cadastrar Nova Atividade
        </span>
    </a>

@endsection

@section('page-content')

    {{-- <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('user.dashboard') }}">Dashboard</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Atividades</li>
        </ol>
    </nav> --}}

    <div class="card border-0 mb-5">
        <div class="card-body">
            <h2 class="page-header">Gestão de Atividades</h2>
        </div>
    </div>

    @if (count($activities) < 1)
        <div class="alert alert-primary">
            <i class="fa fa-info-circle"></i> Nenhuma atividade cadastrada
        </div>
    @else
        @foreach ($activities as $activity)
            <div class="card border-left-success mb-4">
                <div class="card-body">
                    <h5 class="d-flex align-items-center mb-4">
                        {{ $activity->type->title }}

                        @if ($activity->teams->count() > 0)
                            <a href="{{ route('teams.index', $activity->id) }}" class="ml-4 badge badge-light p-2">
                                {{ $activity->teams->count() }}
                                Turma{{ $activity->teams->count() > 1 ? 's' : '' }}
                                cadastrada{{ $activity->teams->count() > 1 ? 's' : '' }}
                            </a>
                        @else
                            <span class="ml-4 badge badge-light p-2">Nenhuma turma cadastrada nessa atividade</span>
                        @endif
                    </h5>

                    <div class="d-flex w-100 align-items-center">
                        <h4 class="mr-4">
                            <strong>{{ $activity->title }}</strong>
                        </h4>
                        <h4 class="text-gray-600">{{ $activity->workload }} Horas</h4>
                    </div>

                    {{-- <div class="d-flex flex-column w-100 mb-4">
                        <strong class="mb-3 text-gray-700">Conteúdo Programático</strong>
                        <strong class="text-gray-600">

                            {!! $activity->content !!}
                        </strong>
                    </div> --}}

                    <div class="d-flex w-100">
                        <a href="{{ route('teams.create', $activity->id) }}" class="btn btn-primary btn-icon-split m-1">
                            <span class="icon text-white-50">
                                <i class="fa fa-plus"></i>
                            </span>
                            <span class="text">
                                Adicionar Nova Turma
                            </span>

                        </a>

                        <button class="btn btn-secondary btn-icon-split m-1" data-toggle="modal"
                            data-target="#activitiesShowModal-{{ $activity->id }}">
                            <span class="icon text-white-50">
                                <i class="fa fa-search"></i>
                            </span>
                            <span class="text">
                                Detalhes
                            </span>
                        </button>


                        <a href="{{ route('activities.edit', $activity->id) }}"
                            class="btn btn-secondary btn-icon-split m-1 ">
                            <span class="icon text-white-50">
                                <i class="fa fa-edit"></i>
                            </span>
                            <span class="text">
                                Editar
                            </span>
                        </a>

                        <a href="#" class="btn btn-danger btn-icon-split m-1 " data-toggle="modal"
                            data-target="#deleteModal-{{ $activity->id }}">
                            <span class="icon text-white-50">
                                <i class="fa fa-trash"></i>
                            </span>
                            <span class="text">
                                Excluir
                            </span>
                        </a>

                        @include('user.pages.activities.show')

                        <x-delete-modal modalId="deleteModal-{{ $activity->id }}" message="Deseja realmente excluir?"
                            btnText="Excluir" formAction="{{ route('activities.destroy', $activity->id) }}"
                            formName="deleteForm{{ $activity->id }}" />
                    </div>
                </div>
            </div>
        @endforeach
    @endif

@endsection
