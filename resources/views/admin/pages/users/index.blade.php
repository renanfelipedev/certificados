@extends('admin.layouts.app')

@section('page-title', 'Lista de usuários')

@section('page-content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('admin.dashboard') }}">Dashboard</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Usuários</li>
        </ol>
    </nav>


    @include('admin.pages.users.create')

    <br>

    @include('admin.pages.users.list')
@endsection
