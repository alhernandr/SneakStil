<?php
  require 'database.php';
  $errores=[];
  $db=conectarBD();
  $nombre='';
  $email= '';
  $password = '';

  if ($_SERVER['REQUEST_METHOD']==="POST"){
  $nombre= $_POST['username'];
  $email= $_POST['email'];
  $password= $_POST['password'];

  if (!$nombre) {
    $errores[]="Debes añadir un nombre";
  }
  else if (!$email) {
    $errores[]="Debes añadir un email";
  }
  else if (!$password) {
    $errores[]="Debes añadir una contraseña";
  }

  if(empty($errores)){
    $passwordHash=password_hash($password,PASSWORD_DEFAULT);
    $query="INSERT INTO clientes (nombre, email, pasword) VALUES ('$nombre', '$email', '$passwordHash');";
    $resultado=mysqli_query($db,$query);

    print_r($resultado);

    //while($usuario = mysqli_fetch_assoc($resultado)){
      //print_r($usuario);
    //}
  }
  }
?>


<?php
   include '..\SneakStil\includes\templates\header.php'
?>
<body>   
  <section>
    <?php foreach($errores as $error){ echo $error; } ?>
    <div class="contenedor_log">
      <center>  
        <h2 class="login">Sign In</h2>
        <form method="post" action="signin.php">
          <label for="username">Username:</label><br>
          <input type="text" id="username" name="username" required><br><br>

          <label for="username">Email:</label><br>
          <input type="text" id="email" name="email" required><br><br>
          <label for="pasword">Password:</label><br>
          <input type="password" id="password" name="password" required><br><br>
          <div class="log_button">
            <input class="boton" type="submit" value="Sign In">
          </div>
          <div class="createaccount">
            <a href="login.php">Already have an account?</a>
          </div>
      </form>
      </center>
    </div>
  </section>

  <?php
    include '..\SneakStil\includes\templates\footer.php'
  ?>
    <!--===== MAIN JS =====-->
    <script src="static/js/main.js"></script>
</body>
</html>