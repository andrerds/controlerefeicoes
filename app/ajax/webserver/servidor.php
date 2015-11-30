<?php
ini_set('display_errors', 1);
			ini_set('log_errors', 1);
			ini_set('error_log', dirname(__FILE__) . '/error_log.txt');
			error_reporting(E_ALL);
//CONSTANTES ##########################LOCAL#########################
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
}*/
//CONSTANTES 

define('HOST', '192.185.213.88');
define('USUARIO', 'rdsin098_babyeat');
define('SENHA', 'RDS20120243');
define('DB', 'rdsin098_babyeatbeta');

// FUNÇÃO DE CONEXAO
function conect(){
   $dsn = "mysql:	=".HOST.";dbname=".DB;
   try{
       $conn = new PDO($dsn, USUARIO, SENHA);
       $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       return $conn;
    }catch(PDOException $erro){
        echo $erro->getMessage();
    }
}

$pdo = conect();
try {
    $preparar = $pdo->query("SELECT SUM(ml)AS ml_total FROM tb_registro WHERE data= '2014-11-01'");
    $totaldeml = $preparar->fetch(PDO::FETCH_OBJ);
    foreach ($totaldeml as $total_ml):
        $tml = $total_ml;
		
		echo $tml;
		
	    endforeach;
} catch (PDOException $e) {
    echo $e->getMessage();
  
} 
/*
$h1 = 'localhost';
$u1 = 'root';
$p1 = '123';
$b1 = 'babyeat';
#########################
$h2 = 'rdsinfor.com';
$u2 = 'rdsin098_babyeat';
$p2 = 'RDS20120243';
$b2 = 'rdsin098_babyeat';
########################
$dbh1 = mysql_connect($h1, $u1, $p1); 
$dbh2 = mysql_connect($h2, $u2, $p2, true); 

mysql_select_db($b1, $dbh1);
mysql_select_db($b2, $dbh2);

mysql_query('select * from tablename', $dbh1);

mysql_query('select * from tablename', $dbh2);


 * 
 * 
 * try {
  $db1 = new PDO('mysql:dbname=babyeat;host=localhost', 'root', '123');
  $db2 = new PDO('mysql:dbname=rdsin098_babyeat;host=rdsinfor.com', 'rdsin098_babyeat', 'RDS20120243');
} catch (PDOException $ex) {
  echo 'Connection failed: ' . $ex->getMessage();
}
 = conect();
try {
    $preparar = $pdo->query("SELECT SUM(ml)AS ml_total FROM tb_registro WHERE data= '2014-11-01' ");
    $totaldeml = $preparar->fetch(PDO::FETCH_OBJ);
    foreach ($totaldeml as $total_ml):
        $tml = $total_ml;
		
		echo $tml;
		
	    endforeach;
} catch (PDOException $e) {
    echo $e->getMessage();
 * 
}
 * 
*/






























