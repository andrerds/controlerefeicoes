<?php
//conecta ao banco de dados
$conexao=mysql_connect("localhost","root","123");
//acessa o banco de dados desejado
$banco=mysql_select_db("babyaet");
//seleciona os dados da tabela
$sql = "SELECT * FROM total_ml";
$resultado = mysql_query($sql);
$nr=mysql_num_rows($resultado); //conta o número de linhas encontradas