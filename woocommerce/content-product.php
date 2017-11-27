<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

// Ensure visibility
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>
<div id="product-<?php the_ID(); ?>" <?php post_class("news-item col-sm-6 col-xs-12"); ?>>

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

				<!--<div class="second-title">
					<?php

					//$post_sub_title = get_post_meta( get_the_ID() , "wpcf-post_sub_title" , true );

					//echo apply_filters( 'bsanat_short_description' , $post_sub_title );

					?>
				</div>-->

			</div>

			<div class="icb-content">
				<div>
					<?php
					$excerpt_length = 90;

					$content_post = apply_filters('the_excerpt', get_the_excerpt()); //var_dump($content_post);

					# FILTER EXCERPT LENGTH
					if( strlen( $content_post ) > $excerpt_length )
						$content_post = mb_substr( $content_post , 0 , $excerpt_length - 3 ) . '...';

					echo $content_post;
					?>
				</div>
			</div>

		</div>

		<div class="text-left">
			<a href="<?php the_permalink(); ?>" class="custom-btn"><?php _e('Read More' , 'bsanat'); ?></a>
		</div>

	</div>

</div>
