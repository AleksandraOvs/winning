<div class="products__slider-main js-slider-main-1">
  <div class="products__big-img-wrap" data-slick-index="">
    <?php
      $default_attr = array(
      'class' => "products__big-img"
      );
      echo get_the_post_thumbnail(null, 'full', $default_attr);
    ?>
  </div>
</div>

                                