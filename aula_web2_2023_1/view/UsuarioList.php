<?php 
include "../controller/UsuarioController.php";

    $usuario = new UsuarioController();
    $load = $usuario->carregar($_POST);
    //var_dump(load);
    //exit;
    if(!empty($_GET['id']))
    {
        $usuario->deletar($_GET['id']);
       // header(location:"UsuarioList.php"); 
    }
?>

<html>
  <head>
    <title>Banco de Dados</title>
  </head>
  <body>

       <table>
       <tr>  

        <th> id </th>
        <th> Nome </th>
        <th> Telefone </th>
        </tr>
<?php

foreach($load as $item)
{

echo    "<tr>  
        <td>$item->id </td>
        <td>$item->nome </td>
        <td>$item->telefone </td>
        <td><a href='./UsuarioForm.php?id=$item->id'>Editar</a></td>
        <td><a href='./UsuarioList.php?id=$item->id'
    onclick='return confirm(\"Deseja excluir?\")'
                >Excluir</a></td>
        </tr>";
}
?>

        </table>
	    </body>
</html>