<?php
	$servidor = "localhost";
	$usuario = "root";
	$senha = "suasenha";
	$banco = "pesquisa_ajax";

	$conexao = mysql_connect($servidor, $usuario, $senha) or die(mysql_error());

	mysql_select_db($banco);
?>
