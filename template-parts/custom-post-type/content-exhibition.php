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

$paged = get_query_var( 'paged', 1 );

$paged = ( !$paged ) ? 1 : $paged;

$post_per_page = $wp_query->query_vars['posts_per_page'];

$post_number = ( ( $paged - 1) * $post_per_page ) + $wp_query->current_post + 1;

?>            
<div id="post-<?php the_ID(); ?>" <?php post_class("exhibition-item"); ?>>

    <div class="exhibition-item-inner">

        <div class="exhibition-item-number ex-number col-exhibition" title="<?php echo esc_attr( $post_number );?>">

            <?php echo $post_number;?>

        </div>

        <div class="exhibition-item-address ex-address col-exhibition">

            <?php the_content();?>

        </div>

        <div class="exhibition-item-map ex-map col-exhibition">

            <span class="col-exhibition-inner" data-popup-id="exhibition-popup-<?php the_ID(); ?>">
                map
            </span>

            <div id="exhibition-popup-<?php the_ID(); ?>" class="exhibition-popop">

                <div class="popop-close-container">
                    <button type="button" class="btn">X</button>
                </div>

                <div class="icb-wrapper">

                    <div class="icb-content-wrap">

                        <div class="icb-content">

                            <?php
                            $location = get_post_meta( get_the_ID() , 'exhibition_google_map' , true );

                            if( !empty($location) ):
                                ?>
                                <div class="acf-map">
                                    <div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
                                </div>
                            <?php endif; ?>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>
    
</div>

