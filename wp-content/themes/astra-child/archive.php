<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Astra
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header(); ?>

<?php if ( astra_page_layout() == 'left-sidebar' ) : ?>

	<?php get_sidebar(); ?>

<?php endif ?>
<?php get_template_part('blogs/category-blog'); ?>
<?php get_template_part('blogs/category-blog-scripts'); ?>
<?php
 if ( astra_page_layout() == 'right-sidebar' ) : 
 ?>

	<?php get_sidebar(); ?>

<?php endif ?>

<?php get_footer(); ?>