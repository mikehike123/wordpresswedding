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
	<div class="gossip-audio-post gossip-margin" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<a href="<?php the_permalink(); ?>"><h2 class="gossip-post-heading"><?php the_title(); ?></h2></a>
		<div class="gossip-meta-container">	
			<div class="gossip-meta">
				<div><i class="fa fa-user"></i> <?php the_author(); ?></div>
				<div><i class="fa fa-calendar"></i> <?php the_time( get_option( 'date_format' ) ); ?></div>
				<div><a class="gossip-meta-comment" href="<?php comments_link(); ?>"><i class="fa fa-comments"></i> <?php comments_number(__( 'No Comment', 'gossip'), __('1 Comment', 'gossip'), __('% Comments', 'gossip')); ?></a></div>
				<div class="gossip-meta-category"><i class="fa fa-folder"></i> <?php the_category(); ?></div>
			</div><!-- end .gossip-meta -->
		</div><!-- end .gossip-meta-container -->
		<div class="entry-content">
			<?php
				/* translators: %s: Name of current post */
				the_content( sprintf(
					__( 'Continue reading %s', 'gossip' ),
					the_title( '<span class="screen-reader-text">', '</span>', false )
				) );

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
	</div><!-- end .gossip-audio-post -->
</div>