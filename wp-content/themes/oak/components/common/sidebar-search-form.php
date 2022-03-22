<!-- START common/sidebar-search-form.php -->
<?php
/*
 * Generate a unique ID for each form and a string containing an aria-label
 * if one was passed to get_search_form() in the args array.
 */
$unique_search_form_id = wp_unique_id( 'search-form-' );
$oak_aria_label = ! empty( $args['aria_label'] ) ? 'aria-label="' . esc_attr( $args['aria_label'] ) . '"' : '';
?>

<h3 class="sidebar-title">Search</h3>
<div class="sidebar-item search-form">
    <form role="search" <?php echo $oak_aria_label; ?> method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
        <label for="<?php echo esc_attr( $unique_search_form_id ); ?>"></label>
        <input type="text" id="<?php echo esc_attr( $unique_search_form_id ); ?>" value="<?php echo get_search_query(); ?>" name="s"  placeholder="Search" aria-label="Search"/>
        <button type="submit"><i class="bi bi-search"></i></button>
    </form>
</div>
<!-- END common/sidebar-search-form.php -->
