<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage floristeady
 * @since floristeady 1.0
 */

get_header(); ?>

<section class="container">
	<div id="content">

<?
$post = $wp_query->post;

if ( in_category ('Portfolio')  ) {
    include(TEMPLATEPATH . '/single-portfolio.php');
} else if ( in_category('Blog')) {
    include(TEMPLATEPATH . '/single-blog.php');
} else {
	include(TEMPLATEPATH . '/single-portfolio.php');
}
?>
	</div>
</section>

<?php get_footer(); ?>
