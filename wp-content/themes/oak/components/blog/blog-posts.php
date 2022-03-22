<!-- START blog/blog-posts.php -->
<section class="blog-posts pt-50">
	<div class="container-fluid">
  		<div class="text-center articles">			
			<div class="row">
			<?php
				$count = 0;			
				$args = array( 'numberposts' => -1 );
				$allPosts = get_posts( $args );
				
				foreach ($allPosts as $post) : setup_postdata($post); 
					$count++;
					//if ($count == 1) :	
					//	continue;
					//endif;			
			?>				
				<div class="col-lg-4 col-md-6 gx-0">

				<?php 
					$featured_image = oak_get_default_featured_image();
					if (has_post_thumbnail(get_the_ID())) { 
						$featured_image =  get_the_post_thumbnail_url($post, 'post-thumbnail'); 
					} ?>
					<div class="article" style="background-image: linear-gradient(rgba(0,32,70,.7),rgba(0,32,70,.7)), url('<?php echo $featured_image; ?>');">
						<!-- Featured image -->
						<div class="view overlay rounded z-depth-2 mb-4">
							<a href="<?php the_permalink(); ?>">
								<div class="mask rgba-white-slight"></div>
							</a>
						</div>
				<!--		
						<a href="#!" class="pink-text">
							<h6 class="font-weight-bold mb-3"><i class="fas fa-map pr-2"></i><?php echo oak_get_post_categories_as_string();?></h6>
						</a>
				-->
						
						<h4 class="font-weight-bold mb-3"><strong><?php the_title();?></strong></h4>					
						<p>by <a class="font-weight-bold"><?php the_author() ?></a>, <?php the_date() ?></p>					
						<p class="dark-grey-text"><?php the_excerpt(); ?></p>
					
						<a href="<?php the_permalink(); ?>" class="btn oak-btn oak-btn-white-outline oak-btn-rounded btn-md">Continue Reading<i class="fas fa-caret-right ms-3"></i></a>
					</div>	
				</div>
				<?php endforeach ?>
			</div>
		</div>
	</div>
</section>
<!-- END blog/blog-posts.php -->