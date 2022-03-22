<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since 1.0.0
 */
?>
<?php $pagename = 'search'; ?>
	
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	
	<?php  get_template_part( 'components/common/dochead' ); ?> 
	<body>
		<?php get_header(); ?>
	
		<?php get_template_part( 'components/search/results' ); ?>
		
		<?php get_footer() ?>
	</body>
</html>
