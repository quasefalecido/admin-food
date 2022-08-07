@extends('adminlte::page')

@section('title', "Editar o plano {$plan->name}")

@section('content_header')
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('andes.dashboard.index') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('plans.index') }}">Planos</a></li>
    <li class="breadcrumb-item active"><a href="{{ route('plans.edit', $plan->id) }}">Editando Plano</a></li>
  </ol>
  <h1>Editar o plano {{ $plan->name }}</h1>
@stop

@section('content')
  <div class="card">
    <div class="card-body">
      <form action="{{ route('plans.update', $plan->url) }}" class="form" method="POST">
        @csrf
        @method('PUT')

        @include('andes.pages.plans._partials.form')
      </form>
    </div>
  </div>
@endsection
