<?php
//header('Access-Control-Allow-Origin: *');
//header('Access-Control-Allow-Methods: GET, POST');
require '../../banco/conexao.php';
require 'crud.php';
$seconds = 2;
$acao = filter_input(INPUT_POST, 'acao', FILTER_SANITIZE_STRING);
//sleep($seconds);
switch ($acao) :
//********************************************************************************
		 //********************************************************************************
	 //EDITAR ATULIZAR  			 //EDITAR ATULIZAR 				 //EDITAR ATULIZAR 				 //EDITAR ATULIZAR 				 //EDITAR ATULIZAR
	case 'edit':
	$id    		= filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
	$refeicao  	= filter_input(INPUT_POST, 'refeicao', FILTER_SANITIZE_STRING);
	$ml 		= filter_input(INPUT_POST, 'ml',  	FILTER_SANITIZE_STRING);
	$data 		= filter_input(INPUT_POST, 'data', FILTER_SANITIZE_STRING);
	$horas 		= filter_input(INPUT_POST, 'horas', 	FILTER_SANITIZE_STRING);
	
	if (atualizar($refeicao, $ml, $data,$horas, $id)) :
	echo"atualizou";
	endif;
	break;
	
	 
 
	 
	 
	//DELETAR EXCLUIR  		 //DELETAR EXCLUIR  		 //DELETAR EXCLUIR  		 //DELETAR EXCLUIR  		 //DELETAR EXCLUIR  		 //DELETAR EXCLUIR
	case 'excluir':
	$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
	if (delete($id)) :
	echo"deletou";

	endif;
	break;
	default:
	echo 'erro';
	break;
	endswitch;
        
