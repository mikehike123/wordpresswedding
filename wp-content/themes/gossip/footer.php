<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package gossip
 */

?>
<footer role="contentinfo">
	<?php if(is_active_sidebar( 'sidebar-2' )): ?>
		<div class="gossip-footer-widget">
			<div class="container">
				<div class="row">
					<?php dynamic_sidebar( 'sidebar-2' ); ?>
				</div><!-- end .row -->
			</div><!-- end .container -->
		</div><!-- gossip-footer-widget -->
	<?php endif; ?>

	<div class="gossip-copyright-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<?php  
						$gossip_general_option_footer_text = get_theme_mod( 'gossip_footer_text' );
					?>
					<?php if(!empty( $gossip_general_option_footer_text )): ?>
						<p><?php echo $gossip_general_option_footer_text; ?></p>
					<?php else: ?>
						<p>
					        <?php printf(
				                __( '&copy; %1$s | Gossip Theme | Proudly Powered by %2$s', 'gossip' ),
				                date_i18n( 'Y' ),
				                sprintf( '<a href="http://wordpress.org">%s</a>', __( 'WordPress', 'gossip' ) )
					        ); ?>
						</p
					<?php endif; ?>
				</div>
			</div><!-- end .row -->
		</div><!-- end .container -->
	</div><!-- gossip-footer-widget -->
</footer>
<?php wp_footer(); ?>
</body>
</html>