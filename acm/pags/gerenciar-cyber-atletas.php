<?php if(!isset($pro)){echo 'Página protegida!'; exit;};?>

<div class="row">
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <span class="glyphicon glyphicon-share-alt"></span> <span>Útimos Cadastros</span> 
        <div class="pull-right">
          <div class="btn-group">


          </div>
          &nbsp;
          &nbsp;


          <div class="btn-group">


            <ul class="dropdown-menu pull-right" role="menu">


            </ul>

          </div>
        </div>
      </div>



      <div class="panel-body">

        <div class="table-responsive">
          <table class="table table-bordered table-hover table-striped">
            <thead>
              <tr>
                <th class="text-center">Nome</th>
                <th class="text-center">Apelido</th>
                <th class="text-center">PSN/LIVE</th>
                <th class="text-center">What's App</th>
                <th class="text-center">E-mail</th>
                <th class="text-center"></th>
                <th class="text-center"></th>
                <th class="text-center"></th>
              </tr>
            </thead>

          </div>
        </div>

        <?php  
        $quantidade = 10;
        $pagina     = (isset ( $_GET['pagina'] ) ) ? (int) $_GET['pagina'] : 1;
        $inicio     = ( $quantidade * $pagina ) - $quantidade;

        $sql        = "SELECT * FROM bd_perfil ORDER BY id ASC  LIMIT $inicio, $quantidade";
        $qr         = mysqli_query($conn, $sql) or die (mysqli_connect_error());

        $listagem = mysqli_query($conn, "SELECT * FROM bd_perfil ORDER BY nome ASC");

        if (mysqli_connect_errno()) {

          printf ("<p style='color: red;'>Conexão Falhou: %s\n</p>", mysqli_connect_errno());
          exit();
        }

        while($linha = mysqli_fetch_array($listagem)) {

          $email = DBRead( 'login', "WHERE login = '". $linha['login'] ."'");
          $email = ( $email ) ? $email[0]['email'] : '';

          ?>

          <tbody>
            <tr>
              <td class="text-center"><?= $linha['nome'] ?></td>
              <td class="text-center"><?= $linha['apelido_gamer'] ?></td>
              <td class="text-center"><?= $linha['psn_live'] ?></td>
              <td class="text-center"><?= $linha['telefone_zap'] ?></td>
              <td class="text-center"><?php echo $email; ?></td>


              <td class="text-center"><a href="" target="_blank" title="Ver"><i class="fa fa-eye"></i></a></i></td>
              

              <td class="text-center"><a href="exluir-perfil.php?id=<?= $linha['id'] ?>" title="Editar"><i class="fa fa-ban fa-fw"></i></a></td>
              </tr>

              <?php } ?>

            </tbody>
          </table>
          <center><?php
          $sqlTotal = "SELECT id FROM bd_perfil";
          $qrTotal = mysqli_query($conn, $sqlTotal) or die(mysqli_connect_error());
          $nunTotal = mysqli_num_rows($qrTotal);
          $totalPagina = ceil ($nunTotal/$quantidade);

          echo '<a href="?pagina=1" class="fa fa-chevron-left fa-1x">&nbsp;</a>';

          for ($i = 1; $i <= $totalPagina; $i++) {
            if($i == $pagina)
              echo $i;
            else
              echo " <a href=\"?pagina=$i\">$i</a> ";

          }

          echo "<a href=\"?pagina=$totalPagina\" class=\"fa fa-chevron-right fa-1x\">&nbsp;</a>";
          ?></center>
        </div>
      </div>
    </div>

    <!-- Modal -->
    <div class="modal fade bs-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="exampleModalLabel">#ID do Gamer</h4>
          </div>
          <div class="modal-body">
            <form method="post" action="" enctype='multipart/form-data'>
              <div class="row">

                <div class="col-xs-8 col-sm-6">
                 <label for="recipient-name" class="control-label">Nome:</label>
                 <input type="text" class="form-control" id="recipient-name">
                </div>

               <div class="col-xs-4 col-sm-6">
                <label for="recipient-name" class="control-label">E-mail:</label>
                <input type="text" class="form-control" id="recipient-email">
               </div>

              </div>

              <div class="row">

                <div class="col-xs-8 col-sm-6">
                 <label for="recipient-name" class="control-label">Apelido Gamer:</label>
                 <input type="text" class="form-control" id="recipient-apelido">
                </div>

               <div class="col-xs-4 col-sm-6">
                <label for="recipient-name" class="control-label">Data de Nascimento:</label>
                <input type="text" class="form-control" id="recipient-nascimento">
               </div>

              </div>

              <div class="row">

                <div class="col-xs-8 col-sm-6">
                 <label for="recipient-name" class="control-label">Telefone (What's App):</label>
                 <input type="text" class="form-control" id="recipient-zap" onkeyup="mascara( this, mtel );" maxlength="15">
                </div>

               <div class="col-xs-4 col-sm-6">
                <label for="recipient-name" class="control-label">Telefone (residencial):</label>
                <input type="text" class="form-control" id="recipient-resid" onkeyup="mascara( this, mtel );" maxlength="15">
               </div>

              </div>

              <div class="row">

                <div class="col-xs-1 col-sm-6">
                 <label for="recipient-name" class="control-label">Informe seu género sexual:</label>
                 <select name="sexo" class="form-control" id="recipient-sexo">
                          <option value="0">Selecione...</option>
                          <option value="Masculino">Masculino</option>
                          <option value="Feminino">Feminino</option>
                </select>
                </div>

               <div class="col-xs-4 col-sm-6">
                <label for="recipient-name" class="control-label">PSN / LIVE:</label>
                <input type="text" class="form-control" id="recipient-psn">
               </div>

              </div>

              <div class="row">

                <div class="col-xs-8 col-sm-6">
                 <label for="recipient-name" class="control-label">CEP:</label>
                 <input type="text" class="form-control" id="recipient-cep" maxlength="9">
                </div>

               <div class="col-xs-4 col-sm-6">
                <label for="recipient-name" class="control-label">Logradouro:</label>
                <input type="text" class="form-control" id="recipient-rua">
               </div>

              </div>

              <div class="row">

                <div class="col-xs-8 col-sm-6">
                 <label for="recipient-name" class="control-label">Bairro:</label>
                 <input type="text" class="form-control" id="recipient-bairro" >
                </div>

               <div class="col-xs-4 col-sm-6">
                <label for="recipient-name" class="control-label">Cidade:</label>
                <input type="text" class="form-control" id="recipient-cidade" >
               </div>

              </div>

              <div class="row">

                <div class="col-xs-8 col-sm-6">
                 <label for="recipient-name" class="control-label">Estado:</label>
                 <input type="text" class="form-control" id="recipient-uf">
                </div>

               <div class="col-xs-4 col-sm-6">
                <label for="recipient-name" class="control-label">CPF:</label>
                <input type="text" class="form-control" id="recipient-cpf" onkeydown="javascript: fMasc( this, mCPF );" maxlength="14">
               </div>

              </div>

              <div class="row">

               <div class="col-xs-4 col-sm-6">
                <label for="recipient-name" class="control-label">Responsável:</label>
                <input type="text" class="form-control" id="recipient-responsavel">
               </div>

              </div>
              
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary">Editar dados</button>
              </div>

            </form>
          </div>
          
        </div>
      </div>
    </div>


</div>
</div>
</div>
</div>

