<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <style>form input {margin-bottom: 10px;}body{margin: 10px;}</style>
  <title>Editar</title>
</head>
<body>
  <form action="" method="post">
    <div class="form-row">
      <div class="col-md-3 mb-3">
        <input type="number" name="idClient" class="form-control" placeholder="Informe o ID">
        <input type="text" name="newName" class="form-control" placeholder="Nome" >
        <input type="text" name="newLastName" class="form-control" placeholder="Sobrenome" >
      </div>
    </div>
        <!-- <input type="submit" name="editar" value="Editar Cliente!"><br> -->
      <button type="submit" name="editar" class="btn btn-success">Editar</button>
      <a href="cadastro.php" class="btn btn-primary">Inicio</a>
      <a href="mostrarClient.php" class="btn btn-info">Mostrar Clientes</a>
      <a href="deletClient.php" class="btn btn-danger">Deletar</a>
  </form>
  
<?php
  require_once 'server.php';

  if (isset($_POST['editar'])) {
  
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
          echo  "ID de cliente ".$id." não existe!!!!";
        } else {
          $newName = $_POST['newName'];
          $newLastName = $_POST['newLastName'];

          $sql = $pdo->prepare("UPDATE `clientes` SET name = '$newName', lastName = '$newLastName' WHERE id='$id'");
          $sql->execute();

            if(!$sql){
              echo 'erro na consulta: '. $db->errno .' - '. $pdo->error;
            }else{
              echo "Cliente alterado com sucesso!";
            }
        $pdo = null;
        }
    }
}

  // $id = $_POST['idClient'];
  // $newName = $_POST['newName'];
  // $newLastName = $_POST['newLastName'];

  // if(isset($_POST['editar'])) {

  //   $sql = $pdo->prepare("UPDATE `clientes` SET name = '$newName', lastName='$newLastName' WHERE id=$id");

  //   $sql->execute();
  //     echo "Cliente atualizado com sucesso!";
  // }
?>
</body>
</html>
