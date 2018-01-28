<? get_header(); ?>
<div class="page">
	<span class="title"></span>
	<section class="top-page" >
		<div class="contain-top">
			<div class="container">
				<h1>VIDÉOS</h1>
			</div>
		</div>
	</section>

	<section class="videos">
		<div class="container">
			<? $terms = get_terms('category-videos',array( 'parent' => 0,'hide_empty=1'));?>
			<div class="contain-filtre">
				<a href="<?php bloginfo('url'); ?>/videos/"><? _e('Toutes les vidéos', $_GLOBAL['theme']) ?></a>
				<?
					foreach ($terms as $term) {
						$term_link = get_term_link( $term );
				?>
					<a href="<?= $term_link ?>"><?= $term->name ?></a>
				<? } ?>
			</div>
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
$('.contain-videos').masonry({
  // options
  itemSelector: '.bloc',
  gutter: 30
});

var fixmeTop = $('.contain-filtre').offset().top;       // get initial position of the element

$(window).scroll(function() {                  // assign scroll event listener

    var currentScroll = $(window).scrollTop(); // get current position

    if (currentScroll >= fixmeTop) {           // apply position: fixed if you
        $('.contain-filtre').addClass('fixe');
    } else {                                   // apply position: static
      	$('.contain-filtre').removeClass('fixe');
    }

});
</script>
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
