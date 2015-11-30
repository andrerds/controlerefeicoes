<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
		
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
  
$horas = date("H:i");

//echo $tml;
$q00 = 0;   $h0 = '6:00';
$q01 = 150;	$h1 = '8:00';
$q02 = 280; $h2 = '9:30';
$q03 = 380; $h3 = '11:30';
$q04 = 490; $h4 = '13:30';
$q05 = 540; $h5 = '15:30';
$q06 = 680; $h6 = '16:30';
$q07 = 720; $h7 = '18:30';
$q08 = 800; $h8 = '20:30';
$q09 = 890; $h9 = '21:30';
$q10 = 980; $h10 = '22:30';
$q11 = 1000;$h11 = '11:30';
$q12 = 2000;$h12 = '11:59';

$resultado = $tml;
$msg ='';

if($horas == $h0 || $q00 == $resultado){
	$msg = "Vou começar a qualquer instante..";
}

elseif ($horas >= $h1 || $q01 >= $resultado) {
	$msg = "Bom dia! Acabei de tomar meu café.";
}

elseif ($horas >= $h2 ||  $q02 >=  $resultado) {
	$msg = "Tia fica de olho em mim ta bem ?. !";
}

elseif($horas <= $h3 || $q03 >= $resultado){
	$msg = "Hummmm ! to mamando legal :^) ";
}

elseif($horas <=$h4 || $q04 >= $resultado){
	$msg = "Ei ! Psiu , estou muito bem e mamando legal.";	
}

elseif($horas >= $h5 || $q05 >= $resultado){
	$msg = "Café da Tarde !";
}

elseif($horas >= $h6 || $q06 >= $resultado){
	$msg = "Mamae esta chengando tia ??.";
}  
 
 elseif($horas <= $h7 || $q07 >= $resultado){
	$msg = "Estou ancioso quero a mamae ... ";	

}

elseif($horas <= $h8 || $q08 >= $resultado){
	$msg = "Estou enjoadinho quero colinho!";
}

elseif($horas == $h9 || $q09 >= $resultado){
	$msg = "Se eu nao durmi de vez eu mamo mais e bato minha meta.!!! ";
}

elseif($horas == $h10 || $q10 >= $resultado){
	$msg = "Enfim bati minha meta de hoje !";
}

elseif($q11 >= $resultado){
	$msg = "Desse jeito vou a levar papai e mame a falencia.... ";
} 
 elseif($q12 >= $resultado){
	$msg = "quebrou o papai";
} 
 ?>
 
 
<samp class="text-center"> <?php echo "é ".$horas ." ". $msg  ?></samp> 
<?php

 endforeach;
	} catch (PDOException $e){
	echo $e->getMessage();
	}

	
	