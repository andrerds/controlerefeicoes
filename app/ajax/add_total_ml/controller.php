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
	$tml 		= filter_input(INPUT_POST, 'tml');
	$data 		= filter_input(INPUT_POST, 'data');
	$mes 		= filter_input(INPUT_POST, 'mes');
	$ano 		= filter_input(INPUT_POST, 'ano');
	if(cadastro($tml, $data, $mes, $ano)):
	echo 'cadastrou';
	endif;
	break;
	 
	//EDITAR ATULIZAR  			 //EDITAR ATULIZAR 				 //EDITAR ATULIZAR 				 //EDITAR ATULIZAR 				 //EDITAR ATULIZAR
	case 'edit':
	$id    		= filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
	$tml  	= filter_input(INPUT_POST, 'tml', FILTER_SANITIZE_STRING);
	$data 		= filter_input(INPUT_POST, 'data',  	FILTER_SANITIZE_STRING);
	$mes 		= filter_input(INPUT_POST, 'mes', FILTER_SANITIZE_STRING);
	$ano 		= filter_input(INPUT_POST, 'ano', 	FILTER_SANITIZE_STRING);
	
	if (atualizar($tml, $data, $mes,$ano, $id)) :
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
        
