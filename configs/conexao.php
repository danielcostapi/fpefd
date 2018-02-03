<?php
	$host	= "localhost";   //IP da hospedagem, dedicado ou servidor Local
	$user	= "root";        //usuario do Mysql (Padrao = root)
	$senha	= "";        //senha do mysql (padrao sem senha)
	$dbname	= "fpefd";    //Nome do banco de dados
	
	//Não mecher na linha abaixo (conexao com banco de dados)
	$conexao = mysqli_connect($host,$user,$senha,$dbname) or die("Error " . mysqli_error($conexao));
	

?>