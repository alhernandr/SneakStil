<body>   
  <section>
    <!-- Mostrar errores -->
    <?php foreach($errores as $error){ echo $error; } ?>
    <div class="contenedor_log">
      <center>  
        <!-- Título del formulario de registro -->
        <h2 class="login">Sign In</h2>
        <!-- Formulario de registro -->
        <form method="post" action="/signin">
          <!-- Campo para ingresar el nombre de usuario -->
          <label for="username">Username:</label><br>
          <input type="text" id="username" name="username" required><br><br>
          <!-- Campo para ingresar el correo electrónico -->
          <label for="email">Email:</label><br>
          <input type="text" id="email" name="email" required><br><br>
          <!-- Campo para ingresar la contraseña -->
          <label for="password">Password:</label><br>
          <input type="password" id="password" name="password" required><br><br>
          <!-- Botón para enviar el formulario de registro -->
          <div class="log_button">
            <input class="boton" type="submit" value="Sign In">
          </div>
          <!-- Enlace para redirigir a los usuarios a la página de inicio de sesión -->
          <div class="createaccount">
            <a href="/login">Already have an account?</a>
          </div>
      </form>
      </center>
    </div>
  </section>
  
    <!--===== MAIN JS =====-->
    <script src="static/js/main.js"></script>
</body>
</html>
