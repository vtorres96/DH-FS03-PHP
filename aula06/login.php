<?php

    if(isset($_POST) && $_POST){
        // 1 - recebendo as informacoes que o usuario preencheu no formulario
        $email = $_POST["email"];
        $senha = $_POST["senha"];

        // 2 - criando variavel logado para verificar se o usuario obteve erro 
        // ao digitar a senha ou ate mesmo se ele existe na nossa "base de dados" ficticia que e o arquivo usuarios.json
        $logado = false;

        // 3 - obtendo o conteudo do arquivo usuarios.json
        $usuariosJson = file_get_contents("./data/usuarios.json");

        // 4 - transformando o conteudo do arquivo usuarios.json em um array associativo
        $arrayUsuarios = json_decode($usuariosJson, true);

        // 5 - percorrendo o array associativo que contem a lista de usuarios
        foreach ($arrayUsuarios["usuarios"] as $usuario) {
            // 6 - verificando se o email informado existe no arquivo usuarios.json
            if($usuario["email"] == $email){
                // 7 - se o usuario for encontrado iremos verificar se a senha informada confere com a senha que temos armazenada no arquivo usuarios.json
                if(password_verify($senha, $usuario["senha"])){

                    $logado = true;

                    // 8 - iniciando sessao caso usuario tenha informado email e senha corretos
                    session_start();

                    // 9 - criando variaveis de sessao para verificar se usuario esta logado, e, obter o id e o nome do usuario
                    $_SESSION["logado"] = $logado;
                    $_SESSION["id"] = $usuario["id"];
                    $_SESSION["nome"] = $usuario["nome"];

                    // 10 - redirecionando usuario para lista de usuarios
                    header("Location: usuarios.php");
                }
            }
        }
    }

?>
<?php $tituloPagina = "Formulário de Login"; ?>
<?php require_once("./inc/head.php"); ?>
<?php require_once("./inc/header.php"); ?>
<main class="container">
    <article class="row">
        <section class="col-12 mx-auto bg-light my-5 py-5 rounded border" id="cadastroForm">
        <h3 class="col-12 text-center my-3"><?= $tituloPagina ?></h3>
            <form action="login.php" method="post">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="senha">Senha</label>
                        <input type="password" class="form-control" id="senha" name="senha" required>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary" id="btnLogar">Entrar</button>
                <div class="form-group">
                    <?php
                        if(isset($_POST) && $_POST){
                            if(!$logado){
                                echo '<div class="mt-2 col-md-6 alert-danger">Usuário ou senha inválidos</div>';
                            }
                        }
                    ?>
                </div>
            </form>
        </section>
    </article>
</main>
<?php require_once("./inc/footer.php"); ?>