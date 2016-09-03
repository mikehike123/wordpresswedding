<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package gossip
 */

get_header(); ?>
<section role="main" class="gossip-body-section">
	<div class="container">
		<div class="row">

			<?php if ( is_active_sidebar( 'sidebar-1' ) ):  ?>
				<article class="col-lg-8 col-md-8 col-sm-12 error-404 not-found">
			<?php else: ?>
				<article class="col-lg-12 col-md-12 col-sm-12 error-404 not-found">
			<?php endif; ?>

				<?php if ( have_posts() ) : ?>
					<?php while ( have_posts() ) : the_post(); ?>  
					
						<div class="gossip-margin">
							<h1 class="page-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
							<?php the_post_thumbnail(); ?>
							<?php the_content(); ?>
						</div><!-- end .gossip-post -->

					<?php endwhile; ?>
				<?php endif; ?>

				<div class="gossip-comment-container">
					<?php if ( comments_open() || get_comments_number() ): ?>
						<?php comments_template(); ?>
					<?php else: ?>
						<h2 class="gossip-comments-closed"><?php esc_html_e('Comments are closed !', 'gossip'); ?></h2>
					<?php endif; ?>
				</div><!-- end .gossip-comment-container -->  

			</article>
			<?php get_sidebar(); ?>
		</div><!-- end .row -->
	</div><!-- end .container -->
</section>
<?php get_footer(); ?>