@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" style="display:flex; justify-content:space-between"> <!-- display:flex; -> deixa as tags na mesma linha /// justify-content: space-between; -> adiciona um espaçamento entre elas -->
                    <h4>Ordens:</h4>
                    <a href="{{ url('ordem') }}" class="btn btn-success btn-sm float-right"><i class="fas fa-list"></i> Listar Ordens</a>
                </div>

                <div class="card-body">
                    <!-- Envia a mensagem de sucesso -->
                    @if(Session::has('mensagem_sucesso'))
                        <div class="alert alert-success">{{ Session::get('mensagem_sucesso') }}</div>
                    @endif
                    <!-- Retorna a ordem selecionada e exibe os campos para atualizar as informações -->
                    @if(Route::is('ordem.show'))
                        {!! Form::model($ordem, ['method'=>'PATCH', 'url'=>'ordem/'.$ordem->id]) !!}
                    @else
                        {!! Form::open(['method'=> 'POST', 'url'=>'ordem'])  !!}
                    @endif

                    <!-- Select para selecionar o status da ordem -->
                    <div class="form-group">
                        <label for="exampleInputEmail1">Selecionar Status:</label>
                        <select class="form-control" name="status_ordem">
                            <option value="A fazer">A Fazer</option>
                            <option value="Em andamento">Em Andamento</option>
                            <option value="Pronto">Pronto</option>
                        </select>
                    </div>

                    <!-- Esses campos abaixo são apenas para vizualição das infomações da ordem selecionada -->
                    <div class="form-group">
                        {!! Form::label('protocolo', 'Protocolo:') !!}
                        {!! Form::input('text', 'protocolo', null, ['class'=>'form-control', 'placeholder'=>'Protocolo', 'disabled']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('nome', 'Nome:') !!}
                        {!! Form::input('text', 'nome', null, ['class'=>'form-control', 'autofocus', 'placeholder'=>'Nome', 'disabled']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('email', 'E-mail:') !!}
                        {!! Form::email('email', null, ['class'=>'form-control', 'placeholder'=>'E-mail', 'disabled']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('telefone', 'Telefone:') !!}
                        {!! Form::input('text', 'telefone', null, ['class'=>'form-control', 'placeholder'=>'Telefone', 'disabled']) !!}
                    </div>                    
                    <div class="form-group">
                        {!! Form::label('cpf', 'CPF / CNPJ:') !!}
                        {!! Form::input('text', 'cpf', null, ['class'=>'form-control', 'placeholder'=>'CPF / CNPJ', 'disabled']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('endereco', 'Endereço:') !!}
                        {!! Form::input('text', 'endereco', null, ['class'=>'form-control', 'placeholder'=>'Endereço', 'disabled']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('equipamento', 'Equipamento:') !!}
                        {!! Form::input('text', 'equipamento', null, ['class'=>'form-control', 'placeholder'=>'Equipamento', 'disabled']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('modelo', 'Modelo:') !!}
                        {!! Form::input('text', 'modelo', null, ['class'=>'form-control', 'placeholder'=>'Modelo', 'disabled']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('acessorios', 'Acessórios:') !!}
                        {!! Form::input('text', 'acessorios', null, ['class'=>'form-control', 'placeholder'=>'Acessorios', 'disabled']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('defeito', 'Descreva o defeito:') !!}
                        {!! Form::textarea('defeito', null, ['class'=>'form-control', 'required', 'placeholder'=>'Defeito', 'rows'=>4, 'disabled']) !!}
                    </div>

                    <!-- Campo editavel para adicionar relatório técnico -->
                    <div class="form-group">
                        {!! Form::label('relatorio', 'Adicionar relatório técnico:') !!}
                        {!! Form::textarea('relatorio', null, ['class'=>'form-control', 'required', 'placeholder'=>'Relatório Técnico', 'rows'=>4]) !!}
                    </div>
                    {!! Form::submit('Salvar', ['class'=>'float-right btn btn-sm btn-primary mt-1']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
