<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
require 'up_calc_diario.php';
sleep(2);
$data	=  $_POST['data'];
//$ml	  		=  $_POST['ml'];
//$data	  	=  $_POST['data'];
//$horas    	=  $_POST['horas'];
if(up_calc_diario($data)):
echo"Atualizou";
else: 
echo"erro_atualizar";
endif;
