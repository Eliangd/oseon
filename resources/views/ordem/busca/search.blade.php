@extends('layouts.guest')

@section('content')
<div class="container">
    <div class="row">
        <div class= "col-md-12 py-4">
            @if(count($ordens) == 0 && $search)
            <div class='body text-center text-white py-4'>
                <img src="imagens/ordem2.png" alt="...">
                <h1 class="py-4">Ordem não encontrada!</h1>
                <div class= "col-md-12 py-4">
                    <a href="{{ url('/') }}" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Voltar</a>
                </div>
            </div>
            @else
            <div class="card py-4 ordemdiv">                
                <div class="text-center">
                    <h1>Ordem de Serviço</h1>
                </div>
                @foreach ($ordens as $ordem)
                    <div class="card-body">
                        <div style="display: flex" class="card py-2 ordemdiv">
                            <div class="col">
                                <h4><strong> Código: </strong> {{ $ordem->ords_codigo }}</h4>
                            </div>
                            <div class="col">
                                <h4><strong> Protocolo: </strong> {{ $ordem->protocolo }}</h4>
                            </div>
                            <div class="col">
                                <h4><strong> Nome: </strong> {{ $ordem->nome }}</h4>
                            </div>
                            <div class="col">
                                <h4><strong> Status: </strong> {{ $ordem->status_ordem }}</h4>
                            </div>                                                    
                            <div class="col">
                                <h4><strong> Equipamento: </strong> {{ $ordem->equipamento }}</h4>
                            </div>
                            <div class="col">
                                <h4><strong> Modelo: </strong> {{ $ordem->modelo }}</h4>
                            </div>
                            <div class="col">
                                <h4><strong> Acessórios: </strong> {{ $ordem->acessorios }}</h4>
                            </div>
                            <div class="col">
                                <h4><strong> Defeito: </strong> {{ $ordem->defeito }}</h4>
                            </div>
                        </div>
                        <div class="card py-2 ordemdiv">
                            <div class="col-md-12">
                                <h4><strong> Relatório Técnico:</strong></h4>
                                <h5>{{ $ordem->relatorio }}</h5>
                            </div>
                        </div>
                        <div class="card ordemdiv">
                            @if($ordem->status_ordem != 'Pronto')
                            {!! Form::open(['method'=>'POST', 'url'=>'enviarEmail']) !!}                                
                                <div class="card py-2 col-md-12 ordemdiv">
                                    <h4><strong> Em caso de dúvida envie uma mensagem:</strong></h4>
                                    <input hidden name="id" value={{ $ordem->id }}>
                                    <input hidden name="nome" value={{ $ordem->nome }}>
                                    {!! Form::textarea('mensagem', null, ['class'=>'form-control', 'required', 'placeholder'=>'Mensagem', 'rows'=>3]) !!}
                                    {!! csrf_field() !!}
                                </div>
                                <div class="card">
                                    {!! Form::submit('Enviar E-mail', ['class'=>'form-control btn btn-primary']) !!}
                                </div>
                            {!! Form::close() !!}
                            @endif
                        </div>
                        <br />
                        <a href="{{ url('/') }}" class="btn btn-primary btn-success float-right"><i class="fas fa-undo-alt"></i> Voltar a tela inicial</a>                                               
                    </div>
                @endforeach
            @endif
            </div>            
        </div>
    </div>
</div>
@endsection
