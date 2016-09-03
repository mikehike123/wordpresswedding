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
	<div class="gossip-link-post gossip-margin" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="gossip-link-details">
			<span><i class="fa fa-link"></i></span>
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
	</div><!-- end .gossip-link-post -->
</div>