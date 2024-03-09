<div id="primary" <?php astra_primary_class(); ?>>
    <?php
    astra_primary_content_top();
    echo "<div class='blog-head'>";
    $blog_page_content = get_post_field('post_content', get_option('page_for_posts'));
    echo '<div class="blog-page-content"><h3>' . apply_filters('the_content', $blog_page_content) . '</h3></div>';
    $all_categories = get_categories(array(
        'hide_empty' => false
    ));
    ?>
    <div class="cat">
    <?php
    if ($all_categories) {
        foreach ($all_categories as $categories) {
            echo '<button class="cat-btn"><a href="' . esc_url(get_category_link($categories->term_id)) . '">' . esc_html($categories->name) . '</a></button>';
        }
    }
    ?>
    </div>
</div>
    <div class="blogs">
        <?php
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        $args = array(
            'posts_per_page' => 4,
            'paged' => $paged,
            'post_status' => 'publish',
        );
        $query = new WP_Query($args);
        if ($query->have_posts()) : ?>
            <?php while ($query->have_posts()) : $query->the_post(); ?>
                <div>
                    <?php if (has_post_thumbnail()) : ?>
                        <img src="<?php echo esc_url(get_the_post_thumbnail_url()); ?>" alt="image">
                        <div class="cat">
                            <?php
                            $categories = get_the_category();
                            if ($categories) {
                                foreach ($categories as $category) {
                                    echo '<button class="cat-btn"><a href="' . esc_url(get_category_link($category->term_id)) . '">' . esc_html($category->name) . '</a></button>';
                                }
                            }
                            ?>
                        </div>
                        <div>
                            <span><?php echo get_field('total_lessons'); ?></span>
                            <span><?php echo get_field('total_students'); ?></span>
                        </div>
                        <h5><?php the_title(); ?></h5>
                        <div><?php echo get_field('author'); ?></div>
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
                                <span>$<?php echo get_field('regular_price'); ?></span>
                                <span>$<?php echo get_field('sale_price'); ?></span>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endwhile; ?>
        <?php
            if ($query->max_num_pages > 1) :
        ?>
        <?php endif; ?>
        <?php else : ?>
            <p>No posts found</p>
        <?php endif;
        wp_reset_postdata();
        ?>
    </div>
    <div class="load-more-container">
        <div>
        <?php
        $upload_dir = wp_upload_dir();
        $loading_image_url = $upload_dir['baseurl'] . '/2024/03/Spinner.gif';
        ?>
            <img id="loadingImage" src="<?php echo esc_url($loading_image_url); ?>" alt="Loading..." style="display: none;" />
        </div>
            <button id="load-more-posts" data-current-page="<?php echo esc_attr($paged); ?>" data-max-pages="<?php echo $query->max_num_pages; ?>">Load More</button>
    </div>
    <?php
    astra_primary_content_bottom();
    ?>
</div><!-- #primary -->