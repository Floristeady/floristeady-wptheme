<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package WordPress
 * @subpackage floristeady
 * @since floristeady 1.0
 */

get_header(); ?>

<section class="container">
	<div id="content">

<?php if ( have_posts() ) : ?>
				<h1><?php printf( __( 'Resultados para <span>(Search Results for):</span> %s', 'floristeady' ), '' . get_search_query() . '' ); ?></h1>
				<?php
				/* Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called loop-search.php and that will be used instead.
				 */
				 get_template_part( 'loop', 'search' );
				?>
<?php else : ?>
					<h1><?php _e( 'Nothing Found / No existen resultados', 'floristeady' ); ?></h1>
					<p><?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.<br> Disculpa, pero no se encuentra lo que buscas, por favor int&eacute;ntalo nuevamente.', 'floristeady' ); ?></p>
					<?php get_search_form(); ?>
<?php endif; ?>

	</div>

</section>
<?php get_footer(); ?>
