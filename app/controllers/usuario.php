<?php

class usuario
{    
    public function cadastrar()
    {
        if ($_POST)
        {
            $nome  = trim($_POST['nome']);
            $login = trim($_POST['login']);
            $senha = trim($_POST['senha']);
            
            $consulta = mysql_query("SELECT * FROM usuarios WHERE Login = '$login'");
            $verificaConsulta = mysql_num_rows($consulta);
            
            if (($login == '') || ($senha == '') || ($nome == ''))
                echo '<script>alert("Preencha os campos!");location.href=("./");</script>';
            
            elseif ($verificaConsulta == 1)
                echo '<script>alert("O usuário já existe!");location.href=("../");</script>';
            
            elseif ($verificaConsulta == 0)
            {
                $cadastro = mysql_query("INSERT INTO usuarios (Nome, Login, Senha) VALUES ('$nome', '$login', '$senha')");
                
                if ($cadastro)
                {
                    $consulta           = mysql_query("SELECT * FROM usuarios WHERE Login = '$login' AND Senha = '$senha'");
                    
                    $dados = mysql_fetch_assoc($consulta);
                
                    $_SESSION["login-crud"] = $dados;
                    
                    echo '<script>alert("Usuário cadastrado com sucesso!");location.href=("../");</script>';
                }
                
                else
                    echo '<script>alert("Erro ao cadastrar!");location.href=("./");</script>';
            }
        }
        else view("erro404");
    }
    
    public function entrar()
    {
        if ($_POST)
        {
            $login              = trim($_POST['login']);
            $senha              = trim($_POST['senha']);
            
            $consulta           = mysql_query("SELECT * FROM usuarios WHERE Login = '$login' AND Senha = '$senha'");
            $verificaConsulta   = mysql_num_rows($consulta);
            
            if (($login == '') || ($senha == ''))
                echo '<script>alert("Preencha os campos!");location.href=("../");</script>';
            
            elseif ($verificaConsulta == 0)
                echo '<script>alert("O usuário não existe!");location.href=("../");</script>';
            
            elseif ($verificaConsulta == 1)
            {
                $dados = mysql_fetch_assoc($consulta);
                $_SESSION["login-crud"] = $dados;
                
                echo '<script>location.href=("../");</script>';
            }
        }
        else view("erro404");
    } 
    public function listar(){
    					$id = $_SESSION["login-crud"]["id"];
    					$listar = mysql_query("SELECT * FROM usuarios WHERE id = '$id'");
                        $dados    = mysql_fetch_assoc($listar);
                        
                        var_dump($dados);
                         
    }
    
    public function sair()
    {
        if ($_SESSION["login-crud"])
        {
            session_destroy();
            echo '<script>alert("Até mais!");location.href=("../");</script>';
        }
        else
            view("erro404");
    }
    
    public function editrar()
    {
        if ($_POST)
        {
            if ($_SESSION["login-crud"]["id"] !== null)
            {
                $id    = $_SESSION["login-crud"]["id"];
                $nome  = $_POST["nome"];
                $login = $_POST["login"];
                $senha = $_POST["senha"];
                
                $consulta = mysql_query("SELECT * FROM usuarios WHERE Login = '$login'");
                $verificaConsulta = mysql_num_rows($consulta);
                
                if (($_SESSION["login-crud"]["Login"] !== $login) && ($verificaConsulta !== 0))
                    echo '<script>alert("O login \"' . $login . '\" não está dispinível!");location.href=("./");</script>';
                
                elseif (($nome == "") || ($login == "") || ($senha == ""))
                    echo '<script>alert("Não é permitido campos em branco!");location.href=("./");</script>';
                
                elseif (
                    ($_SESSION["login-crud"]["Nome"] !== $nome) || 
                    (($_SESSION["login-crud"]["Login"] !== $login) && ($verificaConsulta == 0)) || 
                    ($_SESSION["login-crud"]["Senha"] !== $senha)
                ) {
                    $atualiza = mysql_query("UPDATE usuarios SET Nome = '$nome', Login = '$login', Senha = '$senha' WHERE id = '$id'");
                    if ($atualiza)
                    {
                        $consulta = mysql_query("SELECT * FROM usuarios WHERE id = '$id'");
                        $dados    = mysql_fetch_assoc($consulta);
                        $_SESSION["login-crud"] = $dados;
                
                        echo '<script>alert("Dados auterados com sucesso!");location.href=("./");</script>';
                    }
                    else
                        echo '<script>alert("Erro ao auterar dados!");location.href=("./");</script>';
                }
                
                else
                    echo '<script>alert("Não há dados a serem auterados!");location.href=("./");</script>';
            }
        }
        
        else
            view("erro404");
    }
    
    public function apagar()
    {
        if ($_POST['apagar'] == md5($_SESSION["login-crud"]["Nome"]))
        {
            $id = $_SESSION["login-crud"]["id"];
            
            $apagar = mysql_query("DELETE FROM `usuarios` WHERE id = '$id'");
            
            $consulta = mysql_query("SELECT * FROM usuarios WHERE id = '$id'");
            $verificaConsulta = mysql_num_rows($consulta);
            
            if ($verificaConsulta == 0)
            {
                echo '<script>alert("Usuário apagado com sucesso!");</script>';
                $this->sair();
            }
        }
            
        else
            view("erro404");
    }
}