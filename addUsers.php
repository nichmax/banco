
<?php session_start();
if(isset($_SESSION['nome_usuario']) && $_SESSION['perfil_usuario'] == 2){?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head>
  <body>
    <div class="container" style="padding:20px;">
      <form action="cadastrar.php" method="post">
        <table class="table">
        <tr>
          <td><input type="text" name="nome" value="" placeholder="Nome: "><br><br></td>
        </tr>
        <tr>
          <td><input type="text" name="login" value="" placeholder="Login: "><br><br></td>
        </tr>
        <tr>
          <td><input type="password" name="senha" value="" placeholder="Senha: "><br><br></td>
        </tr>
        <tr>
          <td><label for="">Sexo: </label><select type="text" name="sexo" value="">
            <option value="1">Feminino</option>
            <option value="2">Masculino</option>
          </select><br><br></td>
        </tr>
        <tr>
          <td><input type="text" name="RG" value="" placeholder="RG: "><br><br></td>
        </tr>
        <tr>
          <td><input type="text" name="CPF" value="" placeholder="CPF: "><br><br></td>
        </tr>
        <tr>
          <td><input type="text" name="nascimento" value="" placeholder="Nascimento(dd/mm/aaaa): "><br><br></td>
        </tr>
        <tr>
          <td><label for="">Estado civil: </label><select name="estado_civil">
            <option value="1">Solteiro</option>
            <option value="2">Casado</option>
            <option value="3">Separado</option>
            <option value="4">Divorciado</option>
          </select><br><br></td>
        </tr>
        <tr>
          <td><input type="text" name="email" value="" placeholder="Email: "><br><br></td>
        </tr>
        <tr>
          <td><input type="text" name="telefone" value="" placeholder="Telefone: "><br><br></td>
        </tr>
        <tr>
          <td><label for="">Perfil: </label><select name="perfil" value="">
            <option value="1">Padrão</option/>
            <option value="2">Administrador</option>
          </select><br><br></td>
        </tr>
        <tr>
          <td><button class="btn btn-primary" type="submit" name="button">Cadastrar</button><button style="margin-left:20px;" class="btn btn-success" type="button" name="button" onclick="window.location.href = 'principal.php' ">Voltar</button><br><br></td>
        </tr>
      </table>
      <input type="hidden" name="cad_usuario" value="<?php $_SESSION['id']; ?>"><br><br>
      <input type="hidden" name="cad_datahora" value="<?php date("Y-m-d H:i:s"); ?>"><br><br>
      </form>
    </div>
  </body>
</html>
<?php
}else{
  ?>
  <script type="text/javascript">
    alert("Você não tem permissão para acessar essa página!");
    window.location.href = 'index.html';
  </script>
  <?php
}
?>
