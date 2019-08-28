@extends('layout.my_layout')

@section('content')
    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Home</a></li>
            </ol>
        </div>
    </div>
    
    <!-- row -->
    <div class="col-lg-12">
        {{-- msg sucesso --}}
        @if(session('success'))
            <p class="alert alert-success">{{ session('success') }}</p>
        @endif

        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Editar Arquivo</h4>
                <div class="basic-form">
                    <form action="{{ url('/arquivos/edit', $arquivos->id) }}" method="post"  enctype="multipart/form-data">
                        {{-- TOKEN --}}
                        @csrf
                        <input type="hidden" name="_method" value="PUT">
                        <div class="form-row">
                            <div class="form-group col-md-2">
                                <label>Nº Arquivo</label>
                                <input type="text" class="form-control" name="num_arquivo" value="{{ $arquivos->num_arquivo}}">
                            </div>
                            <div class="form-group col-md-2">
                                <label>Data Inclusão</label>
                                <input type="date" class="form-control" name="dat_arquivo" value="{{ $arquivos->dat_arquivo}}">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Tipo arquivo</label>
                                <input type="text" class="form-control" placeholder="Tipo arquivo" name="tipo_arquivo" value="{{ $arquivos->tipo_arquivo}}">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Nome arquivo</label>
                                <input type="text" class="form-control" placeholder="Nome aquivo" name="nome_arquivo" value="{{ $arquivos->nome_arquivo}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Descrição do arquivo</label>
                            <textarea class="form-control h-150px" rows="6" id="dsc_arquivo" name="dsc_arquivo" value="{{ $arquivos->dsc_arquivo}}">{{ $arquivos->dsc_arquivo}}</textarea>
                        </div>
                        <div class="form-group">
                                @if($arquivos->imagem  != null)
                                    <div class="row ml-3 mb-3">
                                        <embed width="900" height="207" name="plugin" src="{{ url('storage/categories/'.$arquivos->imagem) }}" type="application/pdf">
                                    </div>    
                                    <div class="row ml-1 mb-3">
                                        <a href="{{ url('storage/categories/'.$arquivos->imagem) }}" target="_blank" class="mb-3">CLIQUE PARA ABRIR ARQUIVO - {{$arquivos->imagem}}</a>
                                    </div>    
                                @endif
    
                                <input type="file" name="imagem" class="form-control">    
                            </div>
                        <button type="submit" class="btn btn-primary">Salvar</button>
                        <a href="{{ url('/arquivos') }}" class="btn btn-default">Voltar</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection