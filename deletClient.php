<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <style>body{margin: 10px;}</style>
  </style>
  <title>Deletar</title>
</head>
<body>
  <form action="" method="post">
    <div class="col-md-3 mb-3">
      <input type="number" name="idClient" class="form-control" placeholder="Informe o ID" required>
    </div>
    <!-- <input type="submit" name="delet" value="Deletar!" class="btn btn-danger"> -->
    <button type="submit" name="delet" class="btn btn-danger">Deletar</button>
    <a href="cadastro.php" class="btn btn-primary">Inicio</a>
    <a href="mostrarClient.php" class="btn btn-info">Mostrar Clientes</a>
  </form>
  <?php
    require_once 'server.php';

    if (isset($_POST['delet'])) {
  
      $id = $_POST['idClient'];
  
      //verifica se a variavel é uma variável vazia
      if (empty($id)) {
        echo "Campo ID obrigatorio!";
      } else {
          $query = $pdo->prepare("SELECT * FROM clientes WHERE id = ?");
          $query->bindValue(1, $id);
  
          $query->execute();
  
          $num = $query->rowCount();
          if ($num == 0) {
            echo  "ID ($id) não existe!!!!";
          } else {
            $sql = $pdo->prepare("DELETE FROM `clientes` WHERE id=$id");
            $sql->execute();
  
              if(!$sql){
                echo 'erro na consulta: '. $db->errno .' - '. $pdo->error;
              }else{
                echo "Cliente deletado com sucesso!";
              }
  
          $pdo = null;  
          }
      }
  
  }
  ?>

</body>
</html>