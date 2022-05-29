@extends('layouts.app2')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12 text-white text-center my-3">
            <h1>Módulos</h1>
        </div>
            <div class="col-sm-4" onclick="location.href='{{ url('ordem') }}'">
                <div class="card stylediv">
                    <img src="imagens/ordens.png" alt="...">
                    <div class="card-body text-white">
                        <h2 class="card-title text-warnig text-center"><strong>Ordens</strong></h2>                    
                    </div>                    
                </div>
            </div>
            <div class="col-sm-4" onclick="location.href='{{ url('usuario') }}'">
                <div class="card stylediv" >
                    <img src="imagens/users.png" alt="...">
                    <div class="card-body text-white">
                        <h2 class="card-title text-warnig text-center"><strong>Usuários</strong></h2>
                    </div>
                </div>
            </div>           
    </div>
</div>
@endsection
