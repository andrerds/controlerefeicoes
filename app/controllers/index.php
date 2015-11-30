<?php

class index
{
    public function __construct() {}

    public function index()
    {
        if ($_SESSION["login-crud"])
            $this->painel();

        else
            $this->login();
    }
    
    public function login()
    {
        view("login");
    }
    
    public function painel()
    {
        view("painel");
    }
}
