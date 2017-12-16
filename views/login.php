<?php
         
?>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>

        <!-- CSS  -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="../resources/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
        <link href="../resources/css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.css">
        <script src="../resources/js/jquery.js" ></script>
    </head>
    
    <body >
        <ul id="dropdownAescola" class="dropdown-content">
            <li><a href="#!">Quem Somos</a></li>
            <li><a href="#!">Estrutura Física</a></li>
            <li><a href="#!">Normas e Procedimentos</a></li>
        </ul>
        <ul id="dropdownAlunos" class="dropdown-content">
            <li><a href="#!">Calendário Escolar</a></li>
            <li><a href="#!">Comunicados</a></li>
            <li><a href="#!">Relação de Materiais</a></li>
        </ul>
        <div class="navbar-fixed">
            <nav class="z-depth-3 " >
                <div class="nav-wrapper container">
                    <i class="material-icons left">lightbulb_outline</i>
                    <a href="../index.html" class="brand-logo">Sistema Escolar</a>
                    <ul class="right hide-on-med-and-down">
                        <li><a href="../index.html">Home</a></li>
                        <li><a class="dropdown-button" data-activates="dropdownAescola" href="#">A Escola</a></li>
                        <li><a href="#">Atendimento</a></li>
                        <li><a class="dropdown-button " data-activates="dropdownAlunos" href="#">Alunos</a></li>
                        <li><a href="#">Entrar</a></li>
                        <li><a href="novoUsuario.php">Cadastrar</a></li>
                        <li><a href="#">Contato</a></li>
                    </ul>
                </div>

            </nav>
        </div>
        
        <div class="container center" style="width: 400px;margin-top: 100px">
            
            <div class="row ">
                <div class="col s12 z-depth-4 card-panel">
                    
                    <div class="row " style=" padding: 32px 48px 0px 48px;">
                        <form action="../controller/login_controller.php" class="col s12" method="post" >
                            <img src="../resources/img/lampada-apagada.jpg" id="luz" />

                            <div class="row">
                            <div class="input-field col s12">
                                <input id="user" class="validate" name="nick" type="text" />
                                <label for="user">Usuário</label>
                            </div>
                            <div class="input-field col s12">
                                <input id="password" class="validate" name="senha" type="password"/>
                                <label for="password">Senha</label>
                            </div>
                            </div>    
                            <button class="waves-effect waves-light btn" onmousemove="mudaLampada(1)" onmouseout="mudaLampada(2)" onclick="mudaLampada(3)" name="entrar" type="submit">Entrar
                                <i class="material-icons right">send</i>
                            </button>
                        </form>
                    </div>
                </div>    
            </div>
        </div>
        
            
        <footer class="page-footer fixed bottom-sheet" style="margin-top: 168px;">
                <div class="footer-copyright">
                  <div class="container">
                  © 2014 Copyright Text
                  <a class="grey-text text-lighten-4 right" href="#!">More Links</a>
                  </div>
                </div>
              </footer>
        <script>
        $(document).ready(function () {
                $('.parallax').parallax();
                $('.scrollspy').scrollSpy();
                $('.dropdown-button').dropdown({
                    inDuration: 300,
                    outDuration: 225,
                    constrainWidth: false, // Does not change width of dropdown to that of the activator
                    hover: true, // Activate on hover
                    gutter: 0, // Spacing from edge
                    belowOrigin: true, // Displays dropdown below the button
                    alignment: 'left', // Displays dropdown with edge aligned to the left of button
                    stopPropagation: false // Stops event propagation
                }
                );
            });    
            
        var quebrada = false;

        function mudaLampada(tipo){
        if (tipo== 1) {
        arquivo ="../resources/img/lampada-acesa.jpg";}
        if (tipo== 2) {
        arquivo ="../resources/img/lampada-apagada.jpg";}

        if (!quebrada){ 
        document.getElementById("luz").src= arquivo;

        if(tipo == 3){ 
          quebrada = true;
        }}}
        
        </script>
        
        
        
        <script src="../resources/js/materialize.js"></script>
        <script src="../resources/js/init.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.js"></script>
    </body>
    
</html>