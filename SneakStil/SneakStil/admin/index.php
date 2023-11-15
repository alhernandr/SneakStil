<?php
    $resultado=$_GET['resultado'] ?? null;
    require '../database.php';
    require '../includes/funciones.php';
    incluirTemplate('header');
    $db=conectarBD();
    $query = "SELECT * FROM productos;";
    $datos= mysqli_query($db, $query);
?>
<main class="contenedorAdmin section">
    <h1>Administrador</h1><br>
    
    <a href="/SneakStil/admin/sneakers/crear.php" class="boton boton-verde">Nueva Propiedad</a><br><br>
    
    <?php if (intval($resultado)===1){ ?>
        <p class="alerta exito">Anuncio creado correctamente</p>
    <?php } ?><br>
    
    <table>
        <tr>
            <td>Imagen</td>
            <td>ID</td>
            <td>Nombre</td>
            <td>Marca</td>
            <td>Precio</td>
            <td>Disponibilidad</td>
        </tr>
        <?php while($fila = mysqli_fetch_assoc($datos)){?>
            <tr>
                <td> <img src="/SneakStil/imagenes/<?php echo $fila['imagen']?>"> </td>
                <td> <?php echo $fila['id']?></td>
                <td> <?php echo $fila['nombre']?> </td>
                <td> <?php echo $fila['marca']?> </td>
                <td> <?php echo $fila['precio']?> </td>
                <td> <?php echo $fila['disponibilidad']?> </td>
                

                <td class="operaciones">
                    <a href=".\sneakers\actualizar.php?id=<?php echo $fila['id'];?>" class="boton boton-actualizar">Actualizar</a>
                    <a class="boton boton-block" href=".\sneakers\borrar.php/?id=<?php echo $fila['id'];?>">Borrar</a>
                </td>
            </tr>
            <?php }?>
            
        </table>    
    </main>

<?php
    incluirTemplate('footer');
?>