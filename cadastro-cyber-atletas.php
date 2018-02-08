<?php 

require_once 'configs/config.php';
require_once 'configs/database.php';

$conn = DBConnect();


?>

<?php include 'header.php' ?>

<section id="services">
	<div class="container">


		<div class="list-group-item section-header active text-center">
			<a name="form"></a>
			<h2><span class="glyphicon glyphicon-thumbs-up"></span>É só completar o <b>cadastro</b> e criar uma senha<br> para acessar a área exclusiva do Cyber-Atleta.</h2>
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
								$nlogin                       = $_POST['login'] ;
								$nome                         = $_POST['nome'] ;
								$apelido                      = $_POST['apelido_gamer'] ;
								$dt_nasc                      = $_POST['dt_nasc'] ;
								$zap                          = $_POST['telefone_zap'];
								$resid                        = $_POST['telefone_resid'];
								$sexo                         = $_POST['sexo'] ;
								$psn_live                     = $_POST['psn_live'] ;
								$cep                          = $_POST['cep'] ;
								$rua                          = $_POST['rua'] ;
								$bairro                       = $_POST['bairro'] ;
								$cidade                       = $_POST['cidade'] ;
								$uf                           = $_POST['uf'];
								$CPF                          = $_POST['CPF'] ;
								$responsavel                  = $_POST['responsavel'] ;
								$foto = $_FILES["foto"];


                            // Valida os dados obrigatórios

								if( empty( $login['login']) )
									echo "<script type=\"text/javascript\">
								alert(\"Preencha o Campo Login.\");
								</script>";    
								else if( strlen ($login['login']) < 3 )
									echo "<script type=\"text/javascript\">
								alert(\"Login Inválido.\");
								</script>";

								else if( empty( $nome) )
									echo "<script type=\"text/javascript\">
								alert(\"Preencha o Campo Nome.\");
								</script>";    
								else if( strlen ($nome) < 8 )
									echo "<script type=\"text/javascript\">
								alert(\"Insira Seu Nome Completo\");
								</script>";  

								else if( empty( $zap) )
									echo "<script type=\"text/javascript\">
								alert(\"Preencha o Campo Telefone (What's App).\");
								</script>";    
								else if( strlen ($zap) < 13 )
									echo "<script type=\"text/javascript\">
								alert(\"Telefone (What's App) Inválido\");
								</script>"; 

								else if( empty( $psn_live) )
									echo "<script type=\"text/javascript\">
								alert(\"Preencha o Campo PSN/LIVE\");
								</script>";    
								else if( strlen ($psn_live) < 4 )
									echo "<script type=\"text/javascript\">
								alert(\"PSN/LIVE Inválido\");
								</script>"; 

								else if( empty( $CPF) )
									echo "<script type=\"text/javascript\">
								alert(\"Preencha o Campo CPF\");
								</script>";    
								else if( strlen ($CPF) < 12 )
									echo "<script type=\"text/javascript\">
								alert(\"CPF Inválido\");
								</script>"; 

								else if( empty( $login['password']) )
									echo "<script type=\"text/javascript\">
								alert(\"Preencha o Campo Senha\");
								</script>";    
								else if( strlen ($login['password']) < 6 )
									echo "<script type=\"text/javascript\">
								alert(\"Senha Inválida\");
								</script>";

								   
								
								

							// Verifica se há dados duplicados  no BD
								else {
									$Chek = DBRead('login', "WHERE email = '". $login['email'] ."'"  );
									$Chek2 = DBRead('perfil', "WHERE psn_live = '". $psn_live ."'"  );
									$Chek3 = DBRead('perfil', "WHERE login = '". $login['login'] ."'"  );


									if( $Chek )
										echo "<script type=\"text/javascript\">
											alert(\"Desculpe, Mais Esse E-mail Já Está Cadastrado.\");
											</script>";
									elseif( $Chek2 )
										echo "<script type=\"text/javascript\">
											alert(\"Desculpe, Mais Essa Conta PSN/LIVE Já Está Cadastrada.\");
											</script>";
									elseif( $Chek3 )	
										echo "<script type=\"text/javascript\">
											alert(\"Desculpe, Mais Esse Login Já Está Cadastrado.\");
											</script>";

									else {

										// Inicio do Upload da Imagem

        // Se a foto estiver sido selecionada
										
										if (!empty($foto["name"])) {

		// Largura máxima em pixels
											$largura = 2250;
		// Altura máxima em pixels
											$altura = 2250;
		// Tamanho máximo do arquivo em bytes
											$tamanho = 10000000;

											$error = array();

    	// Verifica se o arquivo é uma imagem
											if(!preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp)$/", $foto["type"])){
												$error[1] = "Isso não é uma imagem.";
											} 

		// Pega as dimensões da imagem
											$dimensoes = getimagesize($foto["tmp_name"]);

		// Verifica se a largura da imagem é maior que a largura permitida
											if($dimensoes[0] > $largura) {
												$error[2] = "<script type=\"text/javascript\">
												alert(\"A largura da imagem não deve ultrapassar ".$largura." pixels\");
												</script>";
											}

		// Verifica se a altura da imagem é maior que a altura permitida
											if($dimensoes[1] > $altura) {
												$error[3] = "Altura da imagem não deve ultrapassar ".$altura." pixels";
											}

		// Verifica se o tamanho da imagem é maior que o tamanho permitido
											if($foto["size"] > $tamanho) {
												$error[4] = "A imagem deve ter no máximo ".$tamanho." bytes";
											}

		// Se não houver nenhum erro
											if (count($error) == 0) {

			// Pega extensão da imagem
												preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $foto["name"], $ext);

        	// Gera um nome único para a imagem

												$nome_imagem = md5(uniqid(time())) . "." . $ext[1];

        	// Caminho de onde ficará a imagem
												$caminho_imagem = "upload/foto_perfil/" . $nome_imagem;


			// Faz o upload da imagem para seu respectivo caminho
												move_uploaded_file($foto["tmp_name"], $caminho_imagem);


												$sql = "INSERT INTO bd_perfil (login,nome,apelido_gamer,dt_nasc,telefone_zap,telefone_resid,sexo,psn_live,cep,rua,bairro,cidade,uf,CPF,responsavel,foto) VALUES ('$nlogin', '$nome', '$apelido', '$dt_nasc', '$zap', '$resid', '$sexo', '$psn_live', '$cep', '$rua', '$bairro', '$cidade', '$uf', '$CPF', '$responsavel', '$nome_imagem')";

												$cadastrando = mysqli_query($conn, $sql);


											}


											if( DBCreate( 'login', $login ) )
												echo "<script type=\"text/javascript\">
											alert(\"Usuario cadastrado com Sucesso.\");
											</script>";


											else
												echo "<script type=\"text/javascript\">
											alert(\"Desculpe, Ocorreu um erro.\");
											</script>";


										}

									}

								}

								echo '<hr>';

							}



							?>
						</div>
						
						<div class="row">

							<div class="col-md-3">
								Os campos marcados por * são obrigatórios!
								</p>Caso você seja menor de idade forneça o CPF e nome do seu responsável.
							</div>

							<div class="col-md-9">
								<form method="post" action="" enctype='multipart/form-data'>		
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
												<input type="password" class="form-control" name="password">
											</div>
										</div>

										<div class="col-md-4">
											<div class="form-group">
												<label for="cor_favorita">* Foto 3x4:</label><br/>
												<input type="file" class="form-control" name="foto">
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