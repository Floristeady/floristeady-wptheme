<?php
/**
 * The Template for single blog
 */
 ?>

<div id="blog_single">

            <div class="top">

                        
                 </div>

                <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

                 <div id="post_content">

                      <div class="col_IZ  three_fourths">
                      		
                            <div class="post_modulo">
                            	<nav id="nav-above" class="navigation">
	                            	<div class="nav-previous"><?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '&lt;', 'Previous post link', 'twentyten' ) . '</span> Anterior (previous)', TRUE, $excluded_categories = '10' ); ?></div>
                           
	                            	<div class="nav-next"><?php next_post_link( '%link', 'Siguiente (next) <span class="meta-nav">' . _x( '&gt;', 'Next post link', 'twentyten' ) . '</span>', TRUE, $excluded_categories = '10' ); ?></div>
	                            </nav><!-- #nav-above -->

                            
                            	
            				  <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	            					<header>
	            						<h1 class="entry-title"><?php the_title(); ?></h1>
	            					</header>

	        					    <div class="entry-content">
	        						    <?php the_content(); ?>
	        					    </div><!-- .entry-content -->
                               </article><!-- #post-## -->
                               
                      </div>

  					<footer class="entry-utility">

  						<?php edit_post_link( __( 'Edit', 'twentyten' ), '<span class="edit-link">', '</span>' ); ?>
  					</footer><!-- .entry-utility -->

  				
                </div><!-- .col_IZ -->

                  <div class="col_DE one_fourth_nomar line-separate">

                      <span class="date"><?php the_time('d/m/Y'); ?></span>
                      <span class="tags">Tags: <?php $posttags = get_the_tags();
                                              if ($posttags) {
                                                foreach($posttags as $tag) {
                                                  echo $tag-> name . ' ';
                                                }
                                              }
                                              ?>
                                              </span>
                                              
                      <span class="comments"><?php comments_popup_link('Comment: 0', 'Comment: 1 ', 'Comments %'); ?></span>
                  </div><!-- .col_DE -->
                  
                  <div id="comments" class="clearfix">
  					<?php comments_template( '', true ); ?>
  				</div>


                </div><!-- #post_content -->

                <?php endwhile; // end of the loop. ?>

</div><!-- #blog_single -->

