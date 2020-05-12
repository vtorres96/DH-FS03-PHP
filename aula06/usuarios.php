<?php

    // Bloqueando pagina para usuarios nao logados
    // 1 - obtendo sessao iniciada
    session_start();

    // 2 - aplicando validacao para redirecionar usuario caso nao esteja logado, bloqueando o acesso a essa pagina
    if(!isset($_SESSION["logado"])){
        header("Location: login.php");
    }

    // Listando usuarios
    // 1 - obtendo o conteudo do arquivo usuarios.json
    $usuariosJson = file_get_contents("./data/usuarios.json");

    // 2 - transformando o conteudo do arquivo usuarios.json em um array associativo
    $arrayUsuarios = json_decode($usuariosJson, true);

    // Excluindo usuarios
    // obtendo usuario referente ao ID passado na URL para trazer informacoes preenchidas no formulario
    if(isset($_GET) && $_GET){

        // 1 - obtendo ID que recebemos como parametro na URL
        $id = $_GET["id"];

        // 2 - obtendo o conteudo do arquivo usuarios.json
        $usuariosJson = file_get_contents("./data/usuarios.json");

        // 3 - transformando o conteudo do arquivo usuarios.json em um array associativo
        $arrayUsuarios = json_decode($usuariosJson, true);

        // 4- percorrendo array que contem a lista de usuarios
        foreach ($arrayUsuarios["usuarios"] as $chave => $usuario) {
            // verificando se encontramos o usuario para fazer a exclusao
            if($usuario["id"] == $id){
                // removendo usuario encontrado da lista de usuarios
                unset($arrayUsuarios["usuarios"][$chave]);
            }
        }
        
        // 6 - transformando o conteudo do arquivo usuarios.json que foi alterado em uma string json
        $jsonUsuarios = json_encode($arrayUsuarios);

        // 7 - sobrescrevendo o conteudo do arquivo usuarios.json
        $excluiu = file_put_contents("./data/usuarios.json", $jsonUsuarios);
    }
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
                            <th scope="col" colspan="2">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- 3 - percorrendo o array associativo da lista de usuarios -->
                        <?php foreach ($arrayUsuarios["usuarios"] as $usuario): ?>
                            <tr>
                                <th scope="row"><?= $usuario["nome"] ?></th>
                                <td><?= $usuario["sobrenome"] ?></td>
                                <td><?= $usuario["email"] ?></td>
                                <td>
                                    <a href="edita-usuario.php?id=<?= $usuario["id"] ?>">
                                        <i class="fas fa-pen"></i>
                                    </a>
                                </td>
                                <td>
                                    <a href="#" data-toggle="modal" data-target="#modal<?= $usuario["id"] ?>">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                    <!-- Modal -->
                                    <div class="modal fade" id="modal<?= $usuario["id"] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Deseja realmente excluir ?</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Usuário: <?= $usuario["nome"] ?></p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                    <a href="usuarios.php?id=<?= $usuario["id"] ?>">
                                                        <button type="button" class="btn btn-danger">Excluir</button>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </section>
            <div class="col-md-12">
                <?php
                    if(isset($_GET) && $_GET){
                        if($excluiu){
                            echo '<div class="col-md-12 alert-success">Usuário exclúido com sucesso</div>';
                        } else {
                            echo '<div class="col-md-12 alert-danger">Falha ao processar requisição</div>';
                        }
                    }
                ?>
            </div>
        </article>
    </main>
    <?php require_once("./inc/footer.php"); ?>