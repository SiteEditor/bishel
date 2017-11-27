<?php
/*
Module Name: Applicate
Module URI: http://www.siteeditor.org/modules/posts
Description: Module Applicate For Page Builder Application
Author: Site Editor Team
Author URI: http://www.siteeditor.org
Version: 1.0.0
*/

/**
 * Class PBApplicateShortcode
 */
class PBApplicateShortcode extends PBShortcodeClass{

    /**
     * Register module with siteeditor.
     */
    function __construct() {
        parent::__construct( array(
                "name"        => "sed_applicate",                               //*require
                "title"       => __("Applicate","site-editor"),                 //*require for toolbar
                "description" => __("single of a applicate","site-editor"),
                "icon"        => "sedico-settings",                               //*require for icon toolbar
                "module"      =>  "applicate"         //*require
                //"is_child"    =>  "false"       //for childe shortcodes like sed_tr , sed_td for table module
            ) // Args
        );

    }

    function get_atts(){

        $atts = array(
            'excerpt_length'                => 400,
            'type'                          => 'tab', //tab , content
            'is_first'                      => false ,
            'post_id'                       => 0
        );

        return $atts;

    }

    function add_shortcode( $atts , $content = null ){


    }

    function shortcode_settings(){

        $this->add_panel( 'applicate_settings_panel' , array(
            'title'               =>  __('Applicate Settings',"site-editor")  ,
            'capability'          => 'edit_theme_options' ,
            'type'                => 'inner_box' ,
            'priority'            => 9 ,
            'btn_style'           => 'menu' ,
            'has_border_box'      => false ,
            'icon'                => 'sedico-setting' ,
            'field_spacing'       => 'sm'
        ) );

        $params = array();

        $params['is_first'] = array(
            'label'             => __('Is First', 'site-editor'),
            'type'              => 'switch',
            'choices'           => array(
                "on"       =>    "ON" ,
                "off"      =>    "OFF" ,
            ),
            "panel"         => "applicate_settings_panel" ,
        );

        $args = array(
            'posts_per_page'   => -1,
            'offset'           => 0,
            'orderby'          => 'date',
            'order'            => 'DESC',
            'post_type'        => 'bos_applicate',
            'post_status'      => 'publish',
            //'suppress_filters' => true
        );

        $posts_array = get_posts( $args );

        $applicate_choices = array();

        foreach ($posts_array AS $post) {

            $applicate_choices[$post->ID] = get_the_title( $post->ID );

        }

        $params['post_id'] = array(
            "type"          => "select" ,
            "label"         => __("Select Post Type", "site-editor"),
            "description"   => __("Select Type of Applicate", "site-editor"),
            "choices"       =>  $applicate_choices,
            "panel"         => "applicate_settings_panel" ,
        );

        $params['type'] = array(
            "type"          => "select" ,
            "label"         => __("Select Type", "site-editor"),
            "description"   => __("Select Type of Applicate", "site-editor"),
            "choices"       =>  array(
                'tab'           =>  __("Tab", "site-editor"),
                'content'       =>  __("Content", "site-editor")
            ),
            "panel"         => "applicate_settings_panel" ,
        );

        $params['excerpt_length'] = array(
            "type"          => "number" ,
            "label"         => __("Excerpt Length", "site-editor"),
            "description"   => __("Excerpt Length", "site-editor"),
            "js_params"     =>  array(
                "min"  =>  10 ,
            ),
            "panel"         => "applicate_settings_panel"
        );

        $params['animation'] =  array(
            "type"                => "animation" ,
            "label"               => __("Animation Settings", "site-editor"),
            'button_style'        => 'menu' ,
            'has_border_box'      => false ,
            'icon'                => 'sedico-animation' ,
            'field_spacing'       => 'sm' ,
            'priority'            => 530 ,
        );

        $params['row_container'] = array(
            'type'          => 'row_container',
            'label'         => __('Module Wrapper Settings', 'site-editor')
        );

        return $params;

    }

}

new PBApplicateShortcode();

global $sed_pb_app;                      

$sed_pb_app->register_module(array(
    "group"                 =>  "theme" ,
    "name"                  =>  "applicate",
    "title"                 =>  __("Applicate","site-editor"),
    "description"           =>  __("List of applicate for built-in and custom post types","site-editor"),
    "icon"                  =>  "sedico-settings",
    "type_icon"             =>  "font",
    "shortcode"             =>  "sed_applicate",
    //"priority"              =>  10 ,
    "transport"             =>  "ajax" ,
));


