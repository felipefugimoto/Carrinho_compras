<?php
//Coneção com banco mysql

$servename = "localhost:3307";
$username = "root";
$password = "";
$db_name = "loja";

//conectando
$con = mysqli_connect($servename, $username, $password, $db_name);
mysqli_set_charset($con,"utf8");
if(mysqli_connect_error()):
    echo "Falha na conexão: ".mysqli_connect_error();
endif
?>