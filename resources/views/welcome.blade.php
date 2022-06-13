@extends('layouts.guest')

@section('content')
<div class='container'>
    <div class="row">        
        <div class="col-md-12">
			<img class="imgLogo" src="imagens/logo.png" height="90%" width="28%">            
        </div>
        <div class="col-md-4 py-5 mx-auto text-white">
            <p class='text-center'>
                Digite o Código do Protocolo:
            </p>
            <form action="search" method="GET" class="form form-inline">
                <input type="text" id="search" name="search" size="41" class="form-control mr-1" placeholder="Digite o código de protocolo" required="required">
                <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
            </form>
        </div>
    </div>
</div>
@endsection
