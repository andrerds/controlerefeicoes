<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
 require '../banco/conexao.php';
 date_default_timezone_set('Brazil/East');
$data_atual = date("Y-m-d");

// Data atual 19/07/2014
//$data = date("d/m/Y");

// Explode a barra e retorna três arrays
//$data = explode("/", $data);

// Cria três variáveis $dia $mes $ano
//list($dia, $mes, $ano) = $data;

// Recria a data invertida
//$data = "$mes"; // atualizado em 19/08/2013
//#@#@#@#@#@#@#@#@#@#@#@#@#@#@#@#@#@#@

$pdo2 = conecta2();
$consulta = $pdo2->query("SELECT data FROM script_calc_diario;");
while ($linha = $consulta->fetch(PDO::FETCH_ASSOC))
{
$setar_mes = $linha['data'];
	
}
    //$listar = $pdo->query("SELECT SUM(ml)AS ml_total FROM tb_registro WHERE data= '$data_atual' ");
     // $listar = $pdo->query("SELECT * FROM tb_registro WHERE data= '$data_atual' ");
  $listar = $pdo2->query("SELECT SUM(ml) total FROM tb_registro where data ='$setar_mes'");
   echo json_encode($listar->fetchAll(PDO::FETCH_OBJ));
 //  echo json_encode($setar_mes); 