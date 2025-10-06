<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Amelia
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
	<?php wp_head(); ?>
	<?php wp_body_open(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<header id="header" class="header">
		<div class="container">
			<div class="row">
				<div class="col-logo col-12">
					<a href="/" class="d-flex align-items-center">
						<img src="/wp-content/uploads/2025/10/logo-typ.svg" alt="Amelia" />
						<span>Amelia</span>
					</a>
				</div>
				<menu class="col-menu col-12">
					<ul class="menu">
						<li><a href="/">O mnie</a></li>
						<li><a href="/">Jak uczę</a></li>
						<li><a href="/">Oferta</a></li>
						<li><a href="/">Opinie</a></li>
						<li><a href="/">FAQ</a></li>
						<li><a href="/">Kontakt</a></li>
					</ul>
				</menu>
				<div class="col-login col-12">
					<a href="login" class="btn btn-primary"><span class="btn_text">Zaloguj</span></a>
				</div>
			</div>
		</div>
	</header>
