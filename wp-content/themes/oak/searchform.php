<?php
/**
 * The searchform.php template.
 *
 * Used any time that get_search_form() is called.
 *
 * @link https://developer.wordpress.org/reference/functions/wp_unique_id/
 * @link https://developer.wordpress.org/reference/functions/get_search_form/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since 1.0.0
 */

/*
 * Generate a unique ID for each form and a string containing an aria-label
 * if one was passed to get_search_form() in the args array.
 */
$oak_unique_id = wp_unique_id( 'search-form-' );

$oak_aria_label = ! empty( $args['aria_label'] ) ? 'aria-label="' . esc_attr( $args['aria_label'] ) . '"' : '';
?>
<form class="d-flex align-items-center ml-2 oak-search" role="search" <?php echo $oak_aria_label; ?> method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label for="<?php echo esc_attr( $oak_unique_id ); ?>"></label>
	<input type="search" id="<?php echo esc_attr( $oak_unique_id ); ?>" class="form-control me-2" value="<?php echo get_search_query(); ?>" name="s"  placeholder="Search" aria-label="Search"/>
	<button type="submit" class="btn oak-btn oak-btn-dark-outline no-overflow" value="<?php echo esc_attr_x( 'Search', 'submit button', 'olatunjiakinola' ); ?>">Search</button>
</form>

