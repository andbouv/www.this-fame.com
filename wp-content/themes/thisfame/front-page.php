<? get_header(); ?>
<div class="page">
<section class="top-page">
	<h1>THIS FAME</h1>
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
				<div class="contain-slide" style="background-image:url(<? the_post_thumbnail_url('full') ?>)">
					<div class="contain-txt-slide">
						<div class="contain">
							<div class="contain-title">
								<a href="<? the_permalink() ?>"><h2><? the_title() ?></h2></a>
								<div class="line">
									<p class="time"><?= get_the_date('Y/m/d') ?></p>
									<? foreach((get_the_category()) as $category) {?>
									 <p class="category"> <?echo $category->cat_name . ' ';?> </p>
								 	<? } ?>
							 </div>
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
	<!--
	<div class="container">
		<div class="title-playlist">
			<h2>Playlist</h2>
			<hr/>
		</div>
	</div>
	-->
	<div class="container">

		<? $i = 0 ?>
			<? $the_query  = new WP_Query( array('post_type'=> 'playlist','posts_per_page' => 4, 'orderby' => 'date', 'order' => 'desc') );?>
	    <? if ( $the_query->have_posts() ) : ?>
			<div class="contain-title">
				<p class="title-vert">PLAYLISTS</p>
				<hr/>
			</div>
			<div class="contain-playlist">

				<? while ( $the_query->have_posts() ) { $the_query->the_post();  ?>
					<? $i++ ?>
					<a href="<? the_permalink() ?>" class="bloc bloc-playlist bloc-<?= $i ?>" style="background-image:url(<? the_post_thumbnail_url('large') ?>)">
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
					<? $posts = get_field('titre'); ?>
					<div class="bloc bloc-playlist "><p class="nb-titre" style="color:#fff;"><?= count($posts) ?> Titres</p></div>
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
						<?if(get_field('lien_soundcloud') || get_field('lien_spotify')):?>
							<div class="contain-link">
								<p>Retrouvez ce titre sur : </p>
								<?if(get_field('lien_soundcloud')):?>
									<a href="<? the_field('lien_soundcloud') ?>" target="_blank" class="soundcloud">lien soundcloud</a>
								<? endif; ?>
								<?if(get_field('lien_spotify')):?>
									<a href="<? the_field('lien_soundcloud') ?>" target="_blank" class="spotify">lien spotify</a>
								<? endif; ?>
							</div>
						<? endif; ?>
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
						<?if(get_field('lien_soundcloud') || get_field('lien_spotify')):?>
							<div class="contain-link">
								<p>Retrouvez ce titre sur : </p>
								<?if(get_field('lien_soundcloud')):?>
									<a href="<? the_field('lien_soundcloud') ?>" target="_blank" class="soundcloud">lien soundcloud</a>
								<? endif; ?>
								<?if(get_field('lien_spotify')):?>
									<a href="<? the_field('lien_soundcloud') ?>" target="_blank" class="spotify">lien spotify</a>
								<? endif; ?>
							</div>
						<? endif; ?>
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
	<!--
	<div class="container">
		<div class="title-artistes">
			<h2>ARTISTES</h2>
			<hr/>
		</div>
	</div>
-->
	<div class="container">
		<div class="contain-title">
			<p class="title-vert">ARTISTES</p>
			<hr/>
		</div>
		<?
        $args = array(
          'post_type'=> 'artiste',
          'posts_per_page' => 8,
					'orderby'  => 'rand'
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
								<?php
									$posts = get_field('titre');
									if($posts):
								?>
								<p>Nombre de titres : <?= count($posts) ?></p>
								<? endif; ?>
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
	<hr/>
</div>
<? get_footer(); ?>
<script type="text/javascript">
$('iframe').jSound({
	mini: true
});
</script>
<script>

jQuery(".loader").delay(10500).fadeToggle(600)
// Changing the defaults
window.sr = ScrollReveal({ reset: true });

// Customizing a reveal set
sr.reveal('.bloc-1', { duration: 1000 });
sr.reveal('.bloc-2', { duration: 2000 });
sr.reveal('.bloc-3', { duration: 3000 });
sr.reveal('.bloc-4', { duration: 4000 });
sr.reveal('.contain-video .contain-txt', { duration: 2000 });
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
