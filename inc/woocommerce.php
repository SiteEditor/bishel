<?php
/**
 * SiteEditor Shop WooCommerce class
 *
 * @package SiteEditor
 * @subpackage theme
 * @since 1.0.0
 */

/**
 * SiteEditor Shop WooCommerce class.
 *
 * SiteEditor Shop WooCommerce is for sync with WooCommerce Plugin & their Extensions
 *
 * @since 1.0.0
 */

class SedShopWooCommerce{

    /**
     * @since 1.0.0
     * @var array
     * @access protected
     */
    //protected $theme_options = array();

    /**
     * SedShopWooCommerce constructor.
     */
    public function __construct(  ) { 

        $this->remove_breadcrumb();

        add_filter( 'loop_shop_columns'                 , array( __CLASS__ , 'loop_columns' ) , 9999 );

        add_filter( 'loop_shop_per_page'                , array( __CLASS__ , 'loop_shop_per_page' ) , 9999 );

        add_filter( 'woocommerce_show_page_title'       , array( __CLASS__ , 'remove_page_title' ) , 9999  );

        remove_action( 'woocommerce_archive_description' , 'woocommerce_taxonomy_archive_description' , 10 );

        remove_action( 'woocommerce_archive_description' , 'woocommerce_product_archive_description' , 10 );

        remove_action( 'woocommerce_before_shop_loop' , 'woocommerce_result_count' , 20 );

        remove_action( 'woocommerce_before_shop_loop' , 'woocommerce_catalog_ordering' , 30 );

        remove_action( 'woocommerce_single_product_summary' , 'woocommerce_template_single_rating' , 10 );

        //remove_action( 'woocommerce_single_product_summary' , 'woocommerce_template_single_price' , 10 );

        //remove_action( 'woocommerce_single_product_summary' , 'woocommerce_template_single_add_to_cart' , 30 );

        remove_action( 'woocommerce_single_product_summary' , 'woocommerce_template_single_meta' , 40 );

        add_action( 'woocommerce_single_product_summary' , array( __CLASS__ , 'single_product_attributes' ) , 45 );

        //remove_action( 'woocommerce_single_product_summary' , 'woocommerce_template_single_sharing' , 50 );

        remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );

        remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );

        //remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );

        //add_filter( 'woocommerce_product_tabs', array( $this , 'woocommerce_product_tabs' ), 999 , 1 );

        //add_filter( 'woocommerce_product_description_heading', array( $this , 'single_page_tab_heading' ), 999 , 1 );

        //add_filter( 'woocommerce_product_additional_information_heading', array( $this , 'single_page_tab_heading' ), 999 , 1 );

        //add_filter( 'woocommerce_product_description_tab_title', array( $this , 'description_tab_title' ), 999 , 1 );

        //add_filter( 'woocommerce_product_additional_information_tab_title', array( $this , 'additional_information_tab_title' ), 999 , 1 );

    }

    public static function single_product_attributes(){

        global $product;

        do_action( 'woocommerce_product_additional_information', $product );

    }

    public function description_tab_title( $title ){

        return __("Details","bsanat");

    }

    public function additional_information_tab_title( $title ){

        return __("Features","bsanat");

    }

    public function single_page_tab_heading( $heading ){

        return false;

    }

    public function woocommerce_product_tabs( $tabs ){

        unset( $tabs['reviews'] );

        $technical_information = get_post_meta( get_the_ID() , "wpcf-technical-information" , true );

        if( !empty( $technical_information ) && $technical_information ) {

            $tabs['technical-information'] = array(
                'title' => __("Technical Information", "bsanat"),
                'priority' => 50,
                'callback' => array($this, 'technical_information')
            );

        }

        return $tabs;

    }

    public function technical_information(){

        $technical_information = get_post_meta( get_the_ID() , "wpcf-technical-information" , true );

        echo apply_filters( 'bsanat_short_description' , $technical_information );

    }

    public function remove_breadcrumb(){

        remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );

    }

    public static function remove_page_title( $show_title ){

        $show_title = !$show_title ? $show_title : false;

        return $show_title;

    }

    public static function loop_columns( $columns ) {

        $columns = 3;

        return $columns;
    }

    public static function loop_shop_per_page( $per_page ) {

        $per_page = 6;

        return $per_page;
    }


}

new SedShopWooCommerce();

