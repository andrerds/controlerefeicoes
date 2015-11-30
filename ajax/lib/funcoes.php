<?php
function buscar($tabela){
	$pdo = conecta();
	$buscar = $pdo->prepare("select * from $tabela");
	$buscar->execute();
	return $buscar->fetchAll(PDO::FETCH_OBJ);
}
