<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package gossip
 */

?>
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="gossip-quote-post gossip-margin">
		<div class="gossip-quote-details">
			<?php echo $post->post_content; ?>
			<div class="entry-content">
				<?php
					wp_link_pages( array(
						'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'gossip' ) . '</span>',
						'after'       => '</div>',
						'link_before' => '<span>',
						'link_after'  => '</span>',
						'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'gossip' ) . ' </span>%',
						'separator'   => '<span class="screen-reader-text">, </span>',
					) );
				?>
			</div><!-- .entry-content -->
		</div>
	</div><!-- end .gossip-quote-post -->
</div>