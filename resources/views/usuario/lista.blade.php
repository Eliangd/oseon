@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">                
                <div class="card-header" style="display:flex; justify-content:space-between"> <!-- display:flex; -> deixa as tags na mesma linha /// justify-content: space-between; -> adiciona um espaçamento entre elas -->
                    <h4>Lista de Usuários:</h4>
                    <a href="{{ url('usuario/create') }}" class="btn btn-success float-right">
                        <i class="far fa-plus-square"></i> Novo Usuário
                    </a>
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
                    <!-- Tabela com os usuários -->             
                    <div class="table-responsive">
                        <table class="table table-sm table-hover table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>@sortablelink('id')</th>
                                    <th>@sortablelink('name')</th>
                                    <th>@sortablelink('email')</th>
                                    <th>Opções</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($usuarios as $usuario)
                                    <tr>
                                        <td>{{ $usuario->id }}</td>
                                        <td>{{ $usuario->name }}</td>
                                        <td>{{ $usuario->email }}</td>
                                        <td>
                                            {!! Form::open(['method'=>'DELETE', 'url'=>'usuario/'.$usuario->id, 'style'=>'display:inline']) !!}
                                                <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Excluir</button>
                                            {!! Form::close() !!}
                                            <a href="{{ url('usuario/'.$usuario->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-pen"></i> Editar</a>                                            
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- Paginator -->
                    <div class="pagination justify-content-center">
                        {{ $usuarios->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
