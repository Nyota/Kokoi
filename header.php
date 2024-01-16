<?php
/**
 * This template displays the header.
 *
 * @package Kokoi WordPress Theme
 * @version 1.1
 * @since 1.0
 */
 ?>
<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>

	<head>

		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1.0" >
		<link rel="profile" href="https://gmpg.org/xfn/11">

		<?php wp_head(); ?>

	</head>

	<body <?php body_class(); ?>>
		<?php wp_body_open(); ?>

		<?php
			/**
			 * Functions hooked in to koko_before_theme_wrapper add_action
			 *
			 */
			do_action( 'koko_before_theme_wrapper' );
			?>