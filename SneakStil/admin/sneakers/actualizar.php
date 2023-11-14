<?php
    $id = $_GET['id']??null;
    require '../../database.php';
    require '../../includes/funciones.php';
    incluirTemplate('header');
    $errores=[];
    $db=conectarBD();
    define('MEDIDA', 1024);

    //Inicializa los valores a vacío
    $nombre='';
    $marca='';
    $precio='';
    $disponibilidad='';

    if ($_SERVER['REQUEST_METHOD']==="POST"){
         //comprobamos los datos
         $nombre= $_POST['nombre'];
         $marca= $_POST['marca'];
         $imagen= $_FILES['imagen'];
         $precio= $_POST['precio'];
         $disponibilidad=$_POST['disponibilidad'];
        
        
         $carpetaImagenes='../SneakStil/img';
         if (!is_dir($carpetaImagenes)){
             mkdir($carpetaImagenes);
         }

       //controlando los mensajes de error en la validación del formulario
       if (!$nombre) {
            $errores[]="Debes añadir un título";
        }
        else if (!$marca) {
         $errores[]="Debes añadir un precio";
        }
        else if (!$imagen) {
            $errores[]="Debes añadir una imagen";
        }
        else if (!$precio) {
            $errores[]="Debes añadir una descripción";
        }
        else if (!$disponibilidad) {
            $errores[]="Debes seleccionar un vendedor";
        }
        
        //valida la imagen por tamaño (medida máxima en kb)
        if (($imagen['size']/1024 > MEDIDA)){
            $errores[]="Reduzca el tamaño de la imagen, debe ser menor a ". MEDIDA ."kb.";
        }
        
        else{
            //Generar nombre único
            $nombreImagen=md5(uniqid(rand(),true)) . ".jpg";
        }

        //ahora es donde realmente insertamos los valores en la bd. Solo se introduce el campo si el array de errores está vacío
        if(empty($errores)){
            
            $query="UPDATE propiedades SET nombre='$nombre', marca=$marca, imagen='$nombreImagen', precio='$precio', disponibilidad='$disponibilidad' WHERE id='$id';";
        $resultado=mysqli_query($db,$query);

        if ($resultado) {
            header('Location:/admin?resultado=1');
            //subir archivo
            move_uploaded_file($imagen['tmp_name'], $carpetaImagenes.$nombreImagen);
        }
    }
}   
?>

<main class="contenedor seccion">
    <h1>Actualizar</h1>
    <?php foreach($errores as $error){ ?>
            <div class="alerta error">
                <?php echo $error; ?>
            </div>
    <?php } ?>
    <form action="/admin/propiedades/actualizar.php/?id=<?php echo $id;?>" class="formulario" method="POST" enctype="multipart/form-data">
    <fieldset>
            <legend>Informacion General</legend>

            <label for="Nombre">Nombre: </label>
            <input type="text" id="Nombre" name="Nombre">

            <label for="Marca">Marca:</label>
            <input type="text" name="Marca" id="Marca">

            <label for="imagen">Imagen:</label>
            <input type="file" name="imagen" id="imagen"  accept="image/jpeg, image/png, image/jpg">

            <label for="Precio">Precio:</label>
            <input type="text-area" name="Precio" id="Precio" placeholder="Precio del sneakers...">

            <label for="Disponibilidad">Disponibilidad:</label>
            <input type="text-area" name="Disponibilidad" id="Disponibilidad" placeholder="Disponibilidad del sneakers...">


        </fieldset>
        <fieldset>
            <legend>Vendedor</legend>
            <select name="vendedor" id="vendedor">
            <option value="1">Lyonel</option>
                <option value="2">Álvaro</option>
            </select>
        </fieldset>
        <input type="submit" name="" id="" class="boton boton-verde" value="Actualizar propiedad">
    </form>
</main>

<?php
    incluirTemplate('footer');
?>