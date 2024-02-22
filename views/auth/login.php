<section>
    <div class="contenedor_log">
      <center>  
        <!-- Título del formulario de inicio de sesión -->
        <h2 class="login">LOGIN</h2>
        <!-- Formulario de inicio de sesión -->
        <form method="post" action="/login">
          <?php
          // Iterar sobre los errores y mostrar cada uno
          foreach($errores as $error){ ?>
            <!-- Div para mostrar el mensaje de error -->
            <div class= "error">
              <?php echo $error;?>
            </div>
          <?php  
          }
          ?>
          <!-- Campo para ingresar el nombre de usuario -->
          <label for="nombre">Username:</label><br>
          <input type="text" id="nombre" name="email" required><br><br>
          <!-- Campo para ingresar la contraseña -->
          <label for="password">Password:</label><br>
          <input type="password" id="password" name="password" required><br><br>
          <!-- Botón para enviar el formulario de inicio de sesión -->
          <div class="log_button">
            <input class="boton" type="submit" value="Login">
          </div>
          <!-- Enlace para crear una nueva cuenta -->
          <div class="createaccount">
            <a href="/signin">Create an account</a>
          </div> 
      </center>
    </form>
    </div>
</section>
