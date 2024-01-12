<?php
/**
 * This template displays the portfolio single page.
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
						<section class="single-section main-section portfolio-section-title main-section-flexed">
							<div class="single-section-left"></div>
							<div class="single-section-inner">
								<div class="single-section-title-content">
									<h1><?php the_title(); ?></h1>
								</div>
							</div>
						</section>

						<section id="potfolio-item" class="single-section main-section portfolio-section-single main-section-flexed">

							<div class="single-section-left">
								<div class="single-section-title-content"></div>
							</div>
							<div class="single-section-inner">
								<?php the_content(); ?>
							</div>
						</section>
							
						<?php
							/**
							 * Functions hooked in to koko_after_single_portfolio
							 *
							 * @hooked koko_portfolio_post_pagination - 10
							 */
							do_action( 'koko_after_single_portfolio' ); ?>
						</div>

					</main>
				</div>
			</div>

			<div class="bottom">
				<?php get_footer(); ?>
