<?php
/*
Module Name: PCategory
Module URI: http://www.siteeditor.org/modules/pcategory
Description: Module PCategory For Page Builder Application
Author: Site Editor Team
Author URI: http://www.siteeditor.org
Version: 1.0.0
*/

/**
 * Class PBPCategoryShortcode
 */
class PBPCategoryShortcode extends PBShortcodeClass{

    /**
     * Register module with siteeditor.
     */
    function __construct() {

        parent::__construct( array(
                "name"        => "sed_pcategory",                               //*require
                "title"       => __("PCategory","site-editor"),                 //*require for toolbar
                "description" => __("List of pcategory for built-in and custom taxonomies","site-editor"),
                "icon"        => "sedico-settings",                               //*require for icon toolbar
                "module"      =>  "pcategory"         //*require
                //"is_child"    =>  "false"       //for childe shortcodes like sed_tr , sed_td for table module
            ) // Args
        );

    }

    function get_atts(){

        $atts = array(
            "parent_term"                  => 0,
        );

        return $atts;

    }

    function add_shortcode( $atts , $content = null ){

        extract( $atts );


        $parent_term = ( !$parent_term || $parent_term == '0' ) ? 0 : $parent_term;

        $args = array(
            'taxonomy'          => 'product_cat',
            'hide_empty'        => false ,
            //'hierarchical'      => false
        );



        if( !$parent_term || $parent_term != "__all" ){ 

            $args['parent'] = (int) $parent_term;

        }

        $terms = get_terms( $args );

        $vars = array();

        $vars["terms"] = $terms ;

        $vars["args"] = $args ;

        $this->set_vars( $vars );

    }

    function shortcode_settings(){

        $this->add_panel( 'pcategory_settings_panel' , array(
            'title'               =>  __('PCategory Settings',"site-editor")  ,
            'capability'          => 'edit_theme_options' ,
            'type'                => 'inner_box' ,
            'priority'            => 9 ,
            'btn_style'           => 'menu' ,
            'has_border_box'      => false ,
            'icon'                => 'sedico-setting' ,
            'field_spacing'       => 'sm'
        ) );

        $params = array();

        $args = array(
            'taxonomy'          => 'product_cat',
            'hide_empty'        => false ,
            //'hierarchical'      => false
        );

        $terms = get_terms( $args );

        $terms_choices = array(
            '__all'     =>  __( "All" , "site-editor" ),
            '0'     =>  __( "Top Level" , "site-editor" )
        );

        foreach( $terms AS $term ){

            $terms_choices[$term->term_id] = $term->name;

        }

        $params['parent_term'] = array(
            "type"          => "select" ,
            "label"         => __("Select Parent term", "site-editor"),
            "description"   => __("Select Parent term, Default is zero", "site-editor"),
            "choices"       =>  $terms_choices,
            "panel"         => "pcategory_settings_panel" ,
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

new PBPCategoryShortcode();

global $sed_pb_app;                      

$sed_pb_app->register_module(array(
    "group"                 =>  "basic" ,
    "name"                  =>  "pcategory",
    "title"                 =>  __("PCategory","site-editor"),
    "description"           =>  __("List of pcategory for built-in and custom taxonomies","site-editor"),
    "icon"                  =>  "sedico-settings",
    "type_icon"             =>  "font",
    "shortcode"             =>  "sed_pcategory",
    //"priority"              =>  10 ,
    "transport"             =>  "ajax" ,
));


