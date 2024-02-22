<main class="contenedorAdmin section">
    <h1>Administrador</h1><br>
    
    <!-- Enlace para agregar un nuevo producto -->
    <a href="/crear" class="boton boton-verde">Nueva Sneaker</a><br><br>
    
    <!-- Mensaje de éxito mostrado después de agregar un nuevo producto -->
    <?php if (intval($resultado)===1){ ?>
        <p class="alerta exito">PRODUCTO AÑADIDO CORRECTAMENTE</p>
    <?php } ?><br>
    
    <!-- Tabla para mostrar los productos existentes -->
    <table>
        <tr>
            <td>Imagen</td>
            <td>ID</td>
            <td>Nombre</td>
            <td>Marca</td>
            <td>Precio</td>
            <td>Disponibilidad</td>
            <td>Operaciones</td>
        </tr>
        <?php 
            // Iterar sobre los productos y mostrar cada uno en una fila de la tabla
            foreach($productos as $producto){?>
            <tr>
                <td> <img src="./build/img/<?php echo $producto->nombre?>.png"> </td>
                <td> <?php echo $producto->id?></td>
                <td> <?php echo $producto->nombre?> </td>
                <td> <?php echo $producto->marca?> </td>
                <td> <?php echo $producto->precio?> </td>
                <td> <?php echo $producto->disponibilidad?> </td>
                
                <!-- Botones para actualizar y borrar el producto -->
                <td class="operaciones">
                    <a href="\actualizar?id=<?php echo $producto->id;?>" class="boton boton-actualizar">Actualizar</a>
                    <a class="boton boton-block" href="/borrar?id=<?php echo $producto->id;?>">Borrar</a>
                </td>
            </tr>
            <?php }?>
            
        </table>    
    </main>
