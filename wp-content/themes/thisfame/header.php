<!doctype html>
<html <? language_attributes(); ?>>
<head>
	<meta charset="<? bloginfo( 'charset' ); ?>">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<? bloginfo( 'pingback_url' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>

	<? if(get_field('ua', 'option')): ?>
		<script>
			(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
			ga('create', '<? the_field('ua', 'option') ?>', 'auto');
			ga('send', 'pageview');
		</script>
	<? endif; ?>
	<title><? wp_title(''); ?></title>
	<meta name="description" content="<? bloginfo('description'); ?>">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Oswald" type='text/css' />
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto+Mono" type='text/css' />
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Abel" type='text/css' />

	<!--[if lt IE 9]>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.2/html5shiv-printshiv.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
	<? wp_head(); ?>
</head>
<body <? body_class(); ?>>

	<header>

			<? /* if (is_front_page()) :
				<h1 class="logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?= esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<? else : ?>
				<span class="logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?= esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></span>
			<? endif; */?>

		<div class="hamburger-menu">
		  <div class="bar"></div>
		</div>
		<button class="search">
		</button>
	</header>
	<div class="menu">
		<? wp_nav_menu(array( 'theme_location' => 'menu-principal', 'container' => 'nav')); ?>
	</div>
	<div class="contain-search">
		<span class="button-close">close</span>
		<div class="container">
			<form action="<?php bloginfo('url'); ?>" method="get" accept-charset="utf-8" class="recherche">
				<input type="search-button" name="s" id="s" acceskey="s" placeholder="Votre recherche" />
				<button type="submit" class="button-search-white"></button>
			</form>
		</div>
	</div>
<script type="text/javascript">
(function () {
	$('.hamburger-menu').on('click', function() {
		$('.bar').toggleClass('animate');
		$('.menu').toggleClass('activate');
		$('.page').toggleClass('right');
		$('footer').toggleClass('right');
		$('header').toggleClass('open');
	})
})();


$( ".search" ).click(function() {
  $( "header" ).animate({
    left: "-60",
  }, 100, function() {
  });
	$('.page').toggleClass('large');
	$('footer').toggleClass('large');
	$('.contain-search').fadeToggle('slow');
	$('.bar').removeClass('animate');
	$('.page').removeClass('right');
	$('footer').removeClass('right');
	$('.menu').removeClass('activate');
});

$( ".button-close" ).click(function() {
  $( "header" ).animate({
    left: "+0",
  }, 100, function() {
  });
	$('.page').toggleClass('large');
	$('footer').toggleClass('large');
	$('.contain-search').fadeToggle('slow');
});
</script>
