<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
 require '../banco/conexao.php';
$pdo2 = conecta2();
   //$listar = $pdo->query("SELECT SUM(ml)AS ml_total FROM tb_registro WHERE data= '$data_atual' ");
   $anotacoes = $pdo2->query("SELECT * FROM anotacoes ");
   echo json_encode($anotacoes->fetchAll(PDO::FETCH_OBJ));