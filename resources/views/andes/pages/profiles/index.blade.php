@extends('adminlte::page')

@section('title', 'Perfis')

@section('content_header')
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('andes.dashboard.index') }}">Dashboard</a></li>
    <li class="breadcrumb-item active"><a href="{{ route('profiles.index') }}">Perfis</a></li>
  </ol>

  <h1>Perfis
    <a href="{{ route('profiles.create') }}" class="btn btn-dark">
      <i class="fas fa-plus-square"></i>
    </a>
  </h1>
@stop

@section('content')
  <div class="card">
    <div class="card-header">
      <form action="{{ route('profiles.search') }}" method="POST" class="form form-inline">
        @csrf
        <input type="text" name="filter" placeholder="Filtro" class="form-control"
          value="{{ $filters['filter'] ?? '' }}">
        <button type="submit" class="btn btn-dark">Filtrar</button>
      </form>
    </div>
    <div class="card-body">
      <table class="table table-condensed">
        <thead>
          <tr>
            <th>Nome</th>
            <th width="270">Ações</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($profiles as $item)
            <tr>
              <td>
                {{ $item->name }}
              </td>
              <td style="width=10px;">
                <a href="{{ route('profiles.edit', $item->id) }}" class="btn btn-info">
                  <i class="fas fa-pen-alt"></i>
                </a>
                <a href="{{ route('profiles.show', $item->id) }}" class="btn btn-warning">
                  <i class="fas fa-eye"></i>
                </a>
                <a href="{{ route('profiles.permissions', $item->id) }}" class="btn btn-warning">
                  <i class="fas fa-lock"></i>
                </a>
                {{-- <a href="{{ route('profiles.plans', $profile->id) }}" class="btn btn-info"><i
                    class="fas fa-list-alt"></i></a> --}}
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
