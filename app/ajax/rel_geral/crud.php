<?php
date_default_timezone_set('Brazil/East');
  /* função de cadastro */
	function cadastro($tml ,$data, $mes, $ano){
	    $pdo1 = conecta();
	    try {
	        $cadastro = $pdo1->prepare('INSERT INTO total_ml (tml, data, mes, ano) 
	        														VALUE(?,?,?,?)');
	        $cadastro->bindValue(1, $tml, PDO::PARAM_STR);
	       	$cadastro->bindValue(2, $data, PDO::PARAM_STR);
	        $cadastro->bindValue(3, $mes, PDO::PARAM_STR);
	        $cadastro->bindValue(4, $ano, PDO::PARAM_STR);
			$cadastro->execute();
	       
	 
	    $pdo2 = conecta2();
	   
	        $cadastro = $pdo2->prepare('INSERT INTO total_ml (tml, data, mes, ano) 
	        														VALUE(?,?,?,?)');
	        $cadastro->bindValue(1, $tml, PDO::PARAM_STR);
	       	$cadastro->bindValue(2, $data, PDO::PARAM_STR);
	        $cadastro->bindValue(3, $mes, PDO::PARAM_STR);
	        $cadastro->bindValue(4, $ano, PDO::PARAM_STR);
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
	        $listar = $pdo1 -> query("SELECT * FROM total_ml ORDER BY data DESC");
	         
	    $pdo2 = conecta2();
	    
	     $listar = $pdo2 -> query("SELECT * FROM total_ml ORDER BY data DESC ");
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
	        $pegarid = $pdo1 -> prepare("SELECT * FROM total_ml WHERE id = ?");
			$pegarid->bindValue(1, $id, PDO::PARAM_INT);
			$pegarid->execute();
	         
	    $pdo2 = conecta2();
	    $pegarid = $pdo2 -> prepare("SELECT * FROM total_ml WHERE id = ?");
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
	function atualizar($tml, $data, $mes, $ano, $id){
		 $pdo1 = conecta();
	    try {
	        $atualizar = $pdo1 -> prepare("UPDATE total_ml SET tml=?, data=?, mes=?, ano=? WHERE id =?");
			$atualizar->bindValue(1, $tml, PDO::PARAM_STR);
			$atualizar->bindValue(2, $data, PDO::PARAM_STR);
			$atualizar->bindValue(3, $mes, PDO::PARAM_STR);
			$atualizar->bindValue(4, $ano, PDO::PARAM_STR);
	        $atualizar->bindValue(5, $id, PDO::PARAM_INT);
			$atualizar->execute();
	       
 
		 $pdo2 = conecta2();
	  
	        $atualizar = $pdo2 -> prepare("UPDATE total_ml SET tml=?, data=?, mes=?, ano=? WHERE id =?");
			$atualizar->bindValue(1, $tml, PDO::PARAM_STR);
			$atualizar->bindValue(2, $data, PDO::PARAM_STR);
			$atualizar->bindValue(3, $mes, PDO::PARAM_STR);
			$atualizar->bindValue(4, $ano, PDO::PARAM_STR);
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
	        $delete = $pdo1 -> prepare("DELETE FROM total_ml WHERE id = ?");
			$delete->bindValue(1, $id, PDO::PARAM_INT);
			$delete->execute();
			
	         
	 
		 $pdo2 = conecta2();
	   
	        $delete = $pdo2 -> prepare("DELETE FROM total_ml WHERE id = ?");
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