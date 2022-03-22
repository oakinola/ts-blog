<!-- START common/sidebar.php -->
<div class="sidebar">
    <?php get_template_part( 'components/common/sidebar', 'search-form' ); ?>

    <?php get_template_part( 'components/common/categories', 'with-post-count' ); ?>

    <?php get_template_part( 'components/common/recent', 'posts' ); ?>

    <?php //get_template_part( 'components/common/all', 'tags' ); ?>

</div><!-- End sidebar -->
<!-- END common/sidebar.php -->