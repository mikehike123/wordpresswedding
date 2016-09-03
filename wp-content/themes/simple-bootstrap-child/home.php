
<?php

function printPosts($type){
	$the_slug = 'my_slug';
	$args = array(
	  'post_type'   => $type,
	  'post_status' => 'publish'
	);
	//$posts = new WP_Query($args);
	query_posts($args);
	while ( have_posts() ) : the_post(); 
		$feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
		?>
		<div class="col-lg-4 col-md-4 col-xs-6 thumb"><a class="thumbnail boxShadow" href="<?php the_permalink(); ?>">
		<img class="img-responsive" src="<?php echo $feat_image ?>" alt="" />
		<h4><?php the_title(); ?></h4>
		</a></div>
	<?php endwhile; 
}

function printExternalPosts($catSlug){
	global $post;
	
	$the_slug = 'my_slug';
	$args = array(
	  'post_type'   => 'post',
	  'post_status' => 'publish',
	  'category_name' => $catSlug
	);
	
	//$posts = new WP_Query($args);
	query_posts($args);
	while ( have_posts() ) : the_post(); 
		$url = get_post_meta($post->ID, 'siteURL', true);
		$feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
		?>
		<div class="col-lg-4 col-md-4 col-xs-6 thumb"><a class="thumbnail boxShadow" href="<?php echo $url; ?>" target="_blank">
		<img class="img-responsive" src="<?php echo $feat_image ?>" alt="" />
		<h4><?php the_title(); ?></h4>
		</a></div>
	<?php endwhile; 
}
?>


<?php get_header(); ?>

<div id="content" class="row">

	<div id="main" class="<?php simple_boostrap_main_classes(); ?>" role="main">

			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-12">
						<img class="img-responsive boxShadow" src="<?php echo get_stylesheet_directory_uri() . '/images/wedding.jpg'; ?>" alt="" />
							</div>

							<div class="col-lg-12">
								<h1 class="page-header">Wedding Registry</h1>
							</div>
							<?php 
								printPosts('download');
							?>
				</div>

				<div class="row">
					<div class="col-lg-12">
						<h1 class="page-header">Breckenridge</h1>
					</div>

					<div class="col-lg-12">The wedding will take place in Breckenridge Colorado during summer of 2017. Colorado was selected because the family is spread out all over the US and Colorado is centrally located. The links below will open a new page in browser.</div>
					<?php printExternalPosts('breckenridge'); ?>
					
				</div>
				<div class="row">
					<div class="col-lg-12">
						<h1 class="page-header">Wedding Events</h1>
					</div>
					<?php printPosts('Event');?>
					
				</div>

		</div>
		
		</div>
		<?php get_sidebar("left"); ?>
		<?php get_sidebar("right"); ?>

	</div>

	<?php get_footer(); ?>