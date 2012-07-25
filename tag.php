<?php
/**
 * The template for displaying Tag Archive pages.
 *
 * @package WordPress
 * @subpackage floristeady
 * @since floristeady 1.0
 */

get_header(); ?>

<section class="container">
	<div id="content">


				<h1><?php
					printf( __( 'Archivo etiquetas <span>(Tag Archives)</span>: %s', 'floristeady' ), '' . single_tag_title( '', false ) . '' );
				?></h1>

<?php
/* Run the loop for the tag archive to output the posts
 * If you want to overload this in a child theme then include a file
 * called loop-tag.php and that will be used instead.
 */
 get_template_part( 'loop', 'tag' );
?>

	</div>
</section>

<?php get_footer(); ?>