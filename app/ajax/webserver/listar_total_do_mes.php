<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');

require '../banco/conexao.php';
date_default_timezone_set('Brazil/East');

$pdo2 = conecta2();
   //$listar = $pdo->query("SELECT SUM(ml)AS ml_total FROM tb_registro WHERE data= '$data_atual' ");
   $listar = $pdo2->query("SELECT mes, total FROM total_mes ");
   echo json_encode ($listar->fetchAll(PDO::FETCH_OBJ), JSON_PRETTY_PRINT);
 