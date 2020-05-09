<?php
    $array = [
        'nome' => 1, 
        'sobrenome' => 2, 
        'email' => 3, 
        'senha' => 4
    ];

    $arrayJson = json_encode($array);

    echo $arrayJson;

    // resultado obtido do var_dump na variavel arrayJson sera
    // "{
    //     "nome": 1,
    //     "sobrenome": 2,
    //     "email": 3,
    //     "senha": 4
    // }"
?>