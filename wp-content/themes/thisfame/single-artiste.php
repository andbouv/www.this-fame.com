<? get_header(); ?>
<div class="page">
<section class="top-page" style="background-image:url(<? the_post_thumbnail_url('large') ?>)">
	<div class="contain-top">
		<div class="container">
			<h1><? the_title() ?></h1>
		</div>
	</div>
</section>
<section class="bio">
	<div class="container">
		<div class="contain-title">
			<p class="title-vert">CONCERTS</p>
			<hr/>
		</div>
		<div class="bloc-left">
			<div class="contain-title">
				<h2>Concerts</h2>
				<hr/>
			</div>
			<? if( have_rows('concerts') ): ?>
			<table>
				<? while ( have_rows('concerts') ) : the_row(); ?>
					<tr><td><? the_sub_fields('date') ?></td><td><? the_sub_fields('heure') ?></td><td><? the_sub_fields('lieu') ?></td></tr>
				<? endwhile ?>
			</table>
			<?endif;?>
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
				<div class="contain-titre">
					<? foreach( $posts as $post): ?>
						<?setup_postdata($post); ?>
							<div class="bloc">
								<? the_field('titre') ?>
							</div>
					<? endforeach ?>
				</div>
			<? endif; ?>
		</div>
		<? wp_reset_postdata() ?>
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
						<div class="contain-txt show contain-<?= $j ?>">
							<p class=titre><? the_title() ?></p>
							<span class="open"></span>
						</div>
						<span class="play-video pv-<?= $j+1 ?>"></span>
						<span class="number-slide"><?= $j ?> sur <?= count( $posts ); ?></span>

						<script>
										$(document).ready(function() {
												$('.pv-<?= $j+1 ?>').on('click', function(ev) {
														$(".ci-<?= $j+1 ?> iframe")[0].src += "&autoplay=1";
														$('.pv-<?= $j+1 ?>').addClass("hide");
														$('.contain-<?= $j ?>').removeClass("show");
														ev.preventDefault();
												});

												$('.contain-<?= $j ?>').on('click', function(ev) {
													$('.contain-<?= $j ?>').toggleClass("show");
												});
												$('.contain-<?= $j ?> span').on('click', function(ev) {
													$('.contain-<?= $j ?> span').toggleClass("show");
												});
										});
						</script>
					</div>
				<? endforeach ?>
			</div>

		</div>
		<? endif; ?>
	</div>
</section>
</div>
<? get_footer(); ?>
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
