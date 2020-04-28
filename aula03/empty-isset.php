<?php
    $var = 0;

    // verificando se a variavel esta vazia
    if (empty($var)) {
        echo 'Variável $var está vazia <br>';
    }
    
    // verificando se a variavel foi iniciada / se existe no nosso codigo 
    if (isset($var)) {
        echo 'Variável $var foi iniciada';
    }
?>