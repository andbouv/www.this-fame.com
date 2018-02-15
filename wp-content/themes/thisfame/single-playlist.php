<? get_header(); ?>
<?
	$jsps_networks = array( 'twitter', 'facebook' );
	$show_counters = 1;
	juiz_sps( $jsps_networks );
?>
<div class="page">
<span class="title"></span>
<section class="top-page" style="background-image:url(<? the_post_thumbnail_url('full') ?>)">
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
		<div class="contain-song">

			<?php
				$posts = get_field('titre');
				if($posts):
			?>
			<? endif; ?>
			<? foreach( $posts as $post): ?>
				<?setup_postdata($post); ?>
				<div class="bloc">
				<? the_field('titre') ?>
				<?if(get_field('lien_soundcloud') || get_field('lien_spotify') || get_field('lien_youtube')):?>
					<div class="contain-link">
						<p>Retrouvez ce titre sur : </p>
						<?if(get_field('lien_soundcloud')):?>
							<a href="<? the_field('lien_soundcloud') ?>" target="_blank" class="soundcloud">lien soundcloud</a>
						<? endif; ?>
						<?if(get_field('lien_spotify')):?>
							<a href="<? the_field('lien_spotify') ?>" target="_blank" class="spotify">lien spotify</a>
						<? endif; ?>
						<?if(get_field('lien_youtube')):?>
							<a href="<? the_field('lien_youtube') ?>" target="_blank" class="youtube">lien youtube</a>
						<? endif; ?>
					</div>
				<? endif; ?>
			</div>
			<? endforeach; ?>

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
			<? $Posts = $post->ID;?>
			<?
	      $args = array(
	        'post_type'		=> 'playlist',
	        'posts_per_page' => 4,
					'orderby' 				=> 'rand',
					'post__not_in' => array($Posts),
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
	<div class="container">
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
</div>
<? get_footer(); ?>

<script type="text/javascript">
$('iframe').jSound({
	mini: true
});

</script>
<script>
$(function(){
 var lastScroll = 0;
 $(window).scroll(function(event){
     var st = $(this).scrollTop();
     if (st > lastScroll){
       $(".show").removeClass("show", 500);
     }
     else {
       $(".juiz_sps_links").addClass("show", 500)
     }
     lastScroll = st;
   });
 });

window.sr = ScrollReveal({ reset: true });

// Customizing a reveal set
sr.reveal('.artiste .bloc', { duration: 1500 });
sr.reveal('.bloc-1', { duration: 1000 });
sr.reveal('.bloc-2', { duration: 2000 });
sr.reveal('.bloc-3', { duration: 3000 });
sr.reveal('.bloc-4', { duration: 4000 });
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
