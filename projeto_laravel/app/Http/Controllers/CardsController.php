<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Card;

class CardsController extends Controller
{
    public function index() {
        // obtendo todos registros da tabela cards
        // $cards = Card::all();

        // obtendo todos registros e aplicando paginacao
        // para exibir apenas 10 registros por pagina
        $cards = Card::paginate(10);

        // obtendo apenas registros com id menor que 50
        // sempre que for utilizar metodos diferentes do all() e paginate()
        // lembre-se de utilizar o metodo get() no final da sua query
        // $cards = Card::where('id', '<=', '50')->get();

        // verificando se obteve registros para listar
        if($cards){
            // retornando resposta JSON com todos cards encontrados
            return view('cards.index')->with('cards', $cards);
        }
    }

    public function add() {
        // retornando view de cadastro
        return view('cards.create');
    }

    public function create(Request $request) {

        // aplicando validacao nos campos com o validate do laravel
        $request->validate([
            'title' => 'required|min:5',
            'content' => 'required|min:20'
        ]);

        // obtendo objeto imagem
        $image = $request->file('image');

        // verificando se usuario nao enviou imagem
        if(empty($image)){
            $pathRelative = null;
        } else {
            //
            $image->storePublicly('uploads');

            // criando caminho ate a pasta uploads
            $absolutePath = public_path()."/storage/uploads";

            // obtendo o nome do arquivo
            $name = $image->getClientOriginalName();

            // mover a imagem para o projeto
            $image->move($absolutePath, $name);

            // // obtendo caminho relativo para passar ao banco de dados
            $pathRelative = "storage/uploads/$name";
        }

        // instanciando objeto card
        $card = new Card;

        // atribuindo valores recebidos no corpo da requisicao
        // as respectivas colunas
        $card->title = $request->title;
        $card->image = $pathRelative;
        $card->content = $request->content;

        // efetuando o insert do registro na base de dados
        $card->save();

        // verificando se obteve registros para listar
        if($card){
            // retornando resposta de que card criado
            return view('cards.create')->with('success', 'Cartão inserido com sucesso');
        }
    }

    public function edit($id){
        // encontrando registro pelo id atraves do metodo find
        $card = Card::find($id);

        if($card){
            // retornando view de edicao de cadastro
            return view('cards.edit')->with('card', $card);
        }
    }

    public function update(Request $request, $id){
        // aplicando validacao nos campos com o validate do laravel
        $request->validate([
            'title' => 'required|min:5',
            'content' => 'required|min:20'
        ]);

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
            return view('cards.edit')->with([
                'card' => $card,
                'success' => 'Cartão atualizado com sucesso'
            ]);
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
            // apos excluir o registro precisamos retornar para a listagem de cartoes em index.blade.php
            // portanto iremos utilizar o nome que atribuimos a nossa rota e consequentemente a view
            // para retornar com sucesso e contendo o parametro success na URL
            return redirect()->route('cards', [
                'success' => true
            ]);
        }
    }

    public function search(Request $request){

        $search = $request->input('search');

        $cards = Card::where('title', 'like', '%' . $search . '%')
            ->orWhere('content', 'like', '%' . $search . '%')
            ->paginate(10);

        return view('cards.index')->with([
            'search' => $search,
            'cards' => $cards
        ]);
    }
}
