<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package _s_bootstrap
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', '_s_bootstrap' ); ?></a>

	<header id="masthead" class="site-header">
		<div class="site-branding">
			<div class="container">
				<?php
				the_custom_logo();
				if ( is_front_page() && is_home() ) :
					?>
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<?php
				else :
					?>
					<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
					<?php
				endif;
				$_s_bootstrap_description = get_bloginfo( 'description', 'display' );
				if ( $_s_bootstrap_description || is_customize_preview() ) :
					?>
					<p class="site-description"><?php echo $_s_bootstrap_description; /* WPCS: xss ok. */ ?></p>
				<?php endif; ?>
			</div><!-- .container -->
		</div><!-- .site-branding -->

		<nav id="site-navigation" class="navbar navbar-expand-lg navbar-light">
			<div class="container">
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#primary-menu" aria-controls="primary-menu" aria-expanded="false" aria-label="<?php esc_html_e( 'Toggle Menu', '_s_bootstrap' ); ?>">
					<span class="navbar-toggler-icon"></span>
				</button>
				<?php
				wp_nav_menu( array(
					'theme_location'  => 'menu-1',
					'container'       => 'div',
					'container_id'    => 'primary-menu',
					'container_class' => 'collapse navbar-collapse',
					'menu_class'      => 'navbar-nav',
					'walker'          => new s_bootstrap_navwalker()
				) );
				?>
			</div>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">
