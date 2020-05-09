<?php

    if(isset($_POST) && $_POST){
        // 1 - recebendo as informacoes que o usuario preencheu no formulario 
        $nome = $_POST["nome"];
        $sobrenome = $_POST["sobrenome"];
        $email = $_POST["email"];
        $senha = $_POST["senha"];

        // 2 - obtendo o conteudo do arquivo usuarios.json
        $usuariosJson = file_get_contents("./data/usuarios.json");

        // 3 - transformando o conteudo do arquivo usuarios.json em um array associativo
        $arrayUsuarios = json_decode($usuariosJson, true);

        // 4 - obtendo usuario que esta na ultima posicao do array
        $ultimoUsuario = end($arrayUsuarios["usuarios"]);

        // 5 - criando array para o novo usuario e dentro dele ter as propriedades nome, sobrenome, email e senha com os valores do que o usuario preencheu no formulario
        $novoUsuario = [
            // gerando id sequencial simulando um banco de dados, somando o id do ultimo usuario sempre com + 1
            "id" => $ultimoUsuario["id"] + 1,
            "nome" => $nome,
            "sobrenome" => $sobrenome,
            "email" => $email,
            "senha" => $senha
        ];

        // 6 - adicionando o novo usuario no array da lista de usuarios obtidos do arquivo usuarios.json
        array_push($arrayUsuarios["usuarios"], $novoUsuario);

        // 7 - transformando o array associativo de usuarios apos ter recebido o novo usuario em uma string json
        $jsonUsuarios = json_encode($arrayUsuarios);

        // 8 - sobrescrevendo o conteudo do arquivo usuarios.json
        $cadastrou = file_put_contents("./data/usuarios.json", $jsonUsuarios);
    }

?>
<?php $tituloPagina = "Formulário de Cadastro"; ?>
<?php require_once("./inc/head.php"); ?>
<?php require_once("./inc/header.php"); ?>
    <main class="container">
        <article class="row">
            <section class="col-12 mx-auto bg-light my-5 py-5 rounded border" id="cadastroForm">
            <h3 class="col-12 text-center my-3"><?= $tituloPagina ?></h3>
                <form action="index.php" method="post">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="nome">Nome</label>
                            <input type="text" class="form-control" id="nome" name="nome" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="sobrenome">Sobrenome</label>
                            <input type="text" class="form-control" id="sobrenome" name="sobrenome" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="email">E-mail</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="senha">Senha</label>
                            <input type="password" class="form-control" id="senha" name="senha" required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary" id="btnCadastrar">Cadastrar</button>
                    <div class="form-group">
                        <?php
                            if(isset($_POST) && $_POST){
                                if($cadastrou){
                                    echo '<div class="col-md-6 mt-2 alert alert-success">Usuário cadastrado com sucesso</div>';
                                } else {
                                    echo '<div class="col-md-6 mt-2 alert alert-danger">Falha ao processar requisição</div>';
                                }
                            }
                        ?>
                    </div>
                </form>
            </section>
        </article>
    </main>
    <?php require_once("./inc/footer.php"); ?>