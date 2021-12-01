@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h4>{{ __('Revistas') }}</h4>
            <div style="background-color: #fff; padding: 20px;">
                <table class="table table-striped table-bordered">
                    <thead>
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
@endsection
