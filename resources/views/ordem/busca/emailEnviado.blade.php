@extends('layouts.guest')

@section('content')
<div class="container">
    <div class="row">
        <div class= "col-md-12 py-4">            
            <div class='body text-center text-white py-4'>
                <h1 class="py-4">E-mail enviado com sucesso!</h1>
                <img src="imagens/email.png" alt="...">
                <h1 class="py-4">Retornaremos assim que possivel!</h1>
                <div class= "col-md-12 py-4">
                    <a href="{{ url('/') }}" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Voltar</a>
                </div>
            </div>                       
        </div>
    </div>
</div>
@endsection
