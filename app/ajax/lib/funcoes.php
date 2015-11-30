<?php
function buscar($tabela){
	$pdo2 = conecta2();
	$buscar = $pdo2->prepare("select * from $tabela");
	$buscar->execute();
	return $buscar->fetchAll(PDO::FETCH_OBJ);
}
