<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Card;

class CardsController extends Controller
{
    public function index() {
        // obtendo todos registros da tabela cards
        $cards = Card::all();

        // verificando se obteve registros para listar
        if($cards){
            // retornando resposta JSON com todos cards encontrados
            return view('cards.index')->with('cards', $cards);
        }
    }

    public function create(Request $request) {

        // instanciando objeto card
        $card = new Card;

        // atribuindo valores recebidos no corpo da requisicao
        // as respectivas colunas
        $card->title = $request->title;
        $card->content = $request->content;

        // efetuando o insert do registro na base de dados
        $card->save();

        // verificando se obteve registros para listar
        if($card){
            // retornando resposta JSON com card criado
            return response()->json($card, 201);
        }
    }

    public function edit(Request $request, $id){
        // encontrando registro pelo id atraves do metodo find
        $card = Card::find($id);

        // atribuindo valores recebidos no corpo da requisicao
        // as respectivas colunas
        $card->title = $request->title;
        $card->content = $request->content;

        $card->update();

        // verificando se obteve registros para listar
        if($card){
            // retornando resposta JSON com card criado
            return response()->json($card, 201);
        }
    }

    public function delete($id){
        // encontrando registro pelo id atraves do metodo find
        $card = Card::find($id);

        // efetuando sof delete para nao excluri registro efetivamente
        // e sim popular a coluna deleted_at com a data atual passando
        // apenas a impressao para o usuario que aquele registro deixou de existir
        // mas ainda esta em nossa base de dados
        if($card->delete()){
            return response()->json('Registro excluído com sucesso', 200);
        }
    }
}
