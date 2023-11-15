<?php
  require '../SneakStil/database.php';
  require '../SneakStil/includes/funciones.php';
  $db=conectarBD();
  $query = "SELECT * FROM productos;";
  $datos= mysqli_query($db, $query);
  include '../SneakStil/includes/templates/header.php'
?>

    <!--===== ALL PRODUCTS =====-->
    <?php while($fila = mysqli_fetch_assoc($datos)){?>
    <section class="featured section" id="shop">
      <h2 class="section-title">All Products</h2>
      <div class="featured__container bd-grid">
        <article class="sneaker">
          <img src="/SneakStil/imagenes/<?php echo $fila['imagen']?>" alt="" class="sneaker__img" />
          <span class="sneaker__name"><?php echo $fila['nombre']?></span>
          <span class="sneaker__preci"><?php echo $fila['precio']?></span>
          
          <a href="" class="button-light">Add to Cart <i class="bx bx-right-arrow-alt button-icon"></i></a>
        </article>
      </div>
      <?php }?>
    
      <div class="sneaker__pages bd-grid">
        <div>
          <span class="sneaker__pag">1</span></a>
          <span class="sneaker__pag">2</span>
          <span class="sneaker__pag">3</span>
          <span class="sneaker__pag">4</span>
          <span class="sneaker__pag">&#8594;</span>
        </div>
      </div>
    </section>
    

    <?php
      include '../SneakStil/includes/templates/footer.php'
    ?>
    <!--===== MAIN JS =====-->
    <script src="static/js/main.js"></script>
  </body>
</html>
