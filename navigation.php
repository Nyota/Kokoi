<?php
/**
 * This template displays the navigation.
 *
 * @package Kokoi WordPress Theme
 * @version 1.1
 * @since 1.0
 */
 ?>

<div id="navigation">
	<div class="navigation-inner">
		<div class="navigation-inner-container">

		<?php /** 
			   * Navigation menu:
			   * Functions hooked in to koko_navigation
			   *
			   *
			   * @hooked koko_navigation_logo       - 10
			   * @hooked koko_navigation_menu       - 20
			   * @hooked koko_navigation_hamburger  - 30
			   */
			   do_action( 'koko_navigation_content' ); ?>
			   
		</div>
	</div>
</div>
