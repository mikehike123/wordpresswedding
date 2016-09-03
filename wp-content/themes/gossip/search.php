<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
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
					<h1 class="page-title"><?php printf( esc_html__( 'Search Results for: %s', 'gossip' ), get_search_query() ); ?></h1>
				</header><!-- .page-header -->
				<?php if ( have_posts() ) : ?>
					<?php while ( have_posts() ) : the_post(); ?>  
						<?php get_template_part( 'template-parts/content', get_post_format() ); ?>
					<?php endwhile; ?>
				<?php endif; ?>
			</article>
			<?php get_sidebar(); ?>
		</div><!-- end .row -->
	</div><!-- end .container -->
</section>
<?php get_footer(); ?>