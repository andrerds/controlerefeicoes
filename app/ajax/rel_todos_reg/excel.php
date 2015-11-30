<?php
//Informa ao browser que o tipo de documento será uma planilha do excel
header('Content-type: application/vnd.ms-excel');

//Força o download da planilha, o nome do arquivo será planilha.xls
header('Content-Disposition: attachment; filename="planilha.xls"');
define('DB','babyeat');
define('USER','root');
define('SENHA','123');
define('HOST','localhost');
date_default_timezone_set('Brazil/East');
$data_atual = date("Y-m-d");

// Data atual 19/07/2014
$data_mes = date("d/m/Y");

// Explode a barra e retorna três arrays
$data_mes = explode("/", $data_mes);

// Cria três variáveis $dia $mes $ano
list($dia, $mes, $ano) = $data_mes;

// Recria a data invertida
$data_mes = "$mes"; // atualizado em 19/08/2013
$conexao = mysql_connect(HOST,USER,SENHA)or die('Erro na conexão - '.mysql_error());
($conexao) ? mysql_select_db(DB, $conexao) : die(mysql_error());
$sql = "select * from total_ml where mes='$mes' order by data Asc";



//Monta a planilha
echo '<table style="width:768px">';
//cabeçalho
echo '<tr>';
echo '<td>Id</td>';
echo '<td>Ml</td>';
echo '<td>data</td>';
echo utf8_decode('<td>Mês</td>');
echo '<td>Ano</td>';
echo '</tr>';

//conteudo
$res = mysql_query($sql);
while($row = mysql_fetch_array($res)){
	$data_mysql =  $data = $row['data'];
	$timestamp = strtotime($data_mysql);
	$id = $row['id'];
	$tml = $row['tml'];
	$data = $row['data'];
	$mes = $row['mes'];
	$ano = $row['ano'];
	
	echo "<tr>";
	echo "<td  style='border: solid 1px'>". $id ."</td>";
	if($tml >= 800){
	echo "<td  style='border: solid 1px; color: #900'>".$tml."</td>";
};
	echo "<td  style='border: solid 1px'>". date('d-m-Y', $timestamp) ."</td>";
	echo "<td  style='border: solid 1px'>". $mes ."</td>";
	echo "<td  style='border: solid 1px'>". $ano ."</td>";
	echo "</tr>";
	
}
/*
echo '<tr>';
echo '<td>Gustavo Marques</td>';
echo '<td>programador.gustavo@gmail.com</td>';
echo '<td>Masculino</td>';
echo '</tr>';

echo '<tr>';
echo '<td>Fernanda</td>';
echo '<td>fe@gmail.com</td>';
echo '<td>Faminino</td>';
echo '</tr>';

echo '<tr>';
echo '<td>Henrrique</td>';
echo '<td>h@gmail.com</td>';
echo '<td>Masculino</td>';
echo '</tr>';
*/
echo '</table>';
?>