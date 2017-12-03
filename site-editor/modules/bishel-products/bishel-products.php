<?php
/*
Module Name: Bishel Products
Module URI: http://www.siteeditor.org/modules/bishel-products
Description: Module Bishel Products For Page Builder Application
Author: Site Editor Team
Author URI: http://www.siteeditor.org
Version: 1.0.0
*/

/**
 * Class PBBishelProductsShortcode
 */
class PBBishelProductsShortcode extends PBShortcodeClass{

    /**
     * Register module with siteeditor.
     */
    function __construct() {
        parent::__construct( array(
                "name"        => "sed_bishel_products",                               //*require
                "title"       => __("Bishel Products","site-editor"),                 //*require for toolbar
                "description" => __("List of Bishel Products for built-in and custom post types","site-editor"),
                "icon"        => "icon-bishel-products",                               //*require for icon toolbar
                "module"      =>  "bishel-products"         //*require
                //"is_child"    =>  "false"       //for childe shortcodes like sed_tr , sed_td for table module
            ) // Args
        );

    }

    function get_atts(){

        $atts = array();

        return $atts;

    }

    function add_shortcode( $atts , $content = null ){



    }
    
    /*function styles(){
        return array(
            array('posts-skin-default', get_stylesheet_directory_uri().'/site-editor/modules/posts/skins/default/css/style.css' ,'1.0.0' ) ,
        );
    }*/

    function shortcode_settings(){

        $this->add_panel( 'bishel_products_settings_panel' , array(
            'title'               =>  __('Bishel Products Settings',"site-editor")  ,
            'capability'          => 'edit_theme_options' ,
            'type'                => 'inner_box' ,
            'priority'            => 9 ,
            'btn_style'           => 'menu' ,
            'has_border_box'      => false ,
            'icon'                => 'sedico-setting' ,
            'field_spacing'       => 'sm'
        ) );

        $params = array();


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

    function custom_style_settings(){
        return array(

            array(
                'sliders-title' , '.punchline > .title > h3 > a' ,
                array( 'font' ) , __("Sliders Title" , "site-editor")
            ) ,

        );
    }

}

new PBBishelProductsShortcode();

global $sed_pb_app;                      

$sed_pb_app->register_module(array(
    "group"                 =>  "basic" ,
    "name"                  =>  "bishel-products",
    "title"                 =>  __("Bishel Products","site-editor"),
    "description"           =>  __("List of Bishel Products for built-in and custom post types","site-editor"),
    "icon"                  =>  "icon-bishel-products",
    "type_icon"             =>  "font",
    "shortcode"             =>  "sed_bishel_products",
    //"priority"              =>  10 ,
    "transport"             =>  "ajax" ,
));


