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

?>

<div id="post-<?php the_ID(); ?>" <?php post_class( 'applicate-post' ); ?>>

	<div class="custom-post-type-single">

	    <div class="single-wrapper">

	        <div class="single-img">        	
	        	<?php if ( '' !== get_the_post_thumbnail() ) : ?>
	                <?php
					$attachment_id   = get_post_thumbnail_id();

					$img = get_sed_attachment_image_html( $attachment_id , "" , "1200X400" );

					if ( $img ) {
						echo $img['thumbnail'];
					}
					?>
	            <?php endif; ?>
	        </div>

			<div class="single-heading">
				<h2 class="title"><?php the_title(); ?></h2>
			</div>

	        <div class="single-content">
	            <div class="single-content-inner">
					<div>  
						<?php
							/* translators: %s: Name of current post */
							the_content();
						?>
					</div><!-- the_content -->   

	            </div>
	        </div>

	    </div>  
	</div>  

</div><!-- #post-## -->         