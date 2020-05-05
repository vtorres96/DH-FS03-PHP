<?php
    // 1 - obtendo o conteudo do arquivo usuarios.json
    $usuariosJson = file_get_contents("./data/usuarios.json");

    // 2 - transformando o conteudo do arquivo usuarios.json em um array associativo
    $arrayUsuarios = json_decode($usuariosJson, true);
?>
<?php $tituloPagina = "Lista de Usuários"; ?>
<?php require_once("./inc/head.php"); ?>
<?php require_once("./inc/header.php"); ?>
    <main class="container">
        <article class="row">
            <section class="col-12 mx-auto bg-light my-5 py-5 rounded border" id="usuariosTb">
                <h3 class="col-12 text-center my-3"><?= $tituloPagina ?></h3>
                <table class="table my-5">
                    <thead class="thead-dark">
                        <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">Sobrenome</th>
                        <th scope="col">E-mail</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- 3 - percorrendo o array associativo da lista de usuarios -->
                        <?php foreach ($arrayUsuarios["usuarios"] as $usuario): ?>
                            <tr>
                                <th scope="row"><?= $usuario["nome"] ?></th>
                                <td><?= $usuario["sobrenome"] ?></td>
                                <td><?= $usuario["email"] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </section>
        </article>
    </main>
    <?php require_once("./inc/footer.php"); ?>