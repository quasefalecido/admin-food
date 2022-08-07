@extends('adminlte::page')

@section('title', "Perfis do plano {$plan->name}")

@section('content_header')
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('andes.dashboard.index') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('plans.index') }}">Planos</a></li>
    <li class="breadcrumb-item active"><a href="{{ route('plans.profiles', $plan->id) }}" class="active">Perfis</a></li>
  </ol>
  <h1>Perfis do plano <strong>{{ $plan->name }}</strong>
    <a href="{{ route('plans.profiles.available', $plan->id) }}" class="btn btn-dark">
      <i class="fas fa-plus-square"></i>
    </a>
  </h1>
@stop

@section('content')
  <div class="card">
    <div class="card-body">
      <table class="table table-condensed">
        <thead>
          <tr>
            <th>Nome</th>
            <th width="50">Ações</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($profiles as $item)
            <tr>
              <td>
                {{ $item->name }}
              </td>
              <td style="width=10px;">
                <a href="{{ route('plans.profile.detach', [$plan->id, $item->id]) }}" class="btn btn-danger">
                  <i class="fas fa-trash"></i>
                </a>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <div class="card-footer">
      @if (isset($filters))
        {!! $profiles->appends($filters)->links() !!}
      @else
        {!! $profiles->links() !!}
      @endif
    </div>
  </div>
@stop
