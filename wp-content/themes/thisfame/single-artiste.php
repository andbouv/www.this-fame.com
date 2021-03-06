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
<section class="bio">
	<div class="container">
		<div class="contain-title">
			<p class="title-vert">PROFIL</p>
			<hr/>
		</div>
		<div class="bloc-left">
			<div class="img-artiste" style="background-image:url(<? the_post_thumbnail_url('large') ?>)">
			</div>
			<h3><? the_title() ?></h3>
			<div class="social">
				<? if(get_field('facebook')): ?>
					<a href="<? the_field('facebook') ?>" target="_blank" class="fb">fb</a>
				<? endif; ?>
				<? if(get_field('instagram')): ?>
					<a href="<? the_field('instagram') ?>" target="_blank" class="instagram">Instagram</a>
				<? endif; ?>
				<? if(get_field('spotify')): ?>
					<a href="<? the_field('spotify') ?>" target="_blank" class="spotify">Spotify</a>
				<? endif; ?>
				<? if(get_field('soundcloud')): ?>
					<a href="<? the_field('soundcloud') ?>" target="_blank" class="soundcloud">Soundcloud</a>
				<? endif; ?>
			</div>
			<div class="line">
				<? $Posts = $post->ID;?>
				<?
		      $args = array(
		        'post_type'		=> 'artiste',
		        'posts_per_page' => 1,
						'orderby' 				=> 'rand',
						'post__not_in' => array($Posts),
		      );
		    ?>
		    <? $the_query  = new WP_Query($args);?>
				<? $the_query  = new WP_Query($args);?>
				<? $i = 0 ?>
		    <? if ( $the_query->have_posts() ) : ?>
				  <? while ( $the_query->have_posts() ) { $the_query->the_post();  ?>
						<a href="<? the_permalink() ?>" class="prev"></a>
					<? } ?>
				<? endif ?>
				<? $Posts = $post->ID;?>
				<?
		      $args = array(
		        'post_type'		=> 'artiste',
		        'posts_per_page' => 1,
						'orderby' 				=> 'rand',
						'post__not_in' => array($Posts),
		      );
		    ?>
		    <? $the_query  = new WP_Query($args);?>
				<? $the_query  = new WP_Query($args);?>
				<? $i = 0 ?>
		    <? if ( $the_query->have_posts() ) : ?>
				  <? while ( $the_query->have_posts() ) { $the_query->the_post();  ?>
						<a href="<? the_permalink() ?>" class="next"></a>
					<? } ?>
				<? endif ?>
			</div>
		</div>
		<div class="biographie">

			<? wp_reset_postdata() ?>
			<div class="contain-txt">
				<? the_content() ?>
			</div>
		</div>
		<div class="titre">
			<?php
				$posts = get_field('titre');
				if($posts):
			?>
			<div class="contain">
				<div class="contain-title">
					<p class="title-vert">TITRES</p>
					<hr/>
				</div>
				<div class="contain-titre">
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
												<a href="<? the_field('lien_soundcloud') ?>" target="_blank" class="spotify">lien spotify</a>
											<? endif; ?>
											<?if(get_field('lien_youtube')):?>
												<a href="<? the_field('lien_youtube') ?>" target="_blank" class="youtube">lien youtube</a>
											<? endif; ?>
										</div>
									<? endif; ?>
								</div>
						<? endforeach ?>
				</div>
			</div>
			<? endif; ?>
			<? wp_reset_postdata() ?>
			<?php
				$posts = get_field('album');
				if($posts):
			?>
			<div class="contain">
				<div class="contain-title">
					<p class="title-vert">ALBUMS</p>
					<hr/>
				</div>
				<div class="contain-album">
						<? foreach( $posts as $post): ?>
							<?setup_postdata($post); ?>
								<div class="bloc" style="background-image:url(<? the_post_thumbnail_url() ?>)">
									<p><? the_title() ?></p>
								</div>
						<? endforeach ?>
				</div>
			</div>
			<? endif; ?>
			<? wp_reset_postdata() ?>
		</div>


		<?php
			$posts = get_field('videos');
			if($posts):
		?>
		<div class="videos">
			<div class="contain-title">
				<p class="title-vert">VIDÉOS</p>
				<hr/>
			</div>
			<div class="contain-video">
				<? $j == 0 ?>
				<? foreach( $posts as $post): ?>
					<?setup_postdata($post); ?>
					<? $j++ ?>
					<div class="video ci-<?= $j+1 ?>">
						<? the_field('video') ?>
						<div class="contain-txt active contain-<?= $j ?>">
							<p class=titre><? the_title() ?></p>
							<? the_excerpt() ?>
							<span class="open"></span>
						</div>
						<span class="play-video pv-<?= $j+1 ?>"></span>
						<span class="number-slide"><?= $j ?> sur <?= count( $posts ); ?></span>
						<script>
										$(document).ready(function() {
												$('.pv-<?= $j+1 ?>').on('click', function(ev) {
														$(".ci-<?= $j+1 ?> iframe")[0].src += "&autoplay=1";
														$('.pv-<?= $j+1 ?>').addClass("hide");
														$('.contain-<?= $j ?>').removeClass("active");
														$('.contain-<?= $j ?> span').addClass("active");
														ev.preventDefault();
												});

												$('.contain-<?= $j ?>').on('click', function(ev) {
													$('.contain-<?= $j ?>').toggleClass("active");
												});
												$('.contain-<?= $j ?> span').on('click', function(ev) {
													$('.contain-<?= $j ?> span').toggleClass("active");
												});
										});
						</script>
					</div>
				<? endforeach ?>
			</div>

		</div>
		<? endif; ?>
		<div class="container">
			<div class="other-artistes">
				<div class="contain-title">
					<p class="title-vert">AUTRES ARTISTES</p>
					<hr/>
				</div>
				<? $Posts =  get_the_ID()?>
				<?
					$args = array(
						'post_type'		=> 'artiste',
						'posts_per_page' => 4,
						'orderby' 				=> 'rand',
						'post__not_in' => array($Posts),
					);
				?>
				<? $the_query  = new WP_Query($args);?>
				<? $i = 0 ?>
				<? if ( $the_query->have_posts() ) : ?>
				<div class="contain-artistes">
					<? while ( $the_query->have_posts() ) { $the_query->the_post(); ?>
						<div class="bloc">
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
		</div>
	</div>
</section>
</div>
<? get_footer(); ?>
<script type="text/javascript">
window.sr = ScrollReveal({ reset: true });

// Customizing a reveal set
sr.reveal('.bloc', { duration: 3000 });

$('iframe').jSound({
	mini: true
});

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
