<?php
require '../funcoes/banco/conexao.php';
require '../funcoes/crud/crud_setup.php';
//$seconds = 2;
$acao = filter_input(INPUT_POST, 'acao', FILTER_SANITIZE_STRING);
//sleep($seconds);
switch ($acao) :
	 
	//CADASTRAR NOVO 		 //CADASTRAR NOVO		 //CADASTRAR NOVO		 //CADASTRAR NOVO		 //CADASTRAR NOVO		 //CADASTRAR NOVO		 //CADASTRAR NOVO
	case 'cadastro':
	$anota 		= filter_input(INPUT_POST, 'anota', 		FILTER_SANITIZE_STRING);
	if(cadastro($anota)):
	echo 'cadastrou';
	endif;
	break;
	//********************************************************************************
	//EDITAR ATULIZAR  			 //EDITAR ATULIZAR 				 //EDITAR ATULIZAR 				 //EDITAR ATULIZAR 				 //EDITAR ATULIZAR
	case 'edit':
	$id    		= filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
	$anota  	= filter_input(INPUT_POST, 'anota', FILTER_SANITIZE_STRING);
	 
	
	if (atualizar($anota, $id)) :
	echo"atualizou";
	endif;
	break;
	
	
	case 'edit_user':
	$id    		= filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
	$nome  		= filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
	$sobrenome 	= filter_input(INPUT_POST, 'sobrenome', FILTER_SANITIZE_STRING);
	$idade 		= filter_input(INPUT_POST, 'idade',  	FILTER_SANITIZE_STRING);
		
	if (atualizar_user($nome, $sobrenome, $idade)) :
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
