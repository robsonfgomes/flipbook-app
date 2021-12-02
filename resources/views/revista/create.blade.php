@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">        
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ __('Nova revista') }}
                </div>
                <div class="card-body">

                </div>
                <div class="card-footer text-right bg-white">
                    <button type="button" class="btn btn-sm btn-success">Salvar</button>
                    <a href="{{ url('/') }}" class="btn btn-sm btn-light">Cancelar</a>
                </div>
            </div>            
        </div>
    </div>
</div>
@endsection