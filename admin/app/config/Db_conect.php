<?php 
function conectar(){
    $localhost ="localhost";
    $username ="id21445704_migueltobar";
    $password ="Mto02@gmail.com";
    $dbname ="id21445704_virtualbiblioteca";
    // db connection
    $conectar = new mysqli ($localhost, $username, $password, $dbname);
    if ($conectar->connect_error){
        die("Error al conectar la base de datos".$conectar->connect_error);
    }else{
        return $conectar;
    }
}
?>