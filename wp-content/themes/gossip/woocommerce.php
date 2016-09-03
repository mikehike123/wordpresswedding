<?php
/**
 * The template for woocommerce
 *
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

				<div class="gossip-margin">
					<?php woocommerce_content(); ?>
				</div><!-- end .gossip-post -->
			</article>
			<?php get_sidebar(); ?>
		</div><!-- end .row -->
	</div><!-- end .container -->
</section>
<?php get_footer(); ?>