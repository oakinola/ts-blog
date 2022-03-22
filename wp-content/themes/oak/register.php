<!--START register.php -->
<?php /* Template Name: registration_template */ ?>

<?php $pagename = oak_current_page(); ?>
	
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

	<?php  get_template_part( 'components/common/dochead' ); ?>

	<body class="<?= $pagename; ?> jad-bg-primary" data-pagename="<?= $pagename ?>">
		<?php get_header(); ?>
		  		
		<?php get_template_part( 'components/register/register'); ?>
		
        <?php get_footer() ?>

    </body> 
 </html>    
<!--End register.php -->