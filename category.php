<?php
/**
 * The template for displaying Category Archive pages.
 *
 * @package WordPress
 * @subpackage floristeady
 * @since floristeady 1.0
 */

get_header(); ?>

<section class="container">
		<div id="content">

				<h1 class="entry-title"><?php
					printf( __( '%s', 'floristeady' ), '' . single_cat_title( '', false ) . '' );
				?><span><?php
					$category_description = category_description();
					if ( ! empty( $category_description ) )
						echo '' . $category_description . '';

				/* Run the loop for the category page to output the posts.
				 * If you want to overload this in a child theme then include a file
				 * called loop-category.php and that will be used instead.
				 get_template_part( 'loop', 'category' ); */
				
				?>
				</span></h1>
				
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				
				<div class="post_content">
				
				
				
					<div class=" three_fourths">			
	                    <div class="post_modulo">
					        <span class="h1"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'twentyten' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></span>
					        
	                     <div class="hp_entry">
						        <?php the_excerpt(); ?>
	                            <div class="thum_blog">
	                            <?php the_post_thumbnail('full');?>
	                            </div>
					        </div>
	                    </div>
	                </div>	

                    <div class="col_DE one_fourth_nomar line-separate">

                        <div class="date"><?php the_time('d/m/Y') ?></div>
                        <span class="tags">Tags: <?php $posttags = get_the_tags();
                                                if ($posttags) {
                                                  foreach($posttags as $tag) {
                                                   echo $tag-> name . ' ';        } } ?>
                                                </span>
                        <span class="comments"><?php comments_popup_link('Comment: 0', 'Comment: 1', 'Comments %'); ?></span>
                    </div>


			</div>
		
<?php endwhile; endif; ?>

	</div>
	
</section>

<?php get_footer(); ?>