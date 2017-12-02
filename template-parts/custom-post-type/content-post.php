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

global $wp_query;

$excerpt_length = 300;

$content_post = apply_filters('the_excerpt', get_the_excerpt()); //var_dump($content_post);

# FILTER EXCERPT LENGTH
if( strlen( $content_post ) > $excerpt_length )
    $content_post = mb_substr( $content_post , 0 , $excerpt_length - 3 ) . '...';

?>

<div id="post-<?php the_ID(); ?>" <?php post_class("news-item col-sm-6 col-xs-12"); ?>>

    <div class="icb-wrapper">

        <div class="icb-img">
            <?php

            $attachment_id   = get_post_thumbnail_id();

            $img = get_sed_attachment_image_html( $attachment_id , "" , "550×340" );

            if ( $img ) {
                echo $img['thumbnail'];
            }

            ?>

        </div>

        <div class="icb-content-wrap">

            <div class="icb-heading">

                <!--<div class="date"><?php echo get_the_date('', get_the_ID());?></div>-->

                <h4 class="title"><?php the_title(); ?></h4>

                <div class="second-title">
                    <?php

                    $post_sub_title = get_post_meta( get_the_ID() , "wpcf-post_sub_title" , true );

                    echo apply_filters( 'bishel_short_description' , $post_sub_title );

                    ?>
                </div>

            </div>

            <div class="icb-content">
                <div><?php echo $content_post; ?></div>
            </div>

        </div>

        <div class="text-left">
            <a href="<?php the_permalink(); ?>" class="custom-btn"><?php _e('Read More' , 'bishel'); ?></a>
        </div>

    </div>

</div>


