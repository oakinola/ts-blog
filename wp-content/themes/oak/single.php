<!-- START single.php  -->
<?php $pagename =  "single-blog"; ?>
	
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

	<?php  get_template_part( 'components/common/dochead' ); ?>
	<body class="<?= $pagename; ?>" data-pagename="<?= $pagename ?>"> 
		
		<?php get_header();
		
		get_template_part( 'components/blog/single', 'blog-header' );
		get_template_part( 'components/blog/single', 'blog-post' );

		get_template_part( 'components/common/oak', 'comments' );?>

		
		<?php get_footer(); ?>
	</body> 
</html>       	
<!-- END single.php -->