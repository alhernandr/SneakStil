<?php

/**
 * Verifica si el usuario está autenticado.
 *
 * @return bool Devuelve true si el usuario está autenticado, de lo contrario, false.
 */
function esAutentificado(): bool
{
    session_start();
    $auth = $_SESSION["login"] ?? null;
    if ($auth) {
        return true;
    }
    return false;
}

$auth = esAutentificado();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <!-- ===== CSS ===== -->
    <link rel="stylesheet" href="../../build/css/styles.css"/>

    <!-- ===== BOX ICONS ===== -->
    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet"/>
    <link rel="icon" href="../../build/img/logo.png">
    <title>SneakStil</title>
</head>
<body>
<!--===== HEADER =====-->
<header class="l-header" id="header">
    <nav class="nav bd-grid">
        <div class="nav__toggle" id="nav-toggle">
            <i class="bx bxs-grid"></i>
        </div>
        <a href="/" class="nav__logo"><img class="logo" src="../../build/img/logo.png" alt=""></a>

        <div class="nav__menu" id="nav-menu">
            <ul class="nav__list">
                <li class="nav__item">
                    <a href="/" class="nav__link">Home</a>
                </li>
                <li class="nav__item">
                    <a href="/#featured" class="nav__link">Featured</a>
                </li>
                <li class="nav__item">
                    <a href="/#women" class="nav__link">Women</a>
                </li>
                <li class="nav__item">
                    <a href="/#new" class="nav__link ">New</a>
                </li>
                <li class="nav__item">
                    <a href="/shop" class="nav__link">Shop</a>
                </li>
            </ul>
        </div>

        <?php if (!$auth) { ?>
            <a href="/login"><i class="bx bx-user"></i></a>
        <?php } else { ?>
            <a href="/logout" class="nav_logout">Log Out</a>
        <?php } ?>
        <div class="nav__shop">
            <a href="/basket"><i class="bx bx-shopping-bag"></i></a>
        </div>
    </nav>
</header>
<!-- <main class="l-main"></main> -->

<?= $contenido ?>

<!--===== FOOTER =====-->
<section class="footer section">
    <div class="footer__container bd-grid">
        <div class="footer__box">
            <h3 class="footer__title">SneakStil</h3>
            <a href="index.php" class="nav__logo"><img class="logo" src="../../build/img/logo.png" alt=""
                                                       id="footer_logo"></a>
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
            <a href="https://www.facebook.com/" class="footer__social"><i class="bx bxl-facebook"></i></a>
            <a href="https://www.instagram.com/?hl=es" class="footer__social"><i class="bx bxl-instagram"></i></a>
            <a href="https://twitter.com/home" class="footer__social"><i class="bx bxl-twitter"></i></a>
        </div>
    </div>

    <p class="footer__copy">&#169; 2024 Álvaro & Lyonel. All rights reserved</p>
</section>
<!--===== MAIN JS =====-->
<script src="static/js/main.js"></script>
</body>
</html>
