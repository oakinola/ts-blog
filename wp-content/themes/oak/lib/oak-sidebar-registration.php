<?php
    function oak_widgets_init() {
        register_sidebar( array(
            'name'          => __( 'Basic Portfolio Display Sidebar', 'oak-jad' ),
            'id'            => 'basic_portfolio_display_sidebar',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h1 class="widget-title">',
            'after_title'   => '</h1>',
        ) );

        // register_sidebar( array(
        //     'name'          => __( 'Event Countdown Widget Area', 'life-theme' ),
        //     'id'            => 'event_countdown_area',
        //     'before_widget' => '<div id="%1$s" class="widget %2$s">',
        //     'after_widget'  => '</div>',
        //     'before_title'  => '<h1 class="widget-title">',
        //     'after_title'   => '</h1>',
        // ) );

        // register_sidebar( array(
        //     'name'          => __( 'Scripture Display Widget Area', 'life-theme' ),
        //     'id'            => 'scripture_display_area',
        //     'before_widget' => '<div id="%1$s" class="widget %2$s">',
        //     'after_widget'  => '</div>',
        //     'before_title'  => '<h1 class="widget-title">',
        //     'after_title'   => '</h1>',
        // ) );

        // register_sidebar( array(
        //     'name'          => __( 'Devotion Display Widget Area', 'life-theme' ),
        //     'id'            => 'devotion_display_area',
        //     'before_widget' => '<div id="%1$s" class="widget %2$s">',
        //     'after_widget'  => '</div>',
        //     'before_title'  => '<h1 class="widget-title">',
        //     'after_title'   => '</h1>',
        // ) );

        // register_sidebar( array(
        //     'name'          => __( 'Jumbo News Widget Area', 'life-theme' ),
        //     'id'            => 'jumbo_news_area',
        //     'before_widget' => '<div id="%1$s" class="widget %2$s">',
        //     'after_widget'  => '</div>',
        //     'before_title'  => '<h1 class="widget-title">',
        //     'after_title'   => '</h1>',
        // ) );

    }
    add_action( 'widgets_init', 'oak_widgets_init' );
    
