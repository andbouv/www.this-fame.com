<? get_header(); ?>
<?
	$jsps_networks = array( 'twitter', 'facebook' );
	$show_counters = 1;
	juiz_sps( $jsps_networks );
?>
<div class="page">
<section class="top-page" style="background-image:url(<? the_post_thumbnail_url('full') ?>)">
	<div class="contain-top">
		<div class="container">
			<div class="contain-title">
				<h1><? the_title() ?></h1>
				<div class="line">
					<p class="time"><?= get_the_date('Y/m/d') ?></p>
					<? foreach((get_the_category()) as $category) {?>
					 <p class="category"> <?echo $category->cat_name . ' ';?> </p>
				 	<? } ?>
			 </div>
			</div>
		</div>
	</div>
</section>
<section class="article">
	<div class="container">
		<? the_content() ?>
		<? get_template_part("template/blocs"); ?>
	</div>
	<div class="container">
		<div class="other-actualites">
			<div class="contain-title">
				<p class="title-vert">AUTRES ACTUALITÉS</p>
				<hr/>
			</div>
			<?= $Posts =  get_the_ID()?>
			<?
				$args = array(
					'post_type'		=> 'post',
					'posts_per_page' => 4,
					'orderby' 				=> 'rand',
					'post__not_in' => array($Posts),
				);
			?>
			<? $the_query  = new WP_Query($args);?>
			<? $i = 0 ?>
			<? if ( $the_query->have_posts() ) : ?>
			<div class="contain-actualites">
				<? while ( $the_query->have_posts() ) { $the_query->the_post();  ?>
					<? $i++ ?>
					<a href="<? the_permalink() ?>" class="bloc bloc-<?= $i ?>" style="background-image:url(<? the_post_thumbnail_url('large') ?>)">
						<div class="contain-info">
							<h3><? the_title() ?></h3>
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
<script type="text/javascript">
$('iframe').jSound({
	mini: true
});

window.sr = ScrollReveal({ reset: true });

// Customizing a reveal set
sr.reveal('.layout-image', { duration: 2000 });


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
