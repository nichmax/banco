<?php
include "conecta_mysql.php";

session_start();

if(isset($_SESSION['nome_usuario'])){

  if(isset($_GET['id'])){

  $apagar = $pdo->prepare("DELETE FROM receitas_despesas WHERE id = ?");
  $apagar->execute(array($_GET['id']));
  if($apagar){
    header("Location: gerenciar.php");
  }else{
    echo "Falha na exclusão!";
    echo "<a href='index.html'>Voltar</a>";
  }

  }

}else{
  echo "Você não está logado!";
  echo "<a href='index.html'>Voltar</a>";
}

?>
