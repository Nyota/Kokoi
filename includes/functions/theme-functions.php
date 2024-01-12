<?php

/**
 * koko_navigation_wrapper()
 * Display navigation
 * Hooked into the `koko_navigation` action in the header.php template
 *
 * @package WordPress
 * @subpackage Kokoi
 * @since  1.0
 * @return  void
 */
if ( ! function_exists( 'koko_navigation_wrapper' ) ) {
	function koko_navigation_wrapper() {
		get_template_part( 'navigation' ); 
	}
}
add_action( 'koko_navigation', 'koko_navigation_wrapper', 10 );


/**
 * koko_navigation_menu()
 * Display navigation menu
 * Hooked into the `koko_navigation_content` action in the header.php template.
 *
 * @package WordPress
 * @subpackage Kokoi
 * @since  1.0
 * @return  void
 */
if ( ! function_exists( 'koko_navigation_menu' ) ) {
	function koko_navigation_menu() {

		if ( has_nav_menu( 'header-menu' ) ) { ?>
			<nav>
			<?php wp_nav_menu( 
				array( 
					'theme_location' => 'header-menu', 
					'container_id' => 'header-menu', 
					'sort_column' => 'menu_order', 
					'menu_class' => 'header-menu', 
					'fallback_cb' => false, 
					'container' => false 
				)
			); ?>
			</nav>

		<?php 
		} 

	}
	add_action( 'koko_navigation_content', 'koko_navigation_menu', 20 );
}


/**
 * koko_navigation_logo()
 * Display the logo within the navigation
 * Hooked into the `koko_navigation_content` action in the header.php template.
 *
 * @package WordPress
 * @subpackage Kokoi
 * @since  1.0
 * @return  void
 */
if ( ! function_exists( 'koko_navigation_logo' ) ) {
	function koko_navigation_logo() {
		?>

		<div class="nav-identity"> 

		<?php if( has_custom_logo() ) { 
			echo koko_custom_logo();

		} else {
			?>
				<h1 class="site-title">
					<a href="<?php echo esc_url( home_url() ); ?>" title="<?php echo get_bloginfo('name'); ?>" rel="home"><?php echo get_bloginfo('name'); ?></a>
				</h1>
			<?php
		} ?>
	</div>
	<?php 
	}
}
add_action( 'koko_navigation_content', 'koko_navigation_logo', 10 );



/**
 * koko_single_post_pagination()
 * Displays pagination within single posts
 *
 * @package WordPress
 * @subpackage Kokoi
 * @since  1.0
 * @return  string - Pagination links
 */
if( ! function_exists( 'koko_single_post_pagination' ) ){
	function koko_single_post_pagination() {
		$o='';

		$o .= '<section class="single-section main-section pagination-section main-section-flexed"><div class="single-section-left">
								<div class="single-section-title-content"></div>
							</div>
							<div class="single-section-inner"><div class="single-pagination"><div class="nav-previous alignleft">' 
							. get_previous_post_link( '<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#000000" viewBox="0 0 256 256"><path d="M224,128a8,8,0,0,1-8,8H59.31l58.35,58.34a8,8,0,0,1-11.32,11.32l-72-72a8,8,0,0,1,0-11.32l72-72a8,8,0,0,1,11.32,11.32L59.31,120H216A8,8,0,0,1,224,128Z"></path></svg> %link', '%title', false, '', 'category' ) . '</div>
					<div class="nav-next alignright">' . get_next_post_link(' %link <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#000000" viewBox="0 0 256 256"><path d="M221.66,133.66l-72,72a8,8,0,0,1-11.32-11.32L196.69,136H40a8,8,0,0,1,0-16H196.69L138.34,61.66a8,8,0,0,1,11.32-11.32l72,72A8,8,0,0,1,221.66,133.66Z"></path></svg>', '%title', false, 'category') . '</div></div></div></section>';

		echo $o;
	}
}
add_action( 'koko_after_single_post', 'koko_single_post_pagination', 10 );



/**
 * koko_portfolio_post_pagination()
 * Displays pagination within single portfolio posts
 *
 * @package WordPress
 * @subpackage Kokoi
 * @since  1.0
 * @return  string - Pagination links
 */
if( ! function_exists( 'koko_portfolio_post_pagination' ) ){
	function koko_portfolio_post_pagination() {
		$o='';

		$o .= '<section class="single-section main-section pagination-section main-section-flexed"><div class="single-section-left">
								<div class="single-section-title-content"></div>
							</div>
							<div class="single-section-inner"><div class="single-pagination"><div class="nav-previous alignleft">' 
							. get_previous_post_link( '<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#000000" viewBox="0 0 256 256"><path d="M224,128a8,8,0,0,1-8,8H59.31l58.35,58.34a8,8,0,0,1-11.32,11.32l-72-72a8,8,0,0,1,0-11.32l72-72a8,8,0,0,1,11.32,11.32L59.31,120H216A8,8,0,0,1,224,128Z"></path></svg> %link', '%title', false, '', 'koko_types' ) . '</div>
					<div class="nav-next alignright">' . get_next_post_link(' %link <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#000000" viewBox="0 0 256 256"><path d="M221.66,133.66l-72,72a8,8,0,0,1-11.32-11.32L196.69,136H40a8,8,0,0,1,0-16H196.69L138.34,61.66a8,8,0,0,1,11.32-11.32l72,72A8,8,0,0,1,221.66,133.66Z"></path></svg>', '%title', false, 'koko_types') . '</div></div></div></section>';

		echo $o;
	}
}
add_action( 'koko_after_single_portfolio', 'koko_portfolio_post_pagination', 10 );




/**
 * koko_custom_logo()
 * Retrieves logo set in the customizer
 *
 * @since  1.0
 * @return  string - <img> of logo.
 */
if( ! function_exists( 'koko_custom_logo' ) ){
	function koko_custom_logo( $css_classes='' ) {

		$custom_logo_id = get_theme_mod( 'custom_logo' );
		$logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
		$logo_url = ! empty( $logo[0] ) ? $logo[0] : '';
		$o = '';

		if ( has_custom_logo() ) {
			$o .= '<a href="' . home_url() . '" title="' . get_bloginfo('name') . '" rel="home">';
		    	$o .= '<img class="' . $css_classes . '" src="' . esc_url( $logo_url ) . '" alt="' . get_bloginfo( 'name' ) . '">';
		    $o .= '</a>';
		}

		return $o;
	}
}


/**
 * koko_navigation_hamburger()
 * Retrieves hamburger menu
 *
 * @since  1.0
 * @return  string - <svg> with hamburger.
 */
if( ! function_exists( 'koko_navigation_hamburger' ) ){
	function koko_navigation_hamburger() {
		$o = '';

		$o .= '<div class="koko-nav-menu-button"><svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#000000" viewBox="0 0 256 256"><path d="M224,128a8,8,0,0,1-8,8H40a8,8,0,0,1,0-16H216A8,8,0,0,1,224,128ZM40,72H216a8,8,0,0,0,0-16H40a8,8,0,0,0,0,16ZM216,184H40a8,8,0,0,0,0,16H216a8,8,0,0,0,0-16Z"></path></svg></div>';

		echo $o;
	}
}
add_action( 'koko_navigation_content', 'koko_navigation_hamburger', 30 );


/**
 * koko_navigation_download_button()
 * Add download button
 *
 * @since  1.0
 * @return  string - button to download.
 */
if( ! function_exists( 'koko_navigation_download_button' ) ){
	function koko_navigation_download_button() {
		$o = '';

		$o .= '<div class="koko-nav-download-button"><div class="wp-block-button has-custom-font-size has-medium-font-size"><a href="#" class="wp-block-button__link wp-element-button"><span>Download Theme</span> <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#000000" viewBox="0 0 256 256"><path d="M224,152v56a16,16,0,0,1-16,16H48a16,16,0,0,1-16-16V152a8,8,0,0,1,16,0v56H208V152a8,8,0,0,1,16,0Zm-101.66,5.66a8,8,0,0,0,11.32,0l40-40a8,8,0,0,0-11.32-11.32L136,132.69V40a8,8,0,0,0-16,0v92.69L93.66,106.34a8,8,0,0,0-11.32,11.32Z"></path></svg></a></div></div>';

		echo $o;
	}
}
//add_action( 'koko_footer_contact_menu', 'koko_navigation_download_button', 10 );