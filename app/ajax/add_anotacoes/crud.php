<?php
date_default_timezone_set('America/Sao_Paulo'); // atualizado em 19/08/2013
$data_atual = date("Y-m-d");
	 /* função de cadastro */
	function cadastro($anota){
	$pdo1 = conecta();
	    try {
	        $cadastro = $pdo1->prepare('INSERT INTO anotacoes (anota) 
	        			 				VALUE(?)');
	        $cadastro->bindValue(1, $anota, PDO::PARAM_STR);
	        $cadastro->execute();
	   	

	$pdo2 = conecta2();
	 
	        $cadastro = $pdo2->prepare('INSERT INTO anotacoes (anota) 
	        			 				VALUE(?)');
	        $cadastro->bindValue(1, $anota, PDO::PARAM_STR);
	        $cadastro->execute();
	        if ($cadastro->rowCount() > 0):
	            return TRUE;
	        else:
	            return FALSE;
	        endif;
	    } catch (PDOException $e) {
	      echo $e->getMessage();
	 }	
	} 

	//*********************************************************************************************
	//funcão lista dados abaixo 
	function listar(){
	    $pdo1 = conecta();
	    try {
	        $listar = $pdo1 -> query("SELECT * FROM anotacoes ORDER BY id ASC ");
	      
	 
	    $pdo2 = conecta2();
	   
	        $listar = $pdo2 -> query("SELECT * FROM anotacoes ORDER BY id ASC ");
	        if ($listar->rowCount() > 0):
	       return $listar->fetchAll(PDO::FETCH_OBJ);
	        else:
	            return FALSE;
	        endif;
	    } catch (PDOException $e) {
	        echo $e->getMessage();
	    }
	}	
	//funcão lista dados abaixo 
	function pegarid($id){
		 $pdo1 = conecta();
	    try {
	        $pegarid = $pdo1 -> prepare("SELECT * FROM anotacoes WHERE id = ?");
			$pegarid->bindValue(1, $id, PDO::PARAM_INT);
			$pegarid->execute();
	        
		
	    $pdo2 = conecta2();
		$pegarid = $pdo2 -> prepare("SELECT * FROM anotacoes WHERE id = ?");
			$pegarid->bindValue(1, $id, PDO::PARAM_INT);
			$pegarid->execute();
	        if ($pegarid->rowCount() > 0):
	         return $pegarid->fetch(PDO::FETCH_OBJ);
	        else:
	            return FALSE;
	        endif;
	    } catch (PDOException $e) {
	        echo $e->getMessage();
	    }
	 
	   
	}	
	 
	//funcçao atualiza anotaçoes
	function atualizar($anota, $id){
		 $pdo1 = conecta();
	    try {
	        $atualizar = $pdo1 -> prepare("UPDATE anotacoes SET anota=? WHERE id = ?");
			$atualizar->bindValue(1, $anota, PDO::PARAM_STR);
		 
	        $atualizar->bindValue(2, $id, PDO::PARAM_INT);
			$atualizar->execute();
	   
	 
		 $pdo2 = conecta2();
	  
	        $atualizar = $pdo2 -> prepare("UPDATE anotacoes SET anota=? WHERE id = ?");
			$atualizar->bindValue(1, $anota, PDO::PARAM_STR);
		 
	        $atualizar->bindValue(2, $id, PDO::PARAM_INT);
			$atualizar->execute();
	        if ($atualizar->rowCount() > 0):
	            return TRUE;
	        else:
	            return FALSE;
	        endif;
	    } catch (PDOException $e) {
	        echo $e->getMessage();
	    }
		
	}
 
	//funcçao DELETAR
	function delete($id){
		 $pdo1 = conecta();
	    try {
	        $delete = $pdo1 -> prepare("DELETE FROM anotacoes WHERE id = ?");
			$delete->bindValue(1, $id, PDO::PARAM_INT);
			$delete->execute();
		 
		 $pdo2 = conecta2();
	 
	        $delete = $pdo2 -> prepare("DELETE FROM anotacoes WHERE id = ?");
			$delete->bindValue(1, $id, PDO::PARAM_INT);
			$delete->execute();
			
	        if ($delete -> rowCount() == 1):
	            return TRUE;
	        else:
	            return FALSE;
	        endif;
	    } catch (PDOException $e) {
	        echo $e->getMessage();
	    }
	}
	