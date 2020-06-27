@extends('layouts.app')

@section('title', 'Listando Cartoes')

@section('content')
    {{-- Verificando se a variavel veio vazia, ou seja, sem registros da tabela cards --}}
    @if($cards->isEmpty())
        <div class="col-12">
            <h1 class="col-12 text-center">Que pena! Não temos cartões cadastrados na plataforma</h1>
        </div>
    @else
        <section class="row">
            <header class="col-12">
                <h1 class="col-12 text-center">Cartões</h1>
                <p class="col-12 d-block text-center"><b>listando todos os cartões da nossa plataforma</b></p>
            </header>
        </section>
        <section class="row">
            <article class="col-12">
                <table class="table">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">Título</th>
                            <th scope="col">Conteudo</th>
                            <th scope="col" colspan="2">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cards as $card)
                        <tr>
                            <td scope="row">{{$card->title}}</td>
                            <td scope="row">{{$card->content}}</td>
                            <td>
                                <a href="/cards/update/{{$card->id}}">
                                    <i class="fas fa-edit"></i>
                                </a>
                            </td>
                            <td>
                                <a href="#" data-toggle="modal" data-target="#modal{{ $card->id }}">
                                    <i class="fas fa-trash"></i>
                                </a>
                                <div class="modal fade" id="modal{{ $card->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Deseja excluir o cartão {{ $card->title }} ?</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Cartão: {{ $card->title }}</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                <form action="/cards/remove/{{ $card->id }}" method="POST">
                                                    @csrf
                                                    {{ method_field('DELETE') }}
                                                    <button type="submit" class="btn btn-danger">Excluir</a>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </article>
        </section>
    @endif
@endsection
