<div id="primary" <?php astra_primary_class(); ?>>
    <?php
    astra_primary_content_top();
    echo "<div class='blog-head'>";
    $blog_page_content = get_post_field('post_content', get_option('page_for_posts'));
    echo '<div class="blog-page-content"><h3>' . apply_filters('the_content', $blog_page_content) . '</h3></div>';
?>
</div>
    <div class="blogs">
        <?php
        // $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        $args = array(
            // 'posts_per_page' => 4,
            // 'paged' => $paged,
            'post_status' => 'publish',
        );
        $query = new WP_Query($args);

        if ($query->have_posts()) : ?>
            <?php while ($query->have_posts()) : $query->the_post(); ?>
                <div class="blog-col">
                        <img src="<?php echo get_field('course_image'); ?>" alt="course image">
                        <h5><?php the_title(); ?></h5>
                        <div class="rating-price">
                            <div class="rating">
                                <?php
                                $rating = get_field('ratings');
                                echo get_field('ratings');
                                for ($i = 1; $i <= 5; $i++) {
                                    if ($i <= $rating) {
                                        echo '<i class="fa fa-star" style="color: #f1c40f;"></i>';
                                    } else {
                                        echo '<i class="fa fa-star" style="color: #ccc;"></i>';
                                    }
                                }
                                ?>
                            </div>
                            <div>
                                <span><?php echo get_field('course_timing'); ?></span>
                            </div>
                        </div>
                </div>
                <?php endwhile;
            else : ?>
                <p>No events found</p>
            <?php endif;
        wp_reset_postdata();
        ?>
    </div>
    
    <!-- <div class='blog-head'> -->
    <h3>Tech Skills</h3>
    <div class="blogs skills">
            <?php
            // $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
            $args = array(
                'post_type' => 'tech_skills',
                // 'posts_per_page' => 4,
                // 'paged' => $paged,
                'post_status' => 'publish',
            );
            $query = new WP_Query($args);
            ?>
            <?php
            if ($query->have_posts()) :
                while ($query->have_posts()) : $query->the_post(); ?>
                    <div class="blog-col">
                        <img src="<?php echo get_field('course_image'); ?>" alt="course image">
                        <h5><?php the_title(); ?></h5>
                        <div class="rating-price">
                            <div class="rating">
                                <?php
                                $rating = get_field('ratings');
                                echo get_field('ratings');
                                for ($i = 1; $i <= 5; $i++) {
                                    if ($i <= $rating) {
                                        echo '<i class="fa fa-star" style="color: #f1c40f;"></i>';
                                    } else {
                                        echo '<i class="fa fa-star" style="color: #ccc;"></i>';
                                    }
                                }
                                ?>
                            </div>
                            <div>
                                <span><?php echo get_field('course_timing'); ?></span>
                            </div>
                        </div>
                </div>
                <?php endwhile;
            else : ?>
                <p>No events found</p>
            <?php endif;

            wp_reset_postdata();
            ?>
        </div>
            <!-- </div> -->
    <?php
    astra_primary_content_bottom();
    ?>
</div><!-- #primary -->