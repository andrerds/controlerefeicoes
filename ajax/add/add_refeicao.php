<?php
//header('Access-Control-Allow-Origin: *');
//header('Access-Control-Allow-Methods: GET, POST');
require '../../banco/conexao.php';
 function gravar_refeicao($refeicao, $ml, $data, $horas){
 
 
 $pdo2 = conecta2();
 $gravar2 = $pdo2->prepare("INSERT INTO tb_registro(refeicao, ml, data, horas)
 VALUES(?,?,?,?) ");
  $gravar2->bindValue(1,$refeicao);
  $gravar2->bindValue(2,$ml);
  $gravar2->bindValue(3,$data);
  $gravar2->bindValue(4,$horas);
  $gravar2->execute();
  
  $pdo1 = conecta();
 $gravar = $pdo1->prepare("INSERT INTO tb_registro(refeicao, ml, data, horas)
 VALUES(?,?,?,?) ");
  $gravar->bindValue(1,$refeicao);
  $gravar->bindValue(2,$ml);
  $gravar->bindValue(3,$data);
  $gravar->bindValue(4,$horas);
  $gravar->execute();
  return ($gravar2->rowCount()== 1)?  TRUE : FALSE ;
  return ($gravar->rowCount()== 1)?  TRUE : FALSE ; 
 }
 