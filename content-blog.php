<?php
/**
 * This template displays blog content.
 *
 * @package Developr WordPress Theme
 * @version 1.1
 * @since 1.0
 */


while ( have_posts() ) {
	the_post();							
	
	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

	?>

	<?php if( $wp_query->current_post == 0 && $paged == 1  ) : ?>
		<?php
			/**
			 * Functions hooked in to koko_blog_post add_action
			 *
			 * @hooked koko_blog_post_header      - 10
			 */
			do_action( 'koko_before_first_blog_post', $post->ID );
			?>

	<?php endif; ?>

	<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="post-container-inner">
					
			<?php
				/**
				 * Functions hooked in to koko_blog_before_post add_action
				 *
				 * @hooked koko_blog_post_featured      - 10
				 * @hooked koko_blog_post_featured_img  - 20
				 */
				do_action( 'koko_blog_before_post', $post->ID );
				?>
			<div class="post-inner">

				<div class="post-title">
					<a href="<?php the_permalink(); ?>" title="<?php echo get_the_title(); ?>">
						<h3><?php the_title(); ?></h3>
					</a>
				</div>

				<div class="post-date">
					<?php echo get_the_date(); ?>
				</div>

				<?php
				/**
				 * Functions hooked in to koko_blog_post add_action
				 *
				 * @hooked koko_blog_post_header      - 10
				 * @hooked koko_blog_post_content     - 20
				 * @hooked koko_blog_post_footer	  - 30
				 */
				do_action( 'koko_blog_post', $post->ID );
				?>
			</div><!-- .post-inner -->
		</div><!-- .post-container-inner -->
	</div><!-- #post -->
	
			
	<?php
} ?>