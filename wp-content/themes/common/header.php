<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta content="IE=edge" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/css/styles.css">
    <title><?php wp_title(''); ?></title>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>


<div class="header">
	<?php
		$navbar_class = (is_front_page()) ? '' : 'nav navbar-excursion';
	?>
	<nav class="navbar <?php echo $navbar_class; ?>">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" title="Transcatalonia Tours" href="<?php echo home_url(); ?>">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/logo-new.png" />
						</a>
						<div class="header-text hidden-xs">
							...об Испании - стильно!
							<span>+(34) 672-459-489</span>
						</div>
					</div>
					<div id="navbar" class="navbar-collapse collapse">
						<?php wp_nav_menu( array(
							'walker' => new Tct_Walker_Nav_Menu,
							'theme_location' => 'header-menu',
							'menu_class' => 'nav navbar-nav',
							'container' => false,
						) ); ?>
						<div class="header-text visible-xs">
							...об Испании - стильно!
							<span>+(34) 672-459-489</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</nav>
</div>

