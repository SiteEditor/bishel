<?php
/**
 * The template for displaying product category thumbnails within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product_cat.php.
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
 * @version 2.6.1
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$thumbnail_id = get_woocommerce_term_meta( $category->term_id, 'thumbnail_id', true );

$img = get_sed_attachment_image_html( $thumbnail_id , "" , "600X310" );

//wc_product_cat_class( '', $category );
?>

<div class="col-sm-6 col-xs-12">
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

		<a href="<?php echo esc_url( get_term_link( $category, 'product_cat' ) );?>" class="product-item-info">
			<div class="product-item-info-inner">
				<div class="product-item-info-content">
					<h4 class="product-item-info-title">
						<?php
						echo esc_html( $category->name );

						/*if ( $category->count > 0 ) {
							echo apply_filters( 'woocommerce_subcategory_count_html', ' <mark class="count">(' . esc_html( $category->count ) . ')</mark>', $category ); // WPCS: XSS ok.
						}*/
						?>
					</h4>
				</div>
			</div>
		</a>

	</div>
</div>
