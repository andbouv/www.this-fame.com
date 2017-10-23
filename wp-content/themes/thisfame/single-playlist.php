<? get_header(); ?>
<div class="page">
<section class="top-page" style="background-image:url(<? the_post_thumbnail_url('large') ?>)">
	<div class="contain-top">
		<div class="container">
			<h1><? the_title() ?></h1>
		</div>
	</div>
</section>
<section class="playlist">
	<div class="container">
		<div class="contain-title">
			<p class="title-vert">TITRES</p>
			<hr/>
		</div>
		<? wp_reset_postdata() ?>
		<div class="artiste">
			<div class="titres">
				<div class="contain-title">
					<p class="title-vert">ARTISTES</p>
					<hr/>
				</div>
			</div>
			<?php
				$posts = get_field('artiste');
				if($posts):
			?>
				<div class="contain-artistes">
					<div class="title">
						<h2>Artistes</h2>
						<hr/>
					</div>
					<? foreach( $posts as $post): ?>
						<?setup_postdata($post); ?>
							<a href="<? the_permalink() ?>" class="bloc">
								<div class="contain-info">
									<div class="contain-img" style="background-image:url(<? the_post_thumbnail_url('full') ?>)">
									</div>
									<span><? the_title() ?></span>
								</div>
							</a>
					<? endforeach ?>
				</div>
			<? endif; ?>
		</div>
	</div>
	<div class="container">
		<div class="other-playlist">
			<div class="contain-title">
				<p class="title-vert">AUTRES PLAYLIST</p>
				<hr/>
			</div>
			<?
	      $args = array(
	        'post_type'		=> 'playlist',
	        'posts_per_page' => 4,
					'orderby' 				=> 'rand',
	      );
	    ?>
	    <? $the_query  = new WP_Query($args);?>
			<? $i = 0 ?>
	    <? if ( $the_query->have_posts() ) : ?>
			<div class="contain-playlist">
	      <? while ( $the_query->have_posts() ) { $the_query->the_post();  ?>
					<? $i++ ?>
					<a href="<? the_permalink() ?>" class="bloc bloc-<?= $i ?>" style="background-image:url(<? the_post_thumbnail_url('large') ?>)">
						<div class="contain-info">
							<h3><? the_title() ?></h3>
							<div class="explain">

								<span class="time">Durée : <? the_field('temps') ?></span>
								<span class="artiste">Artiste :
									<?php
										$posts = get_field('artiste');
										if($posts):
									?>
								<? foreach( $posts as $post): ?>
									<?setup_postdata($post); ?>
									<? the_title() ?>,
								<? endforeach ?>
									 ...</span>
								<? endif; ?>
							</div>
						</div>
					</a>
				<? }; ?>
			</div>
			<? endif; ?>
		</div>
	</div>
</section>
</div>
<? get_footer(); ?>
<script>
// Changing the defaults
window.sr = ScrollReveal({ reset: true });

// Customizing a reveal set
sr.reveal('.bloc-1', { duration: 1000 });
sr.reveal('.bloc-2', { duration: 2000 });
sr.reveal('.bloc-3', { duration: 3000 });
sr.reveal('.bloc-4', { duration: 4000 });
sr.reveal('.contain-artistes .bloc .contain-info', { duration: 1500 });
sr.reveal('.contain-video', { duration: 2000 });
</script>
<script>
$(".contain-video").slick({
dots: false,
infinite: true,
speed: 1500,
fade: true,
cssEase: 'linear',
autoplay: false,
});

jQuery('#overlay').click(function(){
      jQuery(this).hide();
      jQuery('#youtube_id').get(0).playVideo();

});
</script>
