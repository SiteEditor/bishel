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

            $queried = get_queried_object();

            $current = "";

            if( is_post_type_archive( 'exhibition' ) ){

                $current = "post_type";

            }elseif ( is_tax( 'exhibition_city_state' ) ){

                $current = $queried->term_id;

                $is_current_top = ( $queried->parent == 0 ) ? "yes" : "no";

            }

            $args = array(
                'taxonomy'          => 'exhibition_city_state',
                'hide_empty'        => false,
                //'hierarchical'      => true,
                'parent'            => 0
            );

            $terms = get_terms( $args );

            if ( !empty( $terms ) ){

                ?>

                <div class="filter-wrapper row exhibition-filter-wrapper">

                    <div class="col-sm-3">

                        <select name="exhibition_state" class="exhibition-select-state exhibition-filter">

                            <option <?php if( !$current || $current =="post_type" ) echo 'selected="selected"';?> value="<?php echo esc_url( get_post_type_archive_link('exhibition') );?>"> <?php echo __("All States" , "bishel");?> </option>

                            <?php

                            foreach( $terms AS $term ){

                                $term_link = get_term_link( $term );

                                $selected = ( $current == $term->term_id ) || ( $current && $current != "post_type" && $is_current_top == "no" && $queried->parent == $term->term_id ) ;

                                ?>
                                <option <?php if( $selected ) echo 'selected="selected"';?>  value="<?php echo esc_url( $term_link );?>"><?php echo $term->name;?></option>
                                <?php

                            }

                            ?>

                        </select>

                    </div>

                    <div class="col-sm-3">

                        <select name="exhibition_city" class="exhibition-select-city exhibition-filter">

                            <?php

                            if( $current && $current != "post_type" && $is_current_top == "no" ) {
                                $term_link = get_term_link( get_term( $queried->parent ) );
                            }else{
                                $term_link = "";
                            }
                            ?>

                            <option value="<?php echo esc_url( $term_link );?>"> <?php echo __("All Cities" , "bishel");?> </option>

                            <?php

                            $args = array(
                                'taxonomy'          => 'exhibition_city_state',
                                'hide_empty'        => false,
                                //'hierarchical'      => true,
                            );

                            if( $current && $current != "post_type" ){

                                if( $is_current_top == "yes" ) {
                                    $args['parent'] = $current;
                                }else{
                                    $args['parent'] = $queried->parent;
                                }

                            }

                            $terms = get_terms( $args );

                            foreach( $terms AS $term ){

                                $term_link = get_term_link( $term );

                                ?>
                                <option <?php if( $current == $term->term_id ) echo 'selected="selected"';?>  class="<?php if( $term->parent == 0 ) echo "top"; ?>" value="<?php echo esc_url( $term_link );?>"><?php echo $term->name;?></option>
                                <?php

                            }

                            ?>
                        </select>

                    </div>

                    <div class="col-sm-6"> </div>

                </div>

                <?php

            }

            if ( have_posts() ) : ?>

                <div class="exhibition-posts-wrapper row">

                    <?php
                    /* Start the Loop */
                    while ( have_posts() ) : the_post();

                        get_template_part( 'template-parts/custom-post-type/content-exhibition' );

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




