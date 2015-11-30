<?php
//header('Access-Control-Allow-Origin: *');
//header('Access-Control-Allow-Methods: GET, POST');
require '../../banco/conexao.php';
require 'crud.php';
$seconds = 2;
$acao = filter_input(INPUT_POST, 'acao', FILTER_SANITIZE_STRING);
//sleep($seconds);
switch ($acao) :
	 case 'cadastro':
	$total 		= filter_input(INPUT_POST, 'total');
	$data 		= filter_input(INPUT_POST, 'data');
	$mes 		= filter_input(INPUT_POST, 'mes');
	$ano 		= filter_input(INPUT_POST, 'ano');
	if(cadastro($total, $mes, $data, $ano)):
	echo 'cadastrou';
	endif;
	break;
	 
	
	//********************************************************************************
	//EDITAR ATULIZAR  			 //EDITAR ATULIZAR 				 //EDITAR ATULIZAR 				 //EDITAR ATULIZAR 				 //EDITAR ATULIZAR
	case 'edit':
	$id    		= filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
	$mes  		= filter_input(INPUT_POST, 'mes', FILTER_SANITIZE_STRING);
	$total 		= filter_input(INPUT_POST, 'total', FILTER_SANITIZE_STRING);
	$data 		= filter_input(INPUT_POST, 'data',  	FILTER_SANITIZE_STRING);
	//$horas 		= filter_input(INPUT_POST, 'horas', 	FILTER_SANITIZE_STRING);
	
	if (atualizar($mes,$total,$data, $id)) :
	echo"atualizou";
	endif;
	break;
		
	 //********************************************************************************
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
	ob_end_flush();
