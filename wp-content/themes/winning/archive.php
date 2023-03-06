<?php get_header() ?>
   <section>
    <div class="container">
        <?php
            if (have_posts() ){ ?>
                <div class="products__slider-wrap">
                    <?php
                while ( have_posts() ) : the_post(); 
                    //get_template_part();  
                    ?>
                        
                            <?php echo the_post_thumbnail(); ?>
                        
                    <?php
                   
                endwhile;
                ?>
                </div>
                <?php
            }
        ?>

<?php echo custom_pagination(); ?>
    </div>
   </section>
<?php get_footer() ?>