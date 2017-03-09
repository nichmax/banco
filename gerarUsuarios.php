<?php

if(isset($_SESSION['nome_usuario'])){

  require_once 'conecta_mysql.php';

  $amigos = $pdo->prepare("SELECT * FROM USUARIOS WHERE PERFIL = 1");
  $amigos->execute();
  if($amigos){

      $amigos = $amigos->fetchAll();

      foreach($amigos as $amigo){
          ?>
          <a class="list-group-item btn btn-default "href="excluir.php?<?php echo "id=".$amigo['id']; ?>"><?php echo $amigo['nome']." - ".$amigo['identidade']." - ".$amigo['cpf']; ?></a>
          <?php
      }

  }else{
    ?>
      <script src="" charset="utf-8">
        alert("Erro na consulta!");
        window.location.href = 'principal.php';
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
