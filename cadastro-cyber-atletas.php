<?php 

require_once 'configs/config.php';
require_once 'configs/database.php';

?>

<?php include 'header.php' ?>

 <section id="services">
      <div class="container">

        
<div class="list-group-item section-header active text-center">
            <a name="form"></a>
            <h2><span class="glyphicon glyphicon-thumbs-up"></span> É só completar o <b>cadastro</b> e criar uma senha<br> para acessar a área exclusiva do Cyber-Atleta.</h2>
            <br>
          </div>

        <div class="row">

        	

          <br clear="all">


      <br clear="all">

      <div id="cadastro-atleta" class="section-header wow fadeInUp alert alert-success clearfix" role="alert">
        <div id="list-group-plano-4">
          
        </div>
        <!-- cadastro -->
      <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="row">
         
            <div class="row">
		<h1> Cadastre-se</h1>
		<hr>
		<?php 

                                if( isset( $_POST['publicar'] ) ){

                                $login['login']               = DBEscape( strip_tags( trim( $_POST['login'] ) ) );
                                $login['password']            = md5($_POST["password"]);
                                $login['email']               = DBEscape( strip_tags( trim( $_POST['email'] ) ) );
                                $dados['login']               = $login['login'];
								$dados['nome']                = DBEscape( strip_tags( trim( $_POST['nome'] ) ) );
                                $dados['apelido_gamer']       = DBEscape( strip_tags( trim( $_POST['apelido_gamer'] ) ) );
                                $dados['dt_nasc']             = DBEscape( strip_tags( trim( $_POST['dt_nasc'] ) ) );
                                $dados['telefone_zap']        = DBEscape( strip_tags( trim( $_POST['telefone_zap'] ) ) );
                                $dados['telefone_resid']      = DBEscape( strip_tags( trim( $_POST['telefone_resid'] ) ) );
                                $dados['sexo']                = DBEscape( strip_tags( trim( $_POST['sexo'] ) ) );
                                $dados['psn_live']            = DBEscape( strip_tags( trim( $_POST['psn_live'] ) ) );
                                $dados['cep']                 = DBEscape( strip_tags( trim( $_POST['cep'] ) ) );
                                $dados['rua']                 = DBEscape( strip_tags( trim( $_POST['rua'] ) ) );
                                $dados['bairro']              = DBEscape( strip_tags( trim( $_POST['bairro'] ) ) );
                                $dados['cidade']              = DBEscape( strip_tags( trim( $_POST['cidade'] ) ) );
                                $dados['cidade']              = DBEscape( strip_tags( trim( $_POST['cidade'] ) ) );
                                $dados['uf']                  = DBEscape( strip_tags( trim( $_POST['uf'] ) ) );
                                $dados['CPF']                 = DBEscape( strip_tags( trim( $_POST['CPF'] ) ) );
                                $dados['responsavel']         = DBEscape( strip_tags( trim( $_POST['responsavel'] ) ) );
                                $dados['foto']                = DBEscape( strip_tags( trim( $_POST['foto'] ) ) );

                                if( empty( $login['login']) )
                                    echo '<div class="alert alert-danger">Preencha o Campo Login</div>';
                                
                                else {
                                    $Chek = DBRead('login', "WHERE email = '". $login['email'] ."'"  );
                                    $Chek2 = DBRead('perfil', "WHERE psn_live = '". $dados['psn_live'] ."'"  );
                                    

                                    if( $Chek )
                                        echo '<div class="alert alert-danger">Desculpe, mais esse E-mail já está cadastrado</div>';
                                    elseif( $Chek2 )
                                        echo '<div class="alert alert-danger">Desculpe, mais essa conta PSN / LIVE já está cadastrada</div>';


                                    else {

                                        if( DBCreate( 'login', $login ) )
                                            echo '';
                                        if( DBCreate( 'perfil', $dados ) )
                                        	echo "<script type=\"text/javascript\">
                                        alert(\"Usuario cadastrado com Sucesso.\");
                                        </script>";
										
                                        else
                                            echo "<script type=\"text/javascript\">
                                        alert(\"Desculpe, Ocorreu um erro.\");
                                        </script>";


                                    }

                                }

                    echo '<hr>';

                 }
                   
            ?>
	</div>
 
	<div class="row">
 
	<div class="col-md-3">
		Os campos marcados por * são obrigatórios!<br>
	</div>
 
	<div class="col-md-9">
		<form method="post" action="">		
			<div class="form-group">
				<label>* Digite seu nome completo:</label>
				<input type="text" class="form-control" name="nome" required>
			</div>
 
			<div class="form-group">
				<label>* Informe seu e-mail:</label>
				<input type="email" class="form-control" name="email" required>
			</div>
 
			<!-- Agora vou sub-dividir esta coluna em outras três -->
			<div class="container-fluid">
				<div class="col-md-4">
					<div class="form-group">
						<label>* Apelido Gamer:</label>
						<input type="text" class="form-control" name="apelido_gamer" required>
					</div>		


					<div class="form-group">
						<label>Telefone (residencial):</label>
						<input type="text" class="form-control" name="telefone_resid" onkeyup="mascara( this, mtel );" maxlength="15">
					</div>		
				
				
					<div class="form-group">
						<label>* CEP:</label>
						<input type="text" class="form-control" name="cep" id="cep" maxlength="9" >
					</div>	

					<div class="form-group">
						<label>Logradouro:</label>
						<input type="text" class="form-control" name="rua" id="rua" >
					</div>	

					<div class="form-group">
						<label>Bairro:</label>
						<input type="text" class="form-control" name="bairro" id="bairro" >
					</div>	

					<div class="form-group">
						<label>Cidade:</label>
						<input type="text" class="form-control" name="cidade" id="cidade" >
					</div>	

					<div class="form-group">
						<label>Estado:</label>
						<input type="text" class="form-control" name="uf" id="uf"  >
					</div>
						
				
				</div>

				<div class="col-md-4">
					<div class="form-group">
						<label>* Data de Nascimento:</label>
						<input type="date" class="form-control" name="dt_nasc" required>
					</div>					
					<div class="form-group">
						<label for="genero">* Informe seu género sexual:</label>
						<select name="sexo" class="form-control">
							<option value="0">Selecione...</option>
							<option value="Masculino">Masculino</option>
							<option value="Feminino">Feminino</option>
						</select>
					</div>

					<div class="form-group">
						<label>* CPF:</label>
						<input type="text" class="form-control" name="CPF" onkeydown="javascript: fMasc( this, mCPF );" maxlength="14">
					</div>	
				</div>
 
				<div class="col-md-4">
					<div class="form-group">
						<label>* Telefone (What's App):</label>
						<input type="text" class="form-control" name="telefone_zap" onkeyup="mascara( this, mtel );" maxlength="15">
					</div>
					<div class="form-group">
						<label>* PSN / LIVE:</label>
						<input type="text" class="form-control" name="psn_live">
					</div>	
				</div>
 
				<div class="col-md-4">
					<div class="form-group">
						<label>Responsável:</label><br/>
						<input type="text" class="form-control" name="responsavel">
					</div>
				</div>

				<div class="col-md-4">
					<div class="form-group">
						<label>Login:</label><br/>
						<input type="text" class="form-control" name="login">
					</div>
				</div>

				<div class="col-md-4">
					<div class="form-group">
						<label>Senha:</label><br/>
						<input type="text" class="form-control" name="password">
					</div>
				</div>

				<div class="col-md-4">
					<div class="form-group">
						<label for="cor_favorita">* Foto 3x4:</label><br/>
						<input type="text" class="form-control" name="foto">
					</div>
				</div>
			</div>
			<!-- fim -->	
 
			<div class="form-group" align="center">
				<button type="submit" name="publicar" class="btn btn-lg btn-success"> 
					<span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Realizar Cadastro
				</button>
			</div>
 
 
		</form>	
	</div>

         
          
          

        </div>

      </div>
    </section><!-- #services -->




<?php include 'footer.php' ?>