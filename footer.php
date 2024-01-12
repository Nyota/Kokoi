<?php
/**
 * This template displays the footer.
 *
 * @package Kokoi WordPress Theme
 * @version 1.1
 * @since 1.0
 */
 ?>
					<div class="main-section contact-section" id="contact">
						<div class="main-section-title-content"></div>

						<div class="main-section-inner">
							<p class="contact-section-text">I am always happy to talk, get in touch below.</p>
							
							<div class="contact-section-below-container">
								<ul class="contact-section-list">
									<li><a href="mailto:hello@kheinzel.com" target="_blank">Email</a></li>
									<li><a href="https://dribbble.com/kateh" target="_blank">Dribbble</a></li>
									<li><a href="https://github.com/nyota" target="_blank">Github</a></li>
									<li><a href="https://wordpress.stackexchange.com/users/18937" target="_blank">StackExchange</a></li>
								</ul>

								<?php
									/**
									 * Functions hooked in to koko_blog_below_wrapper add_action
									 *
									 * @hooked koko_navigation_download_button - 10
									 */
									do_action( 'koko_footer_contact_menu' );
								?>
							</div>
						</div>
					</div>
					<footer id="site-footer">
						<div class="footer-inner lazyload ll-style-fade-in-down">
							<p>&copy; <?php echo date('Y'); ?> - All rights reserved <span class="sep"> &middot; </span> </p> <?php wp_nav_menu( 
						array( 
							'theme_location' => 'footer-menu', 
							'container_id' => 'footer-menu', 
							'sort_column' => 'menu_order', 
							'menu_class' => 'footer-menu', 
							'fallback_cb' => false, 
							'container' => false 
						)
					); ?>
						</div>
					</footer>
					<?php
					/**
					 * Functions hooked in to koko_blog_below_wrapper add_action
					 *
					 * @hooked koko_blog_image_container        - 10
					 * @hooked koko_overlay_nav_container - 30
					 */
					do_action( 'koko_blog_below_wrapper' );

					wp_footer();
				?>
			</div>
		</div>
	</div>

	</body>
</html>