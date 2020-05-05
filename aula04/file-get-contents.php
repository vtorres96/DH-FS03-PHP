<?php

    /* o metodo file_get_contents nos permite let o conteudo de um arquivo ou ate mesmo URL,
    de uma forma que obtem o conteudo em formato de string */
    
    /* recebe um ou ate quartro parametros - o primeiro o arquivo ou URL  que deseja manipular / let o conteudo */
    /* no caso abaixo estamos listando conteudo do arquivo teste-put-contents.php */
    $conteudo = file_get_contents("teste-put-contents.php");

    echo $conteudo;
?>