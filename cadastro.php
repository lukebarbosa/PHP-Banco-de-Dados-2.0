<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <style>form input {margin-bottom: 10px;}body{margin: 10px;}</style>
  <title>Cadastro</title>
</head>
<body>
  <form method="post">
    <div class="form-row">
      <div class="col-md-3 mb-3">
        <input type="text" name="name" class="form-control" placeholder="Nome" required>
        <input type="text" name="lastName" class="form-control" placeholder="Sobrenome" required>
      </div>
    </div>
        <!-- <input type="submit" name="acao" value="Salvar Cliente!" class="btn btn-success"> -->
      <button type="submit" name="submit" class="btn btn-success">Cadastrar</button>
      <a href="editarClient.php" class="btn btn-primary">Editar</a>
      <a href="deletClient.php" class="btn btn-danger">Deletar</a>
      <a href="mostrarClient.php" class="btn btn-info">Mostrar Clientes</a>
  </form>
  
<?php
  require_once 'server.php';

  date_default_timezone_set('America/Sao_Paulo');

  if(isset($_POST['submit'])) {
    $name = $_POST['name'];
    $lastName = $_POST['lastName'];
    $register_moment = date('Y-m-d H:m:s');

    $sql = $pdo->prepare("INSERT INTO `clientes` VALUES (null,?,?,?)");

    $sql->execute(array($name,$lastName,$register_moment));
    echo "Cliente inserido com sucesso!";
  }

?>
</body>
</html>
