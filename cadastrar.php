<?php

session_start();

if(isset($_SESSION['nome_usuario'])){

  if(isset($_POST['nome']) && isset($_POST['login']) && isset($_POST['senha']) && isset($_POST['sexo']) && isset($_POST['RG']) && isset($_POST['CPF']) && isset($_POST['nascimento']) && isset($_POST['estado_civil']) && isset($_POST['email']) && isset($_POST['telefone']) && isset($_POST['perfil']) && isset($_POST['cad_usuario']) && isset($_POST['cad_datahora'])){

    require_once 'conecta_mysql.php';

    $insert = $pdo->prepare("INSERT INTO USUARIOS (nome,login,senha,sexo,identidade,CPF,nascimento,estado_civil,email,telefone,perfil,cad_usuario,cad_datahora) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)");
    $insert->execute(array($_POST['nome'],$_POST['login'],$_POST['senha'],$_POST['sexo'],$_POST['RG'],$_POST['CPF'],$_POST['nascimento'],$_POST['estado_civil'],$_POST['email'],$_POST['telefone'],$_POST['perfil'],$_POST['cad_usuario'],$_POST['cad_datahora']));

    if($insert){
      ?>
        <script type="text/javascript">
          alert('Cadastro feito com sucesso!');
          window.location.href = 'addUsers.php';
        </script>
      <?php
    }else{
      ?>
      <script type="text/javascript">
        alert("Falha no cadastro!");
        window.location.href = 'addUsers.php';
      </script>
      <?php
    }

  }else{
    ?>
      <script type="text/javascript">
        alert("Erro no formulário!");
        window.location.href = 'index.html';
      </script>
    <?php
  }

}else{
  ?>
  <script type="text/javascript">
    alert("Você não está conectado!");
    window.location.href = 'index.html';
  </script>
  <?php
}

?>
