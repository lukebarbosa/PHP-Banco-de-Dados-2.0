<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> 
  <style>body{margin: 10px;}</style>
  <title>Mostrar Clientes</title>
</head>
<body>
    
  <div class="card-body">
    <?php
      require_once 'server.php';
    
      $sql = $pdo->prepare("SELECT * FROM `clientes` ");
      $sql->execute();
      $info = $sql->fetchAll();

      foreach($info as $key => $value) {
        echo 'Nome: ' .$value['name'];
        echo '<br>';
        echo 'Sobrenome: ' .$value['lastName'];
        echo '<br>';
        echo 'ID: ' .$value['id'];
        echo '<hr>';
      }
    ?>
  </div>
  <a href="cadastro.php" class="btn btn-primary">Inicio</a>
  <a href="editarClient.php" class="btn btn-info">Editar</a>
  <a href="deletClient.php" class="btn btn-danger">Deletar</a>
</body>
</html>
