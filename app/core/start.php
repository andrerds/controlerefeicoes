<?php
    include_once 'autoload.php';
    
    session_name('crud');
    session_start();
    
    
    $url            = isset($_GET['url']) ? $_GET['url'] : $paginaPadrao;
    $url           .= '/';
    $url            = explode("/", $url);
    
    $controller     = $url[0];
    $method         = $url[1] == null ? 'index' : $url[1];
    
    $pagina         = "../app/controllers/" . $controller . ".php";    
    $verificaPagina = file_exists($pagina);
 
    if ($verificaPagina)
    {
        require_once($pagina);
        $paginaAtual    = new $controller();
        $verificaMethod = method_exists($paginaAtual, $method);
        
        if($verificaMethod)
            return $paginaAtual->$method();
    }
    
    $controller = $pagina404;
    $pagina     = "../app/controllers/" . $controller . ".php";

    require_once($pagina);
   echo $paginaAtual = new $controller();
  echo  $paginaAtual->index();
    
     