<div <?php echo $sed_attrs; ?> class="module module-posts module-posts-default <?php echo $class; ?> ">

    <?php
    if( $type == "tab" && get_post( $post_id ) ){

        //$applicate = get_post( $post_id );

        //$thumbnail_url = get_the_post_thumbnail_url( $post_id , 'full' );

        $thumbnail_url = get_post_meta( $post_id , 'wpcf-applicate_icon' , true );

        ?>

        <div class="tools-wrapper" data-post-id="<?php echo $post_id;?>">

            <div class="tools-item">

                <div class="tools-item-info">

                    <div class="tools-item-info-inner">

                        <img src="<?php echo esc_attr( esc_url( $thumbnail_url ) );?>">

                        <h4 class="tools-item-info-title"><?php echo get_the_title( $post_id );?></h4>

                    </div>

                </div>

            </div>

        </div>

        <?php

    }else if( $type == "content" && get_post( $post_id ) ){

        $parent = wp_get_post_parent_id( $post_id );

        $parent_title = __("Applicate Group","bsanat");

        if( $parent && $parent_post = get_post( $parent ) ){

            $parent_title = get_the_title( $parent );

        }

        $subtitle = get_post_meta( $post_id , 'wpcf-applicate_subtitle' , true );

        $args = array(
            'post_type'         =>  'bos_applicate',
            'offset'            =>  0 ,
            'posts_per_page'    =>  1 ,
            'post__in'          =>  array( $post_id )
        );

        $custom_query = new WP_Query( $args );

        if ( $custom_query->have_posts() ){

            // Start the Loop.
            while ( $custom_query->have_posts() ) {
                $custom_query->the_post();
                ?>
                <div id="bos-applicate-description-container-<?php echo $post_id;?>" class="bos-applicate-description-container <?php if( $is_first ) echo "first";?>">

                    <div class="bos-applicate-description">

                        <h1 class="title"><?php echo get_the_title( $post_id );?></h1>

                        <div class="parent-title"><?php echo $parent_title;?></div>

                        <div class="entry-subtitle">
                            <?php echo apply_filters( 'bsanat_short_description' , $subtitle );?>
                        </div>

                        <div class="entry-content">
                            <?php

                            $post_content = get_the_excerpt( $post_id );

                            $post_content = apply_filters( 'the_excerpt' , $post_content );

                            //$excerpt_length = 90;

                            $post_content = strip_tags( $post_content );

                            if( strlen( $post_content ) > $excerpt_length ){

                                $post_content = mb_substr( $post_content, 0, $excerpt_length ) . "...";

                            }

                            echo $post_content;

                            ?>
                        </div>

                        <div class="read-more">

                            <a href="<?php the_permalink();?>">

                                <?php _e("Click to read more" , "bsanat");?>

                            </a>

                        </div>

                    </div>

                </div>
                <?php
            }

            wp_reset_postdata();
        }

        wp_reset_query();

    }else{

        ?>
        <div><?php _e("Invalid Data" , "bsanat");?></div>
        <?php

    }
    ?>
    
</div>