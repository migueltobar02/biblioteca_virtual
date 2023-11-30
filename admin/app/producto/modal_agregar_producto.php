<?php
require '../config/Db_conect.php';
    
$conect= conectar(); 
$sql="SELECT * FROM types";
$result = $conect->query($sql);

$sql2="SELECT * FROM geners";
$result2 = $conect->query($sql2);

$sql3="SELECT * FROM authors";
$result3 = $conect->query($sql3);

$sql4="SELECT * FROM languages";
$result4 = $conect->query($sql4);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../../assets/Css/style_modal_agregar_producto.css">
    <title>Agregar producto</title>
</head>
<body>

<!--Ventana Modal-->
<section class="modal">
    <div class="modal-container">
        
        <h2 class="title">Agregar libro</h2>
            <form action="insertar_producto.php" method="post" enctype="multipart/form-data">
            <input type="hidden" id="id" name="id" >
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
                                <input type="file" id="Inputimagen" name="Inputimagen" accept="image/*" onchange="mostrarVistaPrevia()" required>
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
                                <option>Elige</option>
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
                                <option>Elige</option>
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
                                <option>Elige</option>
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
                                <option>Elige</option>
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
                                <button type="submit" value="Enviar" style="cursor: pointer; width: 100%; height: 30px; border-radius: 7px; color: white; background: blue; border-radius: 7px;" onclick="window.location.href='modal_agregar_producto.html';">
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
</script>
</body>
</html>