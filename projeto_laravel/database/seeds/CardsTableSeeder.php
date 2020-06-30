<?php

use Illuminate\Database\Seeder;
use App\Card;

class CardsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // criando registros que nao sejam fakes para que o projeto consiga
        // implementar e utilizar esses registros para alguma determinado proposito
        Card::create([
            'title' => 'Card Principal',
            'content' => 'Conteúdo do card principal'
        ]);

        factory(Card::class, 49)->create();
    }
}
