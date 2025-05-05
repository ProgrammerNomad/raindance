<?php




/**
 * raindance functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package raindance
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}


if ( ! function_exists( 'raindance_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function raindance_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on raindance, use a find and replace
		 * to change 'raindance' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'raindance', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );
		
		add_theme_support('woocommerce');

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'raindance' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'raindance_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'raindance_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function raindance_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'raindance_content_width', 640 );
}
add_action( 'after_setup_theme', 'raindance_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function raindance_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'raindance' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'raindance' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	/*register_sidebar(
		array(
			'name'          => esc_html__( 'Course Sidebar', 'raindance' ),
			'id'            => 'course-sidebar',
			'description'   => esc_html__( 'Add widgets here.', 'raindance' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Article Sidebar', 'raindance' ),
			'id'            => 'article-sidebar',
			'description'   => esc_html__( 'Add widgets here.', 'raindance' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);*/
}
add_action( 'widgets_init', 'raindance_widgets_init' );

add_action('wp_enqueue_scripts', 'register_theme_styles');
function register_theme_styles() {
	
	wp_enqueue_style('parent-style', get_stylesheet_directory_uri() . '/css/parent-style.css');
	wp_enqueue_style('all-css', get_stylesheet_directory_uri() . '/css/all.css');
	wp_enqueue_style('font-Lato', '//fonts.googleapis.com/css?family=Lato&display=swap');
	wp_enqueue_style('slick-css', get_stylesheet_directory_uri() . '/css/slick.css');
	wp_enqueue_style('sm-core-css-style', get_stylesheet_directory_uri() . '/css/sm-core-css.css');
	wp_enqueue_style('fancybox-style', get_stylesheet_directory_uri() . '/css/jquery.fancybox.min.css');
	wp_enqueue_style('jquery-style', get_stylesheet_directory_uri() . '/css/jquery-ui.css');
	wp_enqueue_style('dev-css', get_stylesheet_directory_uri() . '/css/dev.css');
	
	wp_enqueue_script( 'jquery-min', get_stylesheet_directory_uri() . '/js/jquery-3.4.1.min.js');
	
}

add_action('wp_footer', 'register_theme_styles_footer');
function register_theme_styles_footer() { 
	wp_enqueue_script( 'jquery-smartmenus', get_stylesheet_directory_uri() . '/js/jquery.smartmenus.js');
	wp_enqueue_script( 'jquery-ui', get_stylesheet_directory_uri() . '/js/jquery-ui.js');
	wp_enqueue_script( 'infinite-scroll-min', get_stylesheet_directory_uri() . '/js/infinite-scroll.pkgd.min.js');
	wp_enqueue_script( 'slick-min', get_stylesheet_directory_uri() . '/js/slick.js');
	wp_enqueue_script( 'monthly-min', get_stylesheet_directory_uri() . '/js/monthly.js');
	wp_enqueue_script( 'archives-min', get_stylesheet_directory_uri() . '/js/archives.js');
	wp_enqueue_script( 'fancybox-min', get_stylesheet_directory_uri() . '/js/jquery.fancybox.min.js');
	wp_enqueue_script( 'pagination-min', get_stylesheet_directory_uri() . '/js/pagination.js');
	wp_enqueue_script( 'cookie-min', 'https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js');
	wp_enqueue_script( 'dev-js', get_stylesheet_directory_uri() . '/js/dev.js');
	wp_localize_script(
		'dev-js', 
		'my_ajax',
		array(
			'ajax_url' => admin_url('admin-ajax.php'),
		)
	);
	
	wp_enqueue_style( 'raindance-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'raindance-style', 'rtl', 'replace' );
	wp_enqueue_script( 'raindance-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

function mind_defer_scripts( $tag, $handle, $src ){
	$defer = array( 
		'jquery-smartmenus',
		'jquery-ui',
		'infinite-scroll-min',
		'slick-min',
		'monthly-min',
		'archives-min',
		'pagination-min',
		'tp-tools',
		'revmin'
	);
	
	if ( in_array( $handle, $defer ) ){
		return '<script src="' . $src . '" defer="defer" type="text/javascript"></script>' . "\n";
	}
	
    return $tag;
} 
add_filter( 'script_loader_tag', 'mind_defer_scripts', 10, 3 );


/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

require_once('inc/raindance_functions.php' );

add_action( 'after_setup_theme', 'rd_woo_gallery_setup' );
 
function rd_woo_gallery_setup() {
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
}

add_image_size( 'cource-thumbnail', 384, 192, true );
add_image_size( 'home-article-thumbnail', 640, 360, true );


//add_action( 'woocommerce_after_shop_loop_item_title', 'custom_field_display_below_title', 2 );

add_filter( 'wc_product_sku_enabled', '__return_false' );

function my_acf_google_map_api( $api ){
  
  $api['key'] = 'AIzaSyAh__4d_RH_x4mJCef2v_lotxCIZ8TjBMA';
  
  return $api;
  
}

function add_file_types_to_uploads($file_types){
	$new_filetypes = array();
	$new_filetypes['svg'] = 'image/svg+xml';
	$file_types = array_merge($file_types, $new_filetypes );
	return $file_types;
}
add_filter('upload_mimes', 'add_file_types_to_uploads',10);

function get_attachment_url_by_slug( $slug ) {
	$args = array(
		'post_type' => 'attachment',
		'name' => sanitize_title($slug),
		'posts_per_page' => 1,
		'post_status' => 'inherit',
	);
	$_header = get_posts( $args );
	$header = $_header ? array_pop($_header) : null;
	return $header ? wp_get_attachment_url($header->ID) : '';
}

function get_course_url_by_slug( $slug ) {
	$args = array(
		'post_type' => 'attachment',
		'name' => sanitize_title($slug),
		'posts_per_page' => 1,
		'post_status' => 'inherit',
	);
	$_header = get_posts( $args );
	$header = $_header ? array_pop($_header) : null;
	if($header){
		$img_url = wp_get_attachment_image_src($header->ID, 'cource-thumbnail');
		return $header ? $img_url[0] : '';
	}
	return '';
}

function my_custom_add_to_cart_redirect( $url ) {
	
	if ( ! isset( $_REQUEST['add-to-cart'] ) || ! is_numeric( $_REQUEST['add-to-cart'] ) ) {
		return $url;
	}
	
	$product_id = apply_filters( 'woocommerce_add_to_cart_product_id', absint( $_REQUEST['add-to-cart'] ) );
	
	// Only redirect the product IDs in the array to the checkout
	if ( in_array( $product_id, array( 41, 42, 47, 48) ) ) {
		$url = WC()->cart->get_cart_url();
	}
	
	return $url;

}
add_filter( 'woocommerce_add_to_cart_redirect', 'my_custom_add_to_cart_redirect' );


if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
//ALBERT
if ( isset( $_REQUEST['add-to-cart'] ) && is_numeric( $_REQUEST['add-to-cart'] ) 
	&& isset( $_REQUEST['price'] ) && is_numeric( $_REQUEST['price'] )
)
{
	session_start();
	$_SESSION['donate-x']['price'] = (int) $_REQUEST['price'];
}
//ALBERT
add_action( 'woocommerce_before_calculate_totals', 'albert_recalc_price' );
function albert_recalc_price( $cart_object ) {
	
	global $woocommerce;
	
	if(isset($_SESSION['donate-x']['price']))
	{
		$price_don = (int) $_SESSION['donate-x']['price'];
	}else{
		$price_don = 10;
	}

	foreach ( $cart_object->get_cart() as $hash => $value ) {
		if($value['product_id'] == 41 )
		{
			$value['data']->set_price( $price_don );
			break;
		}
	}
}

add_shortcode('woo_reviews', 'get_product_tab_templates_displayed');
function get_product_tab_templates_displayed() {
    comments_template();
}




add_action( 'wp_ajax_get_articles', 'get_Articles_rd' );
add_action( 'wp_ajax_nopriv_get_articles', 'get_Articles_rd' );
function get_Articles_rd(){
    $paged = $_POST['paged'];
    $year = $_POST['year'];
   // $paged = (get_query_var('page')) ? get_query_var('page') : 1;
    /*$start_date = date('Y'.$month.'01'); 
    $end_date = date('Y'.$month.'t'); */
    $categoryValue = $_POST['category'];
    $search_term = $_POST['title'];


    $tax_query = array('relation' => 'AND');
        if ($categoryValue != '0') {
            $tax_query[] =  array(
                	'taxonomy' => 'category',
                	'field' => 'id',
                	'terms' => array($categoryValue),
                	'operator' => 'IN'
                );
        }

	$args = array(
		's' => $search_term,
	    'tax_query' => $tax_query,
        'date_query' => array(
                array(
                    'year' => $year,
                ),
            ),
	    'post_type' => 'post',
		'post_status' => 'publish',
	    'orderby' => 'publish_date',
        'order' => 'DESC',
        'posts_per_page' => 9,
        'paged' => $paged
	);


    $query = new WP_Query( $args );
	
	//echo "<pre>"; print_r($query); exit;

    $i=0;  
        if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); 
        	$i++;?>
			
			<?php 
				$post_id = get_the_ID();
				$categories = get_the_category($post_id)[0]->name;
				
				$get_author_id = get_the_author_meta('ID');
				$get_author_gravatar = get_avatar_url($get_author_id, array('size' => 128));
			?>
			<?php /* ?><a href="<?php echo get_permalink(); ?>"> <?php */ ?>
            <div class="blog-card <?php if ($i++ % 3 == 2) echo 'last ';?>">
                <a href="<?php echo get_permalink(); ?>"><?php echo get_the_post_thumbnail(get_the_ID(), 'cource-thumbnail'); ?></a>
				<div class="post_cat"><?php echo $categories; ?></div>
				<div class="post-author-avtar">
					<?php echo get_avatar( get_the_author_meta('ID'), 198); ?>
				</div>
				
                <div class="lower">
                    <h3><span><?php echo the_title(); ?></span></h3>
					<div class="post-excerpt"><?php $excerpt = get_the_excerpt(); echo substr($excerpt, 0, 120); ?></div>
					<div class="read-more"><a href="<?php echo get_permalink(); ?>">Read more »</a></div>
					
                   <?php /* ?> <p class="author"><?php echo get_the_author_meta( 'display_name' ); ?></p>
                    <p><?php echo get_the_date();?></p>
                    <a href="<?php echo get_the_permalink(); ?>" class="black-button">View Article</a><?php */ ?>
                </div>
				<div class="post-meta-data">
						<span class="post-date"><?php echo get_the_date(); ?></span>
						<span class="post-comment">
							<?php 
								$cnt = get_comments_number($post_id); 
								if($cnt == 0){
									echo "No Comments";
								}else{
									echo $cnt." Comments";
								}
							?>
						</span>
				</div>
            </div>
			<?php /* ?></a><?php */ ?>
    <?php 
  
		
        endwhile;
          $big = 999999999; // need an unlikely integer

			$pages = paginate_links( array(
			'base' => str_replace( $big, '%#%', 'javascript:void(0)' ),
			'format' => '?paged=%#%',
			'current' => max( 1, $paged ),
			'total' => $query->max_num_pages,
			'type'  				=> 'array',
			'prev_text'    => __('« First'),
            'next_text'    => __('Last »'),
			) );
		
	        //$paged = ( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged');
	     
	       if ($query->max_num_pages > 1){ ?>
		   	 <div class="paging-container" id="tablePaging"> 

			  	<ul class="pagination">
				    <?php
				    foreach ( $pages as $page ) {
				    	$page = str_replace('href', 'href="javascript:void(0)"', $page);
				        echo '<li class="pagination-li">'
				            . $page . '</li>';
				    }
				    ?>
				 </ul>
			  
			   </div>
			<?php }  ?>
        	
		<?php 
		
        else:
    	   echo "<li class='no-product'>No articles available. Try a different search query.</li>";
        endif; 
        die();
}

/* Remove Categories from Single Products */
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );

// Remove them from under short description
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50 );

/**
 * WooCommerce Memberships - Fix double discount issue
 * The following code snippet aims to fix the issue of discounts being applied twice by the WooCommerce
 * Memberships plugin when the Aelia Currency Switcher is active.
 * 
 * IMPORTANT
 * This code should only be used when the Aelia Currency Switcher is active. Please remember to disable
 * or remove it if you deactivate or uninstall our plugin.
 *
 * DISCLAIMER
 * Aelia and any member of its staff are not responsible for any data loss or damage incurred
 * when using the code, which you can use at your own risk.
 *
 * GPL DISCLAIMER
 * Because this code program is free of charge, there is no warranty for it, to the extent permitted by applicable law.
 * Except when otherwise stated in writing the copyright holders and/or other parties provide the program "as is"
 * without warranty of any kind, either expressed or implied, including, but not limited to, the implied warranties of
 * merchantability and fitness for a particular purpose. The entire risk as to the quality and performance of the program
 * is with you. should the program prove defective, you assume the cost of all necessary servicing, repair or correction.
 *
 * Need a consultation, or assistance to customise this code? Find us on Codeable: https://aelia.co/hire_us
 */
add_action('wc_memberships_discounts_enable_price_adjustments', function() {
  // Fetch the instance of the discount calculator used by the Memberships plugin
  $wcm_discounts = wc_memberships()->get_member_discounts_instance();
 
  // Fetch the priority used by the filters of the Memberships plugin
  $priority = apply_filters('wc_memberships_price_adjustments_filter_priority', 999);
 
  // Remove the filters used by the Memberships plugin to calculate the variation
  // prices for the price range of variable products. Those filters are not
  // needed when the Aelia Currency Switcher is active. The multi-currency price 
  // calculation triggers the processing of Memberships discounts while converting 
  // the variations' base prices.
  remove_filter('woocommerce_variation_prices_sale_price', array($wcm_discounts, 'get_member_variation_price' ), $priority, 3 );
  remove_filter('woocommerce_variation_prices_price', array($wcm_discounts, 'get_member_variation_price' ), $priority, 3 );
  remove_filter('woocommerce_variation_prices_regular_price', array($wcm_discounts, 'get_member_variation_regular_price' ), $priority, 3 );
}, 99); 

add_filter( 'woocommerce_email_order_items_args', 'display_customer_note_in_all_emails', 10, 1 );
function display_customer_note_in_all_emails( $args ) {
    $args['show_purchase_note'] = true;

    return $args;
}

add_action('pre_get_posts','shop_filter_cat');

 function shop_filter_cat($query) {
    if (!is_admin() && is_post_type_archive( 'product' ) && $query->is_main_query()) {
       $query->set('tax_query', array(
                    array ('taxonomy' => 'product_cat',
                                       'field' => 'slug',
                                        'terms' => 'gifts-merchandise'
                                 )
                     )
       );   
    }
 } 


add_action( 'wp_ajax_mailchimpRequest', 'mailchimpRequest_handler' );
add_action( 'wp_ajax_nopriv_mailchimpRequest', 'mailchimpRequest_handler' );
function mailchimpRequest_handler(){
	
	$message = "";
	$rstatus = false;
	$rainEmailCheck = false;
	$rainAdvertiseCheck = false;
	
	$email = $_POST['email'];
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$prainEmailCheck = $_POST['rainEmailCheck'];
	$prainAdvertiseCheck = $_POST['rainAdvertiseCheck'];
	$status = 'subscribed';
	$merge_fields = array();
	
	if($prainEmailCheck == 'true'){ $rainEmailCheck = true; }
	if($prainAdvertiseCheck == 'true'){ $rainAdvertiseCheck = true; }
	
	$list_id = '48125759fa';
	$api_key = '7f6a7c3e166bd85b2b0fca0c0093506c-us12';
	if(!empty($fname) && !empty($lname)){
		$merge_fields = array('FNAME' => $fname,'LNAME' => $lname);
	}
	$marketing_permissions[] = array('marketing_permission_id' => '4b095528fa', 'enabled' => $rainEmailCheck);
	$marketing_permissions[] = array('marketing_permission_id' => 'a2deee6fc3', 'enabled' => $rainAdvertiseCheck);
	
	$data = array(
		'apikey'        => $api_key,
    	'email_address' => $email,
		'status'        => $status,
		'merge_fields'  => $merge_fields,
		'marketing_permissions'  => $marketing_permissions,
	);
	$mch_api = curl_init();
 
	curl_setopt($mch_api, CURLOPT_URL, 'https://'.substr($api_key,strpos($api_key,'-')+1).'.api.mailchimp.com/3.0/lists/'.$list_id.'/members/'.md5(strtolower($data['email_address'])));
	curl_setopt($mch_api, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'Authorization: Basic '.base64_encode( 'user:'.$api_key )));
	curl_setopt($mch_api, CURLOPT_USERAGENT, 'PHP-MCAPI/2.0');
	curl_setopt($mch_api, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($mch_api, CURLOPT_CUSTOMREQUEST, 'PUT');
	curl_setopt($mch_api, CURLOPT_TIMEOUT, 10);
	curl_setopt($mch_api, CURLOPT_POST, true);
	curl_setopt($mch_api, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($mch_api, CURLOPT_POSTFIELDS, json_encode($data) );
 
	$result = curl_exec($mch_api);
	$result = json_decode($result);
	
	if( $result->status == 400 )
	{
		$rstatus = false;
		foreach( $result->errors as $error ) {
			$message .= '<p>Error: ' . $error->message . '</p>';
		}
		if(empty($message)){ $message = $result->detail; }
		$message = '<div class="alert alert-danger mt-1 mb-4 p-2">'.$message.'</div>';
	}
	elseif( $result->status == 'subscribed' )
	{
		$rstatus = true;
		$message = '<div class="alert alert-success mt-1 mb-4 p-2"> Thank you, You have subscribed successfully. </div>';
	}
	
	$return_data['status'] = $rstatus;
	$return_data['message'] = $message;
		
	wp_send_json($return_data);
	wp_die();
}

function getVisIpAddr(){
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        return $_SERVER['HTTP_CLIENT_IP'];
    }
    else if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        return $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    else {
        return $_SERVER['REMOTE_ADDR'];
    }
}







// function custom_product_shortcode($atts) {
//     $atts = shortcode_atts(
//         array('id' => ''), 
//         $atts, 
//         'product_info'
//     );

//     if (!$atts['id']) {
//         return 'Product ID not provided.';
//     }

//     $product = wc_get_product($atts['id']);
//     if (!$product) {
//         return 'Product not found.';
//     }

//     $output = '<div class="custom-product">';
// 	 $output .= '<div class="product-image">' . wp_get_attachment_image($product->get_image_id(), 'medium') . '</div>';
//    $output .= '<div class="product-TEXT-2">';
//    $output .= '<h2>' . $product->get_name() . '</h2>';

// 	$short_description = $product->get_short_description();

//    $output .= '<p id="limit-3">' . $product->get_short_description() . '</p>';
//     $output .= '</div>';
	
// 	 $output .= '<div class="product-TEXT-3">';
//    $output .= '<h3>' . $product->get_name() . '</h3>';  
//     $output .= '</div>';
	
// 	// Add product rating
//      $average_rating = $product->get_average_rating();
//     if ($average_rating) {
//         $full_stars = floor($average_rating);
//         $half_star = ($average_rating - $full_stars >= 0.5) ? 1 : 0;
//         $empty_stars = 5 - $full_stars - $half_star;

//         $rating_html = '';
//         for ($i = 0; $i < $full_stars; $i++) {
//             $rating_html .= '<i class="fa fa-star" aria-hidden="true"></i>';
//         }
//         if ($half_star) {
//             $rating_html .= '<i class="fa fa-star-half-alt" aria-hidden="true"></i>';
//         }
//         for ($i = 0; $i < $empty_stars; $i++) {
//             $rating_html .= '<i class="fa fa-star" aria-hidden="true" style="color: #ccc;"></i>'; // Use a different color for empty stars
//         }

//         $output .= '<div class="product-rating">' . $rating_html . '</div>';
//     }
	
// 	// Get and format the product publish date
//     $publish_date = $product->get_date_created()->date_i18n(get_option('date_format'));
//     $output .= '<p class="product-publish-date">' . esc_html($publish_date) . '</p>';
    
	
// 	 $output .= '<p id="price-4">' . $product->get_price_html() . '</p>'; 
	
	

		
     
//     $output .= '<a href="' . esc_url($product->add_to_cart_url()) . '" class="button product_type_variable add_to_cart_button">Add to Cart</a>';
//     $output .= '</div>';

//     return $output;
// }
// add_shortcode('product_info', 'custom_product_shortcode');




//te

function custom_product_shortcode($atts) {
    $atts = shortcode_atts(
        array('count' => 12), // Default to 12 products per page
        $atts,
        'product_info'
    );

    // Set up query arguments
    $paged = get_query_var('paged') ? get_query_var('paged') : 1; // Get current page
    $args = array(
        'post_type' => 'product',
        'posts_per_page' => $atts['count'],
        'paged' => $paged,
    );

    // Query products
    $products = new WP_Query($args);
    
    if (!$products->have_posts()) {
        return 'No products found.';
    }

    $output = '<div class="custom-products-grid">'; // Start grid container

    // Loop through products
    while ($products->have_posts()) {
        $products->the_post();
        $product = wc_get_product(get_the_ID());
		
        $output .= '<a href="' . esc_url($product->get_permalink()) . '" class="custom-product-link">'; // Product link added
        $output .= '<div class="custom-product">';
        $output .= '<div class="product-image">' . wp_get_attachment_image($product->get_image_id(), 'medium') . '</div>';
        $output .= '<div class="product-info">';
		$output .= '</a>'; // Close custom-product-link
		
		 $output .= '<a href="' . esc_url($product->get_permalink()) . '" class="custom-product-link">'; // Product link added
		$output .= '<div class="product-TEXT-a1">';
        $output .= '<h2 id="sp-4">' . esc_html($product->get_name()) . '</h2>';
		
		$output .= '<div class="woocommerce-product-details__short-description">';
        $output .= '<p id="box12">' . wp_kses_post($product->get_short_description()) . '</p>';
		$output .= '</div>'; // Close custom-product
          $output .= '</div>'; // Close custom-product
		$output .= '</a>'; // Close custom-product-link
		
		
		
	
		
$output .= '<h2 id="hed-2"><a href="' . esc_url(get_permalink($product->get_id())) . '">' . esc_html($product->get_name()) . '</a></h2>';		
        // Add product rating
$average_rating = $product->get_average_rating();
$rating_html = '';

// Check if there's an average rating
if ($average_rating) {
    $full_stars = floor($average_rating);
    $half_star = ($average_rating - $full_stars >= 0.5) ? 1 : 0;
    $empty_stars = 5 - $full_stars - $half_star;

    // Full stars
    for ($i = 0; $i < $full_stars; $i++) {
        $rating_html .= '<img src="https://raindance.org/wp-content/uploads/2024/11/star-full.png" alt="Full Star" class="star">';
    }
    
    // Half star
    if ($half_star) {
        $rating_html .= '<img src="https://raindance.org/wp-content/uploads/2024/11/star-half.png" alt="Half Star" class="star">';
    }
    
    // Empty stars
    for ($i = 0; $i < $empty_stars; $i++) {
        $rating_html .= '<img src="https://raindance.org/wp-content/uploads/2024/11/star-empty.png" alt="Empty Star" class="star">';
    }
} else {
    // Show empty stars if no rating
    for ($i = 0; $i < 5; $i++) {
        $rating_html .= '<img src="https://raindance.org/wp-content/uploads/2024/11/star-empty.png" alt="Empty Star" class="star">';
    }
}
$output .= '<a href="' . esc_url($product->get_permalink()) . '" class="custom-product-link">'; // Product link added
$output .= '<div class="product-rating">' . $rating_html . '</div>';
$output .= '</a>'; // Close custom-product-link
		
	$output .= '<a  href="' . esc_url($product->get_permalink()) . '" class="custom-product-link">'; // Product link added	
        // Get and format the product publish date
        $publish_date = $product->get_date_created()->date_i18n(get_option('date_format'));
        $output .= '<p class="product-publish-date">' . esc_html($publish_date) . '</p>';
  
        $output .= '<p >' . $product->get_price_html() . '</p>'; 
        if ($product->is_type('variable')) {
            $output .= '<a href="' . esc_url($product->add_to_cart_url()) . '" class="button product_type_variable add_to_cart_button">Select options</a>';
        } else {
            $output .= '<a href="' . esc_url($product->add_to_cart_url()) . '" class="button product_type_variable add_to_cart_button">Add to Cart</a>';
        }
        $output .= '</div>'; // Close product-info
        $output .= '</div>'; // Close custom-product
    }
$output .= '</a>'; // Close custom-product-link
    wp_reset_postdata(); // Reset the query

	
// Pagination
$total_pages = $products->max_num_pages;
if ($total_pages > 1) {
    $current_page = max(1, get_query_var('paged'));
    
    // Add a wrapping div for centering
    $pagination = '<div class="pagination-wrapper" style="text-align: center;">';
    $pagination .= '<div class="pagination">';

    // Previous button
    if ($current_page > 1) {
        $pagination .= '<a href="' . esc_url(get_pagenum_link($current_page - 1)) . '" class="prev">Previous</a>';
    }

    // Page number links
    for ($i = 1; $i <= $total_pages; $i++) {
        if ($i === $current_page) {
            $pagination .= '<span class="current">' . esc_html($i) . '</span>'; // Current page
        } else {
            $pagination .= '<a href="' . esc_url(get_pagenum_link($i)) . '">' . esc_html($i) . '</a>'; // Page links
        }
    }

    // Next button
    if ($current_page < $total_pages) {
        $pagination .= '<a href="' . esc_url(get_pagenum_link($current_page + 1)) . '" class="next">Next</a>';
    }

    $pagination .= '</div>'; // Close pagination
    $pagination .= '</div>'; // Close pagination-wrapper
    $output .= $pagination; // Add pagination to the output
}
	
	
    $output .= '</div>'; // Close custom-products-grid
   

    return $output;
}
add_shortcode('product_info', 'custom_product_shortcode');





// function custom_product_shortcode($atts) {
//     // Set up default attributes
//     $atts = shortcode_atts(
//         array('count' => -1), // -1 means all products
//         $atts,
//         'product_info'
//     );

//     // Set up query arguments
//     $args = array(
//         'post_type' => 'product',
//         'posts_per_page' => $atts['count'],
//     );

//     // Query products
//     $products = new WP_Query($args);
    
//     if (!$products->have_posts()) {
//         return 'No products found.';
//     }

//     $output = '<div class="custom-products">';

//     // Loop through products
//     while ($products->have_posts()) {
//         $products->the_post();
//         $product = wc_get_product(get_the_ID());

//         $output .= '<div class="custom-product">';
//         $output .= '<div class="product-image">' . wp_get_attachment_image($product->get_image_id(), 'medium') . '</div>';
//         $output .= '<div class="product-TEXT-2">';
//         $output .= '<h2>' . esc_html($product->get_name()) . '</h2>';
//         $output .= '<p>' . wp_kses_post($product->get_short_description()) . '</p>';
//         $output .= '</div>';
        
//         // Add product rating
//         $average_rating = $product->get_average_rating();
//         if ($average_rating) {
//             $full_stars = floor($average_rating);
//             $half_star = ($average_rating - $full_stars >= 0.5) ? 1 : 0;
//             $empty_stars = 5 - $full_stars - $half_star;

//             $rating_html = '';
//             for ($i = 0; $i < $full_stars; $i++) {
//                 $rating_html .= '<i class="fa fa-star" aria-hidden="true"></i>';
//             }
//             if ($half_star) {
//                 $rating_html .= '<i class="fa fa-star-half-alt" aria-hidden="true"></i>';
//             }
//             for ($i = 0; $i < $empty_stars; $i++) {
//                 $rating_html .= '<i class="fa fa-star" aria-hidden="true" style="color: #ccc;"></i>';
//             }

//             $output .= '<div class="product-rating">' . $rating_html . '</div>';
//         }

//         $output .= '<p>' . $product->get_price_html() . '</p>'; 
//         $output .= '<a href="' . esc_url($product->add_to_cart_url()) . '" class="button add_to_cart_button">Add to Cart</a>';
//         $output .= '</div>'; // Close custom-product
//     }

//     wp_reset_postdata(); // Reset the query

//     $output .= '</div>'; // Close custom-products

//     return $output;
// }
// add_shortcode('product_info', 'custom_product_shortcode');

function jetpackme_exclude_jetpack_related_from_products( $options ) {
    if ( is_product() ) {
        $options['enabled'] = false;
    }
 
    return $options;
}
add_filter( 'jetpack_relatedposts_filter_options', 'jetpackme_exclude_jetpack_related_from_products' );



function change_support_us_text($translated_text, $text, $domain) {
    if ($text === 'Support Us') {
        $translated_text = 'Donate/Invest';
    }
    return $translated_text;
}
add_filter('gettext', 'change_support_us_text', 20, 3);

















// Add product date below the price
add_action('woocommerce_after_shop_loop_item_title', 'add_date_below_price', 15);

function add_date_below_price() {
    global $product;
    $product_id = $product->get_id();
    $publish_date = get_the_date('F j, Y', $product_id); // Format: e.g., "March 15, 2024"

//     echo '<p class="product-date">' . esc_html($publish_date) . '</p>';
	
	// Custom field value ko fetch karna
$course_date_start = get_field('course_date_start');

// Agar value mil jaye to usse display karna
if ($course_date_start) {
    echo '<p class="product-date">' . esc_html($course_date_start) . '</p>';
} else {
    echo '<p>Not available.</p>';
}
	
	
	
}
// Disable update notifications for Aelia Foundation Classes for WooCommerce plugin
add_filter('site_transient_update_plugins', 'disable_aelia_update_notifications');

function disable_aelia_update_notifications($value) {
    if (isset($value) && is_object($value)) {
        // Replace 'aelia-foundation-classes-for-woocommerce/aelia-foundation-classes-for-woocommerce.php' with your plugin's main file path
        unset($value->response['aelia-foundation-classes-for-woocommerce/aelia-foundation-classes-for-woocommerce.php']);
    }
    return $value;
}



// Disable Plugin Update Notifications
add_filter('site_transient_update_plugins', 'disable_plugin_update_notifications');

function disable_plugin_update_notifications($value) {
    if (isset($value) && is_object($value)) {
        $value->response = array();
    }
    return $value;
}
function register_product_location_taxonomy() {
    register_taxonomy('product_location', 'product', array(
        'label'        => __('Course Locations', 'textdomain'),
        'rewrite'      => array('slug' => 'course-location'),
        'hierarchical' => true,
    ));
}
add_action('init', 'register_product_location_taxonomy');

$product_id = 123; // Replace with actual product ID
$terms = get_the_terms($product_id, 'product_location');
print_r($terms);







// Disable all plugin updates from being fetched
remove_action('load-update-core.php', 'wp_update_plugins');
add_filter('pre_site_transient_update_plugins', '__return_null');

// Hide update notifications in Plugins screen
function hide_plugin_update_notifications() {
    remove_action('admin_notices', 'update_nag', 3);

    global $wp_filter;
    if (isset($wp_filter['after_plugin_row'])) {
        unset($wp_filter['after_plugin_row']);
    }
    if (isset($wp_filter['after_plugin_row_plugin'])) {
        unset($wp_filter['after_plugin_row_plugin']);
    }
}
add_action('admin_init', 'hide_plugin_update_notifications', 999);

// Hide plugins update icon on admin dashboard menu
function remove_plugin_update_count($menu) {
    foreach ($menu as $key => $item) {
        if ($item[2] == 'plugins.php') {
            $menu[$key][0] = preg_replace('/<span class="update-plugins count-\d+">.*?<\/span>/', '', $item[0]);
        }
    }
    return $menu;
}
add_filter('add_menu_classes', 'remove_plugin_update_count');

// Optional: remove dashboard update notifications
add_action('admin_menu', function() {
    remove_submenu_page('index.php', 'update-core.php');
});










