<div <?php echo $sed_attrs; ?> class="module module-terms module-terms-default <?php echo $class; ?> ">

	<?php
	if ( !empty( $terms ) ) {

		?>
		<div class="product-wrapper row">
			<?php

			foreach ($terms AS $term) {

				$thumbnail_id = get_woocommerce_term_meta($term->term_id, 'thumbnail_id', true);

				$img = get_sed_attachment_image_html($thumbnail_id, "", "600X310");
				?>

				<div class="col-sm-6 col-xs-12">
					<div class="product-item">

						<div class="product-item-image">
							<div class="product-item-image-inner">
								<?php
								if ($img) {
									echo $img['thumbnail'];
								}
								?>
							</div>
						</div>

						<a href="<?php echo esc_url(get_term_link($term, 'product_cat')); ?>"
						   class="product-item-info">
							<div class="product-item-info-inner">
								<div class="product-item-info-content">
									<h4 class="product-item-info-title">
										<?php
										echo esc_html($term->name);

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

				<?php
			} ?>

		</div>

		<?php
	}
	?>

</div>
