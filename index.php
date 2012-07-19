<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query. 
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage floristeady
 * @since floristeady 1.0
 */

get_header(); ?>

	<div id="portfolio">
    <?php query_posts('category_name=portfolio') ?>
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    
	    <div class="project <?php /*tags*/ $posttags = get_the_tags();
			if ($posttags) { foreach($posttags as $tag) { echo $tag->name . ' ';} } ?>" >
	
	       <a id="box_<?php the_ID(); ?>" href="<?php the_permalink() ?>" rel="bookmark" title="Ir a <?php the_title_attribute(); ?>">
		       
		       <?php //Obtenemos la url de la imagen destacada
				$domsxe = simplexml_load_string(get_the_post_thumbnail($post->ID, 'large'));
				$thumbnailsrc = "";
				if (!empty($domsxe))
					$thumbnailsrc = $domsxe->attributes()->src;
				?>
							
		       <img class="img" alt="<?php the_title() ?>" src="<?php bloginfo('template_url') ?>/scripts/timthumb.php?src=<?php print $thumbnailsrc; ?>&w=220&h=220" border=0 />
	       </a>
	       
	       <span class="text">
		        <a class="title" href="<?php the_permalink() ?>" rel="bookmark" title="Ir a <?php the_title_attribute(); ?>"> <?php the_title() ?> </a>
		        
		        <!--Tag-->
	            <?php /*tags*/ $posttags = get_the_tags(); if ($posttags) { foreach($posttags as $tag) {
	                    echo '<a class="tag" rel="'. $tag->name. '" href="#'. $tag->name. '" title="" class="">'. $tag->name . '</a>'; } }  ?>
	        </span><!--/work_title-->
	        
	    </div><!--/module-->
	    
    <?php endwhile; endif; ?>
	<?php wp_reset_query(); ?>
	</div><!--#portfolio-->



<?php get_footer(); ?>