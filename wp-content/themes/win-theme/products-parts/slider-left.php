<?php 
                $args = array (
                    'post_type' => 'products',
                    'order' => 'ASC',
                    'orderby' => 'date',
                    'posts_per_page' => -1
                    );
                        $query = new WP_Query($args);
                            if ($query->have_posts() ){ ?>
                                <div class="products__slider-left js-slider-left-1">
                                    <?php while($query->have_posts() ){
                                        $query->the_post();
                                    ?>
                                        <div class="products__small-img-wrap" data-slick-index="<?php get_the_ID();?>">
                                            <?php
                                                $default_attr = array(
                                                    'class' => "products__small-img"
                                                );
                                                echo get_the_post_thumbnail(null, 'full', $default_attr); ?>
                                        </div>
                                    <?php } ?>
                                    </div><!-- ./end of js-slider-left-1 -->
                            <?php
                                //wp_reset_postdata();
                                } ?>