<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
ini_set('display_errors', 1);
			ini_set('log_errors', 1);
			ini_set('error_log', dirname(__FILE__) . '/error_log.txt');
			error_reporting(E_ALL);			
date_default_timezone_set('Brazil/East');
sleep(2);			
require '../banco/conexao.php';
$data_atual = date("Y-m-d");
 $pdo2 = conecta2();
try
{
 $preparar = $pdo2->query("SELECT SUM(ml)AS ml_total FROM tb_registro WHERE data= '$data_atual' ");
 $totaldeml = $preparar->fetch(PDO::FETCH_OBJ);
 foreach ($totaldeml as $total_ml):
 $tml = $total_ml; 
   
//$content = file_get_contents($tml);
  
 
 
 ?>
<div style="margin:  -0px 0px -20px 0px"> <?php echo $tml  ?></div>
 
 
<?php

 endforeach;
	} catch (PDOException $e){
	echo $e->getMessage();
	}

	
	