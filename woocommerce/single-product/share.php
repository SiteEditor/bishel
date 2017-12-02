<?php
/**
 * Single Product Share
 *
 * Sharing plugins can hook into here or you can add your own code directly.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/share.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
$product_id = get_the_ID();
?>

<div id="product-social-share-container">
	<div class="social-share-label">
		<span><?php _e("Share on ","bishel") ?></span>
	</div>
	<div id="product-social-share-box" class="social-icons share-row">
		<a href="#" class="product-share facebook" data-tip="<?php _e("Share on ","bishel") ?>" title="<?php _e("Share on Facebook","bishel") ?>"  rel="nofollow" target="_blank"  onclick="window.open('https://www.facebook.com/sharer/sharer.php?u='+encodeURIComponent(location.href),'facebook-share-dialog','width=626,height=436');return false;">
			<i class="fa fa-facebook"></i>
		</a>
		<a href="mailto:?subject=<?php the_title();?>&amp;body=<?php echo urlencode( get_permalink( $product_id ) ); ?>" class="product-share mailto" data-tip="<?php _e("Email to a Friend","bishel") ?>" title="<?php _e("Email to a Friend","bishel") ?>"><i class="fa fa-envelope"></i></a>
		<a href="#" class="product-share twitter" data-tip="<?php _e("Share on Twitter","bishel") ?>"  title="<?php _e("Share on Twitter","bishel") ?>" rel="nofollow" target="_blank" onclick="window.open('//twitter.com/home?status=<?php echo urlencode(get_permalink($product_id)); ?>','pin-share-dialog','width=626,height=436');return false;"><i class="fa fa-twitter"></i></a>
		<a href="#" class="product-share pinterest" data-tip="<?php _e("Pin on Pinterest","bishel") ?>"  title="<?php _e("Share on Pinterest","bishel") ?>" rel="nofollow" target="_blank" onclick="window.open('//pinterest.com/pin/create/button/?url=<?php echo urlencode(get_permalink($product_id)); ?>','pin-share-dialog','width=626,height=436');return false;"><i class="fa fa-pinterest"></i></a>
		<a href="#" class="product-share google-plus" data-tip="<?php _e("Share on Google+","bishel") ?>"  title="<?php _e("Share on Google+","bishel") ?>" rel="nofollow" target="_blank" onclick="window.open('//plus.google.com/share?url=<?php echo urlencode(get_permalink($product_id)); ?>','pin-share-dialog','width=626,height=436');return false;"><i class="fa fa-google-plus"></i></a>
	</div>
</div>

<?php do_action( 'woocommerce_share' ); // Sharing plugins can hook into here

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
