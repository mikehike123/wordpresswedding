<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package gossip
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<header class="gossip-header">
		<div class="gossip-logo-area">
			<div class="container">
				<div class="row">
						<div class="gossip-logo">
							<?php if(get_theme_mod( 'gossip_logo_toggle' ) == 1): ?>
								<?php  $gossip_logo_url = get_theme_mod('gossip_logo');
								if(empty($gossip_logo_url)): ?>
									<a href="<?php echo esc_url( home_url() ); ?>"><img class="img-responsive" src="<?php echo esc_url( get_template_directory_uri() . '/img/logo.png' ); ?>" alt="<?php esc_attr( bloginfo('name') ); ?>"></a>
								<?php else: ?>
									<a href="<?php echo esc_url( home_url() ); ?>"><img class="img-responsive" src="<?php echo esc_url( get_theme_mod('gossip_logo') ); ?>" alt="<?php esc_attr( bloginfo('name') ); ?>"></a>
								<?php endif; ?>

							<?php else: ?>
								<a href="<?php echo esc_url( home_url() ); ?>"><h1 class="gossip-title"><?php bloginfo('name'); ?></h1></a>
								<p class="gossip-description"><?php bloginfo('description'); ?></p>
							<?php endif; ?>
						</div><!-- end .gossip-logo -->
					<div class="gossip-search-social">
						<?php get_search_form(); ?>
						<div class="gossip-social">
							<ul>
								<?php  
									$gossip_facebook_social_icon    = get_theme_mod( 'gossip_social_facebook' );
									$gossip_twitter_social_icon     = get_theme_mod( 'gossip_social_twitter' );
									$gossip_youtube_social_icon     = get_theme_mod( 'gossip_social_youtube' );
									$gossip_google_plus_social_icon = get_theme_mod( 'gossip_social_google_plus' );
									$gossip_behance_social_icon     = get_theme_mod( 'gossip_social_behance' );
									$gossip_linkedin_social_icon    = get_theme_mod( 'gossip_social_linkedin' );
									$gossip_instagram_social_icon   = get_theme_mod( 'gossip_social_instagram' );

									if(!empty($gossip_facebook_social_icon)){
							        	echo '<li><a href="'.esc_url( $gossip_facebook_social_icon ).'"><i class="fa fa-facebook-square"></i></a></li>';
							        }

							        if(!empty($gossip_twitter_social_icon)){
							        	echo '<li><a href="'.esc_url( $gossip_twitter_social_icon ).'"><i class="fa fa-twitter-square"></i></a></li>';
							        }

							        if(!empty($gossip_youtube_social_icon)){
							        	echo '<li><a href="'.esc_url( $gossip_youtube_social_icon ).'"><i class="fa fa-youtube-square"></i></a></li>';
							        }

							        if(!empty($gossip_google_plus_social_icon)){
							        	echo '<li><a href="'.esc_url( $gossip_google_plus_social_icon ).'"><i class="fa fa-google-plus-square"></i></a></li>';
							        }

							        if(!empty($gossip_behance_social_icon)){
							        	echo '<li><a href="'.esc_url( $gossip_behance_social_icon ).'"><i class="fa fa-behance-square"></i></a></li>';
							        }

							        if(!empty($gossip_linkedin_social_icon)){
							        	echo '<li><a href="'.esc_url( $gossip_linkedin_social_icon ).'"><i class="fa fa-linkedin-square"></i></a></li>';
							        }

							        if(!empty($gossip_instagram_social_icon)){
							        	echo '<li><a href="'.esc_url( $gossip_instagram_social_icon ).'"><i class="fa fa-instagram"></i></a></li>';
							        }
						        ?>
							</ul>
						</div><!-- end .gossip-social -->
					</div><!-- end .gossip-search-social -->

				</div><!-- end .row -->
			</div><!-- end .container -->
		</div><!-- end .gossip-logo-area -->
		<div role="navigation" class="gossip-nav">
			<div class="gossip-side-trigger">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<a href="#"><i class="fa fa-bars"></i></a>
						</div>
					</div>
				</div>	
			</div>
			<nav>
				<div class="container">
					<div class="row">
						<div class="gossip-search-trigger">
							<p class="gossip-close-trigger"><a href="#"><i class="fa fa-times"></i></a></p>
							<?php get_search_form(); ?>
						</div>
						
						<?php
						
							$defaults = array(
								'theme_location'  => 'primary',
								'menu'            => '',
								'container'       => 'div',
								'container_class' => '',
								'container_id'    => '',
								'menu_class'      => 'menu',
								'menu_id'         => '',
								'echo'            => true,
								'fallback_cb'     => 'wp_page_menu',
								'before'          => '',
								'after'           => '',
								'link_before'     => '',
								'link_after'      => '',
								'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
								'depth'           => 0,
								'walker'          => ''
							);
							wp_nav_menu( $defaults );

						?>

						<div class="gossip-social">
							<ul>
							<?php  
								if(!empty($gossip_facebook_social_icon)){
							        	echo '<li><a href="'.esc_url( $gossip_facebook_social_icon ).'"><i class="fa fa-facebook-square"></i></a></li>';
							        }

							        if(!empty($gossip_twitter_social_icon)){
							        	echo '<li><a href="'.esc_url( $gossip_twitter_social_icon ).'"><i class="fa fa-twitter-square"></i></a></li>';
							        }

							        if(!empty($gossip_youtube_social_icon)){
							        	echo '<li><a href="'.esc_url( $gossip_youtube_social_icon ).'"><i class="fa fa-youtube-square"></i></a></li>';
							        }

							        if(!empty($gossip_google_plus_social_icon)){
							        	echo '<li><a href="'.esc_url( $gossip_google_plus_social_icon ).'"><i class="fa fa-google-plus-square"></i></a></li>';
							        }

							        if(!empty($gossip_behance_social_icon)){
							        	echo '<li><a href="'.esc_url( $gossip_behance_social_icon ).'"><i class="fa fa-behance-square"></i></a></li>';
							        }

							        if(!empty($gossip_linkedin_social_icon)){
							        	echo '<li><a href="'.esc_url( $gossip_linkedin_social_icon ).'"><i class="fa fa-linkedin-square"></i></a></li>';
							        }

							        if(!empty($gossip_instagram_social_icon)){
							        	echo '<li><a href="'.esc_url( $gossip_instagram_social_icon ).'"><i class="fa fa-instagram"></i></a></li>';
							        }
						        ?>
							</ul>
						</div><!-- end .gossip-social -->
					</div><!-- end .row -->
				</div><!-- end .container -->
			</nav>
		</div><!-- end .gossip-nav -->
	</header>

	<div role="banner" class="gossip-banner">
		<img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="" />
	</div><!-- end .gossip-banner-->
