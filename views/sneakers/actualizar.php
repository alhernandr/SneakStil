<?php
//     $id = $_GET['id']??null;
//     require '\SneakStil\SneakStil\database.php';
//     require '\SneakStil\SneakStil\includes\funciones.php';
//     incluirTemplate('header');
//     $errores=[];
//     $db=conectarBD();
//     define('MEDIDA', 1024);

//     //Inicializa los valores a vacío
//     $nombre='';
//     $marca='';
//     $precio='';
//     $disponibilidad='';
//     $imagen='';

//     $id=$_GET['id']??NULL;

//     if(!isset($id)){
//         header('Location: /SneakStil/admin/index.php');
//     }
//     $consulta="SELECT * from productos where id=$id";
//     $res=mysqli_query($db,$consulta);

//     if($fila=mysqli_fetch_array($res)){
//         $nombre=$fila['nombre'];
//         $marca=$fila['marca'];
//         $precio=$fila['precio'];
//         $disponibilidad=$fila['disponibilidad'];
//         $imagen2=$fila['imagen'];
//     }
//     if ($_SERVER['REQUEST_METHOD']==="POST"){
//          //comprobamos los datos
//          $nombre= $_POST['nombre'];
//          $marca= $_POST['marca'];
//          $imagen= $_FILES['imagen'];
//          $precio= $_POST['precio'];
//          $disponibilidad=$_POST['disponibilidad'];
         
        
        
//          $carpetaImagenes='/SneakStil/SneakStil/imagenes/';
//          if (!is_dir($carpetaImagenes)){
//              mkdir($carpetaImagenes);
//          }

//        //controlando los mensajes de error en la validación del formulario
//        if (!$nombre) {
//             $errores[]="Debes añadir un título";
//         }
//         if (!$marca) {
//          $errores[]="Debes añadir un precio";
//         }
//         if (!$imagen) {
//             $errores[]="Debes añadir una imagen";
//         }
//         if (!$precio) {
//             $errores[]="Debes añadir una descripción";
//         }
//         if (!$disponibilidad) {
//             $errores[]="Debes seleccionar un vendedor";
//         }
//         //valida la imagen por tamaño (medida máxima en kb)
//         if (($imagen['size']/1024 > MEDIDA)){
//             $errores[]="Reduzca el tamaño de la imagen, debe ser menor a ". MEDIDA ."kb.";
//         }

//         //ahora es donde realmente insertamos los valores en la bd. Solo se introduce el campo si el array de errores está vacío
//         if(empty($errores)){
//             if(!$imagen['name']){
//                 $nombreImagen=$imagen2;
//             }else{
//                 $nombreImagen=md5(uniqid(rand(),true)) . ".jpg";
//                 unlink($carpetaImagenes.$imagen2);
//                 move_uploaded_file($imagen['tmp_name'], $carpetaImagenes.$nombreImagen);
//             }
                
//             $query="UPDATE productos SET nombre='$nombre', marca='$marca', imagen='$nombreImagen', precio=$precio, disponibilidad='$disponibilidad' WHERE id=$id;";
//             $resultado=mysqli_query($db,$query);

//         if ($resultado) {
//             //subir archivo

//             header('Location:/SneakStil/admin/index.php?resultado=1');
//         }
//     }
// }   
?>

<main class="contenedor seccion">
    <h1>Actualizar</h1>
    <?php foreach($errores as $error){ ?>
            <div class="alerta error">
                <?php echo $error; ?>
            </div>
    <?php } ?>
    <form class="formulario" method="POST" enctype="multipart/form-data">
            
            <legend><u>Informacion General</u></legend>

            <label for="Nombre">Nombre: </label>
            <input type="text" id="Nombre" name="Nombre" value="<?php echo $producto->nombre ?>">

            <label for="Marca">Marca:</label>
            <input type="text" name="Marca" id="marca" value="<?php echo $producto->marca?>">

            <label for="imagen">Imagen:</label>
            <input type="file" name="imagen" id="imagen"  accept="image/jpeg, image/png, image/jpg">

            <label for="Precio">Precio:</label>
            <input type="text-area" name="Precio" id="precio" placeholder="Precio del sneakers..." value="<?php echo $producto->precio ?>">

            <label for="Disponibilidad">Disponibilidad:</label>
            <input type="text-area" name="Disponibilidad" id="disponibilidad" placeholder="Disponibilidad del sneakers..." value="<?php echo $producto->disponibilidad ?>">


            <legend><u>Vendedor</u></legend>
            <select name="vendedor" id="vendedor">
            <option value="1">Lyonel</option>
            <option value="2">Álvaro</option>
            </select>
        
        <div class="log_button">
        <input type="submit" name="" id="" class="" value="Actualizar propiedad">
        </div>
    </form>
</main>
    <div class="logoAdmin">
        <img class="logoGrande" src="./build\img\logo.png" alt="">
    </div>
