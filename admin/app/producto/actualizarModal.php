<?php
require '../config/Db_conect.php';
$conect= conectar(); 
$id_producto = $conect->real_escape_string( $_POST['id']);
$nombre = $conect->real_escape_string( $_POST['InputNombre']);
$descripcion = $conect->real_escape_string( $_POST['Inputdescripcion']);
//$imagen = $conect->real_escape_string( $_FILES ['Inputimagen']['name']);
$imagen = $conect->real_escape_string( $_FILES ['Inputimagen']['name']);

$ruta ="imagenes";
$ruta="../../assets/".$ruta."/".$imagen;



$inputimagenguardadaa=$conect->real_escape_string( $_POST ['inputimagenguardada']);


if ($ruta === '../../assets/imagenes/') {
    $ruta=$inputimagenguardadaa;
} else if($inputimagenguardadaa===$ruta) {
    $ruta=$inputimagenguardadaa; 
}else{
    $ruta = $ruta;
    move_uploaded_file($_FILES ['Inputimagen']['tmp_name'],$ruta);
}
$precio = $conect->real_escape_string( $_POST['InputPrecio']);
$cantidad= $conect->real_escape_string( $_POST['InputCantidad']);
$lenguaje= $conect->real_escape_string( $_POST['InputLenguaje']);
$Tipo= $conect->real_escape_string( $_POST['InputTipo']);
$Genero= $conect->real_escape_string( $_POST['InputGenero']);
$Autor= $conect->real_escape_string( $_POST['InputAutor']);
$fecha = $conect->real_escape_string($_POST['fecha']);
$valor = $conect->real_escape_string($_POST['valor']);

$sql= "UPDATE books SET name_book ='$nombre', imagen_book='$ruta', price_book = '$precio', amount_book = '$cantidad', description_book = '$descripcion', year_book = '$fecha' WHERE id_book = '$id_producto'";
if($result = $conect->query($sql)){
    $sql1="UPDATE generbooks SET id_gener_generbook = '$Genero' WHERE id_book_generbook = '$id_producto'";
    $result2 = $conect->query($sql1);
    $sql2="UPDATE typesbooks SET id_type_typebook = '$Tipo' WHERE id_book_typebook = '$id_producto'";
    $result3 = $conect->query($sql2);
    $sql3="UPDATE authbooks SET id_author_authbook = '$Autor' WHERE id_book_authbook = '$id_producto'";
    $result4 = $conect->query($sql3);
    $sql4="UPDATE lengbooks SET id_lenguage_lengbook = '$lenguaje' WHERE id_book_lengbook= '$id_producto'";
    $result5 = $conect->query($sql4);
    $conect->close();
}
header("Location:admin.php");
?>