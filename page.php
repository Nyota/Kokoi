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
						<div class="content-wrapper">

						<main>
							<div class="single-section main-section main-section-flexed">
								<div class="single-section-left"></div>
								<div class="single-section-inner">
									<div class="single-section-title-content">
										<h1><?php the_title(); ?></h1>
									</div>
									<?php the_content(); ?>
								</div>
							</div>

							<?php /*<section class="main-section hero-section">
								<div class="main-section-inner">

									<h1><?php the_title(); ?></h1>
								</div>
							</section>

							<section class="main-section">
								<div class="main-section-inner">
									
									<div class="main-section-title-content">
									</div>
									<?php the_content(); ?>
								</div>
							</section>*/ ?>



							<?php
								/**
								 * Functions hooked in to koko_blog_after_posts add_action
								 *
								 * //@hooked koko_posts_pagination      - 10
								 */
								do_action( 'koko_blog_after_posts' ); ?>
							</div>
						</main>
					</div>
				</div>

				<div class="bottom">
					<?php get_footer(); ?>
