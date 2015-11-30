<?php

    function view($nome)
    {
        $view           = '../app/views/' . $nome . '.phtml';
        $verificaView   = file_exists($view);
        if ($verificaView)
        {
            return require_once($view);
        }
        else
        {
          
            echo "Erro na view!<br />Arquivo não encontrado.";
        }
    }
