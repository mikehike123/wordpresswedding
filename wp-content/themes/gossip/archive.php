<?php
/**
 * The template for displaying archive pages.
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

				<header class="page-header">
					<?php the_archive_title( '<h1 class="page-title">', '</h1>' ); ?>
				</header><!-- .page-header -->
				
				<?php if ( have_posts() ) : ?>
					<?php while ( have_posts() ) : the_post(); ?>  
						<?php get_template_part( 'template-parts/content', get_post_format() ); ?>
					<?php endwhile; ?>
					<div class="gossip-pagination">	
						<?php the_posts_pagination( 

							array(
								'mid_size'           => 2,
								'prev_text'          => __( 'Previous', 'gossip' ),
								'next_text'          => __( 'Next', 'gossip' ),
								'screen_reader_text' => __( 'Post navigation', 'gossip')
								) 
							); 
						?>
					</div>
				<?php endif; ?>
			</article>
			<?php get_sidebar(); ?>
		</div><!-- end .row -->
	</div><!-- end .container -->
</section>
<?php get_footer(); ?>