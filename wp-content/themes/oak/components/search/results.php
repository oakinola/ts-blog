<!-- START proverbs/proverb-lister.php -->
<section class="search-results-section ptb-100">
	<div class="container">
		<div class="row">
			<div class="col-md-12 mb-3 text-center">
				<h1 class="display-3 mb-5">
					<?php
					printf(
						/* translators: %s: search term. */
						esc_html__( 'Results for "%s"', 'olatunjiakinola' ),
						'<span class="page-description search-term">' . esc_html( get_search_query() ) . '</span>'
					);?>
				</h1>
				<?php if ( have_posts() ) { ?>
				<p><?php
						printf(
							esc_html(
								/* translators: %d: the number of search results. */
								_n(
									'We found %d result for your search.',
									'We found %d results for your search.',
									(int) $wp_query->found_posts,
									'olatunjiakinola'
								)
							),
							(int) $wp_query->found_posts
						);
					?>
				</p>
				<?php } ?>
			</div>
		</div>

		<?php if ( have_posts() ) { ?>
		<div class="search-results row d-flex justify-content-center">
			<?php while (have_posts() ) { 
				the_post(); ?>
			<div class="search-result col-10 p-3 row-striped">
				<p class="result-heading text-uppercase"><a href="<?= the_permalink(); ?>"><strong><?= the_title(); ?></strong></a></p>
				<?php the_excerpt();?>
				<p class="result-link dont-break-out "><a href="<?= the_permalink(); ?>"><?= the_permalink(); ?></a></p>
					
				<!--<div class="post-type text-center"><?php echo oak_get_post_type_letter() ?></div> -->
			</div>
			<?php } ?>
		</div>
		<?php } ?>
	</div>
</section>
<!-- END proverbs/proverb-lister.php -->
