<?php 
function conectar(){
    $localhost ="localhost";
    $username ="MiguelTobar";
    $password ="Miguel_tobar02";
    $dbname ="virtualbiblioteca";
    // db connection
    $conectar = new mysqli ($localhost, $username, $password, $dbname);
    if ($conectar->connect_error){
        die("Error al conectar la base de datos".$conectar->connect_error);
    }else{
        return $conectar;
    }
}
?>