<?php
/**
 * This template displays the index page.
 *
 * @package Kokoi WordPress Theme
 * @version 1.1
 * @since 1.0
 */
?>

	<?php get_header(); ?>
		
		<div id="wrapper">
			<div class="wrapper-inner">
				<div class="top">
					<div class="top-inner">
						<header id="site-header">
						<?php /** Navigation menu:
							   * Functions hooked in to koko_navigation
							   *
							   * @hooked koko_navigation_wrapper  - 10
							   */
							   do_action( 'koko_navigation' ); ?>
						</header>


						<main>
							<section class="main-section hero-section main-section-flexed main-section-full">
								<div class="main-section-title-content"></div>
								<div class="main-section-inner">
									<h2><?php _e("Hello 👋🏾 I'm Kathrine, passionate about WordPress theme development and design.", "kokoi"); ?></h2>
								</div>
							</section>

							<div class="main-section about-section main-section-flexed" id="about">
								<div class="main-section-title-content">
									<div class="main-section-title-content-inner">
										<h2><?php _e("About", "kokoi"); ?></h2>
									</div>
								</div>
								<div class="main-section-inner">
									<p><?php _e("Previously a self-taught web designer, I recently graduated with a Bachelor of Science in Media and Computer Science from the Berliner Hochschule für Technik, Germany. I have previous experience designing, developing and selling WordPress themes on Themeforest. I'm passionate about the design as well as the coding process. I currently work at NextHealth GmbH, Berlin.", "kokoi"); ?></p>
								</div>
							</div>

							<section class="main-section portfolio-section main-section-flexed" id="portfolio">
								<div class="main-section-title-content">
									<div class="main-section-title-content-inner">
										<h2><?php _e("Portfolio", "kokoi"); ?></h2>
									</div>
								</div>
								<div class="main-section-inner">
									
									<?php get_template_part( 'content', 'portfolio' ); ?>
								</div>
							</section>

							<section class="main-section skills-section main-section-flexed" id="skills">
								<div class="main-section-title-content">
									<div class="main-section-title-content-inner">
										<h2><?php _e("Skills", "kokoi"); ?></h2>
									</div>
								</div>

								<div class="main-section-inner">
									<div class="skills-flex-box">
										<div class="skills-col">
											<h3><?php _e("Design", "kokoi"); ?></h3>
											<ul>
												<li>UI/UX Design</li>
												<li>Interaction Design</li>
												<li>Prototyping</li>
												<li>Wireframes</li>
											</ul>
										</div>
										<div class="skills-col">
											<h3><?php _e("Dev", "kokoi"); ?></h3>
											<ul>
												<li>WordPress Theme Development</li>
												<li>PHP/HTML5/CSS3</li>
												<li>SASS/SCSS</li>
												<li>Javascript</li>
											</ul>
										</div>
										<div class="skills-col">
											<h3><?php _e("Tools", "kokoi"); ?></h3>
											<ul>
												<li>Photoshop CC</li>
												<li>Figma</li>
												<li>Adobe UX</li>
												<li>Jira</li>
												<li>Git</li>
											</ul>
										</div>
									</div>
								</div>
							</section>
						</main>

						
						<aside class="aside-section">
							<?php if(have_posts()) : ?>
							<section class="blog-section main-section main-section-flexed" id="thoughts">
								<div class="main-section-title-content">
									<div class="main-section-title-content-inner">
										<h2><?php _e("Thoughts", "kokoi"); ?></h2>
									</div>
								</div>

								<div class="main-section-inner">
									<div class="main-posts">
										<div id="posts">

											<?php 
												if ( have_posts() ) {
													
													get_template_part( 'content', 'blog' );

												} else {
													get_template_part( 'content', 'none' );
												}

											?>
										</div>

										<?php
											
											do_action( 'koko_below_blog_posts' );
											?>

									</div>
								</div>
								
								<?php
									/**
									 * Functions hooked in to koko_blog_after_posts add_action
									 *
									 */
									do_action( 'koko_blog_after_posts' ); ?>
							</section>
							<?php endif; ?>

						</aside>
					</div>
					<div id="contact-label"></div>
				</div>

				<div class="bottom">
					<?php get_footer(); ?>
