<?php

    // PHP trabalhando com UTF-8
    ini_set('defaut_charset', 'UTF-8');
    header('Content-type: text/html; charset=UTF-8');
    
    // Configuração de url
    $alias          = "";
    
    // Configurações de páginas
    $paginaPadrao   = "index";
    $pagina404      = "erro404";

    // Conexão com o banco de dados...
    $host = "localhost";
    $user = "root";
    $pass = "123";
    $data = "salas";
    
    // Conectando ao banco.
    mysql_pconnect($host, $user, $pass) or die(mysql_error());
    mysql_select_db($data) or die(mysql_error());

    // Banco em UTF-8
    mysql_query("SET NAMES 'utf8'");
    mysql_query("SET character_set_connection=utf8");
    mysql_query("SET charecter_set_client=utf8");
    mysql_query("SET charecter_set_results=utf8");