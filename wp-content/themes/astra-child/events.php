    <?php
    /**
     * Template Name: Events Page
     * 
     * The template for displaying events pages.
     *
     * @link https://codex.wordpress.org/Template_Hierarchy
     *
     * @package Astra
     * @since 1.0.0
     */

    if ( ! defined( 'ABSPATH' ) ) {
        exit;
    }

    get_header(); ?>

    <?php if ( astra_page_layout() == 'left-sidebar' ) : ?>

        <?php get_sidebar(); ?>

    <?php endif ?>
    <div id="primary" <?php astra_primary_class(); ?>>
        <?php
        astra_primary_content_top(); ?>
        <div class="events-head">
            <h2>WORKSHOPS</h2>
            <div class="breadcrumbs">
                <span>Home</span>
                <span><img src="http://localhost/prowhiz/wp-content/uploads/2024/03/Item.png" alt=""></span>
                <span>Events</span>
            </div>
        </div>
        <div class="events">
            <?php
            // $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
            $args = array(
                'post_type' => 'event',
                // 'posts_per_page' => 4,
                // 'paged' => $paged,
                'post_status' => 'publish',
            );
            $query = new WP_Query($args);
            if ($query->have_posts()) :
                while ($query->have_posts()) : $query->the_post(); ?>
                    <div class="event">
                        <?php
                        echo "<div class='event-content'>";
                        // Check if custom fields exist before displaying
                        if (get_field('image')) {
                            $image = get_field('image');
                            echo '<img src="' . $image . '" alt="image" />';
                        }
                        ?>
                    </div>
                    <div class="event-details">
                        <h5><?php the_title(); ?></h5>
                        <button class="event-btn"><a href="<?php echo esc_url(get_permalink()); ?>">Register                <span><img src="http://localhost/prowhiz/wp-content/uploads/2024/03/Item.png" alt=""></span>
</a></button>
                    </div>
                    </div>
                <?php endwhile;
            else : ?>
                <p>No events found</p>
            <?php endif;

            wp_reset_postdata();
            ?>
        </div>

        <?php astra_primary_content_bottom(); ?>
    </div><!-- #primary -->
    <?php
    if ( astra_page_layout() == 'right-sidebar' ) : 
    ?>

        <?php get_sidebar(); ?>

    <?php endif ?>

    <?php get_footer(); ?>