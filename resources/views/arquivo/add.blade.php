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
                    <form action="{{ url('/arquivos/store') }}" method="post" enctype="multipart/form-data">
                        @csrf{{-- TOKEN --}}
                        <div class="form-row">
                            <div class="form-group col-md-2">
                                <label>Nº Arquivo</label>
                                <input type="text" class="form-control" name="num_arquivo">
                            </div>
                            <div class="form-group col-md-2">
                                <label>Data Inclusão</label>
                                <input type="date" class="form-control" name="dat_arquivo">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Tipo arquivo</label>
                                <input type="text" class="form-control" placeholder="Tipo arquivo" accept="application/pdf" name="tipo_arquivo">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Nome arquivo</label>
                                <input type="text" class="form-control" placeholder="Nome aquivo" name="nome_arquivo">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Descrição do arquivo</label>
                            <textarea class="form-control h-150px" rows="2" id="dsc_arquivo" name="dsc_arquivo" maxlength="255"></textarea>
                            <small id="emailHelp" class="form-text text-muted">Digite até 255 caracteres.</small>
                        </div>
                        
                        <div class="form-group">
                            {{-- @if(auth()->user()->imagem  != null)
                                <img src="{{ url('storage/categories'.auth()->user()->imagem) }}" alt="{{ auth()->user()->imagem }}" style="max-width: 50px;">
                            @endif --}}

                            <input type="file" name="imagem" class="form-control">    
                        </div>
 
                        <button type="submit" class="btn btn-primary">Salvar</button>
                        <a href="{{ url('/arquivos') }}" class="btn btn-default">Voltar</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
{{--     
    @foreach( $categories as $category )
        {{ $category->name }}
    
        <img src="{{ url("categories/{$category->image}") }}" alt="{{ $category->name }}">
    @endforeach --}}

@endsection