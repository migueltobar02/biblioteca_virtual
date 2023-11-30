<?php
require '../config/Db_conect.php';
$conect= conectar(); 
$id_producto = $conect->real_escape_string( $_POST['id']);
$sql = "SELECT id_book, imagen_book, name_book, price_book, amount_book, description_book, year_book,name_type,name_author,name_lenguage,name_gener,id_lenguage,id_gener,id_author,id_type FROM books INNER JOIN typesbooks INNER JOIN types ON typesbooks.id_type_typebook = types.id_type ON books.id_book = typesbooks.id_book_typebook INNER JOIN authbooks INNER JOIN authors ON authbooks.id_author_authbook = authors.id_author ON books.id_book = authbooks.id_book_authbook INNER JOIN lengbooks INNER JOIN languages ON lengbooks.id_lenguage_lengbook = languages.id_lenguage ON books.id_book = lengbooks.id_book_lengbook INNER JOIN generbooks INNER JOIN geners ON generbooks.id_gener_generbook = geners.id_gener ON books.id_book = generbooks.id_book_generbook WHERE id_book =$id_producto and state_book = 1 LIMIT 1";
$result = $conect->query($sql);
$rows = $result->num_rows;

$producto = [];

if($rows > 0){

    $producto  = $result->fetch_array();
   
}
echo json_encode($producto , JSON_UNESCAPED_UNICODE);
?>