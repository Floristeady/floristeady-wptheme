<?php
/**
 * The Template for single portfolio
 */
 ?>

<div id="portfolio_single">

                <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                
                
                 <div class="top">
                 		
             		<h1 class="entry-title"><?php the_title(); ?>
                    <span class="tag">| <?php $posttags = get_the_tags(); if ($posttags) { foreach($posttags as $tag) { echo $tag->name . ' '; } } ?>
                    </span>
                    </h1>

                    <nav id="nav-above" class="navigation">
					    <div class="nav-previous"><?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '&lt;', 'Previous post link', 'twentyten' ) . '</span> Anterior (previous)', FALSE, $excluded_categories = '13' ); ?></div>
                        <div class="nav-next"><?php next_post_link( '%link', 'Siguiente (next) <span class="meta-nav">' . _x( '&gt;', 'Next post link', 'twentyten' ) . '</span>', FALSE, $excluded_categories = '13' ); ?></div>
                    </nav><!-- #nav-above -->

                 </div>

                <div class="three_fourths">
                	
                	<?php  if((get_post_meta($post->ID, 'video_url', true))) { ?>
                	<div class="video">
						<?php
						$urlVideo = get_post_meta($post->ID, 'video_url', true);						
						global $smart_youtube_pro;
						$urlVideo = str_replace("http://", "httpvh://", $urlVideo);
						print $smart_youtube_pro->check( $urlVideo, 0);
						?>
					</div> <!-- Fin del div video -->
					<?php } ?>

                    <div class="gallery">
                    
				    	<?php
						$args = array(
						    'post_type' => 'attachment',
						    'numberposts' => null,
						    'post_parent' => $post->ID,
						    'post_mime_type' => 'image',
						    'exclude' => get_post_thumbnail_id($post->ID)
						);
						$attachments = get_posts($args);
						if ($attachments) {
						    foreach ($attachments as $attachment) {
						        //Tamaños: "thumbnail", "medium", "large", "full"
						        $image_atts = wp_get_attachment_image_src( $attachment->ID, 'full' ); ?>
						        <img src="<?php echo $image_atts[0]; ?>" alt="" width="<?php echo $image_atts[1]; ?>" height="<?php echo $image_atts[2]; ?>" />
						    <?php
						    }
						}
						?>

					</div><!--/gallery -->

                </div>

                <div class="one_fourth_nomar">
						
                    <div class="entry-content">
                   
                    
                    <?php the_content(); ?>
                   

                    <?php  if((get_post_meta($post->ID, 'web_url', true))) { ?>
						<span class="web_url">
							 <a target="_blank" title="" href="<?php echo get_post_meta($post->ID, 'web_url', true); ?>"><?php _e( '[:en]Visit the web [:es]Visitar la web' ); ?></a>
						</span>
					<?php } ?>

                    </div>

                </div>
                
                <footer class="entry-utility clearfix">
					<?php edit_post_link( __( 'Editar', 'floristeady' ), '<span class="edit-link">', '</span>' ); ?>
				</footer><!-- .entry-utility -->
                
                </article><!-- #post-## -->


<?php endwhile; // end of the loop. ?>
</div> <!-- #portfolio -->

