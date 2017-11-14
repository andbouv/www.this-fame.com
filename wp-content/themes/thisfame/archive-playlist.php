<? get_header(); ?>
<div class="page">
	<section class="top-page" >
		<div class="contain-top">
			<div class="container">
				<h1>PLAYLISTS</h1>
			</div>
		</div>
	</section>

	<section class="playlists">
		<div class="container">
			<div class="contain-playlists">
			<? if (have_posts()) : while (have_posts()) : the_post(); ?>
			<a href="<? the_permalink() ?>" class="bloc" style="background-image:url(<? the_post_thumbnail_url('large') ?>)">
				<div class="contain-info">
					<h3><? the_title() ?></h3>
				</div>
			</a>
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
