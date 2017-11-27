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

<div id="post-<?php the_ID(); ?>" <?php post_class( 'post news single-' . get_post_type( get_the_ID() ) ); ?>>

	<div class="custom-post-type-single">
	    <div class="single-wrapper">
	        <div class="single-img-wrap">

				<?php
				$negar_single_type = get_post_meta( get_the_ID() , "wpcf-negar_single_type" , true );
				?>

		        <div class="single-img <?php echo esc_attr($negar_single_type);?>-type">
					<?php

					$self_hosted_video = get_post_meta( get_the_ID() , "wpcf-self_hosted_video_url" , true );

					$external_video_code = get_post_meta( get_the_ID() , "wpcf-external_video_code" , true );

					if( $negar_single_type == "video" && ( !empty($self_hosted_video) || !empty($external_video_code) ) ) {

						if (!empty($self_hosted_video)) {

							$poster_url = get_the_post_thumbnail_url(get_the_ID(), "full");

							if (!$poster_url) {
								$poster_url = "";
							}

							echo do_shortcode('[video width="1200" height="680" src="' . $self_hosted_video["url"] . '" poster="' . $poster_url . '"]');

						} else {

							echo $external_video_code;

						}

					}else{

						$attachment_id   = get_post_thumbnail_id();

						$img = get_sed_attachment_image_html( $attachment_id , "" , "1920X690" );

						if ( $img ) {
							echo $img['thumbnail'];
						}

					}
					?>
		        </div>

	        </div>

			<div class="single-project-layout-container clearfix">

				<div class="single-content">

					<div class="single-heading content-inner">

						<div class="single-heading-inner sed-row-boxed inner-container-project">
							<h2 class="title"><?php the_title(); ?></h2>
							<div class="subtitle">
								<?php

								$post_sub_title = get_post_meta( get_the_ID() , "wpcf-post_sub_title" , true );

								echo apply_filters( 'bsanat_short_description' , $post_sub_title );

								?>
							</div>
						</div>

					</div>

					<div class="single-content-inner content-inner">

						<div class="sed-row-boxed inner-container-project">
							<?php
								/* translators: %s: Name of current post */
								the_content( sprintf(
									__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'twentyseventeen' ),
									get_the_title()
								) );
							?>
						</div><!-- the_content -->

					</div>

				</div>

				<div class="bos-left-sidebar">

					<div class="sidebar-inner">

						<div class="next-post">
							<?php next_post_link('%link'); ?>
						</div>

					</div>

				</div>

			</div>

	    </div>  
	</div>  

</div><!-- #post-## -->         