<?php
	$banco = "babyeat";
	$usuario = "root";
	$senha = "123";
	$hostname = "localhost";
	$conn = mysql_connect($hostname,$usuario,$senha); mysql_select_db($banco) or die( "Não foi possível conectar ao banco MySQL");
	if (!$conn) {echo "Não foi possível conectar ao banco MySQL.
	"; exit;}
	else {echo "Parabéns!! conexao ok!.
	";}

