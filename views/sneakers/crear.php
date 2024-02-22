<main class="contenedor seccion">
    
    <?php foreach($errores as $error){ ?>
            <div class="alerta error">
                <?php echo $error; ?>
            </div>
    <?php } ?>
    <form class="formulario" method="POST" enctype="multipart/form-data">
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
        <input type="submit" value="Crear propiedad">
        </div>
    </form>
    
</main>
<div class="logoAdmin">
        <img class="logoGrande" src="./build\img\logo.png" alt="">
    </div>