<?php get_header(); ?>
<section>
<div class="products__slider-wrap">
    <div class="container">
        <div class="products__slider">
            <div class="container">
                <div class="products__item">
                    <div class="products__sliders">

                        <div class="products__item-wrap">
                            <div class="products__item">
                                <div class="products__sliders">
                                    <?php //get_template_part('products-parts/slider-left'); ?>
                                    <div class="products__slider-main js-slider-main-1">
                                            
                                        <?php get_template_part('products-parts/main-slider');?>
                                    </div><!-- ./end of js-slider-main-1 -->
                                    </div><!-- ./end of products__sliders -->

                                <div class="products__content">    
                                    <?php get_template_part('products-parts/main-content');?>
                                </div>

                                </div><!-- ./end of products__item -->  
                        </div> <!-- ./end of products__item-wrap -->

                    </div>
                <div>
            </div>
        </div>
    </div>
</div>
</section>
<?php get_footer(); ?>