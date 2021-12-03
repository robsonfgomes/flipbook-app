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
                    <form method="POST" action="{{ route('revistas.inserir') }}" name="formCreateRevista" id="formCreateRevista" enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-3">
                            <label for="edicao" class="col-md-2 col-form-label text-md-right">{{ __('Edição:') }}</label>

                            <div class="col-md-4">
                                <input id="edicao" name="edicao" type="number" placeholder="183" class="form-control @error('edicao') is-invalid @enderror" value="{{ old('edicao') }}" required autofocus>

                                @error('edicao')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="descricao" class="col-md-2 col-form-label text-md-right">{{ __('Descrição:') }}</label>

                            <div class="col-md-9">
                                <input id="descricao" name="descricao" type="text" placeholder="Novembro/Dezembro 2020" class="form-control @error('descricao') is-invalid @enderror" value="{{ old('descricao') }}" required>

                                @error('descricao')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="thumbnail" class="col-md-2 col-form-label text-md-right">{{ __('Capa:') }}</label>

                            <div class="col-md-9">
                                <input id="thumbnail" name="thumbnail" type="file" accept=".png" class="form-control @error('thumbnail') is-invalid @enderror" required>

                                @error('thumbnail')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>                            
                        </div>

                        <div class="row mb-3">
                            <label for="pdf" class="col-md-2 col-form-label text-md-right">{{ __('Revista:') }}</label>

                            <div class="col-md-9">
                                <input id="pdf" name="pdf" type="file" accept=".pdf" class="form-control @error('pdf') is-invalid @enderror" required>

                                @error('pdf')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>                       

                        <div class="row mb-3">
                            <div class="col-md-11 text-right">                                                                
                                <button type="submit" class="btn btn-sm btn-success">Salvar</button>
                                <a href="{{ url('/') }}" class="btn btn-sm btn-light">Cancelar</a>
                            </div>   
                        </div>                     
                    </form>
                </div>                
            </div>            
        </div>
    </div>
    @if (isset($revista) && !empty($revista))
        <div class="row justify-content-center">
            <img src="/storage/{{ $revista->thumbnail }}" />     
            <a href="/storage/{{ $revista->pdf }}" target="_blank">Revista</a>
        </div>
    @endif
</div>
@endsection