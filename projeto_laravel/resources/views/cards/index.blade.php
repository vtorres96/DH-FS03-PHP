@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                @if(isset($success) && $success != "")
                  <section class="row">
                      <div class="col-12">
                          <div class="message alert alert-success text-center">
                              {{ $success }}
                          </div>
                      </div>
                  </section>
                @endif
                <div class="mb-4">
                    <a href="/cards/add">
                        <button class="btn btn-dark">Novo Cartão</button>
                    </a>
                </div>
                <div class="mb-4">
                    <form class="form-inline" action="{{ url('/cards/search') }}" method="GET">
                        <input class="form-control col-10" type="text" name="search" id="search" placeholder="O que você procura?">
                        <button class="btn btn-dark col-2" type="submit">Pesquisar</button>
                    </form>
                </div>
                <div class="card">
                    <div class="card-header">
                        Cartões
                    </div>
                    <div class="card-body">
                        @if($cards->isEmpty())
                            <section class="row">
                                <div class="col-12">
                                    <h1 class="col-12 text-center">Que pena! Não encontramos cartões.</h1>
                                </div>
                            </section>
                        @else
                            <div class="table-responsive border-0">
                                <table class="table table-hover" style="margin-bottom: inherit">
                                    <thead>
                                        <th>Título</th>
                                        <th>Conteúdo</th>
                                        <th>Imagem</th>
                                        <th colspan="2">Ações</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($cards as $card)
                                            <tr>
                                                <td>{{ $card->title }}</a></td>
                                                <td>{{ $card->content }}</a></td>
                                                <td>
                                                    <img src="{{ $card->image != null ? asset($card->image) : asset('img/null.png') }}" alt="">
                                                </td>
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
                                                                    <h5 class="modal-title">Deseja excluir o cartão ? {{ $card->titulo }} ?</h5>
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
                                                                        <button id="delete-contact" type="submit" class="btn btn-danger">Excluir</a>
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
                                <div class="d-flex justify-content-center mt-4">
                                    {{ $cards->appends(['search' => isset($search) ? $search : ''])->links() }}
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
