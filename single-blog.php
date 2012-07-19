<?php
/**
 *  The Template for single portfolio
 */

get_header(); ?>

<div id="blog_single">

            <div class="top">
                        <div id="portfolio_titulo">
                            <!--<h2><?php the_title(); ?></h2>-->
                            <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Title blog') ) : ?><?php endif; ?>
            	        </div>

                        <nav id="nav-above" class="navigation">
    					    <div class="nav-previous"><?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '&lt;', 'Previous post link', 'twentyten' ) . '</span> Anterior (previous)', TRUE, $excluded_categories = '10' ); ?></div>
                            <span class="separa">/</span>
                            <div class="nav-next"><?php next_post_link( '%link', 'Siguiente (next) <span class="meta-nav">' . _x( '&gt;', 'Next post link', 'twentyten' ) . '</span>', TRUE, $excluded_categories = '10' ); ?></div>
                        </nav><!-- #nav-above -->

                 </div>

                <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

                 <div id="post_content">

                      <div class="col_IZ">
                            <div class="post_modulo">
            				    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            					<header>
            						<h1 class="entry-title"><?php the_title(); ?></h1>
            					</header>

        					    <div class="entry-content">
        						    <?php the_content(); ?>
        					    </div><!-- .entry-content -->
                                </article><!-- #post-## -->
                          <?php if ( get_the_author_meta( 'description' ) ) : // If a user has filled out their description, show a bio on their entries  ?>
        					<footer id="entry-author-info">
        						<div id="author-avatar">
        							<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'twentyten_author_bio_avatar_size', 60 ) ); ?>
        						</div><!-- #author-avatar -->
        						<div id="author-description">
        							<h2><?php printf( esc_attr__( 'About %s', 'twentyten' ), get_the_author() ); ?></h2>
        							<?php the_author_meta( 'description' ); ?>
        							<div id="author-link">
        								<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>">
        									<?php printf( __( 'View all posts by %s <span class="meta-nav">&rarr;</span>', 'twentyten' ), get_the_author() ); ?>
        								</a>
        							</div><!-- #author-link	-->
        						</div><!-- #author-description -->
        					</footer><!-- #entry-author-info -->
                      <?php endif; ?>
                      </div>

  					<footer class="entry-utility">

  						<?php edit_post_link( __( 'Edit', 'twentyten' ), '<span class="edit-link">', '</span>' ); ?>
  					</footer><!-- .entry-utility -->


  				<?php comments_template( '', true ); ?>
                </div><!-- .col_IZ -->

                  <div class="col_DE">

                      <div class="date"><?php the_time('F j, Y'); ?></div>
                      <div class="tags">Tags: <?php $posttags = get_the_tags();
                                              if ($posttags) {
                                                foreach($posttags as $tag) {
                                                  echo $tag-> name . ' ';
                                                }
                                              }
                                              ?>
                                              </div>
                      <div class="comments"><?php comments_popup_link('Comment: 0', 'Comment: 1 ', 'Comments %'); ?></div>
                  </div><!-- .col_DE -->


                </div><!-- #post_content -->

                <?php endwhile; // end of the loop. ?>

</div><!-- #blog_single -->

<?php get_footer(); ?>
