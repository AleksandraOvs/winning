<?php get_header() ?>
<section class="promo section _pt-0">
    <div class="container">
      <div class="promo__inner">
        <div class="promo__content">
          <div class="promo__title">
          <?php echo carbon_get_post_meta(get_the_ID(), 'crb_main_header'); ?>
          </div>
          <div class="promo__subtitle">
          <?php echo carbon_get_post_meta(get_the_ID(), 'crb_main_header_description'); ?>
          </div>
          <div class="promo__timer" id="timer" data-time="57600">
            <div class="promo__timer-wrap">
              <div class="promo__timer-item">
                <span id="time-hour">0</span>
              </div>
            </div>
            <span class="promo__timer-dec">:</span>
            <div class="promo__timer-wrap">
              <div class="promo__timer-item">
                <span id="time-minute">0</span>
              </div>
            </div>
            <span class="promo__timer-dec">:</span>
            <div class="promo__timer-wrap">
              <div class="promo__timer-item">
                <span id="time-seconds">0</span>
              </div>
            </div>
          </div>
          <a class="promo__btn btn js-to-section" href="#products">
            Перейти к каталогу
          </a>
        </div>
        <div class="promo__video-wrap">
            <?php
                $pic = carbon_get_post_meta(get_the_ID(), 'crb_hero_picture' );
                if (!empty($pic)) :
                ?>
                <img class="promo__img" width="620" height="450" src="<?php echo $pic; ?>" alt="promo">
                <?php
                endif;
                ?>
        
        </div>
      </div>

      <?php
      $crb_link = carbon_get_post_meta(get_the_ID(), 'crb_video_link');
      ?>

      <?php if (!empty($crb_link)) : ?>
      <div class="promo__video">
        <div class="promo__video-wrap">
          <a class="promo__video-link" target="_blank" href="<?php echo $crb_link;?>">
            <iframe width="100%" height="450" src="<?php echo $crb_link;?>"
              title="YouTube video player" frameborder="0"
              allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
              allowfullscreen></iframe>
          </a>
          <a class="promo__btn promo__btn_mob btn js-to-section" href="#products">
            Перейти к каталогу
          </a>
        </div>
      </div>
        <?php endif; ?>
    </div>
  </section>

  <section class="about" id="about">
    <div class="container">
      <div class="about__inner">
        <div class="about__title">
          Winning
        </div>
        <div class="about__text">
          <?php echo carbon_get_post_meta(get_the_ID(), 'crb_about'); ?>
        </div>
      </div>
    </div>
  </section>

  <section class="delivery section _pb-0" id="delivery">
    <div class="container">
      <div class="delivery__title title">
        Доставка и гарантия
      </div>
      <div class="delivery__inner">
        <div class="delivery__item">
          <img class="delivery__img" width="90" height="90" src="images/icon/punkt.svg" alt="punkt">
          <div class="delivery__text">
            Отправляем любым доступным и удобным для вас способом! Так же есть возможность самовывоза из нашего офиса в
            Москве.
          </div>
        </div>
        <div class="delivery__item">
          <img class="delivery__img" width="90" height="90" src="images/icon/punkt.svg" alt="punkt">
          <div class="delivery__text">
            Мы проверяем каждое изделие перед отправкой не смотря на то что специалисты компании Winning неоднократно
            проверяют каждое изделие перед каждой продажей.
          </div>
        </div>
      </div>
    </div>
  </section>


  <?php if($fdb_items = carbon_get_post_meta(get_the_ID(), 'feedbacks' ) ) { ?>
  <section class="reviews section _pb-0" id="reviews">
    <div class="container">
      <div class="reviews__title title">
        Отзывы
      </div>
      <div class="reviews__slider js-reviews-slider">
      <?php foreach ($fdb_items as $fdb_item) { ?>
        <div class="reviews__slide-wrap">
          <div class="reviews__slide">

            <div class="reviews__slide-top">
            <?php
                          $fdb_img_url = wp_get_attachment_image_url($fdb_item['crb_fdb_photo'], 'full');
                          ?>
              <img class="reviews__avatar" src="<?php echo $fdb_img_url; ?>" alt="avatar" width="60" height="60">
              <div class="reviews__name">
                <?php echo $fdb_item['crb_fdb_name'];?>
              </div>
            </div>
            <div class="reviews__text">
              <?php echo $fdb_item['crb_fdb_text'];?>
            </div>
            <div class="reviews__bottom">
              <img class="reviews__stars" width="100" height="20" src="<?php echo get_stylesheet_directory_uri() . '/images/reviews/star.svg' ?>" alt="star">
              <div class="reviews__date">
                <?php echo $fdb_item['crb_fdb_date'];?>
              </div>
            </div>
          </div>
        </div>
      <?php }?>
      
      </div>
    </div>
  </section>
  <?php } ?>

   
  <section class="advantages section _pb-0">
    <?php if($adv_items = carbon_get_post_meta(get_the_ID(), 'advantages' ) ) {?> 
    <div class="container">
      
   
      <div class="advantages__title title">
        <?php echo carbon_get_post_meta(get_the_ID(), 'crb_block_name'); ?>
      </div>
    </div>
    <div class="advantages__inner">
      <div class="container">
        <ul class="advantages__list">
          <?php
            $i = 1;
            foreach ($adv_items as $adv_item) {?>
          <li class="advantages__item">
            <div class="advantages__num">
              <?php echo $i++?>
            </div>
            <div class="advantages__text">
              <?php echo $adv_item['crb_adv_text'] ?>
            </div>
          </li>
           <?php } ?>
        </ul>
      </div>
    </div>
    <?php } ?>
  </section>
  
  <section class="info section _pb-0">
  <?php if($adv2_items = carbon_get_post_meta(get_the_ID(), 'advantages2' ) ) { ?> 
    <div class="container">
      <div class="info__inner">
      <?php 
      foreach ($adv2_items as $adv2_item) { ?>
      
        <div class="info__item">
          <?php $adv2_img_url = wp_get_attachment_image_url($adv2_item['crb_adv2_img'], 'full'); ?>
          <img class="info__img" src="<?php echo $adv2_img_url ?>" alt="info">
          <div class="info__text">
          <?php echo $adv2_item['crb_adv2_text']; ?>
          </div>
          </div>
       <?php }?> 
      </div>
    </div>
    <?php } ?>
  </section>

<section class="section products" id="products">
    <div class="container">
      <div class="products__title title">Товары</div>
    </div>
    <div class="products__slider-wrap">
      <div class="container">
        <div class="products__slider js-products-slider">

          <?php

          $categories_arr = get_terms([
            'taxonomy' => 'categories',
            'hide_empty' => false,
          ]);

// print_r($categories_arr);

// $photos = get_field('photos', 'categories_17', 'option');
// print_r($photos);


          ?>


          <?php 

          foreach ($categories_arr as $key => $term) {
            // print_r($term);
            $name = $term->name;
            $description = $term->description; 
            $term_id = $term->term_id;
            $photos = get_field('photos', 'categories_'.$term_id, 'option');
              // $colors = get_field('category_colors', 'categories_'.$term_id, 'option');
            $razmeri = get_field('category_razmeri', 'categories_'.$term_id, 'option');

              // print_r($photos);
              // print_r($colors);
              // print_r($razmeri);
            ?>

            <div class="products__item-wrap">

              <div class="products__item">
                <div class="products__sliders">
                  <div class="products__slider-left js-slider-left-<?php echo $key + 1; ?>">

                    <?php 

                    foreach($photos as $key2 => $photo_data){
                      ?>
                      <div class="products__small-img-wrap">
                        <img class="products__small-img" src="<?php echo $photo_data['photo']; ?>" alt="product">
                      </div>
                      <?php
                    }

                    ?>

                  </div>

                  <div class="products__slider-main js-slider-main-<?php echo $key + 1; ?>">

                    <?php 

                    foreach($photos as $key2 => $photo_data){
                      ?>
                      <div class="products__big-img-wrap">
                        <img class="products__big-img" src="<?php echo $photo_data['photo']; ?>" alt="product">
                      </div>
                      <?php
                    }

                    ?>

                  </div>

                </div>




                <div class="products__content">
                  <div class="products__name">
                    <?php echo $name; ?>
                  </div>
                  <div class="products__discr">
                    <?php echo $description; ?>
                  </div>
                  <div class="products__colors">
                    <?php 
                    foreach($photos as $key2 => $photo_data){
                      ?>

                      <div class="input input-colors">
                        <input class="input-colors__input" type="radio" name="pr-c-<?php echo $key + 1; ?>" id="pr-c-<?php echo $key + 1; ?>-<?php echo $key2; ?>" value="<?php echo $key2; ?>">
                        <label class="input-colors__label" for="pr-c-<?php echo $key + 1; ?>-<?php echo $key2; ?>" style="background-color: <?php echo $photo_data['color']; ?>;"></label>
                      </div>

                      <?php
                    }
                    ?>
                  </div>
                  <div class="products__sizes">

                    <?php 

                    foreach($razmeri as $key2 => $razmer){
                      ?>

                      <div class="input input-sizes">
                        <input class="input-sizes__input" type="radio" name="pr-s-<?php echo $key + 1; ?>" id="pr-s-<?php echo $key + 1; ?>-<?php echo $key2 + 1; ?>">
                        <label class="input-sizes__label" for="pr-s-<?php echo $key + 1; ?>-<?php echo $key2 + 1; ?>">
                          <?php echo $razmer['razmer']; ?>
                        </label>
                      </div>

                      <?php
                    }

                    ?>
                    
                  </div>
                  <a class="products__link btn popup--link" href="#popup">
                    оформить заказ
                  </a>
                </div>

              </div>
            </div>

            <?php

          }

          ?>


        </div>
      </div>
    </div>

    <div class="products__slider-rule">
      <div class="products__slider-arrow">
        <img class="products__slider-arrow-img products__slider-arrow_prev slick-arrow" src="<?php echo get_template_directory_uri();?>/images/icon/arrow-prev.svg" width="13" height="28" alt="arrow" aria-disabled="false" style="">
      </div>
      <div class="products__slider-dots">
        <ul class="slick-dots" role="tablist" style="">
          <li class="" role="presentation"><button type="button" role="tab" id="slick-slide-control10" aria-controls="slick-slide10" aria-label="1 of 4" tabindex="-1">1</button></li>
          <li role="presentation" class="slick-active"><button type="button" role="tab" id="slick-slide-control11" aria-controls="slick-slide11" aria-label="2 of 4" tabindex="0" aria-selected="true">2</button></li>
          <li role="presentation"><button type="button" role="tab" id="slick-slide-control12" aria-controls="slick-slide12" aria-label="3 of 4" tabindex="-1">3</button></li>
          <li role="presentation"><button type="button" role="tab" id="slick-slide-control13" aria-controls="slick-slide13" aria-label="4 of 4" tabindex="-1">4</button></li>
        </ul>
      </div>
      <div class="products__slider-arrow products__slider-arrow_next slick-arrow" aria-disabled="false" style="">
        <img class="products__slider-arrow-img" src="<?php echo get_template_directory_uri();?>/images/icon/arrow-prev.svg" width="13" height="28" alt="arrow">
      </div>
    </div>
  </section>

  <style type="text/css">

    .products__slider-dots .slick-dots:first-child {
      display: none;
    }




  </style>

<?php get_footer(); ?>