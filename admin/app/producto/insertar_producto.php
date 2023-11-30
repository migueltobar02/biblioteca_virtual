<?php

require '../config/Db_conect.php';
    
$conect= conectar(); 
$nombre = $conect->real_escape_string( $_POST['InputNombre']);
$descripcion = $conect->real_escape_string( $_POST['Inputdescripcion']);
$imagen = $conect->real_escape_string( $_FILES ['Inputimagen']['name']);
$precio = $conect->real_escape_string( $_POST['InputPrecio']);
$cantidad= $conect->real_escape_string( $_POST['InputCantidad']);
$lenguaje= $conect->real_escape_string( $_POST['InputLenguaje']);
$Tipo= $conect->real_escape_string( $_POST['InputTipo']);
$Genero= $conect->real_escape_string( $_POST['InputGenero']);
$Autor= $conect->real_escape_string( $_POST['InputAutor']);
$fecha = $conect->real_escape_string($_POST['fecha']);
$valor = $conect->real_escape_string($_POST['valor']);
$ruta ="imagenes";
$ruta="../../assets/".$ruta."/".$imagen;
move_uploaded_file($_FILES ['Inputimagen']['tmp_name'],$ruta);
//$sql= "INSERT INTO  cliente ( Nombre, Apellido, Cedula, Email, Telefono , Estado) VALUES ( '$nombre', '$apellido', '$cedula', '$email', '$telefono' ,'$valor')";
$sql="INSERT INTO books ( imagen_book, name_book, price_book, amount_book, description_book, year_book, state_book) VALUES ('$ruta', '$nombre', '$precio', '$cantidad', '$descripcion', '$fecha', '$valor')";

if($result = $conect->query($sql)){
    $id = $conect->insert_id;
    $sql1="INSERT INTO lengbooks ( id_book_lengbook, id_lenguage_lengbook) VALUES ('$id', '$lenguaje')";
    $result2 = $conect->query($sql1);
    $sql2="INSERT INTO generbooks (id_book_generbook, id_gener_generbook) VALUES ('$id', '$Genero')";
    $result3 = $conect->query($sql2);
    $sql3="INSERT INTO typesbooks (id_book_typebook,id_type_typebook) VALUES ('$id ', '$Tipo');";
    $result4 = $conect->query($sql3);
    $sql4="INSERT INTO authbooks ( id_book_authbook, id_author_authbook) VALUES ( '$id', '$Autor')";
    $result5 = $conect->query($sql4);
    $sql5="INSERT INTO uniquebooks (id_book_uniquebook) VALUES ( '$id')";
    $result6 = $conect->query($sql5);
    $conect->close();
}
header('Location:admin.php');  
     
?>