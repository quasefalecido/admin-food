@extends('adminlte::page')

@section('title', "Permissões do perfil {$profile->name}")

@section('content_header')
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('andes.dashboard.index') }}">Dashboard</a></li>
    <li class="breadcrumb-item active"><a href="{{ route('profiles.index') }}" class="active">Perfis</a></li>
  </ol>
  <h1>Permissões do perfil <strong>{{ $profile->name }}</strong>
    <a href="{{ route('profiles.permissions.available', $profile->id) }}" class="btn btn-dark">
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
          @foreach ($permissions as $item)
            <tr>
              <td>
                {{ $item->name }}
              </td>
              <td style="width=10px;">
                <a href="{{ route('profiles.permission.detach', [$profile->id, $item->id]) }}"
                  class="btn btn-danger">
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
        {!! $permissions->appends($filters)->links() !!}
      @else
        {!! $permissions->links() !!}
      @endif
    </div>
  </div>
@stop
