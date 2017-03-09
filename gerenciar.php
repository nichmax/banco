<?php
include 'conecta_mysql.php';

session_start();

if(isset($_SESSION['nome_usuario'])){

$receitas = $pdo->prepare("SELECT * FROM receitas_despesas WHERE  USUARIO = ? AND tipo = 1");
$despesas = $pdo->prepare("SELECT * FROM receitas_despesas WHERE  USUARIO = ? AND tipo = 2");

$receitas->execute(array($_SESSION['id_usuario']));
$despesas->execute(array($_SESSION['id_usuario']));

if($receitas && $despesas){
  $receitas = $receitas->fetchAll();
  $despesas = $despesas->fetchAll();
}

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h3>[TABELA DE RECEITAS]</h3>
    <table border=1>
      <?php
        foreach($receitas as $receita){

          $classe = "";

          if($receita['classe'] == 1){
            $classe = "Variável";
          }else{
            $classe = "Fixa";
          }

          ?>
          <tr>
            <td>Nome: <?php echo $receita['nome']; ?></td><td>Tipo : <?php echo $classe; ?></td><td>Valor: <?php echo $receita['valor']; ?></td><td>Data: <?php $receita['datahora']; ?></td><td><a href="apagar.php?id=<?php echo $receita['id']; ?>">Apagar</a></td>
          </tr>
          <?php
        }
      ?>
    </table>
    <h3>[TABELA DE DESPESAS]</h3>
    <table border=1>
      <?php
        foreach($despesas as $despesa){

          $classe = "";

          if($despesa['classe'] == 1){
            $classe = "Variável";
          }else{
            $classe = "Fixa";
          }

          ?>
          <tr>
            <td>Nome: <?php echo $despesa['nome']; ?></td><td>Tipo : <?php echo $classe; ?></td><td>Valor: <?php echo $despesa['valor']; ?></td><td>Data: <?php $despesa['datahora']; ?></td><td><a href="apagar.php?id=<?php echo $despesa['id']; ?>">Apagar</a></td>
          </tr>
          <?php
        }
      ?>
    </table><br>
    <button type="button" name="button" onclick="window.location.href= 'principal.php' ">Voltar</button>
  </body>
</html>
<?php

}else{
  ?>
  <p>Você não está logado!</p>
  <a href="index.html">Voltar</a>
<?php } ?>
