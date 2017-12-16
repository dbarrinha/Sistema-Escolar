<?php

$uf_estado = $_GET['estado'];
$con = new mysqli('localhost', 'root', '', 'academico');
if($con->connect_errno){
    exit("Erro na conexão com o banco - ".$con->connect_error);
}
$con->set_charset("utf8");
$query = "SELECT * FROM municipio WHERE uf = ?";
$stmt = $con->prepare($query);
$stmt->bind_param("s", $uf_estado);
$arrayCidade = null;
if($stmt->execute()){
   $resultado = $stmt->get_result();
   $arrayCidade = $resultado->fetch_all(MYSQLI_ASSOC);
   $stmt->close();
   $con->close();
}

$cidades = "<select id='estado' onchange=''>";
$cidades .= "<option disabled selected value='-1'>Escolha a Cidade</option>";
foreach($arrayCidade as $cidade){
    $cidades .="<option value='{$cidade['nome']}'>{$cidade['nome']}</option>";
}

$cidades .= "</select>";
echo $cidades;