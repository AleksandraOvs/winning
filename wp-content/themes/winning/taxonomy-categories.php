<?php get_header() ?>

<?php
if ( have_posts() ){
	while ( have_posts() ){
		the_post();
		the_title();
	}
} else {
	echo wpautop( 'Постов для вывода не найдено.' );
}
?>
<?php get_footer() ?>