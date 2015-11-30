<?php
	function listar(){
	    //$pdo1 = conecta();
	    try {
	        //$listar = $pdo1 -> prepare("SELECT * FROM setup");
			// $listar->execute();
	     
	 
	    $pdo2 = conecta2();
	   
	        $listar = $pdo2 -> prepare("SELECT * FROM setup");
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
 //funcão lista dados abaixo 
	function pegarid($id){
	    $pdo1 = conecta();
	  try {
	        $pegarid = $pdo1 -> prepare("SELECT * FROM setup WHERE id = ?");
			$pegarid->bindValue(1, $id, PDO::PARAM_INT);
			$pegarid->execute();
	     
 
	    $pdo2 = conecta2();
	   
	        $pegarid = $pdo2 -> prepare("SELECT * FROM setup WHERE id = ?");
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
	function atualizar($nome, $sobrenome, $idade, $facebook, $id){
		 $pdo1 = conecta();
	    try {
	        $atualizar = $pdo1 -> prepare("UPDATE setup SET nome=?, sobrenome=?, idade=?, facebook=? WHERE id = ?");
			$atualizar->bindValue(1, $nome, PDO::PARAM_STR);
			$atualizar->bindValue(2, $sobrenome, PDO::PARAM_STR);
			$atualizar->bindValue(3, $idade, PDO::PARAM_STR);
			$atualizar->bindValue(4, $facebook);
			$atualizar->bindValue(5, $id, PDO::PARAM_INT);
			$atualizar->execute();
	         
	  $pdo2 = conecta2();
	   
	        $atualizar = $pdo2 -> prepare("UPDATE setup SET nome=?, sobrenome=?, idade=?, facebook=? WHERE id = ?");
			$atualizar->bindValue(1, $nome, PDO::PARAM_STR);
			$atualizar->bindValue(2, $sobrenome, PDO::PARAM_STR);
			$atualizar->bindValue(3, $idade, PDO::PARAM_STR);
			$atualizar->bindValue(4, $facebook);
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
	        $delete = $pdo1 -> prepare("DELETE FROM setup WHERE id = ?");
			$delete->bindValue(1, $id, PDO::PARAM_INT);
			$delete->execute();
			
	         
	   $pdo2 = conecta2();
	 
	        $delete = $pdo2 -> prepare("DELETE FROM setup WHERE id = ?");
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
		//echo $data_atual;
