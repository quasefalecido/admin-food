@extends('adminlte::page')

@section('title', 'Planos')

@section('content_header')
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('andes.dashboard.index') }}">Dashboard</a></li>
    <li class="breadcrumb-item active"><a href="{{ route('plans.index') }}">Planos</a></li>
  </ol>
  <h1>Planos <a href="{{ route('plans.create') }}" class="btn btn-dark"><i class="fas fa-plus-square"></i></a></h1>
@stop

@section('content')
  <div class="card">
    <div class="card-header">
      <form action="{{ route('plans.search') }}" method="POST" class="form form-inline">
        @csrf
        <input type="text" name="filter" placeholder="Nome" class="form-control"
          value="{{ $filters['filter'] ?? '' }}">
        <button type="submit" class="btn btn-dark">Filtrar</button>
      </form>
    </div>
    <div class="card-body">
      <table class="table table-condensed">
        <thead>
          <tr>
            <th>Nome</th>
            <th>Preço</th>
            <th width="270">Ações</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($plans as $item)
            <tr>
              <td>
                {{ $item->name }}
              </td>
              <td>
                R$ {{ number_format($item->price, 2, ',', '.') }}
              </td>
              <td style="width=10px;">
                <a href="{{ route('details.plan.index', $item->url) }}" class="btn btn-primary"><i class="fas fa-list"></i></a>
                <a href="{{ route('plans.edit', $item->url) }}" class="btn btn-info"><i class="fas fa-pen-alt"></i></a>
                <a href="{{ route('plans.show', $item->url) }}" class="btn btn-warning"><i class="fas fa-eye"></i></a>
                {{-- <a href="{{ route('plans.profiles', $item->id) }}" class="btn btn-warning">
                  <i class="fas fa-address-book"></i>
                </a> --}}
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <div class="card-footer">
      @if (isset($filters))
        {!! $plans->appends($filters)->links() !!}
      @else
        {!! $plans->links() !!}
      @endif
    </div>
  </div>
@stop
