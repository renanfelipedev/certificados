@extends('user.layouts.app')

@section('page-title', 'Nova Atividade')



@section('page-content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('user.dashboard') }}">Dashboard</a>
            </li>
            <li class="breadcrumb-item " aria-current="page">
                <a href="{{ route('activities.index') }}">Atividades</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Nova Atividade</li>
        </ol>
    </nav>


    <div class="card shadow">

        {{-- <a href="#activitiesCreate" class="d-block card-header py-3" data-toggle="collapse" role="button"
            aria-expanded="false" aria-controls="activitiesCreate">
            <h6 class="m-0 font-weight-bold text-primary">Cadastro de Nova atividade</h6>
        </a> --}}

        <div class="collapse show" id="activitiesCreate">
            <div class="card-body">
                <h5 class="card-title">Dados de atividade</h5>

                <form action="{{ route('activities.store') }}" method="POST">
                    @csrf

                    <div class="form-row">

                        <div class="form-group col-lg-3 col-md-4">
                            <label for="activity_type_id" class="text-gray-700">Tipo </label>
                            <select name="activity_type_id" id="activity_type_id" class="custom-select form-control @error('activity_type_id') is-invalid @enderror">
                                <option value="" selected disabled></option>
                                @foreach ($types as $type)
                                    <option value="{{ $type->id }}" {{ old('activity_type_id') == $type->id ? 'selected' : '' }} >{{ $type->title }}</option>
                                @endforeach
                            </select>
                            <small id="passwordHelpBlock" class="form-text text-muted">
                                Curso | Treinamento | Oficina
                            </small>
                            @error('activity_type_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group col-lg-6 col-md-8">
                            <label for="title" class="text-gray-700">Título da atividade</label>
                            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                                id="title" value="{{ old('title') }}">
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
                                    value="{{ old('workload') }}">
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
                            {{-- <input type="text"
                                class="editor form-control @error('content') is-invalid @enderror" id="editor"
                                value="{{ old('content') }}"> --}}
                            <textarea name="content" id="editor" rows="5"
                                class="form-control">{{ old('content') }}</textarea>
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
                                    <i class="fa fa-plus"></i>
                                </span>
                                <span class="text">
                                    Cadastrar Atividade
                                </span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
