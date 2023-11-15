<?php
  require 'database.php';
  
  $errores=[];
  $db = conectarBD();

  $nombre= '';
  $password='';

  //validacion de usuario
  if($_SERVER['REQUEST_METHOD']==='POST'){
    //saneamos datos
    $nombre= mysqli_real_escape_string($db,$_POST['nombre']);
    $password = mysqli_real_escape_string($db,$_POST['password']); 
    
    //comprobamos errores
    if(!$nombre){
      $errores[] = 'El nombre no es valido';
    }
    if(!$password){
      $errores[] = 'La contraseña es incorrecta';
    }
//en caso de no tener errores
if(empty($errores)){
  //revisar si el usuario existe

  if($nombre == "admin" &&  $password == "admin"){
    header("Location: ./admin/index.php");
  }
  else{
    $query = "SELECT * FROM clientes WHERE nombre like '$nombre';";
    $resultado = mysqli_query($db,$query);
    if($resultado->num_rows){
      
      $usuario=mysqli_fetch_assoc($resultado);
      $auth=password_verify($password,$usuario["pasword"]);
      
      if($auth){
        session_start();
        $_SESSION["nombre"] = $usuario["nombre"];
        $_SESSION["login"]=true;
        header("Location: index.php");

    }else{
      $errores[] = "La contraseña es incorrecta";
    }
    }else{
      $errores[] = "El usuario no existe";
    }
  }}
}
  include '../SneakStil\includes\templates\header.php'
?>
      
  <section>
    <div class="contenedor_log">
      <center>  
        <h2 class="login">LOGIN</h2>
        <form method="post" action="login.php">
          <?php
        foreach($errores as $error){ ?>
          <div class= "error">
            <?php echo $error;?>
          </div>
        <?php  
        }
        ?>
        <label for="nombre">Username:</label><br>
        <input type="text" id="nombre" name="nombre" required><br><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br><br>
        <div class="log_button">
        <input class="boton" type="submit" value="Login">
        </div>
        <div class="createaccount">
        <a href="signin.php">Create an account</a>
        </div>
      </center>
    </form>
    </div>
  </section>

  <?php
    include '../SneakStil\includes\templates\footer.php'
  ?>
    <!--===== MAIN JS =====-->
    <script src="static/js/main.js"></script>
</body>
</html>