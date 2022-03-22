<!-- START blog.php -->
<?php /* Template Name: blog_template */ ?>

<!--?php $pagename = oak_current_page(); ?-->
<?php $pagename = 'blog'; ?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>

	<?php  get_template_part( 'components/common/dochead' ); ?> 
	<body class="<?= $pagename; ?>" data-pagename="<?= $pagename ?>">
		<?php get_header(); ?>
		
		<?php // get_template_part( 'components/blog/blog', 'posts-latest' ); ?>
		<?php  get_template_part( 'components/blog/blog', 'posts-header' ); ?>
		<?php // get_template_part( 'components/blog/blog', 'service-ad' ); ?>
		<?php // get_template_part( 'components/blog/blog', 'posts' ); ?>
		<?php  get_template_part( 'components/common/breadcrumb' ); ?>
		<?php  get_template_part( 'components/blog/blog', 'posts-v2' ); ?>

		<?php get_footer() ?>

	</body> 
</html>       	
<!-- END blog.php -->