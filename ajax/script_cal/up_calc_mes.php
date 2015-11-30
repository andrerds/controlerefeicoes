<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
require '../../banco/conexao.php';
 function up_calc_mes($mes){
 $pdo2 = conecta2();
 //$gravar = $pdo->prepare("update set tb_registro(refeicao, ml, data, horas)
 	$update = $pdo2->prepare("UPDATE script SET mes = ? ");
  	$update->bindValue(1,$mes);
  	$update->execute();
  return ($update->rowCount()== 1)?  TRUE : FALSE ;
 }