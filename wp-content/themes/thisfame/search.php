<? get_header(); ?>
<div class="page">
	<section class="top-page" >
		<div class="contain-top">
			<div class="container">
				<h1>Votre recherche</h1>
				<p>Retrouvez toutes nos actualités du monde électro. <br/>En essayant de vous tenir au courant sur les news du moment.</p>
			</div>
		</div>
	</section>
	<section class="artciles">
		<div class="container">
			<?php if ( have_posts() ) { ?>

					 <ul>

					 <?php while ( have_posts() ) { the_post(); ?>

							<li>
								<h3><a href="<?php echo get_permalink(); ?>">
									<?php the_title();  ?>
								</a></h3>
								<?php  the_post_thumbnail('medium') ?>
								<?php echo substr(get_the_excerpt(), 0,200); ?>
								<div class="h-readmore"> <a href="<?php the_permalink(); ?>">Read More</a></div>
							</li>

					 <?php } ?>

					 </ul>

					<?php echo paginate_links(); ?>

			 <?php } ?>
		</div>
	</section>
</div>

<? get_footer(); ?>
