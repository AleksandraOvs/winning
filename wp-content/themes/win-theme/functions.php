<?php

// added Carbon Fields

require get_stylesheet_directory() . '/inc/carbon-fields/carbon-fields-plugin.php';

add_action('carbon_fields_register_fields', 'crb_register_custom_fields');
function crb_register_custom_fields(){
    require_once __DIR__.'/inc/post-meta.php';
	require_once __DIR__.'/inc/theme-options.php';
}


add_action ('wp_enqueue_scripts', 'vidi_scripts');
function vidi_scripts(){
    wp_deregister_script('jquery');
    wp_enqueue_script ('jquery', get_stylesheet_directory_uri() . '/libs/jquery.min.js', array(), null, true);
    wp_enqueue_script ('slick_scripts', get_stylesheet_directory_uri() . '/libs/slick.min.js', array('jquery'), null, true);
    wp_enqueue_script ('main_scripts', get_stylesheet_directory_uri() . '/js/main.js', array('jquery'), null, true);

    wp_enqueue_style ('slick_styles', get_stylesheet_directory_uri() . '/libs/slick.css', array(), time());
    wp_enqueue_style ('wp_styles', get_stylesheet_directory_uri() . '/css/wp-styles.css', array(), time());
    wp_enqueue_style ('main_styles', get_stylesheet_directory_uri() . '/css/style.min.css', array(), time());
    wp_enqueue_style ('add_styles', get_stylesheet_directory_uri() . '/css/add-style.css', array(), time());
   
    };

add_action( 'admin_enqueue_scripts', function(){
        wp_enqueue_style( 'my_wp_admin', get_template_directory_uri() .'/css/wp-admin.css' );
      }, 99 );

add_action ('after_setup_theme', 'gut_styles');

function gut_styles(){
	add_theme_support('editor-styles');
	add_editor_style('css/style-gutenberg.css');
}


register_nav_menus(array(
        'head_menu' => 'Главное меню',
        'foot_menu' => 'Меню в футере'
));

add_theme_support('post-thumbnails');

add_filter( 'nav_menu_css_class', 'change_menu_item_css_classes', 10, 4 );

function change_menu_item_css_classes( $classes, $item, $args, $depth ) {
	if ( 'head_menu' === $args->theme_location ) {
		$classes = [ 'menu__item' ];
	} 
    
    if ('foot_menu' === $args->theme_location){
        $classes = ['footer__menu-item'];
    }

	return $classes;
}

add_filter( 'nav_menu_link_attributes', 'my_nav_link_filter', 10, 4 );
function my_nav_link_filter( $atts, $item, $args){
  //$atts['class'] = 'menu__link';//для всех
   if( $args->theme_location == ('head_menu') ){
     $atts['class'] = 'menu__link';
   }

   if( $args->theme_location == ('foot_menu') ){
    $atts['class'] = 'footer__menu-link';
  }
  return $atts;
}


function my_customize_register( $wp_customize ) {
    $wp_customize->add_setting('header_logo', array(
        'default' => '',
        'sanitize_callback' => 'absint',
    ));

    $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'header_logo', array(
        'section' => 'title_tagline',
        'label' => 'Логотип Header'
    )));
    $wp_customize->add_setting('footer_logo', array(
        'default' => '',
        'sanitize_callback' => 'absint',
    ));

    $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'footer_logo', array(
        'section' => 'title_tagline',
        'label' => 'Логотип Footer'
    )));

}
add_action( 'customize_register', 'my_customize_register' );

add_filter( 'excerpt_length', function(){
	return 5;
} );
add_filter( 'excerpt_more', function( $more ) {
	return '...';
} );

// хук для регистрации
add_action( 'init', 'create_taxonomy' );
function create_taxonomy(){

	// список параметров: wp-kama.ru/function/get_taxonomy_labels
	register_taxonomy( 'taxonomy', [ 'products' ], [
		'label'                 => 'products_category', // определяется параметром $labels->name
		'labels'                => [
			'name'              => 'Категории товаров',
			'singular_name'     => 'Категории товаров',
			'search_items'      => 'Search',
			'all_items'         => 'All',
			'view_item '        => 'View',
			//'parent_item'       => 'products',
			//'parent_item_colon' => 'Parent Genre:',
			'edit_item'         => 'Редактировать',
			'update_item'       => 'Обновить',
			'add_new_item'      => 'Создать',
			'new_item_name'     => 'Новое имя',
			'menu_name'         => 'Категории товаров',
			'back_to_items'     => '← Back to Genre',
		],
		'description'           => 'Категории товаров (описание)', // описание таксономии
		'public'                => true,
		// 'publicly_queryable'    => null, // равен аргументу public
		// 'show_in_nav_menus'     => true, // равен аргументу public
		// 'show_ui'               => true, // равен аргументу public
		// 'show_in_menu'          => true, // равен аргументу show_ui
		// 'show_tagcloud'         => true, // равен аргументу show_ui
		// 'show_in_quick_edit'    => null, // равен аргументу show_ui
		'hierarchical'          => true,

		'rewrite'               => true,
		//'query_var'             => $taxonomy, // название параметра запроса
		'capabilities'          => array(),
		'meta_box_cb'           => null, // html метабокса. callback: `post_categories_meta_box` или `post_tags_meta_box`. false — метабокс отключен.
		'show_admin_column'     => false, // авто-создание колонки таксы в таблице ассоциированного типа записи. (с версии 3.5)
		'show_in_rest'          => false, // добавить в REST API
		'rest_base'             => null, // $taxonomy
		// '_builtin'              => false,
		//'update_count_callback' => '_update_post_term_count',
	] );
}

add_action( 'init', 'register_post_types' );

function register_post_types(){

	register_post_type( 'products', [
		'label'  => '',
		'labels' => [
			'name'               => 'Products', // основное название для типа записи
			'singular_name'      => 'Товар', // название для одной записи этого типа
			'add_new'            => 'Добавить товар', // для добавления новой записи
			'add_new_item'       => 'Добавить товар', // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => 'Редактирование товара', // для редактирования типа записи
			'new_item'           => 'Новый', // текст новой записи
			'view_item'          => 'Смотреть товар', // для просмотра записи этого типа.
			'search_items'       => 'Искать товар', // для поиска по этим типам записи
			'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
			'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
			'parent_item_colon'  => '', // для родителей (у древовидных типов)
			'menu_name'          => 'Products', // название меню
		],
		'description'            => '',
		'public'                 => true,
		'show_in_menu'           => null, // показывать ли в меню админки
		'show_in_rest'        => true, // добавить в REST API. C WP 4.7
		'rest_base'           => null, // $post_type. C WP 4.7
		'menu_position'       => null,
		'menu_icon'           => 'dashicons-cart',
		'hierarchical'        => true,
		'supports'            => [ 'title', 'editor', 'thumbnail' ], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
		'taxonomies'          => ['products_types', 'post_tag'],
		'has_archive'         => true,
		'rewrite'             => true,
		'query_var'           => true,
	] );

}

// function disable_visual_editor($can)
// {
//     global $post;
//     $page_template = get_post_meta($post->ID, '_wp_page_template', true);
//     if ($page_template == 'main-page') {
//         return false;
//     }
//     return $can;
// }
// add_filter('user_can_richedit', 'disable_visual_editor');

?>