<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;
        
Container::make('post_meta', 'Контент для страницы')
    ->show_on_page('main-page')
    
    ->add_tab( 'Основная информация', array(
        Field::make('text', 'crb_main_header', 'Основной заголовок')
        ->set_width(10),
        Field::make('text', 'crb_main_header_description', 'Подзаголовок')
        ->set_width(10),
        Field::make('text', 'crb_button_text', 'Button text' )
        ->set_width(10),
        Field::make('text', 'crb_button_link', 'Button link' )
        ->set_width(10),
        Field::make( 'image', 'crb_hero_picture', 'Изображение для первого экрана' )
        ->set_value_type('url')
        ->set_width(60),
        Field::make( 'text', 'crb_video_link', 'Ссылка на видео' ),
        Field::make('text', 'crb_about', 'Информация о Winning'),
        Field::make('text', 'crb_delivery_text1', 'Текст о доставке часть 1')
        ->set_width(50),
        Field::make('text', 'crb_delivery_text2', 'Текст о доставке часть 2')
        ->set_width(50)
    ))

    ->add_tab( 'Отзывы', array(
        Field::make('complex', 'feedbacks')
        ->set_classes('fdb_items')
        ->add_fields(array (
            Field::make( 'image', 'crb_fdb_photo', 'Аватар для отзыва' ),
            Field::make( 'text', 'crb_fdb_name', 'Имя для отзыва' ),
            Field::make( 'text', 'crb_fdb_text', 'Текст отзыва' ),
            Field::make( 'text', 'crb_fdb_date', 'Дата' )
        ))
    ))

    ->add_tab( 'Преимущества', array(
        Field::make( 'text', 'crb_block_name', 'Название блока' ),
        Field::make('complex', 'advantages')
        ->set_classes('adv2_items')
        ->add_fields(array (    
            Field::make( 'text', 'crb_adv_text', 'Преимущество' )
        )),
        Field::make('complex', 'advantages2')
        ->set_classes('adv2_items')
        ->add_fields(array (    
            Field::make( 'image', 'crb_adv2_img', 'Иконка преимущества' ),
            Field::make( 'text', 'crb_adv2_text', 'Преимущество' )
        ))
    ));
    


    Container::make('post_meta', 'Контент для страницы')
    ->show_on_post_type('products')
    ->add_fields( array(
        Field::make( 'text', 'crb_products_description', 'Описание товара' )
    ));




    // Container::make('post_meta', 'Добавить товар')
    // ->add_fields( array(

    // ))
    //        ->show_on_post_type('products')
           
    //        // ->add_options( array(
    //        //     'left' => 'Left',
    //        //     'center' => 'Center',
    //        //     'right' => 'Right',
    //        // ) )
    //       ));
    //     //    ->add_fields (array (
    //     //     Field::make( 'color', 'crb_products_color', 'Выбрать цвет' )
    //     //     // ->add_options( array(
    //     //     //     'left' => 'Left',
    //     //     //     'center' => 'Center',
    //     //     //     'right' => 'Right',
    //     //     // ) )
    //     //    ));
    
    
        
    
    
    