<? get_header(); ?>
<div class="page">
	<section class="top-page" >
		<div class="contain-top">
			<div class="container">
				<h1>ARTISTES</h1>
			</div>
		</div>
	</section>
	<section class="artistes">
		<div class="container">
			<div class="contain-artistes">
			<? if (have_posts()) : while (have_posts()) : the_post(); ?>
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
sr.reveal('.bloc a', { duration: 1000 });



$('.contain-artistes').infiniteScroll({
// options
path: '.wp-pagenavi .page',
append: '.bloc',
history: false,
hide:'.wp-pagenavi',
});




</script>
<? get_footer(); ?>
