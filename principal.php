<?php
include "valida_sessao.php";
include "conecta_mysql.php";
$nome_usuario = $_SESSION["nome_usuario"];
$perfil_usuario = $_SESSION["perfil_usuario"];
$resultado = $pdo->prepare("SELECT * FROM usuarios WHERE login = ? ");
$resultado->execute(array($nome_usuario));
$resultado = $resultado->fetchAll();
$sexo = $resultado[0]["sexo"];
$nome = $resultado[0]["nome"];
$perfil = '';
switch($sexo){
  case 1:
  $saud = " Olá, Sra. ".$nome ;
  break ;
  case 2:
  $saud = "Olá, Sr. " .$nome ;
  break ;
}
switch($perfil_usuario) {
  case 1:
  $perfil = "Padrão";
  break ;
  case 2:
  $perfil = "Administrador";
  break ;
}
?>
<html>
<head><title> Controle de Finanças </title></head>
<body>
  <form method ="POST" action ="login.php">
    <center>
      <img src="coins.jpg" width ="15%"/>
      <h1> Sistema de Controle de Fianças Empresarial </h1>
      <hr width ="700 px" /><br>
      <?php echo $saud." [ Perfil : ".$perfil."]";?> <a href ="logout.php">Sair</a>
      <hr width ="700 px"/>
      <p>Favor , escolha a opção desejadas : </p>
      <b> Incluir : </b><br>
      <a href ="receitas_despesas.php?t=1">Receitas </a> <br>
      <a href ="receitas_despesas.php?t=2">Despesas </a> <br>
      <a href="gerenciar.php">Gerenciar</a><br>
      <b> Visualizar : </b> <br>
      Saldos Mensais : <a href ="saldosMensaisPlan.php">[Planilha]</a>
      <br>
      <?php
      if($perfil_usuario == 2){?>
        <b>c~aAdministrao : </b><br>
        <a href = "addUsers.php">Adicionar usuários</a><br>
        Exportar planilha: <select name="">
          <option value="" onclick="window.location.href = 'exPDF.php'">PDF</option>
          <option value="" onclick="window.location.href = 'exXLS.php'">XLS</option>
        </select>
        <?php }else{?>
          Exportar planilha: <select name="">
            <option value="" onclick="window.location.href = 'exPDF.php'">PDF</option>
            <option value="" onclick="window.location.href = 'exXLS.php'">XLS</option>
          </select><?php
        } ?>

      </center>
    </form>
  </body>
  </html>
