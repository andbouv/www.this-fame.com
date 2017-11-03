<? get_header(); ?>
<div class="page">
<section class="top-page" style="background-image:url(<? the_post_thumbnail_url('full') ?>)">
	<div class="contain-top">
		<div class="container">
			<h1><? the_title() ?></h1>
		</div>
	</div>
</section>
<section class="article">
	<div class="container">
		<? the_content() ?>
		<? get_template_part("template/blocs"); ?>
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
