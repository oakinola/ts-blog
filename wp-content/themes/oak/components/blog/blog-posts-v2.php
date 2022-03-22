<!-- START blog-posts-v2.php -->
<section id="blog-container" class="blog-container">
    <div class="container aos-init aos-animate" data-aos="fade-up">
        <div class="row">        
            <div class="col-lg-8 entries">
            <?php
                $count = 0;			
                $args = array( 'numberposts' => -1 );
                $allPosts = get_posts( $args );
                
                foreach ($allPosts as $post) : setup_postdata($post); 
                    $count++;
            ?>
                <article class="entry">
                    <div class="entry-img">
                        <img class="img-fluid" src="<?php echo oak_get_featured_image_for_post($post) ?>" alt="<?php the_title(); ?>">
                    </div>

                    <h2 class="entry-title">
                        <a href="<?php the_permalink(); ?>"><?php the_title();?></a>
                    </h2>

                    <div class="entry-meta">
                        <ul>
                            <li class="d-flex align-items-center"><i class="bi bi-calendar2-event-fill"></i> <a href="<?php the_permalink(); ?>"><time datetime="2020-01-01"><?php the_date() ?></time></a></li>
                            <li class="d-flex align-items-center"><i class="bi bi-binoculars-fill"></i></i> <a href="<?php the_permalink(); ?>"><?php echo oak_get_post_views(get_the_ID()) ?></a></li>                            
                            <li class="d-flex align-items-center"><i class="bi bi-chat-dots-fill"></i> <a href="<?php the_permalink(); ?>"><?php echo get_comments_number() . ' Comments' ?></a></li>
                        </ul>
                    </div>

                    <div class="entry-content">
                        <?php the_excerpt(); ?>
                        
                        <div class="read-more">
                            <a href="<?php the_permalink(); ?>">Read More</a>
                        </div>
                    </div>
                </article><!-- End blog entry -->
                <?php endforeach ?>
<!--
                <div class="blog-pagination">
                    <ul class="justify-content-center">
                        <li><a href="#">1</a></li>
                        <li class="active"><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                    </ul>
                </div>
-->
            </div><!-- End blog entries list -->

            <div class="col-lg-4">
                
                <?php get_template_part( 'components/common/sidebar' ); ?>
                
            </div><!-- End blog sidebar -->
        </div>
    </div>
</section>
<!-- END blog-posts-v2.php -->