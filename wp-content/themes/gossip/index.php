<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
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
				<article class="col-lg-8 col-md-8 col-sm-12">
			<?php else: ?>
				<article class="col-lg-12 col-md-12 col-sm-12">
			<?php endif; ?>

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