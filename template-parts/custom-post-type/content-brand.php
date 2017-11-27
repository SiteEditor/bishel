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

$attachment_id   = get_post_thumbnail_id();

$img = get_sed_attachment_image_html( $attachment_id , "full"  );//, "550×340"

$url = get_post_meta( get_the_ID() , 'wpcf-brand_website_url' , true ); 

?>

<div id="post-<?php the_ID(); ?>" <?php post_class("brands-item"); ?>>
    <div class="brands-item-info">
        <div class="brands-item-info-inner">
            <div class="brands-plus-wrap">
                <div class="brands-plus"></div>
                <div class="brands-popop">

                    <div class="icb-wrapper">

                        <div class="icb-img">
                            <?php

                            if ( $img ) {
                                echo $img['thumbnail'];
                            }

                            ?>
                        </div>

                        <div class="icb-content-wrap">

                            <!--<div class="icb-heading">
                                <h4 class="title"><?php the_title(); ?></h4>
                            </div>-->

                            <div class="icb-content">
                                <div>
                                    <?php the_content();?>
                                </div>
                            </div>

                        </div>

                        <div class="text-left">
                            <a href="<?php echo esc_attr( esc_url( $url ) ); ?>" class="custom-btn"><?php _e('View Website' , 'bsanat'); ?></a>
                        </div>

                    </div>

                </div>
            </div>
            <div class="brands-title">
                <h4 class="brands-item-info-title"><?php the_title(); ?></h4>
            </div>
            <div class="brands-img">
                <?php

                if ( $img ) {
                    echo $img['thumbnail'];
                }

                ?>
            </div>
        </div>
    </div>
</div>


