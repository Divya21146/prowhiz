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
                        echo "<div class='host-details'>";
                        if (get_field('host_photo')) {
                            $host_photo = get_field('host_photo');
                            echo '<img src="' . $host_photo . '" alt="host" />';
                        }
                        ?>
                        <p><?php echo get_field('host_name') ?: 'Host Name Not Provided'; ?></p>
                        <p><?php echo get_field('host_position') ?: 'Position Not Provided'; ?></p>
                        <div><?php echo get_field('address') ?: 'Address Not Provided'; ?></div>
                        <div><?php echo get_field('from') ?: 'Start Date Not Provided'; ?></div>
                        <div><?php echo get_field('to') ?: 'End Date Not Provided'; ?></div>
                    </div>
                    </div>
                        <h5><?php the_title(); ?></h5>
                        <button class="event-btn"><a href="<?php echo esc_url(get_permalink()); ?>">Register</a></button>
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