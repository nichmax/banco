<?php
include "valida_sessao.php";
include "conecta_mysql.php";
$nome_usuario = $_SESSION["nome_usuario"];
$id_usuario = $_SESSION["id_usuario"];
if(!isset($_GET['mes'])){
  $mes = date('n')-1;
}else{
  $mes = $_GET['mes'];
}
$meses = array("Janeiro","Fevereiro","Março","Abril","Maio","Junho","Julho",
"Agosto","Setembro","Outubro","Novembro","Dezembro");

$resRecVar = $pdo->prepare("SELECT * FROM receitas_despesas WHERE classe = ? and mes_referencia = ? and tipo = ? and usuario = ?");
$resRecVar->execute(array(1,$mes,1,$id_usuario));
$resDesVar = $pdo->prepare("SELECT * FROM receitas_despesas WHERE classe = ? and mes_referencia = ? and tipo = ? and usuario = ?");
$resDesVar->execute(array(1,$mes,2,$id_usuario));
$resRecFix = $pdo->prepare("SELECT * FROM receitas_despesas WHERE classe = ? and mes_referencia = ? and tipo = ? and usuario = ?");
$resRecFix->execute(array(2,$mes,1,$id_usuario));
$resDesFix = $pdo->prepare("SELECT * FROM receitas_despesas WHERE classe = ? and mes_referencia = ? and tipo = ? and usuario = ?");
$resDesFix->execute(array(2,$mes,2,$id_usuario));
// Valores Totais Receitas e Despesas
$recVarTotal = 0; $recFixTotal = 0; $desVarTotal = 0; $desFixTotal = 0;
?>
<html>
<head><title> Controle de Finanças </title>
</head>
<body>
  <form method ="GET" name ="fmes" action ="saldosMensaisPlan.php">
    <center>
      <img src="coins.jpg" width ="15%"/>
      <h1 > Sistema de Controle de Finanças Empresarial </h1>
      <hr width ="700 px" /><br>
      <p>Favor , escolha o mes que deseja visualizar :
        <select name ="mes" onchange="javascript: document.fmes.submit();">
          <option value=""> - </option>
          <option value ="0" onclick ="javascript: document.fmes.submit();">
            Janeiro </option>
            <option value ="1" onclick ="javascript: document.fmes.submit();">
              Fevereiro </option>
              <option value ="2" onclick ="javascript: document.fmes.submit();">
                Marco </option>
                <option value ="3" onclick ="javascript: document.fmes.submit();">
                  Abril </option>
                  <option value ="4" onclick ="javascript: document.fmes.submit();">
                    Maio </option>
                    <option value ="5" onclick ="javascript: document.fmes.submit();">
                      Junho </option>
                      <option value ="6" onclick ="javascript: document.fmes.submit();">
                        Julho </option>
                        <option value ="7" onclick ="javascript:document.fmes.submit();">
                          Agosto </option>
                          <option value ="8" onclick ="javascript: document.fmes.submit ();">
                            Setembro </option>
                            <option value ="9" onclick ="javascript: document.fmes.submit();">
                              Outubro </option>
                              <option value ="10" onclick ="javascript: document.fmes.submit();">
                                Novembro </option>
                                <option value ="11" onclick ="document.getElementByName('fmes').submit();">
                                  Dezembro </option>
                                </select >
                              </p>
                              <?php if(isset($mes))
                              {
                                ?>
                                <b>Lista de RECEITAS - Mes de <?php echo $meses[$mes]?></b><br><br>
                                Fixas
                                <table width =700 px border =0px >
                                  <th> Nome </th> <th> Data e Hora de Cadastro </th><th> Valor (R$ )</th>
                                  <?php
                                  while(($linha = $resRecFix->fetch(PDO::FETCH_ASSOC))!= null)
                                  {
                                    /*echo "<tr>";
                                    echo "<td align = left  width =33%>".$linha["nome"]."</td>";
                                    echo "<td align = center width =33%>".$linha["datahora"]."</td>";
                                    echo "<td align = right width =33%>".$linha["valor"]."</td>";
                                    echo "</tr>";*/
                                    // Incrementar o valor total
                                    $recFixTotal = $recFixTotal + $linha["valor"];
                                    ?>
                                    <input type="hidden" name="rec_fix" data-nome="<?php echo $linha['nome']; ?>" data-valor="<?php echo $linha['valor']; ?>" data-desc="<?php echo $linha['descricao']; ?>">
                                    <?php
                                  }
                                  ?>
                                  <div id="table_rec_fix"></div>
                                  <tr>
                                    <td width =33%></td><td width =33%><b> Total : </b></td><td width =33%><b><?php echo $recFixTotal; ?></b></td>
                                  </tr>
                                </table><br>
                                Variaveis
                                <table width =700 px border =0px>
                                  <?php
                                  while(($linha = $resRecVar->fetch(PDO::FETCH_ASSOC)) != null)
                                  {
                                    /*echo "<tr>";
                                    echo "<td align ='left' width =33%>".$linha["nome"]."</td>";
                                    echo "<td align ='center' width =33%>".$linha["datahora"]."</td>";
                                    echo "<td align ='right' width =33%>".$linha["valor"]."</td>";
                                    echo " </tr>";*/
                                    // Incrementar o valor total
                                    $recVarTotal = $recVarTotal + $linha["valor"];
                                    ?>
                                    <input type="hidden" name="rec_var" data-nome="<?php echo $linha['nome']; ?>" data-valor="<?php echo $linha['valor']; ?>" data-desc="<?php echo $linha['descricao']; ?>">
                                    <?php
                                  } ?>
                                  <div id="table_rec_var"></div>
                                  <tr>
                                    <td width =33%></td ><td width =33%><b> Total : </b ></td ><td width =33%><b><?php echo $recVarTotal; ?></b></td>
                                  </tr>
                                </table><br/>
                                <b> Lista de DESPESAS - Mes de <?php echo $meses[$mes]?></b><br><br/>
                                Fixas
                                <table width =700 px border =0px >
                                  <th> Nome </th> <th> Data e Hora de Cadastro </th><th> Valor (R$ )</th>
                                  <?php
                                  while($linha = $resDesFix->fetch(PDO::FETCH_ASSOC))
                                  {
                                    /*echo "<tr>";
                                    echo "<td align ='left' width =33%>".$linha["nome"]."</td >";
                                    echo "<td align ='center' width =33%>".$linha["datahora"]."</t>";
                                    echo "<td align ='right' width =33%>".$linha["valor"]."</td>";
                                    echo "</tr>";*/
                                    // Incrementar o valor total
                                    $desFixTotal = $desFixTotal + $linha["valor"];
                                    ?>
                                    <input type="hidden" name="des_fix" data-nome="<?php echo $linha['nome']; ?>" data-valor="<?php echo $linha['valor']; ?>" data-desc="<?php echo $linha['descricao']; ?>">
                                    <?php
                                  } ?>
                                  <div id="table_des_fix"></div>
                                  <tr>
                                    <td width =33%></td><td width =33%><b> Total : </b></td><td width =33%><b><?php echo $desFixTotal; ?></b></td>
                                  </tr>
                                </table> <br/>
                                Variaveis
                                <table width =700 px border =0px>
                                  <?php
                                  while($linha = $resDesVar->fetch(PDO::FETCH_ASSOC)){
                                    /*echo "<tr>";
                                    echo "<td align ='center' width =33%>".$linha["nome"]."</td>";
                                    echo "<td align ='center' width =33%>".$linha["datahora"]."</td>";
                                    echo "<td align ='center' width =33%>".$linha["valor"]."</td>";
                                    echo "</tr>";*/
                                    // Incrementar o valor total
                                    $desVarTotal = $desVarTotal + $linha["valor"];
                                    ?>
                                    <input type="hidden" name="des_var" data-nome="<?php echo $linha['nome']; ?>" data-valor="<?php echo $linha['valor']; ?>" data-desc="<?php echo $linha['descricao']; ?>">
                                    <?php
                                  } ?>
                                  <div id="table_des_var"></div>
                                  <tr>
                                    <td width =33%></td><td  width =33%><b> Total : </b></td><td width =33%><b><?php echo $desVarTotal; ?></b></td>
                                  </tr>
                                </table ><br/>
                                <b>SALDO </b>
                                <hr width ="700 px" />
                                <table width =700 px border =0px>
                                  <tr>
                                    <td width ="50%">Receitas : </td>
                                    <td align ="right" width ="50%"><?php echo($recFixTotal + $recVarTotal); ?></td>
                                  </tr>
                                  <tr>
                                    <td width ="50%">Despesas : </td>
                                    <td align ="right" width ="50%"><?php echo($desFixTotal + $desVarTotal); ?></td>
                                  </tr>
                                  <tr>
                                    <td width ="50%">Saldo : </td>
                                    <td align ="right" width ="50%">
                                      <b><?php echo ($recFixTotal + $recVarTotal )-($desFixTotal + $desVarTotal); ?></b></td>
                                    </tr>
                                    <tr>
                                      <td>
                                        <input type ="button" onClick ="location.href = 'principal.php'" value ='Voltar '>
                                      </td>
                                      <td>
                                      </td>
                                    </tr>
                                  </table>
                                  <?php
                                }
                                ?>
                              </center>
                            </form>
                            <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                            <script type="text/javascript">
                            google.charts.load('current', {'packages':['table']});
                            google.charts.setOnLoadCallback(drawTableReceitasFixas);

                            function drawTableReceitasFixas() {
                              var rows = document.getElementsByName('rec_fix');
                              var data = new google.visualization.DataTable();
                              data.addColumn('string', 'Nome');
                              data.addColumn('number', 'Valor');
                              data.addColumn('string', 'Descrição');
                              for(var i = 0; i < rows.length; i++){
                                data.addRow([rows[i].dataset.nome,parseFloat(rows[i].dataset.valor),rows[i].dataset.desc]);
                              }

                              var table = new google.visualization.Table(document.getElementById('table_rec_fix'));

                              table.draw(data, {showRownumber: true, width: '70%', height: '20%'});
                              drawTableReceitasVariaveis();
                            }

                            function drawTableReceitasVariaveis() {
                              var rows = document.getElementsByName('rec_var');
                              var data = new google.visualization.DataTable();
                              data.addColumn('string', 'Nome');
                              data.addColumn('number', 'Valor');
                              data.addColumn('string', 'Descrição');
                              for(var i = 0; i < rows.length; i++){
                                data.addRow([rows[i].dataset.nome,parseFloat(rows[i].dataset.valor),rows[i].dataset.desc]);
                              }

                              var table = new google.visualization.Table(document.getElementById('table_rec_var'));

                              table.draw(data, {showRownumber: true, width: '70%', height: '20%'o});
                              drawTableDespesasFixas();
                            }

                            function drawTableDespesasFixas() {
                              var rows = document.getElementsByName('des_fix');
                              var data = new google.visualization.DataTable();
                              data.addColumn('string', 'Nome');
                              data.addColumn('number', 'Valor');
                              data.addColumn('string', 'Descrição');
                              for(var i = 0; i < rows.length; i++){
                                data.addRow([rows[i].dataset.nome,parseFloat(rows[i].dataset.valor),rows[i].dataset.desc]);
                              }

                              var table = new google.visualization.Table(document.getElementById('table_des_fix'));

                              table.draw(data, {showRownumber: true, width: '70%', height: '20%'});
                              drawTableDespesasVariaveis();
                            }

                            function drawTableDespesasVariaveis() {
                              var rows = document.getElementsByName('des_var');
                              var data = new google.visualization.DataTable();
                              data.addColumn('string', 'Nome');
                              data.addColumn('number', 'Valor');
                              data.addColumn('string', 'Descrição');
                              for(var i = 0; i < rows.length; i++){
                                data.addRow([rows[i].dataset.nome,parseFloat(rows[i].dataset.valor),rows[i].dataset.desc]);
                              }

                              var table = new google.visualization.Table(document.getElementById('table_des_var'));

                              table.draw(data, {showRownumber: true, width: '70%', height: '20%'});
                            }


                            </script>
                        </body>
                        </html>
