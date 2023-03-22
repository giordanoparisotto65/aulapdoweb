<?php 
include "../controller/UsuarioController.php";

$usuario = new UsuarioController();

if(!empty($_POST)){
    $usuario->salvar($_POST);
}

if(!empty($_GET['id']))
    {

      $data =$usuario -> buscar ($_GET['id']);
    }

?>

<html>
  <head>
    <title>AULA PDO</title>
  </head>
  <body>
        <form action="UsuarioForm.php" method="POST">
            <label>Nome</label><br>
            <input type="text" name="nome"/><br>
            <label>Telefone</label><br>
            <input type="text" name="telefone"/><br>

            <input type="submit" value="Salvar"/>
        </form>

	</body>
</html>