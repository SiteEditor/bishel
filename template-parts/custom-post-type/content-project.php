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

$post_number = $wp_query->current_post + 1;

$excerpt_length = 300;

$content_post = apply_filters('the_excerpt', get_the_excerpt()); //var_dump($content_post);

# FILTER EXCERPT LENGTH
if( strlen( $content_post ) > $excerpt_length )
    $content_post = mb_substr( $content_post , 0 , $excerpt_length - 3 ) . '...';


ob_start();

$attachment_id   = get_post_thumbnail_id();

$img = get_sed_attachment_image_html( $attachment_id , "" , "950×1000" );

?>
<div class="project-item-inner icb-img">
    <div class="icb-img-inner">
        <?php

        if ( $img ) {
            echo $img['thumbnail'];
        }
        ?>
    </div>
</div>

<?php

$image = ob_get_contents();
ob_end_clean();

?>            
<div id="post-<?php the_ID(); ?>" <?php post_class( "project-item" ); ?>>

    <?php
    if( $post_number % 2 == 1 ){
        echo $image;
    }
    ?>

    <div class="project-item-inner icb-content-wrap">

        <div class="icb-content-wrap-inner <?php if( $post_number % 2 == 0 ) echo "even";?>">

            <div class="icb-heading inner">
                <h4 class="title"><?php the_title(); ?></h4>
                <div class="second-title">
                    <?php

                    $post_sub_title = get_post_meta( get_the_ID() , "wpcf-post_sub_title" , true );

                    echo apply_filters( 'bsanat_short_description' , $post_sub_title );

                    ?>
                </div>
            </div>

            <div class="icb-content inner">
                <div><?php echo $content_post; ?></div>
            </div>

            <div class="custom-btn-wrap inner">
                <a href="<?php the_permalink(); ?>" class="custom-btn"><?php _e('Read More' , 'bsanat'); ?></a>
            </div>

        </div>

    </div>

    <?php
    if( $post_number % 2 == 0 ){
        echo $image;
    }
    ?>

</div>

