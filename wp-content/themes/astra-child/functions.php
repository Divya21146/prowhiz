<?php
function enqueue_font_awesome() {
    wp_enqueue_style( 'font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css' );
    wp_enqueue_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js', array(), null, true);
    wp_enqueue_style('owl-carousel', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css');
	wp_enqueue_style('owl-theme-default', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css');
	wp_enqueue_script('owl-carousel', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js', array('jquery'), '', true);
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
        <?php endwhile; ?>
    <?php else : ?>
        <p>No posts found</p>
    <?php endif;
    wp_reset_postdata();
    wp_die();
}

//load more tech skills
add_action('wp_ajax_load_more_tech_skills', 'load_more_tech_skills');
add_action('wp_ajax_nopriv_load_more_tech_skills', 'load_more_tech_skills');
function load_more_tech_skills() {
    ?>
    <div class="events">
            <?php
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
            $args = array(
                'post_type' => 'tech_skills',
                'posts_per_page' => 4,
                'paged' => $paged,
                'post_status' => 'publish',
            );
            $query = new WP_Query($args);
            if ($query->have_posts()) :
                while ($query->have_posts()) : $query->the_post(); ?>
                    <div>
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
    <?php
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

//proconnect contents
function proconnect() {
$args = array(
    'post_type' => 'pro_connect',
    'post_status' => 'publish',
);
$query = new WP_Query($args);
if ($query->have_posts()) : ?>
    <?php while ($query->have_posts()) : $query->the_post(); ?>
        <div class="pro_connect"> 
            <?php 
                if (get_field('image')) {
                    $image = get_field('image');
                    echo '<img src="' . $image . '" alt="image" />';
                }   
            ?>             
            <div class="cat">
            <div class="content">
            <h4><?php the_title(); ?></h4>
                <div><?php echo get_field('description'); ?></div>
            </div>
            <?php $youtube_link = get_field('youtube_link'); ?>
            <div class="url">
                <div><p><?php echo get_field('name'); ?></p></div>
                <div><button class="event-btn"><a href="<?php echo esc_url($youtube_link); ?>" target="_blank">View Now</a></button></div>
            </div>
            </div>
        </div>
    <?php endwhile; ?>
<?php else : ?>
    <p>No Pro Connects found</p>
<?php endif;
wp_reset_postdata();
}

function proconnect_shortcode() {
    ob_start();
    proconnect();
    return ob_get_clean();
}
add_shortcode('proconnect_shortcode', 'proconnect_shortcode');

//testimonial carousel
function testimonial_carousel_shortcode() {
    ob_start();
    
    $testimonials = new WP_Query(array(
        'post_type' => 'testimonial',
        'posts_per_page' => -1,
    ));

    if ($testimonials->have_posts()) :
    ?>
	<div class="testimonial-carousel-wrapper">
    	<div class="testimonial-carousel owl-carousel">
            <?php while ($testimonials->have_posts()) : $testimonials->the_post(); ?>
                <div class="testimonial-item"> 
					<div class="testimonial-profile">
					<div class="testimonial-image"><img src="<?php the_field('photo'); ?>" alt=""></div>
                    <div class="testimonial-employee">
                        <p><?php the_field('feedback'); ?></p>
                        <div class="testimonial-rating">
                    <?php 
                    $rating = get_field('ratings');
                    for ($i = 1; $i <= 5; $i++) {
                        if ($i <= $rating) {
                            echo '<i class="fa fa-star" style="color: #f1c40f;"></i>';
                        } else {
                            echo '<i class="fa fa-star" style="color: #ccc;"></i>';
                        }
                    }
                    ?>
                </div>
                <div class="testimonial-name"><?php the_title(); ?></div>
						<div class="role-and-company-name"><?php the_field('designation'); ?></div>
					</div>
					</div>
                </div>
            <?php endwhile; ?>
        </div>
		<div class="testimonial-carousel-nav">
            <button class="testimonial-carousel-prev">prev</button>
            <button class="testimonial-carousel-next">next</button>
        </div>
	</div>	
		<script>
        jQuery(document).ready(function($) {
             // Function to set equal height for card items
             function setEqualHeight(selector) {
                var tallestHeight = 0;
                $(selector).each(function() {
                    var currentHeight = $(this).height();
                    if (currentHeight > tallestHeight) {
                        tallestHeight = currentHeight;
                    }
                });
                $(selector).height(tallestHeight);
            }
            
            // Call the function on window load and resize
            $(window).on('load resize', function() {
                setEqualHeight('.testimonial-carousel .testimonial-item');
            });
            $('.testimonial-carousel').owlCarousel({
                items: 1,
                loop: true,
                margin: 30,
                nav: false,
                dots: false,
                responsive:{
                    0:{
                        items:1
                    },
                    768:{
                        items:1
                    }
                }
            });
			$('.testimonial-carousel-prev').click(function() {
                $('.testimonial-carousel').trigger('prev.owl.carousel');
            });
            $('.testimonial-carousel-next').click(function() {
                $('.testimonial-carousel').trigger('next.owl.carousel');
            });
        });
    </script>
    <?php
    endif;

    wp_reset_postdata();

    return ob_get_clean();
}
add_shortcode('testimonial_carousel', 'testimonial_carousel_shortcode');