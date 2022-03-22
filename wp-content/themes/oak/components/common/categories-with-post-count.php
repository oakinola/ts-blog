<!-- START common/categories-with-post-count.php -->
<h3 class="sidebar-title">Categories</h3>
<div class="sidebar-item categories">
    <ul>
        <?php
            $categories = get_categories();
            foreach ( $categories as $category ) :
            $category_link = get_category_link( $category->term_id );
        ?>
        <li>
            <a href='<?php echo $category_link; ?>'><?php echo $category->name ?> <span>(<?php echo $category->count ?>)</span></a>
        </li>
        <?php endforeach; ?>
    </ul>
</div>
<!-- END common/categories-with-post-count.php -->