<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
require 'add_refeicao.php';
sleep(2);
$refeicao 	=  $_POST['refeicao'];
$ml	  		=  $_POST['ml'];
$data	  	=  $_POST['data'];
$horas    	=  $_POST['horas'];
if(gravar_refeicao($refeicao, $ml, $data, $horas)):
echo"cadastrou";
else: 
echo"erro_cadastrar";
endif;
