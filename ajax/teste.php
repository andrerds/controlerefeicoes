<?php
require 'banco_remoto.php';
 /*
$db1 = conect();
$result_db1 = $db1->query("select * from tb_registro");
foreach ($result_db1 as $linhas_db1){
	echo $linhas_db1['data'] . "<br />";
	echo $linhas_db1['ml'] . "<br />";
}
  * 
 
  $db2 = conect();
$result_db2 = $db2->query("select * from total_ml");
foreach ($result_db2 as $linhas_db2){
	echo $linhas_db2['data'] . "<br />";
	echo $linhas_db2['tml'] . "<br />"; } 
  * 
  */

 $db1 = conect();

 
 
$sql_db1 = "insert into tb_registro (refeicao, ml, data, horas)values (:r, :m, :d, :h)";
$stmt = $db1->prepare($sql_db1);
$stmt->bindValue(":r", "MAMADEIRA");
$stmt->bindValue(":m", 100);
$stmt->bindValue(":d", "2014-11-14");
$stmt->bindValue(":h", "18:22");
$stmt->execute();
################################################################################################
############################################################################################### /*
$db2 = conect2();
$sql_db2 = "insert into tb_registro (refeicao, ml, data, horas)values (:r, :m, :d, :h)";
$stmt = $db2->prepare($sql_db2);


$stmt->bindValue(":r", "MAMADEIRA");
$stmt->bindValue(":m", 100);
$stmt->bindValue(":d", "2014-11-14");
$stmt->bindValue(":h", "18:22");
$stmt->execute();
