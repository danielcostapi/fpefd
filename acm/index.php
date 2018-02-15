<?php
session_start();

require_once ('configs/config_admin.php');
require_once ('../configs/config.php');
require_once ('../configs/database.php');

include_once ('../securimage/securimage.php');


$securimage = new Securimage();

$conn = DBConnect();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo titulo_barra; ?></title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">
  <link rel="stylesheet" href="dist/css/AdminLTE.css">
  <link rel="stylesheet" href="dist/css/skins/skin-blue.min.css">
  <link rel="stylesheet" href="css/login.css" />

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
		
		<?php
			if(!isset($_SESSION['logins'])){
		?>
		
		<div id="login" class="login">
        	                       
			<form action=""  method="post" enctype="multipart/form-data">
				<input type="text" name="login" id="usuario" placeholder="Inserir Usuário"/>
				<input type="password" name="senha" id="senha" placeholder="Inserir Senha"/>
				<input type="text" name="captcha_code" size="10" maxlength="6" placeholder="CAPTCHA" autocomplete="off"/>
				
				<center>
				<br>
				<img id="captcha" src="../securimage/securimage_show.php" alt="CAPTCHA Image" />
				<a href="#" onclick="document.getElementById('captcha').src = '../securimage/securimage_show.php?' + Math.random(); return false" style="color: red"><p>Nova Imagem<p></a>
				
				</center>
				
				
				<a href="#" class="forgot">Recuperar Senha?</a>
				<input type="submit" name="logar" id="logar" value="Logar"/>
				 
				
			</form>
            
           	<?php
				if(isset($_POST['logar'])){
				
				
					$login['login']      = DBEscape( strip_tags( trim( $_POST['login'] ) ) );
					$login['password']   = md5($_POST["senha"]);
					$Chek = DBRead('login', "WHERE password = '". $login['password'] ."'"  );	

					if( $Chek ){
						$_SESSION['logins'] = $login['login'];
						$url = $_SERVER['REQUEST_URI'];
						echo '<br><br><br><div class="alert alert-success"><img src="dist/img/loader.gif" class="loader" alt=""/>
							<strong>Sucesso!</strong> Autenticando login para uma conexão segura. 
							</div>';
						header("Refresh:3, $url");
					}
					else{
					   echo '<br><br><br><div class="alert alert-danger">
									<strong>Erro ao logar!</strong> Usuário e/ou Senha incorretos. 
								  </div>';
								  die();
					}
				}
			?>
            
        </div>
	
		<?php
				exit; /* Encerra a execução enquanto nao passar do login*/
			}
		?>
		 
		
<!--**************************** Caso o login seja autorizado executa o codigo abaixo ***********************  -->

<div class="wrapper">
	
	<!-- Menu Superior e Dopdown Usuario -->
	<?php require_once('menu_header.php'); ?>
	
	<!-- Menu Esquerdo -->
	<?php require_once('menu_esquerdo.php'); ?>

	<!-- Conteudo Central -->
	<?php require_once('central.php'); ?>
  
    
</div> 
  
	<!-- Rodapé e JS -->
	<?php  require_once('footer.php'); ?>
