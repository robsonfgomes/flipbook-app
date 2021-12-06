@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center mb-3">
        <div class="col-md-8">
                <h4>{{ __('Revistas') }}</h4>
        </div>
        <div class="col-md-4 text-right">
            @if (Route::has('revistas.inserir'))
                <a href="{{ route('revistas.inserir') }}" class="btn btn-sm btn-primary pull-right">
                    <i class="bi bi-plus-circle-dotted"></i> Nova revista
                </a>
            @endif
        </div>
    </div>    

    <div class="row mb-3">
        <div class="col-md-12"> 
            <div class="flex-container">  
                @foreach ($revistas as $key => $revista)                                                                         
                        <div class="card card-revista">
                            <a href="/storage/{{ $revista->pdf }}" target="_blank">
                                <img src="/storage/{{ $revista->thumbnail }}" class="card-img-top" alt="...">
                            </a>
                            <div class="card-body">
                                <a href="/storage/{{ $revista->pdf }}" target="_blank">
                                    <h5 class="card-title">Edição {{ $revista->edicao }}</h5>
                                </a>
                                <p class="card-text">{{ $revista->descricao }}</p>                                                        
                                <span class="badge bg-light text-dark">
                                    <i class="bi bi-pencil-square"></i> Editar
                                </span>                                     
                                <span class="badge bg-light text-dark">
                                    <i class="bi bi-trash"></i> Excluir
                                </span>            
                            </div>
                        </div>                  
                @endforeach
            </div>
        </div> 
    </div>
</div>
@endsection
