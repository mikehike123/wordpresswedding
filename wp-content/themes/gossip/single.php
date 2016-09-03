<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package gossip
 */

get_header(); ?>
<section role="main">
	<div class="gossip-body-section">
	<div class="container">
		<div class="row">

			<?php if ( is_active_sidebar( 'sidebar-1' ) ):  ?>
				<article class="col-lg-8 col-md-8 col-sm-12 error-404 not-found">
			<?php else: ?>
				<article class="col-lg-12 col-md-12 col-sm-12 error-404 not-found">
			<?php endif; ?>

				<?php if ( have_posts() ) : ?>
					<?php while ( have_posts() ) : the_post(); ?> 

						<div id="post-<?php the_ID(); ?>"<?php post_class(); ?>>
							<div class="gossip-margin">
								<h1 class="page-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
								<?php the_post_thumbnail(); ?>
								<div class="gossip-meta">
									<div><i class="fa fa-user"></i> <?php the_author(); ?></div>
									<div><i class="fa fa-calendar"></i> <?php the_time( get_option( 'date_format' ) ); ?></div>
									<div><a class="gossip-meta-comment" href="<?php comments_link(); ?>"><i class="fa fa-comments"></i> <?php comments_number(__( 'No Comment', 'gossip'), __('1 Comment', 'gossip'), __('% Comments', 'gossip')); ?></a></div>																						
									<div class="gossip-meta-category"><i class="fa fa-folder"></i> <?php the_category(); ?></div>
								</div><!-- end .gossip-meta -->


								<div class="gossip-single-content">
									<?php
										/* translators: %s: Name of current post */
										the_content( sprintf(
											__( 'Continue reading %s', 'gossip' ),
											the_title( '<span class="screen-reader-text">', '</span>', false )
										) );

										wp_link_pages( array(
											'before' => '<div class="page-links">' . __( 'Pages:', 'gossip' ),
											'after'  => '</div>',
										) );
									?>
								</div><!-- end .gossip-single-content -->


								<?php if(has_tag()): ?>
									<div class="gossip-tags">
										<div><i class="fa fa-tags"></i> <?php the_tags( '', ', ', '<br />' ); ?> </div>
									</div><!-- end .gossip-tags -->
								<?php endif; ?>

							</div><!-- end .gossip-margin -->
						</div>
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