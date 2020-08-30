@extends('user.layouts.app')

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

@section('page-title', '')

@section('page-content')

    {{-- <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('user.dashboard') }}">Dashboard</a>
            </li>
            <li class="breadcrumb-item " aria-current="page">
                <a href="{{ route('activities.index') }}">Atividades</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Editar Atividade</li>
        </ol>
    </nav> --}}


    <div class="card shadow border-0">

        {{-- <a href="#activitiesCreate" class="d-block card-header py-3" data-toggle="collapse" role="button"
            aria-expanded="false" aria-controls="activitiesCreate">
            <h6 class="m-0 font-weight-bold text-primary">Editar atividade</h6>
        </a> --}}

        <div class="collapse show" id="activitiesCreate">
            <div class="card-body">
                <h5 class="card-title">Dados de atividade</h5>

                <form action="{{ route('activities.update', $activity->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-row">

                        <div class="form-group col-lg-3 col-md-4">
                            <label for="activity_type_id" class="text-gray-700">Tipo </label>

                            <select name="activity_type_id" id="activity_type_id"
                                class="custom-select form-control @error('activity_type_id') is-invalid @enderror">
                                <option value="" selected disabled></option>
                                @foreach ($types as $type)
                                    <option value="{{ $type->id }}"
                                        {{ old('activity_type_id', $activity->type->id) == $type->id ? 'selected' : '' }}>
                                        {{ $type->title }}</option>
                                @endforeach
                            </select>

                            @error('activity_type_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group col-lg-6 col-md-8">
                            <label for="title" class="text-gray-700">Título da atividade</label>
                            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                                id="title" value="{{ old('title', $activity->title) }}">
                            @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group col-lg-3 col-md-4">
                            <label for="workload" class="text-gray-700">Carga Horária</label>
                            <div class="input-group">
                                <input type="text" name="workload"
                                    class="form-control @error('workload') is-invalid @enderror" id="workload"
                                    value="{{ old('workload', $activity->workload) }}">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Horas</span>
                                </div>
                            </div>

                            <small class="form-text text-muted">
                                Somente números
                            </small>

                            @error('workload')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                    </div>

                    <hr>

                    <div class="form-row">


                        <div class="form-group col-lg-12">
                            <label for="editor" class="text-gray-700">Conteúdo Programático</label>
                            <textarea name="content" id="editor" rows="5"
                                class="form-control">{{ old('content', $activity->content) }}</textarea>
                            @error('content')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group col-lg-12 col-md-12">
                            <label class="text-gray-600" for=""></label>
                            <button type="submit" class="btn btn-success btn-icon-split">
                                <span class="icon text-white-50">
                                    <i class="fa fa-check"></i>
                                </span>
                                <span class="text">
                                    Atualizar Atividade
                                </span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
