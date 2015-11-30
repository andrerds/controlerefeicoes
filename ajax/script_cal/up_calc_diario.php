<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
require '../../banco/conexao.php';
 function up_calc_diario($data){
 $pdo2 = conecta2();
 //$gravar = $pdo->prepare("update set tb_registro(refeicao, ml, data, horas)
 $update = $pdo2->prepare("UPDATE script_calc_diario SET data = ? ");
  $update->bindValue(1,$data);
  $update->execute();
  return ($update->rowCount()== 1)?  TRUE : FALSE ;
 }
 