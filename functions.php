<?php
//
// Recommended way to include parent theme styles.
//  (Please see http://codex.wordpress.org/Child_Themes#How_to_Create_a_Child_Theme)
//

function bsanat_enqueue_styles() {

    wp_enqueue_style( 'bsanat-parent-style', get_template_directory_uri() . '/style.css' );

    wp_enqueue_style( 'bsanat-style',
        get_stylesheet_directory_uri() . '/style.css',
        array('parent-style')
    );
    /**
     * Theme Front end main js
     */
    wp_enqueue_script( "bsanat-script" , get_stylesheet_directory_uri() . '/assets/js/script.js' , array( 'jquery', 'carousel' , 'sed-livequery' , 'jquery-ui-accordion' , 'jquery-ui-tabs' ) , "1.0.0" , true );

    //wp_enqueue_script('sed-masonry');

    wp_enqueue_script('lightbox');

    wp_enqueue_script('jquery-scrollbar');

    wp_enqueue_style('custom-scrollbar');

    wp_enqueue_style("carousel");

    wp_enqueue_style("lightbox");

}

add_action( 'wp_enqueue_scripts', 'bsanat_enqueue_styles' , 0 );

add_action( 'after_setup_theme', 'sed_bsanat_theme_setup' );

function sed_bsanat_theme_setup() {

    load_child_theme_textdomain( 'bsanat', get_stylesheet_directory() . '/languages' );

    remove_filter( 'excerpt_more', 'twentyseventeen_excerpt_more' );

    /**
     * Short Description (excerpt).
     */
    add_filter( 'bsanat_short_description', 'wptexturize' );
    add_filter( 'bsanat_short_description', 'convert_smilies' );
    add_filter( 'bsanat_short_description', 'convert_chars' );
    add_filter( 'bsanat_short_description', 'wpautop' );
    add_filter( 'bsanat_short_description', 'shortcode_unautop' );
    add_filter( 'bsanat_short_description', 'prepend_attachment' );
    add_filter( 'bsanat_short_description', 'do_shortcode', 11 ); // AFTER wpautop()

    // This theme uses wp_nav_menu() in two locations.
    /*register_nav_menus( array(
        'services'    => __( 'Services Menu', 'twentyseventeen' ),
    ) );*/

}

function bsanat_excerpt_more( $link ) {
    if ( is_admin() ) {
        return $link;
    }

    return ' &hellip; ';
}
add_filter( 'excerpt_more', 'bsanat_excerpt_more' );

function bsanat_excerpt_length( $length ) {
    return 650;
}

add_filter( 'excerpt_length', 'bsanat_excerpt_length', 999 );

/**
 * Add Site Editor Modules
 *
 * @param $modules
 * @return mixed
 */
function sed_bsanat_add_modules( $modules ){

    global $sed_pb_modules;

    $module_name = "themes/bonyan-sanat/site-editor/modules/applicate/applicate.php";
    $modules[$module_name] = $sed_pb_modules->get_module_data(get_stylesheet_directory() . '/site-editor/modules/applicate/applicate.php', true, true);

    //$module_name = "themes/tanin/site-editor/modules/posts/posts.php";
    //$modules[$module_name] = $sed_pb_modules->get_module_data(get_stylesheet_directory() . '/site-editor/modules/posts/posts.php', true, true);

    $module_name = "themes/bonyan-sanat/site-editor/modules/pcategory/pcategory.php";
    $modules[$module_name] = $sed_pb_modules->get_module_data(get_stylesheet_directory() . '/site-editor/modules/pcategory/pcategory.php', true, true);

    //$module_name = "themes/tanin/site-editor/modules/bsanat-products/bsanat-products.php";
    //$modules[$module_name] = $sed_pb_modules->get_module_data(get_stylesheet_directory() . '/site-editor/modules/bsanat-products/bsanat-products.php', true, true);
    
    //$module_name = "themes/tanin/site-editor/modules/in-btn-back/in-btn-back.php";
    //$modules[$module_name ] = $sed_pb_modules->get_module_data(get_stylesheet_directory() . '/site-editor/modules/in-btn-back/in-btn-back.php', true, true);
    
    
    //$module_name = "themes/tanin/site-editor/modules/vertical-header/vertical-header.php";
    //$modules[$module_name ] = $sed_pb_modules->get_module_data(get_stylesheet_directory() . '/site-editor/modules/vertical-header/vertical-header.php', true, true);

    
    //$module_name = "themes/tanin/site-editor/modules/subscription/subscription.php";
    //$modules[$module_name ] = $sed_pb_modules->get_module_data(get_stylesheet_directory() . '/site-editor/modules/subscription/subscription.php', true, true);
    
    return $modules;

}

add_filter("sed_modules" , "sed_bsanat_add_modules" );



function bsanat_register_theme_fields( $fields ){

    /*$fields['products_archive_description'] = array(
        'type'              => 'textarea',
        'label'             => __('Product Archive Description', 'site-editor'),
        //'description'       => '',
        'transport'         => 'postMessage' ,
        'setting_id'        => 'bsanat_products_archive_description',
        'default'           => '',
        "panel"             => "general_settings" ,
    );

    $fields['home_page_products_description'] = array(
        'type'              => 'textarea',
        'label'             => __('Home Page Product Description', 'site-editor'),
        //'description'       => '',
        'transport'         => 'postMessage' ,
        'setting_id'        => 'bsanat_home_page_products_description',
        'default'           => '',
        "panel"             => "general_settings" ,
    );

    $locale = get_locale();

    if( $locale == 'fa_IR' ) {

        $fields['english_site_url'] = array(
            'type' => 'text',
            'label' => __('English Site Url', 'site-editor'),
            //'description'       => '',
            'transport' => 'postMessage',
            'setting_id' => 'bsanat_english_site_url',
            'default' => 'http://eng.tanin.com',
            "panel" => "general_settings",
        );

    }

    $fields[ 'intro_logo' ] = array(
        'setting_id'        => 'bsanat_intro_logo',
        'label'             => __('Intro Logo', 'translation_domain'),
        'type'              => 'image',
        //'priority'          => 10,
        'default'           => '',
        'transport'         => 'postMessage' ,
        'panel'             =>  'general_settings'
    );*/

    return $fields;

}

//add_filter( "sed_theme_options_fields_filter" , 'bsanat_register_theme_fields' , 10000 );


add_action( 'pre_get_posts', 'bsanat_per_page_query' );
/**
 * Customize category query using pre_get_posts.
 *
 * @author     FAT Media <http://youneedfat.com>
 * @copyright  Copyright (c) 2013, FAT Media, LLC
 * @license    GPL-2.0+
 * @todo       Change prefix to theme or plugin prefix
 *
 */
function bsanat_per_page_query( $query ) {

    $is_blog = ( is_home() && is_front_page() ) || ( is_home() && !is_front_page() );

    if ( $query->is_main_query() && ! $query->is_feed() && ! is_admin() && ( is_category() || is_tag() || $is_blog )  ) {
        $query->set( 'posts_per_page', '4' ); //Change this number to anything you like.
        return ;
    }

    $taxonomy = is_tax() ? get_queried_object()->taxonomy:"";

    $is_taxonomy = in_array( $taxonomy , array( 'product_cat'  ) );

    if ( $query->is_main_query() && ! $query->is_feed() && ! is_admin() && $is_taxonomy  ) {
        $query->set( 'posts_per_page', '4' ); //Change this number to anything you like.
        return ;
    }

    $post_type = $query->get('post_type');

    $is_post_type = in_array( $post_type , array( 'knowledge_base' , 'bos_brand' ) );

    if ( $query->is_main_query() && ! $query->is_feed() && ! is_admin() && $is_post_type && is_post_type_archive() ) {
        $query->set( 'posts_per_page', '100' ); //Change this number to anything you like.
        return ;
    }

    $is_post_type = in_array( $post_type , array( 'bos_project' , 'product' ) );

    if ( $query->is_main_query() && ! $query->is_feed() && ! is_admin() && $is_post_type && is_post_type_archive() ) {
        $query->set( 'posts_per_page', '4' ); //Change this number to anything you like.
        return ;
    }

    /*
    $is_post_type = in_array( $post_type , array( 'service' ) );

    if ( $query->is_main_query() && ! $query->is_feed() && ! is_admin() && $is_post_type && is_post_type_archive() ) {
        $query->set( 'posts_per_page', '80' ); //Change this number to anything you like.
    }*/

}


function bsanat_add_google_font( $google_fonts ){

    $google_fonts["David Libre"] = "David Libre";

    return $google_fonts;

}

//add_filter( 'sed_google_fonts_filter' , 'bsanat_add_google_font' );



/**
 * Get an attachment ID given a URL.
 *
 * @param string $url
 *
 * @return int Attachment ID on success, 0 on failure
 */
function bsanat_get_attachment_id_by_url( $url ) {
    $attachment_id = 0;
    $dir = wp_upload_dir();
    if ( false !== strpos( $url, $dir['baseurl'] . '/' ) ) { // Is URL in uploads directory?
        $file = basename( $url );
        $query_args = array(
            'post_type'   => 'attachment',
            'post_status' => 'inherit',
            'fields'      => 'ids',
            'meta_query'  => array(
                array(
                    'value'   => $file,
                    'compare' => 'LIKE',
                    'key'     => '_wp_attachment_metadata',
                ),
            )
        );
        $query = new WP_Query( $query_args );
        if ( $query->have_posts() ) {
            foreach ( $query->posts as $post_id ) {
                $meta = wp_get_attachment_metadata( $post_id );
                $original_file       = basename( $meta['file'] );
                $cropped_image_files = wp_list_pluck( $meta['sizes'], 'file' );
                if ( $original_file === $file || in_array( $file, $cropped_image_files ) ) {
                    $attachment_id = $post_id;
                    break;
                }
            }
        }
    }
    return $attachment_id;
}

add_action( 'wp_ajax_knowledge_base_posts', 'bsanat_knowledge_base_document' );

add_action( 'wp_ajax_nopriv_knowledge_base_posts', 'bsanat_knowledge_base_document' );

function bsanat_knowledge_base_document(){

    $args = array(
        'post_type'         =>  'knowledge_base',
        'offset'            =>  0 ,
        'posts_per_page'    =>  -1
    );

    $terms = array( $_POST['term'] );

    if( !empty( $_POST['term'] ) && $_POST['term'] != "all" && !empty( $terms ) ){

        $args['tax_query'] = array();

        $terms = is_string( $terms ) && !empty( $terms ) ? explode( "," , $terms ) : $terms;

        $tax_args = array(
            'taxonomy' => 'knowledge_base_cat',
            'field'    => 'term_id',
            'terms'    => $terms,
        );

        $args['tax_query'][] = $tax_args;

    }
    
    $custom_query = new WP_Query( $args ); 

    if ( $custom_query->have_posts() ) {

        // Start the Loop.
        while ($custom_query->have_posts()) {

            $custom_query->the_post();

            get_template_part( 'template-parts/custom-post-type/content-knowledgebase' );

        }

    }else{ ?>

        <div class="not-found-post">
            <p><?php echo __("Not found result" , "site-editor" ); ?> </p>
        </div>

        <?php

    }

    wp_die();

}

add_action( "wp_footer" , "bsanat_add_scripts_var" );

function bsanat_add_scripts_var(){

    ?>
    <script>
        var __ajaxurl = '<?php echo esc_url( admin_url("/admin-ajax.php") );?>';
    </script>
    <?php

}

add_filter( 'body_class', 'bsanat_custom_body_class' );

function bsanat_custom_body_class( $classes ) {

    //if ( is_page_template( 'page-example.php' ) ) {
        $classes[] = 'scroll-disable';
    //}

    $header_absolute = sed_get_page_setting( 'header_absolute' );

    if( $header_absolute && $header_absolute == "yes" ){
        $classes[] = 'has-header-absolute';
    }

    $logo_type = sed_get_page_setting( 'logo_type' );

    $logo_type = !$logo_type ? "dark" : $logo_type;

    $classes[] = 'header-logo-'. $logo_type;

    return $classes;

}

function bsanat_register_page_fields( $fields ){

    $fields = array_merge( $fields , array(

        'header_absolute'   => array(
            'setting_id'        => "header_absolute" ,
            "type"              => "radio-buttonset" ,
            "label"             => __("Header Absolute", "site-editor"),
            "description"       => __("This option allows you to set a Absolute Header for current page", "site-editor"),
            'default'           => 'no',
            "choices"       =>  array(
                "yes"           =>    __( "Yes" , "site-editor" ) ,
                "no"            =>    __( "No" , "site-editor" )
            ),
            //'panel'             => 'general_page_style' ,
            'transport'         => 'postMessage' ,
            'priority'          => 5 ,
        ),

        'logo_type'         => array(
            'setting_id'        => "logo_type" ,
            "type"              => "radio-buttonset" ,
            "label"             => __("Logo type", "site-editor"),
            "description"       => __("This option allows you to set a Logo be dark or light", "site-editor"),
            'default'           => 'dark',
            "choices"       =>  array(
                "dark"           =>    __( "Dark" , "site-editor" ) ,
                "light"          =>    __( "Light" , "site-editor" )
            ),
            //'panel'             => 'general_page_style' ,
            'transport'         => 'postMessage' ,
            'priority'          => 5 ,
        ),

    ));

    return $fields;

}

add_filter( 'sed_page_options_fields_filter' , 'bsanat_register_page_fields' );

/**
 * Site Editor Shop WooCommerce
 */
require dirname(__FILE__) . '/inc/woocommerce.php';



