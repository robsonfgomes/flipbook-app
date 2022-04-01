@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center mb-3">
        <div class="col-md-12">
                <h4>{{ __('Revistas') }}</h4>
                @if (Route::has('revistas.inserir'))
                    <a href="{{ route('revistas.inserir') }}" class="btn btn-sm btn-primary pull-right">
                        <i class="bi bi-plus-circle-dotted"></i> Nova revista
                    </a>
                @endif
                @if (Route::has('revistas.list'))
                    <a href="{{ route('revistas.list') }}" class="btn btn-sm btn-secondary pull-right" target="_blank">
                        <i class="bi bi-eye"></i> Ver revistas
                    </a>
                @endif
        </div>    
    </div>    

    <div class="row mb-3">
        <div class="col-md-12"> 
            <br/><br/>
            <div class="flex-container">  
                @foreach ($revistas as $key => $revista)                                                                         
                        <div class="card card-revista">
                            <a href="{{ route('revistas.viewer', ['id' => $revista->id]) }}" target="_blank">
                                <img src="{{ Storage::url($revista->thumbnail) }}" class="card-img-top" alt="...">
                            </a>
                            <div class="card-body">
                                <a href="{{ route('revistas.viewer', ['id' => $revista->id]) }}" target="_blank">
                                    <h5 class="card-title">Edição {{ $revista->edicao }}</h5>
                                </a>
                                <p class="card-text">{{ $revista->descricao }}</p>                                                                   
                                <span class="badge bg-light text-dark" onclick="deleteRevista({{ $revista->id }})">
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

<script>
    function deleteRevista(id) {
        if(confirm("Tem certeza que deseja excluir a revista?")) {
            window.location.href = "/revista/remover/" + id;
        }
    }
</script>
