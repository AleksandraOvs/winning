<div class="products__slider-left js-slider-left-1">
    <div class="products__small-img-wrap" data-slick-index="<?php get_the_ID();?>">
            <?php
            $default_attr = array(
            'class' => "products__small-img"
            );
            echo get_the_post_thumbnail(null, 'full', $default_attr);
            ?>                               
    </div>
</div>




                                    