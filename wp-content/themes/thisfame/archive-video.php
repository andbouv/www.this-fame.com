<? get_header(); ?>
<div class="page">
	<section class="top-page" >
		<div class="contain-top">
			<div class="container">
				<h1>VIDÉOS</h1>
			</div>
		</div>
	</section>
	<section class="videos">
		<div class="container">
			<div class="contain-videos">
			<? $j == 0 ?>
			<? if (have_posts()) : while (have_posts()) : the_post(); ?>
			<? $j++ ?>
				<div href="<? the_permalink() ?>" class="bloc">
						<div class="contain-info">
							<div class="video ci-<?= $j+1 ?>">
								<? the_field('video') ?>
								<span class="play-video pv-<?= $j+1 ?>"></span>
								<h3><? the_title() ?></h3>
								<? ?>
								<? $date = get_the_date('Y-m-d') ?>
								<?php
								$birth = new DateTime($date);
								$today = new DateTime();
								$diff = $birth->diff($today);?>
								<p class="publication">Publié il y a <?= $diff->format('%d'); ?> jours</p>
								<?php get_template_part( 'html_includes/partials/social-share' ); ?>
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
						</div>
				</div>

			<? endwhile; endif; ?>

			</div>
			<?  wp_pagenavi(); ?>
		</div>
	</section>
</div>
<script>

// Changing the defaults
window.sr = ScrollReveal({ reset: true });

// Customizing a reveal set
sr.reveal('.bloc', { duration: 2000 });



$('.contain-artistes').infiniteScroll({
// options
path: '.wp-pagenavi .page',
append: '.bloc',
history: false,
hide:'.wp-pagenavi',
});




</script>
<? get_footer(); ?>
