<?php
/**
 * This template displays blog content.
 *
 * @package Developr WordPress Theme
 * @version 1.1
 * @since 1.0
 */


$koko_post_excerpt_length = 32;
$args = array(
	'post_type' => 'koko_portfolio',
	'order' => 'ASC',
    //'posts_per_page'      => 1,
    //'post__in'            => get_option( 'sticky_posts' ),
    //'ignore_sticky_posts' => 1,
);
$the_query = new WP_Query( $args );


if ( $the_query->have_posts() ) {
    while ( $the_query->have_posts() ) {
			$the_query->the_post();							
			
			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
			?>

			<?php if( $wp_query->current_post == 0 && $paged == 1  ) : ?>
				<?php
					
					do_action( 'koko_before_first_blog_post', $post->ID );
					?>

			<?php endif; ?>



				<?php 
					$custom_label = get_post_meta($post->ID, 'custom_label', true); ?>

					<div id="post-<?php the_ID(); ?>" <?php post_class('portfolio'); ?>>
						<div class="post-container-inner">
							
							<?php
								
								do_action( 'koko_blog_before_post', $post->ID );
								?>
							<div class="post-inner">

								<div class="post-featured-img">
									<a href="<?php the_permalink(); ?>" title="<?php get_the_title(); ?>">
										<?php the_post_thumbnail( 'regular' ); ?>
									</a>
								</div>

								<div class="post-content">
									<ul class="portfolio-item-meta">
										<li><?php the_terms( $post->ID, 'koko_types', ''); ?></li>
										<li class="sep">&middot;</li>
										<?php if( $custom_label ) { ?>
											<li class="custom-label"><?php echo $custom_label; ?></li>
										<?php } else { ?>
											<li><?php echo get_the_date('Y'); ?></li>
										<?php } ?>
									</ul>
									<a href="<?php the_permalink(); ?>" title="<?php get_the_title(); ?>">
										<h3><?php the_title(); ?></h3>
									</a>
									<p><?php 
										if( ! $post->post_excerpt ) {
										// Auto excerpt
										$raw_excerpt = get_the_content();

										// Trim excerpts
										$excerpt = wp_trim_words( $raw_excerpt, $koko_post_excerpt_length, ' ...' );
										echo $excerpt;
									} ?></p>
								</div>

								<?php
								
								do_action( 'koko_blog_post', $post->ID );
								?>
							</div>
						</div>
					</div>
			<?php
		} 
	} wp_reset_postdata();  ?>