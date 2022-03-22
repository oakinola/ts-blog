<!-- START common/recent-posts.php -->
<h3 class="sidebar-title">Recent Posts</h3>
    <div class="sidebar-item recent-posts">
        
    <?php
        $args = array( 'numberposts' => '5' );
        $recent_posts = wp_get_recent_posts( $args, OBJECT );
        foreach( $recent_posts as $recent ) { ?>
        
        <div class="post-item clearfix">
            <img src="<?php echo oak_get_featured_image_for_post($recent) ?>" alt="<?php echo $recent->post_title;?>">
            <h4><a href="<?php  the_permalink($recent); ?>"><?php echo $recent->post_title;?></a></h4>
            <time datetime="2020-01-01"><?php echo date('j F Y', strtotime($recent->post_date)) ?></time>
        </div>

        <?php } ?>
    </div>
<!-- END common/recent-posts.php -->