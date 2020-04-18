<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aula 01 - PHP</title>
</head>
<body>
    <?php 
        // para criar uma variavel no PHP basta utilizar $ e o nome da variavel que deseja em seguida.
        $titulo = "Primeira Aula de PHP";
    ?>

    <h1>
        <?php 
            // para exibir algo  na  tela com PHP utilizamos o echo
            echo $titulo;
        ?>
    </h1>

    <hr>
    <h1>Condicionais</h1>

    <p>IF / ELSE </p>
    <p>Crie uma função que valide se uma pessoa pode votar ou não. De forma que se a pessoa 
    tiver a idade entre 16 e 17 anos, OU for maior de 70 anos, iremos mostrar na tela Voto Facultativo, 
    caso contrário, se for maior de idade iremos motrar na tela voto obrigatório, e caso for menor de 16 não vota</p>

    <?php 
        function podeVotar($idadeEleitor){
            if($idadeEleitor >= 16 && $idadeEleitor < 18 || $idadeEleitor > 70){
                return "Voto Facultativo";
            } else if ($idadeEleitor >= 18 && $idadeEleitor <= 70){
                return "Voto Obrigatório";
            } else {
                return "Não Vota";
            }
        }
    ?>

    R: Foi criado no código a função podeVotar e foi informado como parâmetro o valor 17, 
    como retorno da função tivemos: <br> <?php echo podeVotar(17); ?>

    <hr>
    <p>SWITCH CASE</p>

    <p>Crie uma função que valide se um número é 0 e retorne que é igual a 0, se é 1 e retorne que é igual a 1, 
    ou se é 2 e retorne que é igual a 2. Caso contrário retorne que o número é maior que 2. Utilizando switch case.</p>

    <?php 
        function validaNumero($i){
            switch ($i) {
                case 0:
                    return "$i igual 0";
                    break;
                case 1:
                    return "$i igual 1";
                    break;
                case 2:
                    return "$i igual 2";
                    break;
                default:
                    return "qualquer número maior que 2";
                    break;
            }
        }

    ?>

    R: Foi criado no código a função validaNumero e foi informado como parâmetro o número 2,
    como retorno da função tivemos: <br> <?php echo validaNumero(2); ?>

    <p>Crie uma função que receba o gênero de uma pessoa, onde ela poderá informar Masculino ou Feminino,
    se informar Masculino iremos retornar a mensagem Gênero informado foi masculino, se informar Feminino
    iremos retornar a mensagem Gênero informado foi feminino, caso contrário iremos retornar Outros. Utilizando Switch Case</p>

    <?php
        function validaGenero($x){
            switch ($x) {
                case 'masculino':
                    return "Masculino";
                    break;
                case 'feminino':
                    return "Feminino";
                    break;
                default:
                    return "Outros";
                    break;
            }
        }  
    ?>

    R: Foi criado no código a função validaGenero e foi informado como parâmetro o a string feminino,
    como retorno da função tivemos: <br> <?php echo validaGenero("feminino"); ?>

    <hr>
    <h1>Arrays</h1>

    <p>Array Simples</p>

    <?php 
        // declarando array vazio
        $animais = [];

        // o array simples so tem os valores, nao nos preocupamos em controlar suas posicoes
        $animais = ["Leão", "Girafa", "Cachorro", "Gato"];

        // percorrendo array animais para destrinchar o conteudo.
        echo "<pre>";
            var_dump($animais);
        echo "</pre>";
    ?>

    <p>Array Associativo</p>

    <p>Ocorre quando necessitamos adicionar valores para as posicoes do nosso array</p>
    
    <?php 
        // o array associativo nos da a possibilidade de atribui valores as nossas posicoes
        $usuario = [
            "nome" => "Victor",
            "email" => "vtorres@digitalhouse.com",
            "senha" => "123456"
        ];

        // percorrendo array usuario para destrinchar o conteudo.
        echo "<pre>";
            var_dump($usuario);
        echo "</pre>";

        // montando frase pegando uma posicao do array sem percorrer ele todo
        echo "O nome do usuário é " . $usuario["nome"];
    ?>

    <p>Array de Arrays / Objetos</p>

    <p>Ocorre quando temos um array que dentro dele contém outros elementos, onde, cada elemento
    possui como valor um novo array relacionado a ele.</p>
    <?php
        $listaDeUsuarios = [
            "usuario1" => [
                "nome" => "Victor",
                "email" => "vtorres@digitalhouse.com",
                "senha" => "123456"
            ],
            "usuario2" => [
                "nome" => "Marcelo",
                "email" => "mdiament@digitalhouse.com",
                "senha" => "123456"
            ]
        ];

        echo "Nome usuario1: " . $listaDeUsuarios["usuario1"]["nome"] . "Nome usuario2: " . $listaDeUsuarios["usuario2"]["nome"];
    ?>

    <hr>
    <h1>Bônus enviado pelo Marcelão</h1>

    <?php

        echo "<style>code {background-color:#f5f5f5;color:red;padding:5px;margin:5px auto;line-height:22px;}i{color:red;font-weight:bold;}</style>";

        $arr = [4,1,3,2,8,6,7,5,9];
        echo "<h3>\$arr</h3><p>um array simples</p><code>[";
        foreach($arr as $index){
            echo $index . " ";
        }
        echo "]</code><br/><hr/></br>";
        
        sort($arr);
        echo "<h3>sort(\$arr)</h3><p><i>sort</i> ordena um array simples em ordem ascendente</p><code>[";
        foreach($arr as $index){
            echo $index . " ";
        }
        echo "]</code><br/><hr/></br>";
        
        rsort($arr);
        echo "<h3>rsort(\$arr)</h3><p><i>rsort</i> ordena um array simples em ordem decrescente (R para reverso)</p><code>[";
        foreach($arr as $index){
            echo $index . " ";
        }
        echo "]</code><br/><hr/></br>";
        
        $arrAssoc = ["nome"=>"Marcelo", "idade"=>32, "país"=>"Brasil","profissão"=>"Front End Developer"];
        echo "<h3>\$arrAssoc</h3><p>um array associativo</p><code>[";
        foreach($arrAssoc as $key => $value){
            echo $key . " => " . $value . " ";
        }
        echo "]</code><br/><hr/></br>";
        
        asort($arrAssoc);
        echo "<h3>asort(\$arrAssoc)</h3><p><i>asort</i> ordena um array associativo em ordem ascendente (de acordo com seus valores)</p><code>[";
        foreach($arrAssoc as $key => $value){
            echo $key . " => " . $value . " ";
        }
        echo "]</code><br/><hr/></br>";
        
        arsort($arrAssoc);
        echo "<h3>arsort(\$arrAssoc)</h3><p><i>arsort</i> ordena um array associativo em ordem decrescente (de acordo com seus valores) (R para reverso)</p><code>[";
        foreach($arrAssoc as $key => $value){
            echo $key . " => " . $value . " ";
        }
        echo "]</code><br/><hr/></br>";
        
        ksort($arrAssoc);
        echo "<h3>ksort(\$arrAssoc)</h3><p><i>ksort</i> ordena um array associativo em ordem ascendente (de acordo com suas chaves) (K para keys, chaves em inglês)</p><code>[";
        foreach($arrAssoc as $key => $value){
            echo $key . " => " . $value . " ";
        }
        echo "]</code><br/><hr/></br>";
        
        krsort($arrAssoc);
        echo "<h3>krsort(\$arrAssoc)</h3><p><i>krsort</i> ordena um array associativo em ordem decrescente (de acordo com suas chaves) (K para keys, chaves em inglês e R para reverso)</p><code>[";
        foreach($arrAssoc as $key => $value){
            echo $key . " => " . $value . " ";
        }
        echo "]</code><br/><hr/></br>";
        
    ?>
</body>
</html>