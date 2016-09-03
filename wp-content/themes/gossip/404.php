<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
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
					<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'gossip' ); ?></h1>
				</header><!-- .page-header -->

				<div class="page-content">
					<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'gossip' ); ?></p>

					<?php get_search_form(); ?>

					<?php the_widget( 'WP_Widget_Recent_Posts' ); ?>

					<?php
						/* translators: %1$s: smiley */
						$archive_content = '<p>' . sprintf( esc_html__( 'Try looking in the monthly archives. %1$s', 'gossip' ), convert_smilies( ':)' ) ) . '</p>';
						the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$archive_content" );
					?>

					<?php the_widget( 'WP_Widget_Tag_Cloud' ); ?>

				</div><!-- .page-content -->
			</article><!-- .error-404 -->
			<?php get_sidebar(); ?>
		</div><!-- end .row -->
	</div><!-- end .container -->
</section>
<?php get_footer(); ?>