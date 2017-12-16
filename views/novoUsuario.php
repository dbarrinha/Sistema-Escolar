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
        <style>
             body {
                display: flex;
                min-height: 100vh;
                flex-direction: column;
              }

              main {
                flex: 1 0 auto;
              }
        </style>
        
        
    </head>
    
    <body >
        
        <!-- Dropdown Structure -->
        <ul id="dropdown1" class="dropdown-content">
          <li><a href="#!">Perfil</a></li>
          <li><a href="#!">Configurações</a></li>
          <li class="divider"></li>
          <li><a href="../controller/logout.php">Sair</a></li>
        </ul>
        <div class="navbar-fixed">
        <nav class="z-depth-3 " >
          <div class="nav-wrapper container">
              <a href="../index.html" class="brand-logo">Share Info</a>
            <ul class="right hide-on-med-and-down">
                <li><a href="newQuest.php">Novo Questionário</a></li>
                <li><a href="painelUser.php">Painel</a></li>
              <!-- Dropdown Trigger -->
              <li><a class="dropdown-button" href="#!" data-activates="dropdown1">User<i class="material-icons right">arrow_drop_down</i></a></li>
            </ul>
          </div>
        </nav>
        </div>
        <!-- Fim Barra de Navegação-->
           
        
        <div class="container"   style="min-height: 700px; margin-top: 65px;">
            <form id="formPrincipal">
                <div class="row">
                    <div class="input-field col s6">
                        <input id="nome" name='nome' type="text" required="" class="validate">
                        <label for="nome">Nome*</label>
                    </div>
                    <div class="input-field col s3">
                        <input id="cpf" name='titulo_questionario' type="text" required="" pattern="\d{3}\.\d{3}\.\d{3}-\d{2}" class="validate">
                        <label for="cpf">CPF*</label>
                    </div>
                    <div class="input-field col s3">
                        <select id="sexo">
                            <option disabled selected value="-1">Escolha o Sexo</option>
                            <option value="0">Feminino</option>
                            <option value="1">Masculino</option>
                        </select>
                    </div>
                    <div class="input-field col s3">
                        <input id="cep" name='cep' type="text" required="" class="validate">
                        <label for="cep">Cep*</label>
                    </div>
                    <div class="input-field col s4">
                        <input id="endereco" name='endereco' type="text" required="" class="validate">
                        <label for="endereco">Endereço*</label>
                    </div>
                    <div class="input-field col s2">
                        <input id="numero" name='numero' type="number" required="" class="validate">
                        <label for="numero">Nº*</label>
                    </div>
                    <div class="input-field col s3">
                        <input id="bairro" name='bairro' type="text" required="" class="validate">
                        <label for="bairro">Bairro*</label>
                    </div>
                    <?php 
                        $con = new mysqli('localhost', 'root', '', 'academico');
                        if($con->connect_errno){
                            exit("Erro na conexão com o banco - ".$con->connect_error);
                        }
                        $con->set_charset("utf8");
                        $query = "SELECT * FROM estado";
                        $stmt = $con->prepare($query);
                        $arrayEstado = null;
                        if($stmt->execute()){
                           $resultado = $stmt->get_result();
                           $arrayEstado = $resultado->fetch_all(MYSQLI_ASSOC);
                           $stmt->close();
                           $con->close();
                        }
                        
                        

                    ?>
                    <div class="input-field col s3">
                        <select id="estado" onchange="getCidades()">
                            <option disabled selected value="-1">Escolha a Estado</option>
                            <?php foreach( $arrayEstado as $estado){ ?>
                            <option value="<?= $estado["Uf"]?>"><?= $estado["Nome"]?></option>
                            <?php }?>
                        </select>
                    </div>
                    
                    <div id='cidades' class="input-field col s3">
                        
                    </div>
                    
                    <div class="input-field col s3">
                         <input id="nascimento" type="text" class="datepicker">
                        <label for="nascimento">Data de Nascimento*</label>
                    </div>
                </div>
            </form>
        </div>  
        
        <footer class="page-footer" >
                <div class="container" >
                  <div class="row">
                    <div class="col l6 s12">
                      <h5 class="white-text">Footer Content</h5>
                      <p class="grey-text text-lighten-4">You can use rows and columns here to organize your footer content.</p>
                    </div>
                    <div class="col l4 offset-l2 s12">
                      <h5 class="white-text">Links</h5>
                      
                    </div>
                  </div>
                </div>
                <div class="footer-copyright">
                  <div class="container">
                  © 2014 Copyright Text
                  <a class="grey-text text-lighten-4 right" href="#!">More Links</a>
                  </div>
                </div>
              </footer>
        
        <script>
            window.onload=function inicializa(){  
                
            }
            $(document).ready(function (){
                $('select').material_select();
                $('.datepicker').pickadate({
                    selectMonths: true, // Creates a dropdown to control month
                    selectYears: 15, // Creates a dropdown of 15 years to control year,
                    today: 'Hoje',
                    clear: 'apagar',
                    close: 'Okay',
                    closeOnSelect: false // Close upon selecting a date,
                  });
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
            
            function getCidades(){
                var uf = $("#estado").val();
                $.get("../controller/getCidadeByEstado.php", {
                    estado :uf
                }).done(function (val){
                    $("#cidades").html(val);
                    $('select').material_select();
                });
            }
            
        </script>
        <script src="../resources/js/materialize.js"></script>
        <script src="../resources/js/init.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.js"></script>
    </body>
    
</html>