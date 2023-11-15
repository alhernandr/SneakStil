<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- ===== CSS ===== -->
    <link rel="stylesheet" href="/SneakStil\static\css\styles.css" />

    <!-- ===== BOX ICONS ===== -->
    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css"rel="stylesheet"/>
    <link rel="icon" href="/../../img/logo.png">
    <title>SneakStil</title>
  </head>
  <body>
    <!--===== HEADER =====-->
    <header class="l-header" id="header">
      <nav class="nav bd-grid">
        <div class="nav__toggle" id="nav-toggle">
          <i class="bx bxs-grid"></i>
        </div>
        <a href="/SneakStil/index.php" class="nav__logo"><img class="logo" src="/SneakStil/img/logo.png" alt=""></a> 

        <div class="nav__menu" id="nav-menu">
          <ul class="nav__list">
            <li class="nav__item">
              <a href="/SneakStil/index.php" class="nav__link">Home</a>
            </li>
            <li class="nav__item">
              <a href="/SneakStil\index.php#featured" class="nav__link">Featured</a>
            </li>
            <li class="nav__item">
              <a href="/SneakStil\index.php#women" class="nav__link">Women</a>
            </li>
            <li class="nav__item">
              <a href="/SneakStil\index.php#new" class="nav__link ">New</a>
            </li>
            <li class="nav__item">
              <a href="/SneakStil\shop.php" class="nav__link">Shop</a>
            </li>
          </ul>
        </div>
        
          <?php
            require '/SneakStil/SneakStil/validation.php';
            $auth=esAutentificado();
            if(!$auth) { ?>
            <a href="\SneakStil\login.php"><i class="bx bx-user"></i></a>
        <?php }else{ ?>
            <a href="logout.php" class="nav_logout">Log Out</a>
        <?php } ?>
        <div class="nav__shop">
        <a href="/SneakStil\basket.php"><i class="bx bx-shopping-bag"></i></a>
        </div>
      </nav>
    </header>
    <main class="l-main"></main>