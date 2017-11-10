<? get_header(); ?>
<div class="page">
	<section class="top-page" >
		<div class="contain-top">
			<div class="container">
				<? $title = single_term_title( "", false ); ?>
      	<h1><?= $title ?></h1>
			</div>
		</div>
	</section>
	<section class="articles">
		<div class="container">
			<? $terms = get_terms('category',array( 'parent' => 0,'hide_empty=1'));?>
      <div class="contain-filtre">
        <a href="<?php bloginfo('url'); ?>/articles/"><? _e('Tous les articles', $_GLOBAL['theme']) ?></a>
        <?
          foreach ($terms as $term) {
            $term_link = get_term_link( $term );
        ?>
          <a href="<?= $term_link ?>"<?if($title == $term->name):?>class="actif"<?endif?>><?= $term->name ?></a>
        <? } ?>
      </div>
			<div class="contain-articles">
			<? if (have_posts()) : while (have_posts()) : the_post(); ?>
				<div href="<? the_permalink() ?>" class="bloc">
					<a href="<? the_permalink() ?>">
						<div class="contain-info">
							<div class="contain-img" style="background-image:url(<? the_post_thumbnail_url('large') ?>)">
							</div>
							<h3><? the_title() ?></h3>
							<div class="line">
								<p class="time"><?= get_the_date('Y/m/d') ?></p>
								<? foreach((get_the_category()) as $category) {?>
								 <p class="category"> <?echo $category->cat_name . ' ';?> </p>
								<? } ?>
						 </div>
							<? the_excerpt() ?>

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
$('.contain-articles').masonry({
  // options
  itemSelector: '.bloc',
  gutter: 20
});
</script>
<? get_footer(); ?>
