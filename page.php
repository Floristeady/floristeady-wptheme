<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the wordpress construct of pages
 * and that other 'pages' on your wordpress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage floristeady
 * @since floristeady 1.0
 */

get_header(); ?>

<section class="container">
	<div id="content">

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<?php if ( is_front_page() ) { ?>
					<h2 class="entry-title"><?php the_title(); ?></h2>
				<?php } else { ?>	
					<h1 class="entry-title"><?php the_title(); ?>
					<span>
					<?php $myExcerpt = get_the_excerpt();
						  $tags = array("<p>", "</p>");
						  $myExcerpt = str_replace($tags, "", $myExcerpt);
						  echo $myExcerpt;
						  ?> 
					</span></h1>
				<?php } ?>
				
					<div class="entry-content">
						<?php the_content(); ?>
						<?php wp_link_pages( array( 'before' => '' . __( 'Pages:', 'floristeady' ), 'after' => '' ) ); ?>
						<?php edit_post_link( __( 'Edit', 'floristeady' ), '', '' ); ?>
					</div><!-- .entry-content -->
				</article><!-- #post-## -->
				<?php comments_template( '', true ); ?>
<?php endwhile; ?>
	</div>
</section>

<?php get_footer(); ?>