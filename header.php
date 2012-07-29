<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage floristeady
 * @since floristeady 1.0
 */
?><!DOCTYPE html>
<!--[if lt IE 7 ]><html <?php language_attributes(); ?> class="no-js ie ie6 lte7 lte8 lte9"><![endif]-->
<!--[if IE 7 ]><html <?php language_attributes(); ?> class="no-js ie ie7 lte7 lte8 lte9"><![endif]-->
<!--[if IE 8 ]><html <?php language_attributes(); ?> class="no-js ie ie8 lte8 lte9"><![endif]-->
<!--[if IE 9 ]><html <?php language_attributes(); ?> class="no-js ie ie9 lte9"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<title><?php
			/*
			 * Print the <title> tag based on what is being viewed.
			 * We filter the output of wp_title() a bit -- see
			 * floristeady_filter_wp_title() in functions.php.
			 */
			wp_title( '|', true, 'right' );
		?></title>
		<link rel="profile" href="http://gmpg.org/xfn/11" />
		<link rel="stylesheet" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
		<link href='http://fonts.googleapis.com/css?family=Magra' rel='stylesheet' type='text/css'>
<?php
		/* We add some JavaScript to pages with the comment form
		 * to support sites with threaded comments (when in use).
		 */
		if ( is_singular() && get_option( 'thread_comments' ) )
			wp_enqueue_script( 'comment-reply' );

		/* Always have wp_head() just before the closing </head>
		 * tag of your theme, or you will break many plugins, which
		 * generally use this hook to add elements to <head> such
		 * as styles, scripts, and meta tags.
		 */
		wp_head();
?>
	</head>
	<body <?php body_class(); ?>>
	
		<div id="wrapper" class="hfeed">
			<span class="large_light"></span>
			
			<header role="banner">
				<section class="container">
					 <span class="back_light"></span>
					 
					 <nav id="submenu">
						 <?php dynamic_sidebar( 'submenu-widget' ); ?>
					 </nav>
					 
					 <hgroup id="site-title">
					 	<h1><a id="logo"  href="<?php echo bloginfo('url'); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					 </hgroup>
				
					<nav id="access" role="navigation" class="clearfix ten columns">
					  <?php /*  Allow screen readers / text browsers to skip the navigation menu and get right to the good stuff */ ?>
						<a id="skip" class="screen-reader-text" href="#content" title="<?php esc_attr_e( 'Skip to content', 'floristeady' ); ?>"><?php _e( 'Skip to content', 'floristeady' ); ?></a>
						<?php /* Our navigation menu.  If one isn't filled out, wp_nav_menu falls back to wp_page_menu.  The menu assiged to the primary position is the one used.  If none is assigned, the menu with the lowest ID is used.  */ ?>
						<?php wp_nav_menu( array( 'container_class' => 'menu-header', 'theme_location' => 'primary' ) ); ?>
					</nav><!-- #access -->
				</section>
				
			</header>
		
			<div id="main-content" role="main">
