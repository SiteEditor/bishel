<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.2
 */

$titles = get_post_meta( get_the_ID() , 'wpcf-document_title' , false );

$persian_files = get_post_meta( get_the_ID() , 'wpcf-document_persian_file' , false );

$english_files = get_post_meta( get_the_ID() , 'wpcf-document_english_file' , false );

$list = array();

foreach ( $titles AS $key => $title ){

    $list[] = array(
        "title"             => $title  ,
        "persian_file"      => isset( $persian_files[$key] ) ? $persian_files[$key] : ""  ,
        "english_file"      => isset( $english_files[$key] ) ? $english_files[$key] : ""
    );

}

?>            
<div id="post-<?php the_ID(); ?>" <?php post_class("brands-item col-sm-6"); ?>>
    
    <div class="brands-item-info">

        <div class="brands-item-info-inner">

            <div class="brands-plus-wrap">

                <div class="brands-plus"></div>

                <div class="brands-popop">

                    <div class="icb-wrapper">

                        <div class="icb-content-wrap">

                            <div class="icb-content">
                                <div>
                                    <?php

                                    foreach ( $list AS $item ){

                                        ?>
                                        <div class="row file-item">

                                            <div class="col-sm-10">

                                                <div class="file-title"> <?php echo $item['title'];?> </div>

                                                <div class="file-links">

                                                    <a href="<?php echo esc_attr( esc_url( $item['persian_file'] ) );?>"><?php _e("Persian" , "bsanat");?></a>

                                                    <span> | </span>

                                                    <a href="<?php echo esc_attr( esc_url( $item['english_file'] ) );?>"><?php _e("English" , "bsanat");?></a>

                                                </div>

                                            </div>

                                            <div class="col-sm-2">

                                                <div class="attachment-icon"></div>

                                            </div>

                                        </div>
                                        <?php

                                    }

                                    ?>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>
            </div>

            <div class="document-title">
                <h5 class="document-info-title"><?php the_title(); ?></h5>
            </div>

        </div>

    </div>
    
</div>

