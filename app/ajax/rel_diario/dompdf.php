<?php
//Definindo os dados para conexÃ£o e seleÃ§Ã£o da base de dados
define('DB','babyeat');
define('USER','root');
define('SENHA','123');
define('HOST','localhost');

//ConexÃ£o com o banco de dados com base nos dados fornecidos anteriormente.
$conexao = mysql_connect(HOST,USER,SENHA)or die('Erro na conexÃ£o - '.mysql_error());
($conexao) ? mysql_select_db(DB, $conexao) : die(mysql_error());

//$id = isset($_GET['id']) ? (int)$_GET['id'] : false;

//Query simples para busca dos dados
//$busca = mysql_query("SELECT * FROM total_ml")or die(mysql_error());
//VerificaÃ§Ã£o das linhas encontradas.

//$ver = mysql_fetch_array($busca);
$sql = "select * from total_ml";
$res = mysql_query($sql);
?>
<?php

$html='
<html>
<meta charset="utf-8">
 
 <link href="http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300" rel="stylesheet" type="text/css">
 <style>
 body{
 	font-family: "Open Sans Condensed", sans-serif;
 }
 
.pontilhado{
border-style: solid;
border-width: 1px;
border-color: #0000;
background-color: #FFF;
font-family: "Open Sans Condensed", sans-serif;
font-size: 8pt;
}
 
 </style>
<body>
<div><img src="baby.png" width="50px"; hidht="50px"/><p align="center">Relatório geral gerado em '. date('d/m/y').'</p></div>

 <table width="570" align="center" class="pontilhado">
                                <thead > 		<tr>  
   										<th class="pontilhado">Quant.ml</th>
                                        <th class="pontilhado">Data</th>
                                        <th class="pontilhado">Mês</th>
                                        <th class="pontilhado">Ano </th>
                             
                                    </tr> 
                                    </thead>';
  $html.='

 			';
while($row = mysql_fetch_assoc($res)){
  $html.='  
<tr align="center" > 
<td class="pontilhado">'.$row['tml'].'</td>
<td class="pontilhado">'.$row['data'].'</td>
<td class="pontilhado">'.$row['mes'].'</td>
<td class="pontilhado">'.$row['ano'].'</td>
  </tr>
 
 ';
}
$html.='
</table>';
$html.='<p class="textos">Sistema babyEat v5 .<br>
Aplicações Especiais PHP - by André rds
</p>
</body>
</html>';
?>
<?php 
//mysql_free_result($busca);

//Aqui nós chamamos a class do dompdf
require_once('dompdf/dompdf_config.inc.php');

//É fundamental definir o TIMEZONE de nossa região para que não tenhamos problemas com a geração.
date_default_timezone_set('America/Sao_Paulo');

//Aqui eu estou decodificando o tipo de charset do documento, para evitar erros nos acentos das letras e etc.
//$html = utf8_encode($html);

//Instanciamos a class do dompdf para o processo
$dompdf= new DOMPDF();

//Aqui nós damos um LOAD (carregamos) todos os nossos dados e formatações para geração do PDF
$dompdf->load_html($html);

//Aqui nós damos início ao processo de exportação (renderizar)
$dompdf->render();

//por final forçamos o download do documento, coloquei a nomenclatura com a data e mais um string no final.
//$dompdf->stream(date('d/m/Y').'_cliente.pdf');
$dompdf->stream(
    date('d/m/Y')."Rel_babyeat.pdf", /* Nome do arquivo de saída */
    array(
        "Attachment" => false /* Para download, altere para true */
    )
);
 