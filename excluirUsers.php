<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head>
    <div class="container">
      <div class="panel panel-danger">
        <div class="panel-heading">
          <h4>Lista de Usuários <small>Clique para excluir</small></h4>
        </div>
        <div class="list-group" id="lista">
          <?php require_once 'gerarUsuarios.php'; ?>
        </div>
        <button class="btn btn-success" type="button" name="button" onclick="window.location.href = 'principal.php' ">Voltar</button>
      </div>
    </div>
  </body>
</html>]
