@extends('adminlte::page')

@section('title', 'Cadastrar Novo Plano')

@section('content_header')
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('andes.dashboard.index') }}">Dashboard</a></li>
    <li class="breadcrumb-item active"><a href="{{ route('plans.index') }}">Planos</a></li>
    <li class="breadcrumb-item active"><a href="{{ route('plans.create') }}">Criar Plano</a></li>
  </ol>
  <h1>Cadastrar Novo Plano</h1>
@stop

@section('content')
  <div class="card">
    <div class="card-body">
      <form action="{{ route('plans.store') }}" class="form" method="POST">
        @csrf

        @include('andes.pages.plans._partials.form')
      </form>
    </div>
  </div>
@endsection
