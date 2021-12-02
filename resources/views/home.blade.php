@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">            
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-8">
                            {{ __('Revistas') }}
                        </div>
                        <div class="col-md-4 text-right">
                            @if (Route::has('revistas.inserir'))
                                <a href="{{ route('revistas.inserir') }}" class="btn btn-sm btn-primary pull-right">Nova revista</a>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-bordered">
                        <thead class="text-center">
                            <th>#</th>
                            <th>nome</th>
                            <th>Edição</th>
                            <th>Status</th>
                            <th>Visualizar</th>
                        </thead>
                        <tbody>
                            @foreach ($revistas as $key => $revista)
                                <tr>
                                    <td>{{ ($key) }}</td>
                                    <td>{{ $revista->nome }}</td>
                                    <td>{{ $revista->edicao }}</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
