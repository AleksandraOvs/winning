</main>

<footer class="footer">

  <div class="container">
    <div class="footer__inner">

      <div class="footer__logo-inner">
        <a href="/" class="footer__logo logo">
        
  <?php
  $footer_logo = get_theme_mod('footer_logo');
  $img = wp_get_attachment_image_src($footer_logo, 'full');
  if ($img) :
    ?>
    <img src="<?php echo $img[0]; ?>" alt="">
  <?php endif; ?>
</a>
    
      </div>

      <div class="footer__menu-inner">

      <?php 
                if( has_nav_menu( 'foot_menu' )) {
                    wp_nav_menu( array(
                        'theme_location' => 'foot_menu',
                        'container' => 'nav',
                        'container_class' => 'footer__menu',
                        'items_wrap' => '<ul class="footer__menu-list">%3$s</ul>',
                        //'depth' => 2,
                        //'walker' => new Site_Nav()
                    ));
                }
            ?>   
      </div>

      <div class="footer__contact-inner">
      <?php 
if( $contacts = carbon_get_theme_option('footer_contacts' ) ) {
    ?>
    <ul class="footer__social social">
        <?php
	foreach( $contacts as $contact ) {
    ?>
     <li class="social__item">
    <a href="<?php echo $contact[ 'footer_contact_link']; ?>" class="social__link">
  <?php
    $thumb_contact = wp_get_attachment_image_url( $contact['footer_contact_image'], 'full' );
?>
<img class="social__img" width="25" height="25" src="<?php echo $thumb_contact; ?>" alt="<?php echo $contact[ 'footer_contact_name']; ?>">
  </a>
    </li>
<?php
	}
    ?>
    </ul>
    <?php
}
?>
 <a class="footer__tel" href="<?php echo carbon_get_theme_option('footer_tel_contact_link' ) ?>">
 <?php echo carbon_get_theme_option('footer_tel_contact' ) ?>
        </a>
      </div> 
    </div>
    <div class="footer__copyright">
    <?php bloginfo( 'name' ); ?> — <?php the_date('Y'); ?>© ALL RIGHTS RESERVED
    </div>
    <a class="footer__politics footer__copyright popup--link" href="#politics">
      Политика конфиденциальности
    </a>
  </div>

</footer>

<div id="popup" class="popup ">
  <div class="popup__body">
    <div class="popup__content feedback__content">
      <div class="pop-up__inner">
        <div class="pop-up__title">
          Для оформления заказа укажите свои данные и мы Вам перезвоним
        </div>
        <form class="pop-up__form" action="#">
          <div class="pop-up__input-inner">
            <div class="pop-up__input-line">
              <div class="pop-up__input">
                <input class="pop-up__input-input" type="text" placeholder="ФИО" id="name">
                <label class="pop-up__label" for="name">ФИО</label>
              </div>
            </div>
            <div class="pop-up__input-line">
              <div class="pop-up__input">
                <input class="pop-up__input-input" type="tel" placeholder="+8 (999) 999-99-99" id="name">
                <label class="pop-up__label" for="tel">+8 (999) 999-99-99</label>
              </div>
            </div>
            <div class="pop-up__input-line">
              <div class="pop-up__input">
                <input class="pop-up__input-input" type="email" placeholder="E-mail" id="name">
                <label class="pop-up__label" for="tel">E-mail</label>
              </div>
            </div>
          </div>
          <div class="pop-up__check">
            <div class="pop-up__input">
              <input class="pop-up__input-check" type="checkbox" placeholder="check" id="check">
              <label class="pop-up__label-check" for="check"> <span>Заполняя форму, вы даете согласие на <a class="popup--link" href="#politics"> обработку
                персональных данных</a></span> </label>
            </div>
          </div>
          <button class="pop-up__btn btn" type="submit">
            Отправить
          </button>
        </form>
      </div>
      <a href="#" class="popup__close popup--close">
        <svg class="popup__close-img" width="12" height="12" viewBox="0 0 12 12" fill="none"
          xmlns="http://www.w3.org/2000/svg">
          <path d="M11 1L1 11" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
          <path d="M11 11L1 1" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
        </svg>
      </a>


    </div>
  </div>
</div>
<div id="politics" class="popup politics">
  <div class="popup__body">
    <div class="popup__content ">
      
      <div class="politics__inner">
        <h2>
          Lorem ipsum dolor 
        </h2>
        <p>
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic aliquam, explicabo quis maxime, porro cumque possimus optio laboriosam, quaerat culpa assumenda? Impedit id alias soluta necessitatibus dolorem exercitationem deserunt ut.
        </p>
        <ul>
          <li>
            1.1 Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet quidem architecto veniam nam dicta, ut iure repellendus magni repudiandae necessitatibus assumenda non laboriosam, alias eligendi hic voluptatum illo nobis quis!
          </li>
          <li>
            1.2 Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet quidem architecto veniam nam dicta, ut iure repellendus magni repudiandae necessitatibus assumenda non laboriosam, alias eligendi hic voluptatum illo nobis quis!
          </li>
          <li>
            1.3 Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet quidem architecto veniam nam dicta, ut iure repellendus magni repudiandae necessitatibus assumenda non laboriosam, alias eligendi hic voluptatum illo nobis quis!
          </li>
        </ul>
        <h3>
          Lorem ipsum dolor 
        </h3>
      </div>

      <a href="#" class="popup__close popup--close">
        <svg class="popup__close-img" width="12" height="12" viewBox="0 0 12 12" fill="none"
          xmlns="http://www.w3.org/2000/svg">
          <path d="M11 1L1 11" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
          <path d="M11 11L1 1" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
        </svg>
      </a>


    </div>
  </div>
</div>
<?php wp_footer(); ?>

</body>

</html>