<?php
  include '../SneakStil/includes/templates/header.php'
  
?>

      <!--===== HOME =====-->
      <section class="home" id="home">
        <div class="home__container bd-grid">
          <div class="home__sneaker">
            <div class="home__shape"></div>
            <img src=".\img\imghome.png" alt="" class="home__img" />
          </div>
          <div class="home__data">
            <span class="home__new">New in</span>
            <h1 class="home__title">Yeezy Boost 350 V2 <br /> Beluga Reflective </h1>
            <p class="home__description">Explore the new collection of sneaker</p>
            <a href="shop.php" class="button">Explore now</a>
          </div>
        </div>
      </section>
      <!--===== FEATURED =====-->
      <section class="featured section" id="featured">
        <h2 class="section-title">FEATURED</h2>

        <div class="featured__container bd-grid">
          <article class="sneaker">
            <img src=".\img\air-jordan-1-retro-high-travis-scott-cactus-jack.jpg" alt="" class="sneaker__img" />
            <span class="sneaker__name">Jordan 1 Retro High OG SP Travis Scott Mocha</span>
            <span class="sneaker__preci">1.366€</span>
            <a href=".\product.php" class="button-light">Add to Cart <i class="bx bx-right-arrow-alt button-icon"></i></a>
          </article>

          <article class="sneaker">
            <img src=".\img\air-jordan-4-military-black-removebg-preview.png" alt="" class="sneaker__img" />
            <span class="sneaker__name">Jordan 4 Retro  Military Black</span>
            <span class="sneaker__preci">546€</span>
            <a href="" class="button-light">Add to Cart <i class="bx bx-right-arrow-alt button-icon"></i></a>
          </article>

          <article class="sneaker">
            <img src=".\img\a-ma-maniere-air-jordan-3-sp-dh3434-110-lateral.jpeg-removebg-preview.png" alt="" class="sneaker__img" id = "jrd3" />
            <span class="sneaker__name" id = "jrd3">Jordan 3 Retro SP A Ma Maniére</span>
            <span class="sneaker__preci">461€</span>
            <a href="" class="button-light">Add to Cart <i class="bx bx-right-arrow-alt button-icon"></i></a>
          </article>
        </div>
      </section>
      <!--===== COLLECTION =====-->
      <section class="collection section">
        <div class="collection__container bd-grid">
          <div class="collection__card">
            <div class="collection__data">
              <h3 class="collection__name">Men's</h3>
              <p class="collection__description">New collection 2023</p>
              <a href="shop.php" class="button-light">Buy Now <i class="bx bx-right-arrow-alt button-icon"></i></a>
            </div>
            <img src=".\img\0280418168e64ee1339cd6c011e79ebd-removebg-preview.png" alt=""class="collection__img"/>
          </div>

          <div class="collection__card">
            <div class="collection__data">
              <h3 class="collection__name">Women's</h3>
              <p class="collection__description">New collection 2023</p>
              <a href="shop.php" class="button-light">Buy Now <i class="bx bx-right-arrow-alt button-icon"></i></a>
            </div>
            <img src=".\img\76aba495949b8a4392da6ce5ae3f3582-removebg-preview.png" alt="" class="collection__img" id = "wmns"/>
          </div>
        </div>
      </section>
      <!--===== WOMEN SNEAKERS =====-->
      <section class="women section" id="women">
        <h2 class="section-titlew"></h2>
        <div class="women__container bd-grid">
          <article class="sneaker">
            <div class="sneaker__sale">Sale</div>
            <img src=".\img\Air-Jordan-4-Canyon-Purple-AQ9129-500-Release-Date-removebg-preview.png" alt="" class="sneaker__img" />
            <span class="sneaker__name">Jordan 4 Retro Canyon Purple</span>
            <span class="sneaker__preci">289€</span>
            <a href="" class="button-light">Add to Cart <i class="bx bx-right-arrow-alt button-icon"></i></a>
          </article>
          <article class="sneaker">
            <div class="sneaker__sale">Sale</div>
            <img src=".\img\5272b4c607ba1f787487d8d486c7a2acd8eabd97-1070x760-removebg-preview.png" alt="" class="sneaker__img" />
            <span class="sneaker__name">Jordan 4 Frozen Moments</span>
            <span class="sneaker__preci">284€</span>
            <a href="" class="button-light">Add to Cart <i class="bx bx-right-arrow-alt button-icon"></i></a>
          </article>
          <article class="sneaker">
            <div class="sneaker__sale">Sale</div>
            <img src=".\img\Womens-Air-Jordan-11-Midnight-Navy-AR0715-441-Release-Date-1068x728-1-removebg-preview.png" alt="" class="sneaker__img" />
            <span class="sneaker__name">Jordan 11 Retro Midnight Navy</span>
            <span class="sneaker__preci">120€</span>
            <a href="" class="button-light">Add to Cart <i class="bx bx-right-arrow-alt button-icon"></i></a>
          </article>
          <article class="sneaker">
            <div class="sneaker__sale">Sale</div>
            <img src=".\img\s-l1200-removebg-preview.png" alt="" class="sneaker__img" />
            <span class="sneaker__name">Jordan 1 Mid SE Fearless Melody Ehsani</span>
            <span class="sneaker__preci">885€</span>
            <a href="" class="button-light">Add to Cart <i class="bx bx-right-arrow-alt button-icon"></i></a>
          </article>
        </div>
      </section>

      <!--===== OFFER =====-->
      <section-offer class="section">
        <div class="offer__container bd-grid">
          <div class="offer__data">
            <h3 class="offer__title">50% OFF</h3>
            <p class="offer__description">on the 2022 Collection! </p>
            <a href="shop.php" class="button">Shop Now</a>
          </div>
          <img src=".\img\536656ebed743b8b607a473303352cf5-removebg-preview.png" alt="" class="offer__img" />
        </div>
      </section-offer>

      <!--===== NEW COLLECTION =====-->
      <section class="new section" id="new">
        <h2 class="section-title">NEW COLLECTION</h2>
        <div class="new__container bd-grid">
          <div class="new__mens">
            <img src=".\img\new1.png" alt="" class="new__mens-img" />
            <h3 class="new__title">Mens Shoes</h3>
            <span class="new__preci">From $79.99</span>
            <a href="shop.php" class="button-light">View Collection <i class="bx bx-right-arrow-alt button-icon"></i></a>
          </div>
          <div class="new__sneaker">
            <div class="new__sneaker-card">
              <img src=".\img\1 (1).png" alt="" class="new__sneaker-img" />
              <div class="new__sneaker-overlay">
                <a href="" class="button">Add to Cart</a>
              </div>
            </div>

            <div class="new__sneaker-card">
              <img src=".\img\jordan-2-retro-low-sp-off-white-white-red-2-removebg-preview.png" alt="" class="new__sneaker-img" />
              <div class="new__sneaker-overlay">
                <a href="#" class="button">Add to Cart</a>
              </div>
            </div>

            <div class="new__sneaker-card">
              <img src=".\img\Air-Jordan-11-White-Gold-CT8012-170-Release-Date-removebg-preview.png" alt="" class="new__sneaker-img" />
              <div class="new__sneaker-overlay">
                <a href="#" class="button">Add to Cart</a>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!--===== NEWSLETTER =====-->
      <section class="newsletter section">
        <div class="newsletter__container bd-grid">
          <div>
            <h3 class="newsletter__title"> Subscribe And Get <br /> 10% OFF</h3>
            <p class="newsletter__description"> Get 10% discount for all products </p>
          </div>

          <form action="" class="newsletter__subscribe">
            <input type="text"placeholder="@email.com"class="newsletter__input"/>
            <a href="" class="button">Subscribe</a>
          </form>
        </div>
      </section>
    </main>

    <?php
      include '../SneakStil/includes/templates/footer.php'
    ?>
    
    