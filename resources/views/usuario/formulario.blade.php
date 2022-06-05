@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" style="display:flex; justify-content:space-between">
                    <h4>Cadastro de Usuários:</h4>
                    <a href="{{ url('usuario') }}" class="btn btn-success float-right"><i class="fas fa-list"></i> Listar Usuários</a>
                </div>

                <div class="card-body">
                    @if(Session::has('mensagem_sucesso'))
                        <div class="alert alert-success">{{ Session::get('mensagem_sucesso') }}</div>
                    @endif
                    @if(Route::is('usuario.show'))
                        {!! Form::model($usuario, ['method'=>'PATCH', 'url'=>'usuario/'.$usuario->id]) !!}
                        {!! Form::hidden('original', $usuario->password) !!}
                    @else
                        {!! Form::open(['method'=> 'POST', 'url'=>'usuario'])  !!}
                    @endif
                    <div class="form-group">
                        {!! Form::label('name', 'Nome:') !!}
                        {!! Form::input('text', 'name', null, ['class'=>'form-control', 'autofocus', 'placeholder'=>'Nome', 'required']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('email', 'E-mail:') !!}
                        {!! Form::input('email', 'email', null, ['class'=>'form-control', 'placeholder'=>'E-mail', 'required']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('password', 'Senha:') !!}
                        {!! Form::input('password', 'password', null, ['class'=>'form-control', 'placeholder'=>'Senha', 'required']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::submit('Salvar', ['class'=>'float-right btn btn-primary mt-1']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
