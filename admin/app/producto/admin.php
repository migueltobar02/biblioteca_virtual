<?php
require '../config/Db_conect.php';
    
$conect= conectar(); 
$sql="SELECT id_book ,name_book, imagen_book, name_type FROM books INNER JOIN typesbooks INNER JOIN types ON typesbooks.id_type_typebook = types.id_type ON books.id_book = typesbooks.id_book_typebook WHERE books.state_book=1";
$sql2="SELECT COUNT(*) AS total FROM books WHERE books.state_book = 1;";
$result = $conect->query($sql);
$result1 = $conect->query($sql2);
$conect->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../../assets/Css/estilos.css">
    <link rel="stylesheet" type="text/css" href="../../assets/Css/estilo1.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
     integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" 
     crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../../assets/Css/style.css">
    <title>Admin</title>
</head>
<body>
    <div id="app" class="Conthtl" style="width: 100%;  height: 100vh;">
        <div id="menu" class="Contvtc" >
            <div  class="Conthcc" style="width:100%; height:8%; background: #09877f;">
                <div  class="Contvcc" style="width: 193px; height: 50%;  color: white; margin: auto;">
                    <h4>Biblioteca virtual</h4>
                </div> 
            </div> 
            <div id="img-user" class="Conthcc" >
                <div id="logo" class="Conthcl">
                    <img src="../../assets/imagenes/logo.png" alt="usuario" style="max-width: 100%; max-width: 100%; background: transparent;">
                </div> 
                <div id="name-user" class="Contvcl">
                    <h4>Laura Mercedes</h4>
                    <h4>Admin</h4>
                </div>
            </div> 
            <div id="menu-nav-izquierdo" class="Conthtl">
                <nav>
                    <ul>
                        <li><a id="insertar-libro" style="display:none;" onclick="window.location.href ='modal_agregar_producto.php'">Insertar libro</a></li>
                        <li><a href="#">Retrasos</a></li>
                        <li><a href="#">Autores</a></li>
                        <li><a href="#">Provedores</a></li>
                        <li>
                            <a href="#">Reportes</a>
                            <ul>
                                <li><a href="#">Mensual</a></li>
                                <li><a href="#">Diario</a></li>
                                <li><a href="#">Libros mas vendidos</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">Configuracion</a>
                            <ul>
                                <li><a href="#">General</a></li>
                                <li><a href="#">Idiomas</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
            
        </div>
        <div id="menu-derecho" class="Contvtl">
            <div id="menu-nav" class="Contvtl">
            </div>
            <div id="menu-contenido" class="Contvtc">
                <div id="panel" class="Contvcc">
                    <div id="tituolo_panel" class="Conthcc">
                        <h2 > Panel de administrador</h2>
                    </div>    
                </div>
                <div id="cards" class="Conthcc" >
                    <div id="menu-card-usuario" class="Conthcl">
                            <div class="Contvcc" id="icono-usuario" style="width:30%; height: 90%; border: solid rgba(0,0,0, 0.1)">
                                <img src="../../assets/imagenes/users.png" alt="usuario" style="max-width: 65%; max-width: 65%;">
                            </div>
                            <div id="contenido-usuario" class="Contvcc" style="width:70%; height: 100%;">
                                <a class="info" >
                                    <h3 style="color: black;">Usuarios</h3>
                                </a>
                                <a class="info-cantidad" style="margin-top: 3%;">
                                    <h3>0</h3>
                                </a>
                            </div>
                            
                        
                    </div>
                    <div id="menu-card-libros" class="Conthcl" >
                        <div class="Contvcc" id="icono-libro" style="width:30%; height: 90%; background: rgb(9, 156, 146); border: solid rgba(0,0,0, 0.1)">
                            <img src="../../assets/imagenes/books.png" alt="libro" style="max-width: 65%; max-width: 65%;">
                        </div>
                        <div id="contenido-libro" class="Contvcc" style="width:68%; height: 90%;  margin-left: 1%;">
                            <a class="info" >
                                <h3 style="color: black;">Libros</h3>
                            </a>
                            <a class="info-cantidad" style="margin-top: 3%;">
                                <h3 style="color: red;"><?php while ($row = $result1->fetch_assoc()) {echo $row['total']; }?></h3>
                            </a>
                        </div>
                    </div>
                    <div id="menu-card-pedidos" class="Conthcl" >
                        <div class="Contvcc" id="icono-pedido" style="width:30%; height: 90%; background: rgb(9, 156, 146); border: solid rgba(0,0,0, 0.1)">
                            <img src="../../assets/imagenes/pedidos.png" alt="pedido" style="max-width: 65%; max-width: 65%;">
                        </div>
                        <div class="Contvcc" style="width:68%; height: 90%;  margin-left: 1%;">
                            <a class="info" >
                                <h3 style="color: black;">Pedidos</h3>
                            </a>
                            <a class="info-cantidad" style="margin-top: 3%;">
                                <h3 style="color: red;">0</h3>
                            </a>
                        </div>
                    </div>
                </div>
                <div id="contenedor_tarjetas" class="Conthtl" style="width: 95%; height: 67%; background: white; display:none; overflow-y: overlay; overflow-x: hidden;">
                <div id="fila"
                style=" width: 100%; height:100%; display:flex; flex-wrap: wrap; margin: auto; justify-content: center; padding:0px">
                <?php 
					$contador = 0;
					while ($row1 = $result->fetch_assoc()) {
						$contador++;
						$contender_id = "contender_imagenes_" . $contador;
						?>
                <div id="<?php echo $contender_id; ?>" class="Contvtl">
                    <div id="contendero-imagen">
                        <figure style="margin: 5px ;">
                            <img src="<?php echo $row1['imagen_book'] ?>" alt="Imagen de ejemplo"
                                style="margin-top: 5%;">
                            <div id="Contenido" style="margin-left: 1%; text-align: center;  margin-top: 2%;">
                                <div class="Contvtc">
                                    <p id="tipo_libro"><?php echo $row1['name_type'] ?></p>
                                </div>
                                <div class="Contvtc" style="margin-top: 5px; ">
                                    <h2 style="margin-top: 1%;  text-shadow: 2px 2px 2px rgba(0, 0, 0, 1);">
                                        <?php echo $row1['name_book'] ?></h2>
                                </div>
                                <div class="Contvec" style="margin-top: 20px;">
                                    <button id="botoneliminar"
                                        onclick="window.location.href ='eliminar_producto.php?id=<?php echo $row1['id_book'] ?>'">Eliminar
                                        libro</button>
                                </div>
                                <div class="Contvtc" style="margin-top: 20px;">
                                    <ul>
                                        <button id="botonactualizar"
                                            onclick="window.location.href ='editar_producto.php?id=<?php echo $row1['id_book'] ?>'">Actualizar
                                            libro</button>
                                    </ul>
                                </div>
                            </div>
                        </figure>
                    </div>
                </div>
                <?php
									}
                                   
									?>
            </div>
                </div>
                <div id="carrusel" class="Conthtl" >
                        <div id="swiper-conteiner" class="swiper mySwiper">
                            <div class="swiper-wrapper">

                                <div class="swiper-slide">
                                    <img src="../../assets/imagenes/imagen1.jpg" alt="">
                                </div>
                                <div class="swiper-slide">
                                    <img src="../../assets/imagenes/imagen2.jpg" alt="">
                                </div>
                                <div class="swiper-slide">
                                    <img src="../../assets/imagenes/imagen3.jpg" alt="">
                                </div>
                                <div class="swiper-slide">
                                    <img src="../../assets/imagenes/imagen4.jpg" alt="">
                                </div>
                                <div class="swiper-slide">
                                    <img src="../../assets/imagenes/imagen5.jpg" alt="">
                                </div>
                                <div class="swiper-slide">
                                    <img src="../../assets/imagenes/imagen6.jpg" alt="">
                                </div>
                                <div class="swiper-slide">
                                    <img src="../../assets/imagenes/imagen7.jpg" alt="">
                                </div>
                                <div class="swiper-slide">
                                    <img src="../../assets/imagenes/imagen8.jpg" alt="">
                                </div>
                                <div class="swiper-slide">
                                    <img src="../../assets/imagenes/imagen9.jpg" alt="">
                                </div>
                                <div class="swiper-slide">
                                    <img src="../../assets/imagenes/imagen10.jpg" alt="">
                                </div>
                                <div class="swiper-slide">
                                    <img src="../../assets/imagenes/imagen11.jpg" alt="">
                                </div>
                                <div class="swiper-slide">
                                    <img src="../../assets/imagenes/imagen12.jpg" alt="">
                                </div>
                            </div>
                        </div>
                   
                    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
                    <script src="../../assets/Js/script.js" ></script>
                </div> 
            </div>
        </div>
    </div>
    <script>
        const cardLibros = document.getElementById("menu-card-libros");
        const carrusel = document.getElementById("carrusel");
        const carrusel1 = document.getElementById("contenedor_tarjetas");
        const botonisertar =document.getElementById("insertar-libro");

// Añadir listener de click al card de libros
        cardLibros.addEventListener("click", () => {

        // Mostrar mensaje en el carrusel
        carrusel1.style.display = "block";
        botonisertar.style.display = "block";
        carrusel.style.display = "none";

        });
    </script>
</body>
</html>