<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package gossip
 */
?>
<?php if ( is_active_sidebar( 'sidebar-1' ) ):  ?>
	<aside role="complementary" class="col-lg-4 col-md-4 col-sm-12">
		<div class="gossip-sidebar">
			<?php dynamic_sidebar( 'sidebar-1' ); ?>
		</div><!-- end .gossip-sidebar -->
	</aside>
<?php endif; ?>