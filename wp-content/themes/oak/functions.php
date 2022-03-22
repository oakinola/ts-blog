<?php
    //require_once WP_CONTENT_DIR . '/new-directory/my-file.php';
    require_once( __DIR__ . '/lib/oak-utils.php');
    require_once( __DIR__ . '/lib/oak-forms-utils.php');
    require_once( __DIR__ . '/lib/oak-sidebar-registration.php');

    //this allows featured-images to appear
    add_theme_support( 'post-thumbnails' );

    //make image compression - 100%
    add_filter('jpeg_quality', function($arg){return 100;});


    /**
     * Retrieves the first image from a post
     */
    function catch_that_image() {
        global $post, $posts;
        $first_img = '';
        ob_start();
        ob_end_clean();
        $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
        $first_img = $matches [1] [0];
    
        if(empty($first_img)){ //Defines a default image
            $first_img = "/images/default.jpg";
        }
        return $first_img;
    }


    function oak_assets() {
        wp_enqueue_style( 'jenad', get_stylesheet_uri() );
    }

    function oak_enqueue_styles() {
        wp_register_style('font-awesome-all', get_template_directory_uri() . '/assets/fontawesome/5.15.4/css/all.min.css' );
        wp_enqueue_style( 'font-awesome-all');

        wp_register_style('bootstrap', get_template_directory_uri() . '/assets/bootstrap/5.1.2/css/bootstrap.min.css' );
        wp_enqueue_style( 'bootstrap');

        wp_register_style('bootstrap-icons', get_template_directory_uri() . '/assets/bootstrap-icons-1.5.0/bootstrap-icons.css' );
        wp_enqueue_style( 'bootstrap-icons');

        //wp_register_style('mdb', get_template_directory_uri() . '/assets/mdb/css/mdb.min.css' );
        //wp_enqueue_style( 'mdb');

        wp_register_style('aos','https://cdn.jsdelivr.net/gh/michalsnik/aos@2.3.4/dist/aos.css' );
        wp_enqueue_style( 'aos');       

        wp_register_style('oak', get_template_directory_uri() . '/assets/css/oak.css' );
        wp_enqueue_style( 'oak');
        wp_register_style('ts-blog', get_template_directory_uri() . '/assets/css/ts-blog.css' );
        wp_enqueue_style( 'ts-blog');

        wp_enqueue_style( 'googlefonts', 'https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&family=Raleway:wght@400;500;600;700;800;900&display=swap');
    }

    function oak_enqueue_scripts() {
        wp_enqueue_script('popperjs', 'https://unpkg.com/@popperjs/core@2', null, '2.10.1', true );
        wp_enqueue_script('bootstrap', get_template_directory_uri() . '/assets/bootstrap/5.1.2/js/bootstrap.min.js', null, '5.1.2', true );
        
        wp_enqueue_script('aos', 'https://cdn.jsdelivr.net/gh/michalsnik/aos@2.3.4/dist/aos.js', null, '2.3.4', true );
        
        wp_enqueue_script('oak', get_template_directory_uri() . '/assets/js/oak.js', null, '1.0.0', true );
    }

    add_action( 'wp_enqueue_scripts', 'oak_enqueue_styles' );
    add_action( 'wp_enqueue_scripts', 'oak_enqueue_scripts' );
    add_action( 'wp_enqueue_scripts', 'oak_assets' );
?>