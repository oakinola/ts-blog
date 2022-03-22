<!-- START common/single-blog-header.php -->

<?php 
	$blogImage = oak_get_default_featured_image();
	if ( get_the_post_thumbnail(get_the_ID()) != '' ) {
		$blogImage = get_the_post_thumbnail_url( null, 'post-thumbnail');		
	}
?>
<section class="blog-header ptb-100 bg-img bg-img-scroll mb-3" style="background-image: url(<?php echo $blogImage ?>);">
	<!-- <div class="oak-overlay"></div> -->
    <div class="container">
    	<div class="row text-center d-flex justify-content-center">
        	<div class="col-md-10 p-5 blog-header-content">
           		<h1 class="h2-display mb-5"><?= the_title(); ?></h1>
                <p>Posted on <?php echo get_the_date(); ?> </p>
            </div>
        </div>
    </div>
</section>
<!-- END common/single-blog-header.php -->