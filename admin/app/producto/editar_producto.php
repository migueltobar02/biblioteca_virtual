<?php
require '../config/Db_conect.php';
 
$conect= conectar(); 
$id_producto = $conect->real_escape_string($_GET['id']); 
$sql="SELECT * FROM types";
$result = $conect->query($sql);

$sql2="SELECT * FROM geners";
$result2 = $conect->query($sql2);

$sql3="SELECT * FROM authors";
$result3 = $conect->query($sql3);

$sql4="SELECT * FROM languages";
$result4 = $conect->query($sql4);
$conect->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../../assets/Css/style_modal_agregar_producto.css">
    <title>Agregar producto</title>
    <script>
    
    function mostrarVistaPrevia() {
        const inputImagen = document.getElementById('Inputimagen');
        const vistaPrevia = document.getElementById('vista-previa');

        const archivo = inputImagen.files[0];
        if (archivo) {
            const lector = new FileReader();

            lector.onload = function(e) {
                vistaPrevia.src = e.target.result;
            }

            lector.readAsDataURL(archivo);
        }
    }
   
    
    document.addEventListener('DOMContentLoaded', function() {
    let editaModal = document.getElementById("modal");
    console.log("El modal se ha mostrado");
    let id = document.getElementById('id').value;
    console.log(id);

    // Creamos un evento personalizado para saber cuando el modal se ha mostrado
    const modalShownEvent = new Event('modalShown');

    // Disparamos el evento una vez que el modal está completamente mostrado
    editaModal.addEventListener('modalShown', function() {
        let imputId = editaModal.querySelector('.modal-container #id');
        let nombre = editaModal.querySelector('.modal-container #InputNombre');
        let descripcion = editaModal.querySelector('.modal-container #Inputdescripcion');
        let imagen = editaModal.querySelector('.modal-container #vista-previa');
        let imageninput = editaModal.querySelector('.modal-container #inputimagenguardada');
        let precio = editaModal.querySelector('.modal-container #InputPrecio');
        let cantidad = editaModal.querySelector('.modal-container #InputCantidad');
        let Tipo = editaModal.querySelector('.modal-container #opcionTipo');
        let fecha = editaModal.querySelector('.modal-container #fecha');
        let valor = editaModal.querySelector('.modal-container #valor');
        let id_genero=editaModal.querySelector('.modal-container #opcionGenero');
        let id_lenguaje=editaModal.querySelector('.modal-container #opcionLenguaje');
        let id_autor=editaModal.querySelector('.modal-container #opcionAutor');
        let url = "getProducto.php";

        let formData = new FormData();
        formData.append('id', id);

        fetch(url, {
            method: 'POST',
            body: formData
        }).then(response => response.json())
            .then(data => {
                imputId.value = data.id_book
                nombre.value = data.name_book
                descripcion.value = data.description_book
                imagen.src = data.imagen_book
                precio.value = data.price_book
                cantidad.value = data.amount_book   
                Tipo.value = data.id_type
                Tipo.textContent= data.name_type
                fecha.value = data.year_book
                id_genero.value=data.id_gener
                id_genero.textContent= data.name_gener
                id_lenguaje.value=data.id_lenguage
                id_lenguaje.textContent=data.name_lenguage
                id_autor.value=data.id_author
                id_autor.textContent= data.name_author
                imageninput.value= data.imagen_book
                
                
            }).catch(error => console.log(error));
    });

    editaModal.addEventListener('click', function() {
        // Puedes dejar esta parte si necesitas hacer algo cuando el modal se cierra
    });
    

    // Disparamos el evento personalizado para indicar que el modal se ha mostrado
    editaModal.dispatchEvent(modalShownEvent);
});

   
</script>
</head>
<body>

<!--Ventana Modal-->
<section class="modal" id="modal">
    <div class="modal-container" id="editarModal">
        
        <h2 class="title">Editar libro</h2>
            <form action="actualizarModal.php" method="post" enctype="multipart/form-data">
            <input type="hidden" id="id" name="id" value='<?php echo($id_producto)?>'>
                <div class="Conthcc" >
                    <div class="Conthcc" style=" height: 149.19px; width: 187px; max-width: 187px;max-height: 149.19px; overflow: hidden;">
                        <img style="width: auto; height: auto; max-height: 149.19px; max-width: 187px;" class="modal-img" id="vista-previa" alt="">
                    </div>
                    <div class="Conthcl" style="width: 405px; margin-left: 5px;">
                        <div class="Contvcc">
                            
                            <div class="Conthtl" style="width: 400px; margin:auto;margin-top:10px;margin-left:  5px;">
                                <label style="margin-right: 8px;" for="Inputdescripcion">Descripción:</label>
                                <textarea id="Inputdescripcion" name="Inputdescripcion" rows="8" cols="40"></textarea required>
                            </div> 
                            <div class="Conthtl" style="width: 400px; margin:auto; margin-top: 5px; margin-bottom: 5px;">
                                <label  for="Inputimagen">Subir imagen:</label>
                                <input  type="file" id="Inputimagen" name="Inputimagen" accept="image/*" onchange="mostrarVistaPrevia()" >
                                <input type="hidden" id="inputimagenguardada" name="inputimagenguardada" value=''>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="Contvcl" style="margin-top: 10px;">
                    <div class="Contvcl"  style="width: 400px; margin-left: 5px; margin-top: 5px;">
                        <div class="Conthcl" >
                            <label for="InputNombre" class="form-label"> Nombre del libro</label>
                        </div>
                    </div>
                    <div class="Conthcl" style="width: 400px; margin-left: 5px; margin-bottom: 5px;">
                        <input style="width: 100%; " type="text" class="form-control" id="InputNombre" name="InputNombre" required placeholder="Ingrese nombres" >
                        
                    </div>
                </div>
                <div class="Conthtl" style="margin-bottom: 5px;  margin-top: 10px;">
                    <div class="Contvcl" style=" margin-top: 5px; width: 150px; ">
                        <div class="Contvcl"  style="width: 400px; margin-left: 5px; margin-top: 5px;">
                            <div class="Conthcl" >
                                <label for="InputPrecio" class="form-label">Precio</label>
                            </div>
                        </div>
                        <div class="Conthcl" style="width: 140px; margin-left: 5px;  margin-top: 3px;">
                            <input style="width: 100%"  type="number" class="form-control" id="InputPrecio" name="InputPrecio" placeholder="32000" required >
                            
                        </div>
                    </div>
                    <div class="Contvcl" style=" margin-top: 5px; width: 150px; margin-left: 36px; ">
                        <div class="Contvcl"  style="width: 400px; margin-left: 5px; margin-top: 5px;">
                            <div class="Conthcl" >
                                <label for="InputCantidad" class="form-label">Cantidad</label>
                            </div>
                        </div>
                        <div class="Conthcl" style="width: 140px; margin-left: 5px; margin-top: 3px;">
                            <input style="width: 100%"  type="number" class="form-control" id="InputCantidad" name="InputCantidad" placeholder="3219254703" required >
                            
                        </div>
                    </div>
                    <div class="Contvcl" style=" margin-top: 5px; width: 150px; margin-left: 34px;">
                        <div class="Contvcl"  style="width: 400px; margin-left: 5px; margin-top: 5px;">
                            <div class="Conthcl" >
                                <label for="fecha">Año del libro</label>
                            </div>
                        </div>
                        <div class="Conthcl" style="width: 138px; margin-left: 5px;">
                            <input style="width: 100%"  type="date" id="fecha" name="fecha" required>
                            
                        </div>
                    </div>
                </div>
                <div class="Conthtl" style="margin-bottom: 5px; margin-top: 10px;">
                    <div class="Contvcl" style=" margin-top: 5px; width: 100px; margin-right: 1px ; ">
                        <div class="Contvcl"  style="width: 400px; margin-left: 5px; margin-top: 5px;">
                            <div class="Conthcl" >
                                <label for="InputTipo" class="form-label">Tipo</label>
                            </div>
                        </div>
                        <div class="Conthcl" style="width: 120px; margin-left: 5px;  margin-top: 3px;">
                            <select id="InputTipo" name="InputTipo" required>
                                <option id="opcionTipo" value="">Elige</option>
                                <?php
                                    while ($row = $result->fetch_assoc()) {
                                ?>
                                <option value="<?php echo $row['id_type'] ?>"><?php echo $row['name_type'] ?></option>
                                <?php
                                
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="Contvcl" style=" margin-top: 5px; width: 100px;  margin-left: 6px; ">
                        <div class="Contvcl"  style="width: 400px; margin-left: 5px; margin-top: 5px;">
                            <div class="Conthcl" >
                                <label for="InputLenguaje">Lenguaje</label>
                            </div>
                        </div>
                        <div class="Conthcl" style="width: 120px; margin-left: 5px;  margin-top: 3px;">
                            <select id="InputLenguaje" name="InputLenguaje" required>
                            <option id="opcionLenguaje" value="">Elige</option>
                                <?php
                                    while ($row = $result4->fetch_assoc()) {
                                ?>
                                    <option value="<?php echo $row['id_lenguage'] ?>"><?php echo $row['name_lenguage'] ?></option>
                                <?php
                                    }
                                ?>
                            </select>
                        </div>
                        
                    </div>
                    <div class="Contvcl" style="margin-top: 5px; width: 140px; margin-left: 6px;">
                        <div class="Contvcl"  style="width: 400px; margin-left: 5px; margin-top: 5px;">
                            <div class="Conthcl" >
                                <label for="InputGenero" class="form-label">genero</label>
                            </div>
                        </div>
                        <div class="Conthcl" style="width: 120px; margin-left: 5px; margin-top: 3px;">
                            <select id="InputGenero" name="InputGenero" required>
                            <option id="opcionGenero" value="">Elige</option>
                                <?php
                                    while ($row = $result2->fetch_assoc()) {
                                ?>
                                <option value="<?php echo $row['id_gener'] ?>"><?php echo $row['name_gener'] ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="Contvcl" style=" margin-top: 5px; width: 148px; margin-left: 61px;">
                        <div class="Contvcl"  style="width: 400px; margin-left: 5px; margin-top: 5px;">
                            <div class="Conthcl" >
                                <label for="InputAutor">Autor</label>
                            </div>
                        </div>
                        <div class="Conthcl" style="width: 120px; margin-left: 5px;  margin-top: 3px;">
                                <select id="InputAutor" name="InputAutor" required>
                                <option id="opcionAutor" value="">Elige</option>
                                <?php
                                    while ($row = $result3->fetch_assoc()) {
                                ?>
                                <option value="<?php echo $row['id_author'] ?>"><?php echo $row['name_author'] ?></option>
                                <?php
                                }
                                ?>
                                </select>
                        </div>
                        
                    </div>
                    
                </div>
                <input type="hidden" id="valor" name="valor" value="1">
                <div class="Conthcc" style="margin-bottom: 5px; margin-top: 10px;">
                    <div class="Contvcl" style="margin-top: 5px; width: 140px; ">
                        <div class="Conthcc"  style="width:100%;margin-top: 5px;">         
                                <button type="submit" value="Enviar" style="cursor: pointer; width: 100%; height: 30px; border-radius: 7px; color: white; background: blue; border-radius: 7px;" onclick="window.location.href='editar_producto.php';">
                                    Agregar
                                </button>
                        </div>
                    </div>
                    <div class="Contvcl" style=" margin-top: 5px; width: 140px; margin-left: 5px; ">
                        <div class="Conthcc"  style="width: 100%;  margin-top: 5px;">
                                <button  style="cursor: pointer; width: 100%; height: 30px; border-radius: 7px; color: white; background: blue; border-radius: 7px;" onclick="window.location.href='admin.php'">
                                    Cerrar
                                </button>
                        </div>
                    </div>
                </div>
            </form>
        <a href="admin.php" class="close">&times;</a>
    </div>
</section>
    </div>
<!--Fin de Ventana Modal-->

</body>
</html>