<?php
  session_start();
  require_once $_SERVER['DOCUMENT_ROOT'].'/dao/UsuarioDao.php';
  require_once $_SERVER['DOCUMENT_ROOT'].'/model/Usuario.php';

    $nick = $_POST['nick'];
    $entrar = $_POST['entrar'];
    $senha = $_POST['senha']; 
  
    if (isset($entrar)) {
        $usuarioDao = new UsuarioDao();
        $usuario = $usuarioDao->getUsuarioByNickSenha($nick,$senha);
        $nick_banco = $usuario['nick'];     

        
        if ($nick != $nick_banco || $nick == ""){
            echo"<script language='javascript' type='text/javascript'>alert('Login e/ou senha incorretos');window.location.href='../views/login.html';</script>";
            die();
        }else{
            $_SESSION["nick"] = $nick;
            $_SESSION["id_user"] = $usuario['id'];
            header("Location:../views/painelUser.php");
        }

    }
