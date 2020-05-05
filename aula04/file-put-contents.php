<?php

    /* o metodo file_put_contents nos permite criar um arquivo que não é existente e escrever um 
    conteudo dentro deste arquivo, ou, caso o arquivo ja exista ele apenas sobrescreve o conteudo dentro do arquivo existente */
    
    /* recebe dois parametros - o primeiro o arquivo que deseja manipular / criar, e, o segundo
    o conteudo que voce deseja inserir neste arquivo */
    file_put_contents("teste-put-contents.php", "Sou um texto criado a partir do arquivo file-put-contents.php");
?>