<?php
 
 /*
try {
  $db = new PDO('mysql:dbname=rdsin098_babyeat;host=192.185.213.88', 'rdsin098_babyeat', 'RDS20120243');
} catch (PDOException $ex) {
  echo 'Connection failed: ' . $ex->getMessage();
}
 

$result = $db->query("select * from tb_registro");
foreach ($result as $row) {
  echo $row['refeicao'] . "\n";
}

$stmt = $db->prepare("select * from tablename where id = :id");
$stmt->execute(array(':id' => 42));
$row = $stmt->fetch();
  */
 function conect(){
  // $dsn = "mysql:	=".HOST.";dbname=".DB;
   try{
     	$db1 = new PDO('mysql:dbname=rdsin098_babyeatbeta;host=192.185.213.88', 'rdsin098_babyeat', 'RDS20120243');
		//$db2 = new PDO('mysql:dbname=babyeat;host=localhost', 'root', '123');
		//$db2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       	$db1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       return $db1 ;
	  // return  $db2;
    }catch(PDOException $erro){
        echo $erro->getMessage();
    }
}

 
 
  function conect2(){
  // $dsn = "mysql:	=".HOST.";dbname=".DB;
   try{
     	//$db1 = new PDO('mysql:dbname=rdsin098_babyeatbeta;host=192.185.213.88', 'rdsin098_babyeat', 'RDS20120243');
		$db2 = new PDO('mysql:dbname=babyeat;host=localhost', 'root', '123');
		$db2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       	//$db1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      // return $db1 ;
	   return  $db2;
    }catch(PDOException $erro){
        echo $erro->getMessage();
    }
}
 
 
 
 
 
 
 
 
 
 
  /*
 

 try {
  $db1 = new PDO('mysql:dbname=rdsin098_babyeat;host=192.185.213.88', 'rdsin098_babyeat', 'RDS20120243');
  //$db2 = new PDO('mysql:dbname=babyeat;host=localhost', 'root', '123');
	} catch (PDOException $ex) {
  echo 'Connection failed: ' . $ex->getMessage();
	}	

 

$result_db1 = $db1->query("select * from tb_registro");
foreach ($result_db1 as $linhas_db1){
	echo $linhas_db1['data'] . "<br />";
	echo $linhas_db1['ml'] . "<br />";
}
$result_db2 = $db2->query("select * from tb_registro");
foreach ($result_db2 as $linhas_db2){
	echo  utf8_decode($linhas_db2['refeicao']) . "<br />";
	echo $linhas_db2['horas'] . "<br />";
}
*/