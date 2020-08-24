@extends('user.layouts.app')

@section('page-title', 'Gestão de Atividades')

@section('page-title-content')

    <a href="{{ route('activities.create') }}" class="btn  btn-success">
        <i class="fa fa-plus"></i> Nova Atividade
    </a>

@endsection

@section('page-content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('user.dashboard') }}">Dashboard</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Atividades</li>
        </ol>
    </nav>

@endsection
