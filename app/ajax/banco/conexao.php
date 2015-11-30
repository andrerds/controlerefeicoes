<?php
//CONSTANTES
/*
define('HOST', 'localhost');
define('USUARIO', 'root');
define('SENHA', '123');
define('DB', 'babyeat');
 
// FUNÇÃO DE CONEXAO
function conecta(){
   $dsn = "mysql:	=".HOST.";dbname=".DB;
   try{
       $conn = new PDO($dsn, USUARIO, SENHA);
       $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       return $conn;
    }catch(PDOException $erro){
        echo $erro->getMessage();
    }
} */
function conecta(){
  // $dsn = "mysql:	=".HOST.";dbname=".DB;
   try{
     	$pdo1 = new PDO('mysql:dbname=rdsin098_babyeat;host=192.185.213.88', 'rdsin098_babyeat', 'RDS20120243');
		//$db2 = new PDO('mysql:dbname=babyeat;host=localhost', 'root', '123');
		//$db2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       	$pdo1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       return $pdo1 ;
	  // return  $db2;
    }catch(PDOException $erro){
        echo $erro->getMessage();
    }
}
 
  function conecta2(){
  // $dsn = "mysql:	=".HOST.";dbname=".DB;
   try{
     	//$db1 = new PDO('mysql:dbname=rdsin098_babyeatbeta;host=192.185.213.88', 'rdsin098_babyeat', 'RDS20120243');
		$pdo2 = new PDO('mysql:dbname=babyeat;host=localhost', 'root', '123');
		$pdo2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       	//$db1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      // return $db1 ;
	   return  $pdo2;
    }catch(PDOException $erro){
        echo $erro->getMessage();
    }
}
 
 
