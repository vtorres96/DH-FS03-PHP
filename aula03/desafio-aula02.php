<?php
    $tituloDaPagina = "Métodos | PHP - Aula 03";
    require_once("./inc/head.php");
?>
<body>
    <?php require_once("./inc/header.php"); ?>
    <main class="container my-5">
        Percorra a lista de usuários abaixo através de foreach <br>

        <div class="desafio">
            $listaDeUsuarios = [ <br>
                &nbsp; "usuario1" => [ <br>
                &nbsp; &nbsp;   "nome" => "Victor", <br>
                &nbsp; &nbsp;  "email" => "vtorres@digitalhouse.com", <br>
                &nbsp; &nbsp;   "senha" => "123456" <br>
                &nbsp; ], <br>
                &nbsp; "usuario2" => [ <br>
                &nbsp; &nbsp;    "nome" => "Marcelo", <br>
                &nbsp; &nbsp;    "email" => "mdiament@digitalhouse.com", <br>
                &nbsp; &nbsp;    "senha" => "123456" <br>
                &nbsp; ] <br>
            ];
        </div>

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
        ?>

        <p class="my-5">A tabela abaixo está listando usuários a medida que percorre o array $listaDeUsuarios</p>

        <table class="table mt-5">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Senha</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($listaDeUsuarios as $usuario): ?>
                    <tr>
                        <td><?= $usuario["nome"]; ?></td>
                        <td><?= $usuario["email"]; ?></td>
                        <td><?= $usuario["senha"]; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    </main>
   <?php require_once("./inc/footer.php"); ?>
</body>
</html>