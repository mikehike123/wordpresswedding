<?php
/*
Plugin Name: Donations
Plugin URI: 
Description: 
Version: 
Author: Mike Clark
Author URI: 
License: 
License URI: 
*/
function pw_edd_paypal_donate( $args, $purchase_data ) {
    $args['cmd'] = '_donations';
    return $args;
}
add_filter( 'edd_paypal_redirect_args', 'pw_edd_paypal_donate', 10, 2 );

function pw_edd_purchase_form_required_fields( $required_fields ) {

$required_fields['edd_last'] = array(
'error_id' => 'invalid_last_name',
'error_message' => __( 'Please enter your last name.', 'edd' )
);
return $required_fields;
}
add_filter( 'edd_purchase_form_required_fields', 'pw_edd_purchase_form_required_fields' );

/**
 * Show the number of sales and download count inside the "Download Details" widget
 */
function sumobi_edd_show_download_sales() {
	$sales = edd_get_download_sales_stats( get_the_ID() );
	$sales = $sales > 1 ? $sales . ' Donations to date' : ' No donations so far for this item, be the first to donate!';
	echo '<p>';
	echo  $sales;
	//echo '<br/>';
	//echo sumobi_edd_get_download_count( get_the_ID() ) . ' downloads';
	//echo '</p>';
}
add_action( 'edd_product_details_widget_before_purchase_button', 'sumobi_edd_show_download_sales' ); 
/**
 * Get the download count of a download
 * Modified version of edd_get_file_downloaded_count()
 */
function sumobi_edd_get_download_count( $download_id = 0 ) {
	global $edd_logs;
	$meta_query = array(
		'relation'	=> 'AND',
		array(
			'key' 	=> '_edd_log_file_id'
		),
		array(
			'key' 	=> '_edd_log_payment_id'
		)
	);
	return $edd_logs->get_log_count( $download_id, 'file_download', $meta_query );
}

//add_filter( 'the_title', 'add_backButton', 1000 ) ;
function add_backButton($content)
{
	$back="<div class='backButton'><a class='btn btn-primary' href='".get_site_url()."'>&lt; Back</a></div>";
	
	if ( is_single() )
	{
        	$content = $back.$content;
	}

    // Returns the content.
    return $content;
}

////////////////////////////////////////////////////////////////////
// create a funds post
////////////////////////////////////////////////////////////////////
function my_custom_post_fund() {
  $labels = array(
    'name'               => _x( 'Funds', 'fund type general name' ),
    'singular_name'      => _x( 'Fund', 'fund type singular name' ),
    'add_new'            => _x( 'Add New', 'funds' ),
    'add_new_item'       => __( 'Add New fund' ),
    'edit_item'          => __( 'Edit Fund' ),
    'new_item'           => __( 'New Fund' ),
    'all_items'          => __( 'All Funds' ),
    'view_item'          => __( 'View Fund' ),
    'search_items'       => __( 'Search Funds' ),
    'not_found'          => __( 'No funds found' ),
    'not_found_in_trash' => __( 'No funds found in the Trash' ), 
    'parent_item_colon'  => '',
    'menu_name'          => 'Funds'
  );
  $args = array(
    'labels'        => $labels,
    'description'   => 'Holds our funds and fund specific data',
    'public'        => true,
    'menu_position' => 5,
    'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments' ),
    'has_archive'   => true,
  );
  register_post_type( 'funds', $args ); 
  //flush_rewrite_rules();
}
add_action( 'init', 'my_custom_post_fund' );

function my_updated_messages( $messages ) {
  global $post, $post_ID;
  $messages['fund'] = array(
    0 => '', 
    1 => sprintf( __('Fund updated. <a href="%s">View fund</a>'), esc_url( get_permalink($post_ID) ) ),
    2 => __('Custom field updated.'),
    3 => __('Custom field deleted.'),
    4 => __('Fund updated.'),
    5 => isset($_GET['revision']) ? sprintf( __('Fund restored to revision from %s'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
    6 => sprintf( __('Fund published. <a href="%s">View fund</a>'), esc_url( get_permalink($post_ID) ) ),
    7 => __('Fund saved.'),
    8 => sprintf( __('Fund submitted. <a target="_blank" href="%s">Preview fund</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
    9 => sprintf( __('Fund scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview fund</a>'), date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( get_permalink($post_ID) ) ),
    10 => sprintf( __('Fund draft updated. <a target="_blank" href="%s">Preview fund</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
  );
  return $messages;
}
add_filter( 'post_updated_messages', 'my_updated_messages' );

function my_contextual_help( $contextual_help, $screen_id, $screen ) { 
  if ( 'fund' == $screen->id ) {

    $contextual_help = '<h2>Funds</h2>
    <p>Funds show the details of the items that we sell on the website. You can see a list of them on this page in reverse chronological order - the latest one we added is first.</p> 
    <p>You can view/edit the details of each fund by clicking on its name, or you can perform bulk actions using the dropdown menu and selecting multiple items.</p>';

  } elseif ( 'edit-fund' == $screen->id ) {

    $contextual_help = '<h2>Editing funds</h2>
    <p>This page allows you to view/modify fund details. Please make sure to fill out the available boxes with the appropriate details (fund image, price, brand) and <strong>not</strong> add these details to the fund description.</p>';

  }
  return $contextual_help;
}
add_action( 'contextual_help', 'my_contextual_help', 10, 3 );

function my_taxonomies_fund() {
  $labels = array(
    'name'              => _x( 'Fund Categories', 'taxonomy general name' ),
    'singular_name'     => _x( 'Fund Category', 'taxonomy singular name' ),
    'search_items'      => __( 'Search Fund Categories' ),
    'all_items'         => __( 'All Fund Categories' ),
    'parent_item'       => __( 'Parent Fund Category' ),
    'parent_item_colon' => __( 'Parent Fund Category:' ),
    'edit_item'         => __( 'Edit Fund Category' ), 
    'update_item'       => __( 'Update Fund Category' ),
    'add_new_item'      => __( 'Add New Fund Category' ),
    'new_item_name'     => __( 'New Fund Category' ),
    'menu_name'         => __( 'Fund Categories' ),
  );
  $args = array(
    'labels' => $labels,
    'hierarchical' => true,
  );
  register_taxonomy( 'fund_category', 'funds', $args );
}
add_action( 'init', 'my_taxonomies_fund', 0 );


function fund_price_box_content( $post ) 
{
  //get_post_meta( $post_id, $key = '', $single = false ) 
  $price = get_post_meta( $post->ID, 'fund_price',true );
  if ( empty( $price ) ) {
    $price='';
  }
  wp_nonce_field( plugin_basename( __FILE__ ), 'fund_price_box_content_nonce' );
  echo '<label for="fund_price"></label>';
  echo "<input type='text' id='fund_price' name='fund_price' placeholder='enter a price' value='{$price}'>";
}

function fund_price_box() {
    add_meta_box( 
        'fund_price_box',
        __( 'Fund Price', 'myplugin_textdomain' ),
        'fund_price_box_content',
        'funds',
        'side',
        'high'
    );
}
add_action( 'add_meta_boxes', 'fund_price_box' );



function fund_price_box_save( $post_id ) {

  if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
  return;

  if ( !wp_verify_nonce( $_POST['fund_price_box_content_nonce'], plugin_basename( __FILE__ ) ) )
  return;

  if ( 'page' == $_POST['post_type'] ) {
    if ( !current_user_can( 'edit_page', $post_id ) )
    return;
  } else {
    if ( !current_user_can( 'edit_post', $post_id ) )
    return;
  }
  $fund_price = $_POST['fund_price'];
  update_post_meta( $post_id, 'fund_price', $fund_price );
}
add_action( 'save_post', 'fund_price_box_save' );
////////////////////////////////////////////////////////////////////////////////


function showForm($content)
{
ob_start();
if(!is_singular('funds') || !is_main_query())
	return $content;

?>
<form>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
  <div class="form-group">
    <label for="exampleSelect1">Example select</label>
    <select class="form-control" id="exampleSelect1">
      <option>1</option>
      <option>2</option>
      <option>3</option>
      <option>4</option>
      <option>5</option>
    </select>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form> 
<?php
$html = ob_get_clean();
return $content.$html;

}
add_filter( 'the_content', 'showForm', 1000 ) ;
function showFund($slugName)
{
	$post = get_page_by_path($slugName,OBJECT,'fund');
	$url = get_post_meta($post->ID, 'siteURL', true);
	$feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
	?>
	<div class="col-lg-4 col-md-4 col-xs-6 thumb"><a class="thumbnail boxShadow" href="<?php echo $url; ?>" target="_blank">
	<img class="img-responsive" src="<?php echo $feat_image ?>" alt="" />
	<h4><?php the_title(); ?></h4>
	</a></div>
	<?php
	echo $post->post_content;
	showForm();
}

?>

