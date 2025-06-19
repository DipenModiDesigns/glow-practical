<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Glow_Theme
 */

$header_classes = 'site-header mainHeader mainHeader--fixed';
if ( is_front_page() ) {
    $header_classes .= ' homeHeader';
}

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
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'glow-theme' ); ?></a>

	<header id="masthead" class="<?php echo esc_attr( $header_classes ); ?>">
		<div class="container">
			<div class="innerHeader">
				<div class="site-branding">
					<?php
					the_custom_logo();
					// if ( is_front_page() && is_home() ) :
						?>
						<!-- <h1 class="site-title"><a href="<?php //echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php //bloginfo( 'name' ); ?></a></h1> -->
						<?php
					// else :
						?>
						<!-- <p class="site-title"><a href="<?php //echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php //bloginfo( 'name' ); ?></a></p> -->
						<?php
					// endif;
					// $glow_theme_description = get_bloginfo( 'description', 'display' );
					// if ( $glow_theme_description || is_customize_preview() ) :
						?>
						<!-- <p class="site-description"><?php //echo $glow_theme_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p> -->
					<?php //endif; ?>
				</div><!-- .site-branding -->

				<nav id="site-navigation" class="main-navigation">
					<!-- <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php //esc_html_e( 'Primary Menu', 'glow-theme' ); ?></button> -->
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'menu-1',
							'menu_id'        => 'primary-menu',
						)
					);
					?>
				</nav><!-- #site-navigation -->

				<div class="userMenu">
					<?php //if ( is_user_logged_in() ) : ?>
						<!-- <a href="<?php //echo esc_url( admin_url() ); ?>" class="admin-link"><?php //esc_html_e( 'Admin', 'glow-theme' ); ?></a> -->
						<!-- <a href="<?php //echo esc_url( wp_logout_url() ); ?>" class="logout-link"><?php //esc_html_e( 'Logout', 'glow-theme' ); ?></a> -->
					<?php //else : ?>
						<!-- <a href="<?php //echo esc_url( wp_login_url() ); ?>" class="login-link"><?php //esc_html_e( 'Login', 'glow-theme' ); ?></a> -->
					<?php //endif; ?>
					<ul>
						<li class="menuToggleCover">
							<a href="javascript:void(0)" id="menuToggle" class="menuToggle">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" class="menuBarIcon">
									<path d="M1 12C1 11.4477 1.44772 11 2 11H22C22.5523 11 23 11.4477 23 12C23 12.5523 22.5523 13 22 13H2C1.44772 13 1 12.5523 1 12Z" fill="currentColor"/>
									<path d="M1 4C1 3.44772 1.44772 3 2 3H22C22.5523 3 23 3.44772 23 4C23 4.55228 22.5523 5 22 5H2C1.44772 5 1 4.55228 1 4Z" fill="currentColor"/>
									<path d="M1 20C1 19.4477 1.44772 19 2 19H22C22.5523 19 23 19.4477 23 20C23 20.5523 22.5523 21 22 21H2C1.44772 21 1 20.5523 1 20Z" fill="currentColor"/>
								</svg>
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" class="menuCloseIcon">
									<path d="M6 6L18 18M18 6L6 18" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
								</svg>
							</a>
						</li>

						<?php
							$searchIcon = get_field('enable_search_icon', 'option');
							$userIcon = get_field('enable_user_icon', 'option');
						?>
						<?php if ($searchIcon) : ?>
							<li>
								<a href="<?php echo get_home_url(); ?>?s=" class="btn-icon">
									<svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" viewBox="0 0 21 21" fill="none">
										<path d="M20.6158 18.7124L16.5513 14.6575C19.5925 10.6046 18.7633 4.86051 14.6991 1.8277C10.6349 -1.20511 4.87478 -0.378161 1.83352 3.67473C-1.20773 7.72762 -0.378482 13.4717 3.6857 16.5045C6.95038 18.9408 11.4344 18.9408 14.6991 16.5045L18.7653 20.5595C19.2763 21.069 20.1048 21.069 20.6157 20.5595C21.1267 20.0499 21.1267 19.2237 20.6157 18.7142L20.6158 18.7124ZM9.22627 15.7219C5.61422 15.7219 2.68611 12.8019 2.68611 9.19991C2.68611 5.5979 5.61422 2.67792 9.22627 2.67792C12.8383 2.67792 15.7664 5.5979 15.7664 9.19991C15.7626 12.8003 12.8367 15.7181 9.22627 15.7219Z" fill="currentColor"/>
									</svg>
								</a>
							</li>
						<?php endif; ?>
						<?php if ($userIcon) : ?>
							<li>
								<a href="<?php echo get_home_url(); ?>/wp-login.php" class="btn-icon">
									<svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" viewBox="0 0 21 21" fill="none">
										<g clip-path="url(#clip0_8_40)">
											<path d="M18.375 20.9416H15.75V16.5788C15.75 16.1159 15.5656 15.6721 15.2374 15.3448C14.9092 15.0175 14.4641 14.8337 14 14.8337H7C6.53587 14.8337 6.09075 15.0175 5.76256 15.3448C5.43437 15.6721 5.25 16.1159 5.25 16.5788V20.9416H2.625V16.5788C2.62639 15.4221 3.08777 14.3132 3.90794 13.4953C4.72811 12.6774 5.8401 12.2173 7 12.2159H14C15.1599 12.2173 16.2719 12.6774 17.0921 13.4953C17.9122 14.3132 18.3736 15.4221 18.375 16.5788V20.9416Z" fill="currentColor"/>
											<path d="M10.5 10.4708C9.46165 10.4708 8.44662 10.1638 7.58326 9.58851C6.7199 9.01323 6.04699 8.19557 5.64963 7.23893C5.25227 6.28228 5.14831 5.22961 5.35088 4.21404C5.55345 3.19847 6.05347 2.26561 6.78769 1.53342C7.52192 0.801234 8.45738 0.302609 9.47578 0.100599C10.4942 -0.10141 11.5498 0.00226843 12.5091 0.398525C13.4684 0.794781 14.2883 1.46582 14.8652 2.32678C15.4421 3.18774 15.75 4.19995 15.75 5.23542C15.7486 6.62351 15.195 7.95436 14.2108 8.93589C13.2265 9.91742 11.892 10.4694 10.5 10.4708ZM10.5 2.61771C9.98083 2.61771 9.47331 2.77124 9.04163 3.05887C8.60995 3.34651 8.2735 3.75534 8.07482 4.23367C7.87614 4.71199 7.82415 5.23832 7.92544 5.74611C8.02673 6.25389 8.27673 6.72033 8.64385 7.08642C9.01096 7.45251 9.47869 7.70182 9.98789 7.80283C10.4971 7.90383 11.0249 7.85199 11.5045 7.65387C11.9842 7.45574 12.3942 7.12022 12.6826 6.68974C12.971 6.25926 13.125 5.75315 13.125 5.23542C13.125 4.54116 12.8484 3.87534 12.3562 3.38442C11.8639 2.8935 11.1962 2.61771 10.5 2.61771Z" fill="currentColor"/>
										</g>
										<defs>
											<clipPath id="clip0_8_40">
												<rect width="21" height="20.9417" fill="currentColor"/>
											</clipPath>
										</defs>
									</svg>
								</a>
							</li>
						<?php endif; ?>
					</ul>
				</div>
			</div>
		</div>
	</header><!-- #masthead -->
