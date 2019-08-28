@extends('layout.my_layout')

@section('content')

    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Cadastro</a></li>
            </ol>
        </div>
    </div>

    
    <!-- row -->
    <div class="container-fluid">
        {{-- msg sucesso --}}
        @if(session('success'))
            <p class="alert alert-success">{{ session('success') }}</p>
        @endif

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row"><a href="{{ url('/arquivos/add') }}" class="btn btn-primary mb-3 ml-2">Adicionar</a></button></div>
                        <h4 class="card-title">Listar Arquivos</h4>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Tipo</th>
                                        <th>Nome Arquivo</th>
                                        <th>Descrição</th>
                                        <th>Nº Aquivo</th>
                                        <th>Data Inclusão</th>
                                        <th>Arquivo</th>
                                        <th>Ação</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($arquivos as $arquivo)
                                    <tr>
                                        <td>{{ $arquivo->id}}</td>
                                        <td>{{ $arquivo->tipo_arquivo}}</td>
                                        <td>{{ $arquivo->nome_arquivo}}</td>
                                        <td>{{ $arquivo->dsc_arquivo}}</td>
                                        <td>{{ $arquivo->num_arquivo}}</td>
                                        <td>{{ $arquivo->dat_arquivo}}</td>
                                        <td>
                                            {{-- {{ $arquivo->imagem}} --}}
                                            {{-- <a href="{{ url('storage/categories/'.$arquivo->imagem) }}" target="_blank" class="badge badge-info mb-3">ARQUIVO {{$arquivo->imagem}}</a> --}}
                                            <p><a href="{{ url('storage/categories/'.$arquivo->imagem) }}" target="_blank" class="text-info">{{$arquivo->imagem}}</a></p>
                                        </td>
                                        <td>
                                            <form action="{{ url('/arquivos/delete', $arquivo->id) }}" method="post">
                                                {{-- TOKEN --}}
                                                @csrf
                                                <input type="hidden" name="_method" value="DELETE">
                                                {{-- <a href="{{ url('/arquivos/edit', $arquivo->id) }}" class="btn btn-primary btn-sm">Editar</a> --}}
                                                {{-- <input type="submit" value="Deletar" class="btn btn-danger btn-sm"> --}}
                                                <a href="{{ url('/arquivos/edit', $arquivo->id) }}" class="btn mb-1 btn-rounded btn-primary btn-sm">Editar</a>
                                                <input type="submit" value="Deletar" class="btn mb-1 btn-rounded btn-danger btn-sm">
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach    
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>ID</th>
                                        <th>Tipo</th>
                                        <th>Nome Arquivo</th>
                                        <th>Descrição</th>
                                        <th>Nº Aquivo</th>
                                        <th>Data Inclusão</th>
                                        <th>Arquivo</th>
                                        <th>Ação</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- #/ container -->

    {{-- @foreach( $categories as $category )
    {{ $category->name }}
 
    <img src="{{ url("categories/{$category->image}") }}" alt="{{ $category->name }}">
    @endforeach --}}

@endsection