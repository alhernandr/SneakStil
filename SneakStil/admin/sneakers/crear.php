<?php
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
        $nombre= $_POST['Nombre'];
        $marca= $_POST['Marca'];
        $imagen= $_FILES['imagen'];//invetigar
        $precio= $_POST['Precio'];
        $disponibilidad=$_POST['Disponibilidad'];
        
        //creamos la carpeta imágenes en la raíz del proyecto si es que no existe
        $carpetaImagenes='../../imagenes/';
        if (!is_dir($carpetaImagenes)){
            mkdir($carpetaImagenes);
        }

       //controlando los mensajes de error en la validación del formulario
        if (!$nombre) {
            $errores[]="Debes añadir un nombre";
        }
        else if (!$marca) {
            $errores[]="Debes añadir una marca";
        }
        else if (!$imagen) {
            $errores[]="Debes añadir una imagen";
        }
        else if (!$precio) {
            $errores[]="Debes añadir una precio";
        }
        else if (!$disponibilidad) {
            $errores[]="Debes seleccionar la disponibilidad";
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
            $date = date("+Y/m/d");
            $query="INSERT INTO productos (nombre, marca, imagen, precio, disponibilidad)   
            VALUES ('$nombre', '$marca', '$nombreImagen','$precio', '$disponibilidad');";
            $resultado=mysqli_query($db,$query);
            move_uploaded_file($imagen['tmp_name'], $carpetaImagenes.$nombreImagen);
        if ($resultado) {
            header('Location:/SneakStil/admin/index.php?resultado=1');
             //subir archivo
            
        }
    }
} 
?>

<main class="contenedor seccion">
    
    <?php foreach($errores as $error){ ?>
            <div class="alerta error">
                <?php echo $error; ?>
            </div>
    <?php } ?>
    <form action="/SneakStil/admin/sneakers/crear.php" class="formulario" method="POST" enctype="multipart/form-data">
            <h1>Crear</h1>
            <legend><u>Informacion General</u></legend>

            <label for="Nombre">Nombre: </label>
            <input type="text" id="Nombre" name="Nombre">

            <label for="Marca">Marca:</label>
            <input type="text" name="Marca" id="Marca">

            <label for="imagen">Imagen:</label>
            <input type="file" name="imagen" id="imagen"  accept="image/jpeg, image/png, image/jpg">

            <label for="Precio">Precio:</label>
            <input type="text-area" name="Precio" id="Precio" placeholder="">

            <label for="Disponibilidad">Disponibilidad:</label>
            <input type="text-area" name="Disponibilidad" id="Disponibilidad" placeholder="">
        
        
            <legend><u>Vendedor</u></legend>
            <select name="vendedor" id="vendedor">
                <option value="1">Lyonel</option>
                <option value="2">Álvaro</option>
            </select>
        
        <div class="log_button">
        <input type="submit" name="" id="" class="" value="Crear propiedad">
        </div>
    </form>
    
</main>
<div class="logoAdmin">
        <img class="logoGrande" src="../../..\SneakStil\img\logo.png" alt="">
    </div>
<?php
    incluirTemplate('footer');
?>