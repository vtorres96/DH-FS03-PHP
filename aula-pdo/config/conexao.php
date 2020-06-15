<?php
  // try/catch - ira tentar executar instrucoes, caso falhe ira cair no catch, que ira capturar um erro
  // e retornar o possivel erro para nos
  try {
    $dbh = new PDO('mysql:host=localhost;dbname=aula_pdo;charset=utf8mb4;port=3306', 'root', '');
    foreach($dbh->query('SELECT * from FOO') as $row) {
        print_r($row);
    }
  } catch (PDOException $e) {
      print "Erro: " . $e->getMessage() . "<br/>";
      die();
  }
?>