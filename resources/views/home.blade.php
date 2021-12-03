@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center mb-3">
        <div class="col-md-8">
                <h4>{{ __('Revistas') }}</h4>
        </div>
        <div class="col-md-4 text-right">
            @if (Route::has('revistas.inserir'))
                <a href="{{ route('revistas.inserir') }}" class="btn btn-sm btn-primary pull-right">Nova revista</a>
            @endif
        </div>
    </div>

    <div class="row mb-3">
        @foreach ($revistas as $key => $revista)                                
            <div class="col-md-3">                
                <div class="card card-revista" style="width: 18rem;">
                    <a href="/storage/{{ $revista->pdf }}" target="_blank">
                        <img src="/storage/{{ $revista->thumbnail }}" class="card-img-top" alt="...">
                    </a>
                    <div class="card-body">
                        <a href="/storage/{{ $revista->pdf }}" target="_blank">
                            <h5 class="card-title">Edição {{ $revista->edicao }}</h5>
                        </a>
                        <p class="card-text">{{ $revista->descricao }}</p>                        
                        <div class="form-check form-switch">                            
                            <input class="form-check-input" type="checkbox" role="switch" id="publicado{{ $revista->id }}" {{ $revista->publicado ? 'checked' : '' }}>
                            <label class="form-check-label" for="publicado{{ $revista->id }}">{{ $revista->publicado ? 'Online' : 'Offline' }}</label>                            
                        </div>                        
                    </div>
                </div>                
            </div>            
        @endforeach
    </div>
</div>
@endsection
