<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- ===== CSS ===== -->
    <link rel="stylesheet" href="static/css/styles.css" />

    <!-- ===== BOX ICONS ===== -->
    <link
      href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css"
      rel="stylesheet"
    />
<title>SneakStil</title>
</head>
<body>

<!--===== HEADER =====-->
<header class="l-header" id="header">
      <nav class="nav bd-grid">
        <div class="nav__toggle" id="nav-toggle">
          <i class="bx bxs-grid"></i>
        </div>
        <a href="index.php" class="nav__logo"><img class="logo" src="img/logo.png" alt=""></a>

        <div class="nav__menu" id="nav-menu">
          <ul class="nav__list">
            <li class="nav__item">
              <a href="index.php" class="nav__link active">Home</a>
            </li>
            <li class="nav__item">
              <a href="index.php#featured" class="nav__link">Featured</a>
            </li>
            <li class="nav__item">
              <a href="index.php#women" class="nav__link">Women</a>
            </li>
            <li class="nav__item">
              <a href="index.php#new" class="nav__link">New</a>
            </li>
            <li class="nav__item">
              <a href="shop.php" class="nav__link">Shop</a>
            </li>
            <li class="nav__item">
              <a href="login.php" class="nav__link">Login</a>
            </li>
            <li class="nav__item">
              <a href="signin.php" class="nav__link">Sign In</a>
            </li>
          </ul>
        </div>
        <div class="nav__shop">
          <a href="basket.php"><i class="bx bx-shopping-bag"></i></a>
        </div>
      </nav>
    </header>
    <main class="l-main">

      <!--===== FOOTER =====-->
    <section class="footer section">
      <div class="footer__container bd-grid">
        <div class="footer__box">
          <h3 class="footer__title">SneakStil</h3>
          <a href="index.php" class="nav__logo"><img class="logo" src=".\img\logo.png" alt="" id= "footer_logo"></a> 
          <p class="footer__description">New collection of shoes 2023</p>
        </div>

        <div class="footer__box">
          <h3 class="footer__title">EXPLORE</h3>

          <ul>
            <li><a href="#home" class="footer__link">Home</a></li>
            <li><a href="#featured" class="footer__link">Featured</a></li>
            <li><a href="#wome" class="footer__link">Women</a></li>
            <li><a href="#new" class="footer__link">New</a></li>
          </ul>
        </div>

        <div class="footer__box">
          <h3 class="footer__title">SUPPERT</h3>

          <ul>
            <li><a href="#home" class="footer__link">Product Help</a></li>
            <li><a href="#featured" class="footer__link">Customer Care</a></li>
            <li><a href="#wome" class="footer__link">Athorized service</a></li>
          </ul>
        </div>
        <div class="footer__box">
          <a href="#" class="footer__social"><i class="bx bxl-facebook"></i></a>
          <a href="#" class="footer__social"
            ><i class="bx bxl-instagram"></i
          ></a>
          <a href="#" class="footer__social"><i class="bx bxl-twitter"></i></a>
          <a href="#" class="footer__social"><i class="bx bxl-google"></i></a>
        </div>
      </div>

      <p class="footer__copy">&#169; 2023 Álvaro & Lyonel. All rights reserved</p>
    </section>
    <!--===== MAIN JS =====-->
    <script src="static/js/main.js"></script>
</body>
</html>