<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aula 02 - PHP</title>
</head>
<body>
   <h1>Loops e Funções</h1>

   <p>Loops - For</p>

    Crie um loop que exiba os números de 1 a 10 utilizando a estrutura for (incremento). <br>
   
   <?php
        /* o for é um método de estrutura de repeticao, que recebe tres parametros:
        onde o primeiro é o critério de início da nossa variável contadora, ou seja,
        com qual valor ela vai comecar a percorrer o loop for, ja o segundo parametro,
        e o criterio de parada do nosso loop for, e o terceiro parametro e o criterio de
        incremento se for ++ ou decremento se for -- */
        for ($i=1; $i <= 10; $i++) { 
            echo $i . "<br>";
        }
   ?>

   <hr>

   Crie um loop que exiba os números de 10 a 1 utilizando a estrutura for (decremento). <br>
   
   <?php
        /* o for é um método de estrutura de repeticao, que recebe tres parametros:
        onde o primeiro é o critério de início da nossa variável contadora, ou seja,
        com qual valor ela vai comecar a percorrer o loop for, ja o segundo parametro,
        e o criterio de parada do nosso loop for, e o terceiro parametro e o criterio de
        incremento se for ++ ou decremento se for -- */
        for ($i=10; $i >= 1; $i--) { 
            echo $i . "<br>";
        }
   ?>
   
   <hr>

   Crie um loop que exiba os números pares que temos até 10 utilizando a estrutura for (incremento) e
   uma condicao para verificar se o numero é par. <br>
   
   <?php
        /* o for é um método de estrutura de repeticao, que recebe tres parametros:
        onde o primeiro é o critério de início da nossa variável contadora, ou seja,
        com qual valor ela vai comecar a percorrer o loop for, ja o segundo parametro,
        e o criterio de parada do nosso loop for, e o terceiro parametro e o criterio de
        incremento se for ++ ou decremento se for -- */
        for ($i=1; $i <= 10; $i++) { 
            if($i % 2 == 0){
                echo $i . "<br>";
            }
        }
   ?>
   
   <hr>

   Crie um loop que exiba os números pares que temos até 10 utilizando a estrutura for (incremento) sem criar condicoes. <br>
   
   <?php
        /* o for é um método de estrutura de repeticao, que recebe tres parametros:
        onde o primeiro é o critério de início da nossa variável contadora, ou seja,
        com qual valor ela vai comecar a percorrer o loop for, ja o segundo parametro,
        e o criterio de parada do nosso loop for, e o terceiro parametro e o criterio de
        incremento se for ++ ou decremento se for -- */
        for ($i=2; $i <= 10; $i = $i + 2) { 
            echo $i . "<br>";
        }
   ?>

   <hr>

   <p>Loops - While</p>

   Crie um loop que exiba os números de 1 a 10 utilizando while (incemento). <br>
   
   <?php
        /* informamos uma condicao dentro do while e ela sempre sera verificada a cada loop realizado,
        enquanto a condicao for verdadeira ele ira repetir o bloco de codigo dentro do while. Podemos pensar
        que ele tem uma diferença que é a parte de incremento / decremento, ou seja, no While nao podemos esquecer de incrementar
        ou decrementar nossa variavel que esta sendo verificada na condição. Tambem devemos nos atentar que a nossa variavel
        que vai ser comparada na condicao dentro do While devera existir antes e ter algum valor. */
        $i = 1;
        while ($i <= 10) {
            echo $i . "<br>";
            $i++;
        }
   ?>

   <hr>

   Crie um loop que exiba os números de 10 a 1 utilizando while (decremento). <br>
   
   <?php
        /* informamos uma condicao dentro do while e ela sempre sera verificada a cada loop realizado,
        enquanto a condicao for verdadeira ele ira repetir o bloco de codigo dentro do while. Podemos pensar
        que ele tem uma diferença que é a parte de incremento / decremento, ou seja, no While nao podemos esquecer de incrementar
        ou decrementar nossa variavel que esta sendo verificada na condição. Tambem devemos nos atentar que a nossa variavel
        que vai ser comparada na condicao dentro do While devera existir antes e ter algum valor. */
        $i = 10;
        while ($i >= 1) {
            echo $i . "<br>";
            $i--;
        }
   ?>

   <hr>

   <p>Loops - Do While</p>

    Crie um loop que exiba os números de 1 a 10 utilizando do while (incemento). <br>

    <?php
        /* funciona de uma forma que primeiro indica ao codigo para executar as instrucooes dentro do bloco
        de codigo do, e depois ele verifica a condicao que foi criada no while, desta forma, podemos perceber
        que sempre sera executado ao menos uma vez o codigo quando trabalhamos com do while, afinal de contas,
        ele executa primeiro para depois verificar a condicao que foi criada no while */

        /* nao podemos esquecer de incrementar
        ou decrementar nossa variavel que esta sendo verificada na condição. Tambem devemos nos atentar que a nossa variavel
        que vai ser comparada na condicao dentro do While devera existir antes e ter algum valor. */
        
        $i = 1;
        do {
           echo $i . "<br>";
           $i++;
        } while ($i <= 10);
    ?>

    <hr>

    Crie um loop que exiba os números de 10 a 1 utilizando do while (decremento). <br>

    <?php
        /* funciona de uma forma que primeiro indica ao codigo para executar as instrucooes dentro do bloco
        de codigo do, e depois ele verifica a condicao que foi criada no while, desta forma, podemos perceber
        que sempre sera executado ao menos uma vez o codigo quando trabalhamos com do while, afinal de contas,
        ele executa primeiro para depois verificar a condicao que foi criada no while */

        /* nao podemos esquecer de incrementar
        ou decrementar nossa variavel que esta sendo verificada na condição. Tambem devemos nos atentar que a nossa variavel
        que vai ser comparada na condicao dentro do While devera existir antes e ter algum valor. */
        $i = 10;
        do {
            echo $i . "<br>";
            $i--;
        } while ($i >= 1);
    ?>

    <hr>

    <h1>Loops - Percorrendo Arrays</h1>

    <p>For - percorrendo array</p>

    <p>Percorra o array de animais abaixo utilizando for</p>
    <p style="padding: 5px;background-color:#f5f5f5;border-radius:10px;color:blue;line-height:20px;font-size:16px;">
        $animais = ["Gato", "Cachorro", "Leão", "Girafa"];
    </p>

    <?php
        // criando o array de animais 
        $animais = ["Gato", "Cachorro", "Leão", "Girafa"];
    ?>

    <?php
        // percorrendo o array de animais com o loop for
        // echo count($animais); // retorna o numero de elementos contidos em um array

        // indicando que a variavel $i deve ser menor que o count de elementos do array, e nunca menor igual,
        // pois como o array comeca com o primeiro elemento obtendo a posicao 0, podemos pensar que um array como
        // um array que tenha 4 elementos identico ao array de animais, que possui as posicoes 0,1,2 e 3 onde 0 possui
        // o indice Gato, 1 possui o indice Cachorro, 2 possui o indice Leao, 3 possui o indice Girafa. 
        // A partir disso, sabemos que o $i deve comecar em 0 e ser menor que o count do nosso array que retorna 4.
        // Sendo assim o for tera a responsabilidade de pegar as posicoes 0 ate 3, e desta forma, obteremos todos elementos do array */

        for ($i=0; $i < count($animais); $i++) { 
            echo $animais[$i] . "<br>";
        }
    ?>

    <hr>

    <p>While - percorrendo array</p>

    <p>Percorra o array de animais abaixo utilizando while</p>
    <p style="padding: 5px;background-color:#f5f5f5;border-radius:10px;color:blue;line-height:20px;font-size:16px;">
        $animais = ["Gato", "Cachorro", "Leão", "Girafa"];
    </p>

    <?php 
        // indicando que a variavel $i deve ser menor que o count de elementos do array, e nunca menor igual,
        // pois como o array comeca com o primeiro elemento obtendo a posicao 0, podemos pensar que um array como
        // um array que tenha 4 elementos identico ao array de animais, que possui as posicoes 0,1,2 e 3 onde 0 possui
        // o indice Gato, 1 possui o indice Cachorro, 2 possui o indice Leao, 3 possui o indice Girafa. 
        // A partir disso, sabemos que o $i deve comecar em 0 e ser menor que o count do nosso array que retorna 4.
        // Sendo assim o for tera a responsabilidade de pegar as posicoes 0 ate 3, e desta forma, obteremos todos elementos do array */

        $i = 0;
        while ($i < count($animais)) {
            echo $animais[$i] . "<br>";
            $i++;
        }
    ?>

    <hr>

    <p>Do While - percorrendo array</p>

    <p>Percorra o array de animais abaixo utilizando do while</p>
    <p style="padding: 5px;background-color:#f5f5f5;border-radius:10px;color:blue;line-height:20px;font-size:16px;">
        $animais = ["Gato", "Cachorro", "Leão", "Girafa"];
    </p>

    <?php 
        // indicando que a variavel $i deve ser menor que o count de elementos do array, e nunca menor igual,
        // pois como o array comeca com o primeiro elemento obtendo a posicao 0, podemos pensar que um array como
        // um array que tenha 4 elementos identico ao array de animais, que possui as posicoes 0,1,2 e 3 onde 0 possui
        // o indice Gato, 1 possui o indice Cachorro, 2 possui o indice Leao, 3 possui o indice Girafa. 
        // A partir disso, sabemos que o $i deve comecar em 0 e ser menor que o count do nosso array que retorna 4.
        // Sendo assim o for tera a responsabilidade de pegar as posicoes 0 ate 3, e desta forma, obteremos todos elementos do array */
        $i = 0;
        do {
            echo $animais[$i] . "<br>";
            $i++;
        } while ($i < count($animais));
    ?>

    <hr>

    <p>Foreach - percorrendo array (na verdade o foreach percorre somente arrays e objetos)</p>

    <p>Percorra o array de animais abaixo utilizando foreach com a sintaxe de posicao e valor,
    e retorne a seguinte frase "Posicao : x Indice: y", onde x e y serão substituídos pelas posições e índices do array de animais</p>
    <p style="padding: 5px;background-color:#f5f5f5;border-radius:10px;color:blue;line-height:20px;font-size:16px;">
        $animais = ["Gato", "Cachorro", "Leão", "Girafa"];
    </p>

        
    <?php 
        /* o foreach recebe um array ou objeto, no nosso caso iremos informar um array e sabemos que o foreach
        tem essa primeira sintaxe no formato onde ele pega a posicao e o indice do elemento corrente */

        /*  para cada elemento, cria a variavel $posicao contendo o valor da posicao daquele elemento percorrido dentro do array
        e tambem cria a variavel $indice contendo o valor do indice do elemento percorrido dentro do array */
       
        
        /* Ou seja no futuro ao executar o codigo do foreach percorrendo o array de animais, 
        teremos as variaveis posicao e indice com estes valores abaixo

        posicao | indice
        0       | Gato
        1       | Cachorro
        2       | Leao
        3       | Girafa

        */
       foreach ($animais as $posicao => $indice) {
            echo "Posicao: " . $posicao . " Índice: " . $indice . "<br>";          
       }
    ?>

    <hr>

    <p>Foreach - percorrendo array (na verdade o foreach percorre somente arrays e objetos)</p>

    <p>Percorra o array de animais abaixo utilizando foreach com a sintaxe de valor</p>
    <p style="padding: 5px;background-color:#f5f5f5;border-radius:10px;color:blue;line-height:20px;font-size:16px;">
        $animais = ["Gato", "Cachorro", "Leão", "Girafa"];
    </p>
        
    <?php 
        /* o foreach recebe um array ou objeto, no nosso caso iremos informar um array e sabemos que o foreach
        tem essa segunda sintaxe no formato onde ele pega apenas o indice do elemento corrente */

        /*  para cada elemento, cria a variavel $animal contendo o valor do indice do elemento percorrido dentro do array */
    
        /* Ou seja no futuro ao executar o codigo do foreach percorrendo o array de animais, 
        teremos a variavel $animal com estes valores abaixo

            animal
            Gato
            Cachorro
            Leao
            Girafa
        */

        foreach ($animais as $animal) {
                echo $animal . "<br>";          
        }
    ?>

    <hr>
</body>
</html>