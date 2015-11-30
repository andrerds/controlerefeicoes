<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
require 'conexao.php';
$pdo2 = conecta();
   //$listar = $pdo->query("SELECT SUM(ml)AS ml_total FROM tb_registro WHERE data= '$data_atual' ");
   $listartodos = $pdo2->query("SELECT * FROM tb_registro ORDER BY data DESC ");
   echo json_encode($listartodos->fetchAll(PDO::FETCH_OBJ));