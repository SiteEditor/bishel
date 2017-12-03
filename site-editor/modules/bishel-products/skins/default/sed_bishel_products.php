<div <?php echo $sed_attrs; ?> class="module module-bishel-products module-bishel-products-default <?php echo $class; ?> ">

    <?php
    $args = array(
        'post_type'         =>  'product',
        'offset'            =>  0 ,
        'posts_per_page'    =>  10,
        'orderby'           => 'date',
        'order'             => 'DESC',
    );

    $custom_query = new WP_Query( $args );

    if ( $custom_query->have_posts() ) {

        ?>

        <div class="recent-product-slider-wrapper">

            <?php

            $num_posts = $custom_query->post_count;
            $i = 1;
            // Start the Loop.
            while ( $custom_query->have_posts() ) {
                $custom_query->the_post();

                if( $i % 2 == 1 ) {
                    ?>
                    <div class="col-product-item">

                    <?php
                }
                ?>

                    <div class="recent-product-item">
                        <div class="rp-item-inner">
                            <div class="rp-item-media-holder">
                                <a class="rp-img" href="<?php the_permalink();?>">
                                    <?php

                                    $attachment_id   = get_post_thumbnail_id();

                                    $img = get_sed_attachment_image_html( $attachment_id , "" , "550×340" );

                                    if ( $img ) {
                                        echo $img['thumbnail'];
                                    }

                                    ?>
                                </a>
                                <div class="rp-item-content">
                                    <h2 class="rp-item-title"><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h2>
                                    <div class="rp-item-excerpt">
                                        <?php

                                        $post_content = get_the_excerpt();

                                        $excerpt_length = 70;

                                        if( strlen( $post_content ) > $excerpt_length ){

                                            $post_content = mb_substr( $post_content, 0, $excerpt_length ) . "...";

                                        }

                                        echo $post_content;

                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php
                if( $i % 2 == 0 || $i == $num_posts ) {
                    ?>
                    </div>
                    <?php
                }

                $i++;
            }
            ?>

        </div>

        <?php


        wp_reset_postdata();
    }

    wp_reset_query();
    ?>
    
</div>