<? get_header(); ?>
<div class="page">
<section class="top-page">
	<div class="slider">
		<? $i = 0 ?>
		<?
        	$args = array(
        			'post_type'		=> 'post',
        			'post__in' => get_option( 'sticky_posts' ),
        			'posts_per_page' => 4,
        	);
        ?>
        <? $the_query  = new WP_Query($args);?>
        <? if ( $the_query->have_posts() ) : ?>
					<? $count = $the_query ?>
          <? while ( $the_query->have_posts() ) { $the_query->the_post();  ?>
						<? $i++ ?>
				<div class="contain-slide" style="background-image:url(<? the_post_thumbnail_url('large') ?>)">
					<div class="contain-txt-slide">
						<div class="contain">
							<div class="contain-title">
								<a href="<? the_permalink() ?>"><h2><? the_title() ?></h2></a>
								<a href=""><? the_content( '', TRUE ); ?></a>
								<a href="<? the_permalink() ?>" class="learn">Lire la suite </a>
							</div>

							<p class="number-slide">0<?= $i ?></p>
						</div>
					</div>
				</div>
		<? }; ?>
	<? endif; ?>
	</div>
</section>
<? wp_reset_postdata() ?>
<section class="playlist">
	<div class="container">
		<div class="title-playlist">
			<h2>Playlist</h2>
			<hr/>
		</div>
	</div>
	<div class="container">
			<? $the_query  = new WP_Query( array('post_type'=> 'playlist','posts_per_page' => 4, 'orderby' => 'date', 'order' => 'desc') );?>
	    <? if ( $the_query->have_posts() ) : ?>
			<div class="contain-title">
				<p class="title-vert">PLAYLISTS</p>
				<hr/>
			</div>
			<div class="contain-playlist">
				<? while ( $the_query->have_posts() ) { $the_query->the_post();  ?>
					<a href="<? the_permalink() ?>" class="bloc bloc-playlist" style="background-image:url(<? the_post_thumbnail_url('large') ?>)">
						<div class="contain-info">
							<h3><? the_title() ?></h3>
							<div class="explain">
								<span class="time">Durée : <? the_field('temps') ?></span>
								<span class="artiste">Artiste :
									<?
									$posts = get_field('artiste');
							if( $posts ):
								foreach( $posts as $post): // variable must be called $post (IMPORTANT)
									setup_postdata($post); ?>
									<? the_title() ?>
								<?php endforeach;
							endif;
							?>
							</div>

						</div>
					</a>
				<? }; ?>
			</div>
			<? endif; ?>
			<? wp_reset_postdata();  ?>
	</div>
	<div class="container">
		<? $the_query  = new WP_Query( array('post_type'=> 'playlist','posts_per_page' => 4, 'orderby' => 'date', 'order' => 'desc') );?>
		<? if ( $the_query->have_posts() ) : ?>

				<div class="contain-title">

				</div>
				<div class="contain-titre">
				<? while ( $the_query->have_posts() ) { $the_query->the_post();  ?>
					<?
						$posts = get_field('titre');
						if( $posts ): ?>
						<div class="bloc bloc-playlist"><p class="nb-titre" style="color:#fff;"><?= count($posts) ?> Titres</p></div>

					<? endif; ?>
					<? } ?>
				</div>

		<? endif; ?>
	</div>
</section>
<? wp_reset_postdata();  ?>
<section class="titre-top">
	<div class="container">
		<div class="contain-title">
			<p class="title-vert">TOPS DE LA SEMAINE</p>
			<hr/>
		</div>
		<div class="titre-semaine">
		<?php
			$posts = get_field('titres_semaine');
			if($posts):
		?>
		<div class="contain-blocs">
			<? foreach( $posts as $post): ?>
				<?setup_postdata($post); ?>
					<div class="bloc bloc-son">
						<? the_field('titre') ?>
					</div>
			<? endforeach ?>
		</div>
		<? endif; ?>
		</div>
		<? wp_reset_postdata();  ?>
		<div class="titre-top">
			<div class="contain-title">
				<p class="title-vert">TOPS</p>
				<hr/>
			</div>
			<?php
				$posts = get_field('titres_top');
				if($posts):
			?>
			<div class="contain-blocs">
				<? foreach( $posts as $post): ?>
					<?setup_postdata($post); ?>
					<div class="bloc bloc-son">
						<? the_field('titre') ?>
					</div>
				<? endforeach ?>
			</div>
		<? endif; ?>
		</div>
	</div>
</section>
<section class="video">
	<div class="container">
		<div class="contain-title">
			<p class="title-vert">VIIDÉOS</p>
			<hr/>
		</div>
		<div class="contain-video">
			<div class="contain-info">
				<div class="contain-txt">
					<div class="contain-title">
						<h3>Vidéos</h3>
						<hr/>
					</div>
					<p>
						Découvrez de multiples vidéos de vos artistes préférés, regroupant clips,festivals, promotions...
					</p>
					<a href="<?php bloginfo('url'); ?>/videos/">Découvrez nos vidéos</a>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="artiste">
	<div class="container">
		<div class="contain-title">
			<p class="title-vert">ARTISTES</p>
			<hr/>
		</div>
		<?
        $args = array(
          'post_type'=> 'artiste',
          'posts_per_page' => 8,
        );
    ?>
		<? $the_query  = new WP_Query($args);?>
    <? if ( $the_query->have_posts() ) : ?>
			<div class="artistes">
      <? while ( $the_query->have_posts() ) { $the_query->the_post(); ?>
					<div href="<? the_permalink() ?>" class="bloc">
						<a href="<? the_permalink() ?>">
							<div class="contain-info">
								<div class="contain-img" style="background-image:url(<? the_post_thumbnail_url('large') ?>)">
								</div>
								<h3><? the_title() ?></h3>
								<p>Nombre de titres : <?  ?></p>
								<div class="social">
									<? if(get_field('facebook')): ?>
										<a href="<? the_field('facebook') ?>" target="_blank" class="fb">fb</a>
									<? endif; ?>
									<? if(get_field('spotify')): ?>
										<a href="<? the_field('spotify') ?>" target="_blank" class="spotify">Spotify</a>
									<? endif; ?>
									<? if(get_field('instagram')): ?>
										<a href="<? the_field('instagram') ?>" target="_blank" class="instagram">Instagram</a>
									<? endif; ?>
								</div>
							</div>
						</a>
					</div>
			<? } ?>
			</div>
		<? endif; ?>
	</div>
	<div class="container other">
		<a href="<?php bloginfo('url'); ?>/artistes/" class="other-artistes">Autres artistes</a>
	</div>
</section>
</div>
<div class="loader">
	<h1>THIS FAME</h1>
</div>
<? get_footer(); ?>
<script>

jQuery(window).load(function(){ jQuery(".loader").fadeOut("slow"); });
// Changing the defaults
window.sr = ScrollReveal({ reset: true });

// Customizing a reveal set
sr.reveal('.contain-playlist', { duration: 1000 });
sr.reveal('.contain-video', { duration: 1000 });
sr.reveal('.bloc-son', { duration: 1000 });
</script>
<script>
$(".slider").slick({
dots: true,
infinite: true,
speed: 1500,
fade: true,
cssEase: 'linear',
autoplay: true,
autoplaySpeed: 7000,
});

</script>
