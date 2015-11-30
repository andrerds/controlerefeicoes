<?php
date_default_timezone_set('America/Sao_Paulo'); // atualizado em 19/08/2013
/* função de cadastro */
	function cadastro($refeicao, $ml, $data, $horas){
	    $pdo1 = conecta();
	    try {
	        $cadastro = $pdo1->prepare('INSERT INTO tb_registro (refeicao, ml, data, horas) 
	        														VALUE(?,?,?,?)');
	        $cadastro->bindValue(1, $refeicao, PDO::PARAM_STR);
	       	$cadastro->bindValue(2, $ml, PDO::PARAM_STR);
	        $cadastro->bindValue(3, $data, PDO::PARAM_STR);
	        $cadastro->bindValue(4, $horas, PDO::PARAM_STR);
			$cadastro->execute();
	         
	    $pdo2 = conecta2();
	    
	        $cadastro = $pdo2->prepare('INSERT INTO tb_registro (refeicao, ml, data, horas) 
	        														VALUE(?,?,?,?)');
	        $cadastro->bindValue(1, $refeicao, PDO::PARAM_STR);
	       	$cadastro->bindValue(2, $ml, PDO::PARAM_STR);
	        $cadastro->bindValue(3, $data, PDO::PARAM_STR);
	        $cadastro->bindValue(4, $horas, PDO::PARAM_STR);
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
	        $listar = $pdo1 -> prepare("SELECT * FROM tb_registro WHERE data=? ORDER BY horas DESC");
	 		$listar->bindValue(1, date("Y-m-d"));
			$listar->execute();
			
	    	$pdo2 = conecta2();
	 
	       $listar = $pdo2 -> prepare("SELECT * FROM tb_registro WHERE data=? ORDER BY horas DESC ");
			$listar->bindValue(1, date("Y-m-d"));
			$listar->execute();
	        if ($listar->rowCount() > 0):
	            return $listar->fetchAll(PDO::FETCH_OBJ);
	        else:
	            return FALSE;
	        endif;
	    } catch (PDOException $e) {
	        echo $e->getMessage();
	    }
	}
	
	 
	/*
	
		//funcão lista dados abaixo 
	function listar(){
	    
	    try {
	    	$pdo1 = conecta();
	        $listar = $pdo1 -> query("SELECT * FROM tb_registro WHERE data='2014-11-17' ORDER BY horas DESC");
	      //SELECT * FROM total_ml WHERE mes =".date('m'). " ORDER BY data DESC
	    	$pdo2 = conecta2();
	    
	        $listar = $pdo2 -> query("SELECT * FROM tb_registro WHERE data='' ORDER BY horas DESC");
	        if ($listar->rowCount() > 0):
	       return $listar->fetchAll(PDO::FETCH_OBJ);
	        else:
	            return FALSE;
	        endif;
	    } catch (PDOException $e) {
	        echo $e->getMessage();
	    }
	}
	
	
	*/
	
	
	//funcão lista dados abaixo 
	
  //funcao pegar id SELECT * FROM total_ml WHERE id = ?
  function pegarid($id){
	    $pdo1 = conecta();
	    try {
	        $pegarid = $pdo1 -> prepare("SELECT * FROM tb_registro WHERE id = ?");
			$pegarid->bindValue(1, $id, PDO::PARAM_INT);
			$pegarid->execute();
	         
 
	    $pdo2 = conecta2();
	 
	        $pegarid = $pdo2 -> prepare("SELECT * FROM tb_registro WHERE id = ?");
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
  

	    
	
	
	 //funcçao atualiza
	function atualizar($refeicao, $ml, $data, $horas, $id){
		 $pdo1 = conecta();
	    try {
	        $atualizar = $pdo1 -> prepare("UPDATE tb_registro SET refeicao=?, ml=?, data=?, horas=? WHERE id = ?");
			$atualizar->bindValue(1, $refeicao, PDO::PARAM_STR);
			$atualizar->bindValue(2, $ml, PDO::PARAM_STR);
			$atualizar->bindValue(3, $data, PDO::PARAM_STR);
			$atualizar->bindValue(4, $horas, PDO::PARAM_STR);
	        $atualizar->bindValue(5, $id, PDO::PARAM_INT);
			$atualizar->execute();
	      
		
	 
		 $pdo2 = conecta2();
	    
	        $atualizar = $pdo2 -> prepare("UPDATE tb_registro SET refeicao=?, ml=?, data=?, horas=? WHERE id = ?");
			$atualizar->bindValue(1, $refeicao, PDO::PARAM_STR);
			$atualizar->bindValue(2, $ml, PDO::PARAM_STR);
			$atualizar->bindValue(3, $data, PDO::PARAM_STR);
			$atualizar->bindValue(4, $horas, PDO::PARAM_STR);
	        $atualizar->bindValue(5, $id, PDO::PARAM_INT);
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
	        $delete = $pdo1 -> prepare("DELETE FROM tb_registro WHERE id = ?");
			$delete->bindValue(1, $id, PDO::PARAM_INT);
			$delete->execute();
		 
		 $pdo2 = conecta2();
	   
	        $delete = $pdo2 -> prepare("DELETE FROM tb_registro WHERE id = ?");
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