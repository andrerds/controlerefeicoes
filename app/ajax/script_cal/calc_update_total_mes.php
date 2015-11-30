<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
require 'up_calc_mes.php';
sleep(2);
$mes 	=  $_POST['mes'];
//$ml	  		=  $_POST['ml'];
//$data	  	=  $_POST['data'];
//$horas    	=  $_POST['horas'];
if(up_calc_mes($mes)):
echo"Atualizou";
else: 
echo"erro_atualizar";
endif;
