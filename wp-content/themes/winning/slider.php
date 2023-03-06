<?php 
$terms = get_terms( 'categories' );

if( $terms && ! is_wp_error( $terms ) ){ ?>
	
        <div class="products__slider js-products-slider">


    <?php
	foreach( $terms as $term ){ ?>
        <div class="products__item-wrap">
            <div class="products__item">
                <div class="products__sliders">
                    
                
                    <?php
                        $args = array(
                            'post_type' => 'products',
                            'categories' => $term->slug
                        );
                        $query = new WP_Query( $args );
                        while ( $query->have_posts() ) : $query->the_post();
                    ?>
                    <?php get_template_part('products-parts/entry-prod'); ?>
                    <?php
                        endwhile;
                    ?>
                    
                </div>
            </div>
        </div>
         <?php
            // echo '<div class="products__name">'. esc_html( $term->name ) .'</div>';
            // echo '<div class="products__discr">'. esc_html( $term->description ) .'</div>';
         ?>  
	<?php	// echo '<li>'. esc_html( $term->name ) .'</li>';
	}
    ?>
	      </div>
 <?php }

?>




