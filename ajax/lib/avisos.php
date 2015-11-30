<?php
//date_default_timezone_set('Brazil/East');
//$data_atual = date("Y-m-d");
$horas = date("H:i");
//echo $tml;

$q01 = 60;
$q02 = 240;
$q03 = 300;
$q04 = 400;
$q05 = 540;
$q06 = 680;
$q07 = 720;
$q08 = 800;
$q09 = 840;
$q10 = 900;
$q11 = 1000;
$q12 = 1120;
$resultado = $tml;
$msg ='';

if($q01 >= $resultado){
	$msg = "Estou apenas começando o dia!";
}elseif ($q02 >= $resultado) {
	$msg = "devagar e sempre";
}elseif ($q03 >=  $resultado) {
	$msg = "Estou indo bem Tia ? ";
}elseif($q04 >= $resultado){
	$msg = "Estou com fome.";
} elseif($q05 >= $resultado || $q05 == $horas){
	$msg = "Ei ! Psiu ! ... Gugu dada .. dedeira e mais dedeira.";
} elseif($q06 >= $resultado){
	$msg = "eu vou eu vou mama mais um pouco eu vou .... ";
} elseif($q07 >= $resultado){
	$msg = "Estou quase chegando a minha cota do dia.";
} elseif($q08 >= $resultado){
	$msg = "Quase lá ... ";
} elseif($q09 >= $resultado){
	$msg = "Mais um pouco......";
} elseif($q10 == $resultado){
	$msg = "Bati minha meta Huru !!! ";
} elseif($q11 >= $resultado){
	$msg = "Meu filho ta otimo....";
} elseif($q12 >= $resultado){
	$msg = "Desse jeito vou a levar papai e mame a Falência.... ";
} 
//elseif ($resultado == $q2) {
echo  $horas . " - " .  $msg;
$h = "11:47";
if($h === $horas && $q04 >= $resultado){
echo "so isso ?";
}else{
echo "";
}
 
?>