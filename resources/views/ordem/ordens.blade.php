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
                                   
                <!-- Exibe mensagem de sucesso -->
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
                <!-- FILTROS -->
                <div class="box-header">
                    <form action="{{ route('filtro') }}" method="POST" class="form form-inline">
                        {!! csrf_field() !!}
                        <select class="form-control mr-1" name="status_ordem">
                            <option value="">-- Selecionar Status --</option>
                            <option value="A fazer">A Fazer</option>
                            <option value="Em andamento">Em Andamento</option>
                            <option value="Pronto">Pronto</option>
                        </select>
                        <input type="text" name="codigo" class="form-control mr-1" placeholder="Código">   
                        <input type="text" name="protocolo" class="form-control mr-1" placeholder="Protocolo"> 
                        <input type="text" name="nome" size="45" class="form-control mr-1" placeholder="Nome">
                        <button type="submit" class="btn btn-primary mr-1"><i class="fas fa-search"></i> Pesquisar</button>        
                        <button type="button" class="btn btn-success" onClick="window.location.reload()"><i class="fas fa-redo"></i> Atualizar Ordens</button>  
                    </form>
                </div>
                
                <hr />
                    <!-- Tabela com as Ordens -->
                    <div class="table-responsive">
                        <table class="table table-sm table-hover table-bordered table-striped">
                            <thead>
                                <tr>                                    
                                    <th>@sortablelink('id')</th>
                                    <th>@sortablelink('protocolo')</th>
                                    <th>@sortablelink('nome')</th>                                    
                                    <th>CPF / CNPJ</th>
                                    <th>@sortablelink('status_ordem')</th>
                                    <th>Opções</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($ordens as $ordem)
                                    <tr>
                                        <td>{{ $ordem->id }}</td>
                                        <td>{{ $ordem->protocolo }}</td>
                                        <td>{{ $ordem->nome }}</td>
                                        <td>{{ $ordem->cpf }}</td>
                                        <td>{{ $ordem->status_ordem }}</td>                            
                                        <td>                    
                                            <form style=display:inline action="search" method="GET" class="form form-inline">
                                                <input hidden id="search" name="search" value={{ $ordem->protocolo }} >
                                                <button type="submit" class="btn btn-info btn-sm"><i class="fas fa-search"></i> Vizualizar</button>
                                            </form>
                                            <!-- Se o status da ordem for diferente de pronto, exibe o botão de editar -->
                                            @if($ordem->status_ordem != 'Pronto')
                                                <a href="{{ url('ordem/'.$ordem->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-pen"></i> Editar</a>
                                            @endif
                                        </td>
                                    </tr>  
                                    @empty
                                    <!-- Caso não seja encontrada nenhuma ordem, irá aparecer essa mensagem -->
                                    <tr>
                                        <td colspan="6" class="text-center">Ordem não encontrada ou inexistente!</td>
                                    </tr>         
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <!-- Paginator -->
                    <div class="pagination justify-content-center">
                         {{ $ordens->links() }} 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
