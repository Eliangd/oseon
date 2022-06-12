@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">    
                <div class="card-header">
                    <h4 class="text-center">Nova Ordem!</h4>
                </div>          

                <div class="card-body">                   
                    @if(Session::has('mensagem_sucesso'))
                        <div class="alert alert-success">{{ Session::get('mensagem_sucesso') }}</div>
                    @endif

                    {!! Form::open(['method'=> 'POST', 'url'=>'novaOrdem'])  !!}

                    <div class="form-group">
                        {!! Form::label('nome', 'Nome Completo:') !!}
                        {!! Form::input('text', 'nome', null, ['class'=>'form-control', 'autofocus', 'placeholder'=>'Nome', 'required']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('email', 'E-mail:') !!}
                        {!! Form::email('email', null, ['class'=>'form-control', 'placeholder'=>'E-mail', 'required']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('telefone', 'Telefone:') !!}
                        {!! Form::input('text', 'telefone', null, ['class'=>'form-control', 'placeholder'=>'Telefone', 'required']) !!}
                    </div>                    
                    <div class="form-group">
                        {!! Form::label('cpf', 'CPF / CNPJ:') !!}
                        {!! Form::input('text', 'cpf', null, ['class'=>'form-control', 'placeholder'=>'CPF / CNPJ', 'required']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('endereco', 'Endereço Completo:') !!}
                        {!! Form::input('text', 'endereco', null, ['class'=>'form-control', 'placeholder'=>'Endereço', 'required']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('equipamento', 'Equipamento:') !!}
                        {!! Form::input('text', 'equipamento', null, ['class'=>'form-control', 'placeholder'=>'Equipamento', 'required']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('modelo', 'Modelo:') !!}
                        {!! Form::input('text', 'modelo', null, ['class'=>'form-control', 'placeholder'=>'Modelo', 'required']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('acessorios', 'Acessórios:') !!}
                        {!! Form::input('text', 'acessorios', null, ['class'=>'form-control', 'placeholder'=>'Acessorios', 'required']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('defeito', 'Descreva o defeito:') !!}
                        {!! Form::textarea('defeito', null, ['class'=>'form-control', 'required', 'placeholder'=>'Defeito', 'rows'=>4]) !!}
                    </div>
                    {!! Form::submit('Abrir Ordem', ['class'=>'float-right btn btn-sm btn-success mt-1']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
