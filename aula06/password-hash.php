<?php

    $exemplo = "rasmuslerdorf";

    echo "Exemplo sem o hash aplicado na string $exemplo <br>";

    // criptografando a string rasmuslerdorf
    $exemploHash = password_hash($exemplo, PASSWORD_DEFAULT);

    echo "Exemplo com o hash aplicado na string $exemplo, gerando este hash: $exemploHash";

?>