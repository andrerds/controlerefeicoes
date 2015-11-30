<?php
//header('Access-Control-Allow-Origin: *');
//header('Access-Control-Allow-Methods: GET, POST');	
date_default_timezone_set('America/Sao_Paulo'); // atualizado em 19/08/2013
  /* função de cadastro */
	function cadastro($total, $mes, $data, $ano){
	    $pdo1 = conecta();
	    try {
	        $cadastro = $pdo1->prepare('INSERT INTO total_mes (total, mes, data, $ano) 
	        														VALUE(?,?,?,?)');
	        $cadastro->bindValue(1, $total, PDO::PARAM_STR);
	       	$cadastro->bindValue(2, $mes, PDO::PARAM_STR);
	        $cadastro->bindValue(3, $data, PDO::PARAM_STR);
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
	 
	    $pdo2 = conecta2();
	    try {
	        $cadastro = $pdo2->prepare('INSERT INTO total_mes (total, mes, data, $ano) 
	        														VALUE(?,?,?,?)');
	        $cadastro->bindValue(1, $total, PDO::PARAM_STR);
	       	$cadastro->bindValue(2, $mes, PDO::PARAM_STR);
	        $cadastro->bindValue(3, $data, PDO::PARAM_STR);
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
	        $listar = $pdo1 -> prepare("SELECT * FROM total_mes  ORDER BY mes DESC");
			//$listar->bindValue(1, date("Y-m-d"));
			$listar->execute();
	        if ($listar->rowCount() > 0):
	            return $listar->fetchAll(PDO::FETCH_OBJ);
	        else:
	            return FALSE;
	        endif;
	    } catch (PDOException $e) {
	        echo $e->getMessage();
	    }
	 
	    $pdo2 = conecta2();
	    try {
	        $listar = $pdo2 -> prepare("SELECT * FROM total_mes  ORDER BY mes DESC");
			//$listar->bindValue(1, date("Y-m-d"));
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
	        $pegarid = $pdo1 -> prepare("SELECT * FROM total_mes WHERE id = ?");
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
	 
	    $pdo2 = conecta2();
	    try {
	        $pegarid = $pdo2 -> prepare("SELECT * FROM total_mes WHERE id = ?");
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
	function atualizar($mes, $total,$data, $id){
		 $pdo1 = conecta();
	    try {
	        $atualizar = $pdo1 -> prepare("UPDATE total_mes SET mes=?, total=?, data=? WHERE id = ?");
			$atualizar->bindValue(1, $mes, PDO::PARAM_STR);
			$atualizar->bindValue(2, $total, PDO::PARAM_STR);
			$atualizar->bindValue(3, $data, PDO::PARAM_STR);
			///$atualizar->bindValue(4, $horas, PDO::PARAM_STR);
	        $atualizar->bindValue(4, $id, PDO::PARAM_INT);
			$atualizar->execute();
	        if ($atualizar->rowCount() > 0):
	            return TRUE;
	        else:
	            return FALSE;
	        endif;
	    } catch (PDOException $e) {
	        echo $e->getMessage();
	    }
	 	 $pdo2 = conecta2();
	    try {
	        $atualizar = $pdo2 -> prepare("UPDATE total_mes SET mes=?, total=?, data=? WHERE id = ?");
			$atualizar->bindValue(1, $mes, PDO::PARAM_STR);
			$atualizar->bindValue(2, $total, PDO::PARAM_STR);
			$atualizar->bindValue(3, $data, PDO::PARAM_STR);
			///$atualizar->bindValue(4, $horas, PDO::PARAM_STR);
	        $atualizar->bindValue(4, $id, PDO::PARAM_INT);
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
	        $delete = $pdo1 -> prepare("DELETE FROM total_mes WHERE id = ?");
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
	 
		 $pdo2 = conecta2();
	    try {
	        $delete = $pdo2 -> prepare("DELETE FROM total_mes WHERE id = ?");
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
