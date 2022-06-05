@extends('layouts.app')

@section('content')   
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-center">
                    <h4>Lista de Ordens:</h4>
                </div>
                <div class="card-body">
                @if(Session::has('mensagem_sucesso'))
                    <div class="alert alert-success" id="alert"> 
                        {{ Session::get('mensagem_sucesso') }}
                    </div>
                @endif        
                <!-- Função em Java Script para sumir a mensagem automaticamente -->
                <script type="text/javascript">
                    $("document").ready(function(){
                        setTimeout(function(){
                        $("div.alert").remove(); 
                    }, 2000);
                });
                </script>        
                
                <div class="box-header">
                    <form action="{{ route('filtro') }}" method="POST" class="form form-inline">
                        {!! csrf_field() !!}
                        <input type="text" name="codigo" class="form-control mr-1" placeholder="Código">   
                        <input type="text" name="protocolo" class="form-control mr-1" placeholder="Protocolo">
                        <input type="text" name="nome" size="60" class="form-control mr-1" placeholder="Nome">
                        <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i> Pesquisar</button>
                    </form>
                </div>
                
                <hr />
                    <div class="table-responsive">
                        <table class="table table-sm table-hover table-bordered table-striped">
                            <thead>
                                <tr>                                    
                                    <th>@sortablelink('ords_codigo')</th>
                                    <th>@sortablelink('protocolo')</th>
                                    <th>@sortablelink('nome')</th>                                    
                                    <th>CPF / CNPJ</th>
                                    <th>@sortablelink('status_ordem')</th>
                                    <th>Opções</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ordens as $ordem)
                                    <tr>
                                        <td>{{ $ordem->ords_codigo}}</td>
                                        <td>{{ $ordem->protocolo }}</td>
                                        <td>{{ $ordem->nome }}</td>
                                        <td>{{ $ordem->cpf }}</td>
                                        <td>{{ $ordem->status_ordem }}</td>                            
                                        <td>                    
                                            <form style=display:inline action="search" method="GET" class="form form-inline">
                                                <input hidden id="search" name="search" value={{ $ordem->protocolo }} >
                                                <button type="submit" class="btn btn-info btn-sm"><i class="fas fa-search"></i> Vizualizar</button>
                                            </form>
                                            {!! Form::open(['method'=>'DELETE', 'url'=>'ordem/'.$ordem->id, 'style'=>'display:inline']) !!}
                                                <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Excluir</button>
                                            {!! Form::close() !!}
                                            @if($ordem->status_ordem != 'Pronto')
                                                <a href="{{ url('ordem/'.$ordem->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-pen"></i> Editar</a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="pagination justify-content-center">
                         {{ $ordens->links() }} 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
