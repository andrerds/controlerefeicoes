<?php
require '../../banco/conexao.php';
require 'crud.php';
$seconds = 2;
$acao = filter_input(INPUT_POST, 'acao', FILTER_SANITIZE_STRING);
//sleep($seconds);
switch ($acao) :
	 
	
	//********************************************************************************
	//EDITAR ATULIZAR  			 //EDITAR ATULIZAR 				 //EDITAR ATULIZAR 				 //EDITAR ATULIZAR 				 //EDITAR ATULIZAR
	case 'edit':
	$id    		= filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
	$nome  		= filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
	$sobrenome 	= filter_input(INPUT_POST, 'sobrenome', FILTER_SANITIZE_STRING);
	$idade 		= filter_input(INPUT_POST, 'idade',  	FILTER_SANITIZE_STRING);
	$facebook	= filter_input(INPUT_POST, 'facebook');
	 
	if (atualizar($nome, $sobrenome, $idade, $facebook, $id)) :
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
