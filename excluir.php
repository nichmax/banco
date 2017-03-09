<?php
session_start();

require_once 'conecta_mysql.php';

if(isset($_SESSION['nome_usuario']) && $_SESSION['perfil_usuario'] == 2){

  if(isset($_GET['id'])){
      $excluir = $pdo->prepare("DELETE FROM USUARIOS WHERE ID = ?");
      $excluir->execute(array($_GET['id']));
      if($excluir){
          ?>
            <script type="text/javascript">
              alert("Exclusão feita com sucesso!");
              window.location.href = 'excluirUsers.php';
            </script>
          <?php
      }else{
        ?>
          <script type="text/javascript">
            alert("Erro na consulta!");
            window.location.href = 'excluirUsers.php';
          </script>
        <?php
      }
  }else{
    ?>
      <script type="text/javascript">
        alert("Erro no forumlário!");
        window.location.href = 'excluirUsers.php';
      </script>
    <?php
  }

}else{
  ?>
    <script type="text/javascript">
      alert("Você não tem permissão de acesso!");
      window.location.href = 'principal.php';
    </script>
  <?php
}

?>
