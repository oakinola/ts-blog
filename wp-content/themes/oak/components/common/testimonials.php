<!-- START common/testimonials.php -->
<section class="testimonials pb-100">
	<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
		<path fill="#fcbdc8" fill-opacity="1" d="M0,96L48,122.7C96,149,192,203,288,192C384,181,480,107,576,117.3C672,128,768,224,864,245.3C960,267,1056,213,1152,192C1248,171,1344,181,1392,186.7L1440,192L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z"></path>
	</svg>
	<div class="container mt-5 text-center dark-grey-text jad-move-up-md jad-move-up-lg">
		<h2 class="font-weight-bold mb-5 pb-2" data-aos="fade-up-right" data-aos-offset="100" data-aos-duration="2500" data-aos-easing="ease-in-out">Testimonials</h2>

		<div class="wrapper-carousel-fix">
			<div id="carousel-example-1" class="carousel no-flex testimonial-carousel slide carousel-fade" data-ride="carousel" data-interval="5000">
				<div class="carousel-inner" role="listbox" data-aos="fade-up-left" data-aos-offset="100" data-aos-duration="3000" data-aos-easing="ease-in-out">
				<?php

					$testimonial_category = $args['testimonial_category'];
					$queryArgs = array( 'numberposts' => -1, 'category_name' => $testimonial_category );
					$testimonies = get_posts( $queryArgs );
					$count = 0;
					
					foreach ($testimonies as $post) : setup_postdata($post); 
						$pictureURL = get_post_meta( get_the_ID(), 'Picture', true );   
						$testifier = get_post_meta( get_the_ID(), 'Testifier', true );
						$location = get_post_meta( get_the_ID(), 'Location', true );
						$date = get_post_meta( get_the_ID(), 'Date', true );
						
						if (empty($pictureURL)) {
							$pictureURL = oak_get_default_person_image();
						}
						
						$count++;
				?>			
					<div class="carousel-item <?php echo ($count == 1) ? 'active' : ''?>">
						<div class="testimonial">							
							<div class="avatar mx-auto mb-4">
								<img src="<?php echo $pictureURL?>" class="rounded-circle img-fluid" alt="<?php echo $testifier; ?>">
							</div>
							<p data-aos="fade-up" data-aos-offset="50" data-aos-easing="linear">
								<i class="fas fa-quote-left"></i>
								<?php the_content(); ?>
							</p>
							<h5 class="font-weight-bold"><?php echo $testifier; ?></h5>
							<h6 class="font-weight-bold my-3"><?php echo $location; ?></h6>
						</div>
					</div>
					<?php endforeach;?>
				</div>
				<!--Controls-->
				<a class="carousel-control-prev left carousel-control" href="#carousel-example-1" role="button"
					data-slide="prev">
					<span class="icon-prev" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="carousel-control-next right carousel-control" href="#carousel-example-1" role="button"
					data-slide="next">
					<span class="icon-next" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a>
			</div>
		</div>
	</div>
</section>
<!-- END common/testimonials.php -->