<?php

    $hash = '$2y$07$BCryptRequires22Chrcte/VlQH0piJtjXl.0t1XkA8pw9dMXTpOq';

    // verificando se a string rasmuslerdorf confere com o hash acima
    if (password_verify('rasmuslerdorf', $hash)) {
        echo 'Senha confere';
    } else {
        echo 'Senha inválida';
    }
    
?>