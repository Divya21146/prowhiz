<?php
function enqueue_font_awesome() {
    wp_enqueue_style( 'font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css' );
    wp_enqueue_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js', array(), null, true);
}
add_action( 'wp_enqueue_scripts', 'enqueue_font_awesome' );

add_action('wp_ajax_load_more_posts', 'load_more_posts');
add_action('wp_ajax_nopriv_load_more_posts', 'load_more_posts');

function load_more_posts()
{
    $paged = $_POST['page'];
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
    <?php else : ?>
        <p>No posts found</p>
    <?php endif;
    wp_reset_postdata();
    wp_die();
}

// Load more posts for category
add_action('wp_ajax_load_more_posts_categories', 'load_more_posts_categories');
add_action('wp_ajax_nopriv_load_more_posts_categories', 'load_more_posts_categories');

function load_more_posts_categories()
{
    $paged = $_POST['page'];
    $category_id = $_POST['category_id']; 
    $args = array(
        'posts_per_page' => 4,
        'paged' => $paged,
        'post_status' => 'publish',
        'cat' => $category_id,
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
    <?php else : ?>
        <p>No posts found</p>
    <?php endif;
    wp_reset_postdata();
    wp_die();
}