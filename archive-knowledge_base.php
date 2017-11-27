<?php
/**
 * The template for displaying beauty archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<div class="wrap">

    <div id="primary" class="content-area">

        <main id="main" class="site-main" role="main">

            <?php

            $args = array(
                'taxonomy'          => 'knowledge_base_cat',
                'hide_empty'        => false,
                'hierarchical'      => true,
                'child_of'          => 0
            );

            $terms = get_terms( $args );

            if ( !empty( $terms ) ){

                ?>

                <div class="product-wrapper row knowledge-base-cats">
                    <?php

                    foreach( $terms AS $term ){

                        $term_link = get_term_link( $term );

                        $cat_src = get_term_meta( $term->term_id ,'wpcf-knowledge_base_img' , true );

                        $attachment_id = bsanat_get_attachment_id_by_url( $cat_src );

                        $img = get_sed_attachment_image_html( $attachment_id , "" , "775×400" );

                        ?>
                        <div class="col-sm-6 col-xs-12 knowledge-base-item" data-term-id="<?php echo esc_attr( $term->term_id );?>">
                            <div class="product-item">

                                <div class="product-item-image">
                                    <div class="product-item-image-inner">
                                        <?php
                                        if ( $img ) {
                                            echo $img['thumbnail'];
                                        }
                                        ?>
                                    </div>
                                </div>

                                <a href="<?php echo esc_attr( esc_url( $term_link ) );?>" class="product-item-info">
                                    <div class="product-item-info-inner">
                                        <div class="product-item-info-content">
                                            <h4 class="product-item-info-title"><?php echo $term->name;?></h4>
                                        </div>
                                    </div>
                                </a>

                            </div>
                        </div>
                        <?php

                    }

                    ?>
                </div>

                <div class="knowledge-base-loading">
                    <video preload="auto" autoplay loop muted id="sed_row_container_module_html_id_2_video">
                        <source src="<?php echo esc_url( get_stylesheet_directory_uri() . '/images/gears.mp4' );?>" type="video/mp4">
                    </video>
                </div>

                <?php

            }

            if ( have_posts() ) : ?>

                <div class="brands-wrapper knowledge-base-wrapper row">

                    <?php
                    /* Start the Loop */
                    while ( have_posts() ) : the_post();

                        get_template_part( 'template-parts/custom-post-type/content-knowledgebase' );

                    endwhile;
                    ?>

                </div>

                <?php
                the_posts_pagination( array(
                    'prev_text' => twentyseventeen_get_svg( array( 'icon' => 'arrow-left' ) ) . '<span class="screen-reader-text">' . __( 'Previous page', 'twentyseventeen' ) . '</span>',
                    'next_text' => '<span class="screen-reader-text">' . __( 'Next page', 'twentyseventeen' ) . '</span>' . twentyseventeen_get_svg( array( 'icon' => 'arrow-right' ) ),
                    'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'twentyseventeen' ) . ' </span>',
                ) );

            else :

                get_template_part( 'template-parts/post/content', 'none' );

            endif; ?>

        </main><!-- #main -->

    </div><!-- #primary -->

    <?php get_sidebar(); ?>

</div><!-- .wrap -->

<?php get_footer();




