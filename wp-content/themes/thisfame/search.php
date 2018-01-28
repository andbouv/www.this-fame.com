<? get_header(); ?>
<div class="page">
	<section class="top-page" >
		<div class="contain-top">
			<div class="container">
				<h1>Votre recherche pour <?= get_post_type() ?></h1>
			</div>
		</div>
	</section>
	<section class="articles">
		<div class="container">

			<?php if(have_posts()) : ?>

    <?php
        $last_type = "";
        $typecount = 0;
        while ( have_posts() ) : the_post();
    ?>

        <?php
            if ($last_type != $post->post_type){
                $typecount = $typecount + 1;
                if ($typecount > 1){
                    echo '</div><!-- close type-container -->'; //close type container
                }

                // save the post type.
                $last_type = $post->post_type;

								//open type container
                switch ($post->post_type) {
                    case 'artiste':
										echo "<div class=\"artiste\">
											<div class=\"titres\">
												<div class=\"contain-title\">
													<p class=\"title-vert\">ARTISTES</p>
													<hr/>
												</div>
											</div><div class=\"contain-artistes\">";
                    break;

                    case 'titre':
                        echo "<div class=\"contain-title\">
													<p class=\"title-vert\">TITRES</p>
													<hr/>
												</div><div class=\"contain-song\"><h2>";

                    break;

                    case 'playlist':
										echo "</div><div class=\"container\">
											<div class=\"other-playlist\">
											<div class=\"contain-title\">
												<p class=\"title-vert\">AUTRES PLAYLIST</p>
												<hr/>
											</div>
											<div class=\"contain-playlist\">";
                    break;
                }
            }
        ?>

					<?php if('titre' == get_post_type()) : ?>

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

					<?php elseif('artiste' == get_post_type()) : ?>

						<a href="<? the_permalink() ?>" class="bloc">
							<div class="contain-info">
								<div class="contain-img" style="background-image:url(<? the_post_thumbnail_url('full') ?>)">
								</div>
								<span><? the_title() ?></span>
							</div>
						</a>

	        <?php elseif('playlist' == get_post_type()) : ?>

							<a href="<? the_permalink() ?>" class="bloc bloc-<?= $i ?>" style="background-image:url(<? the_post_thumbnail_url('large') ?>)">
								<div class="contain-info">
									<h3><? the_title() ?></h3>
									<div class="explain">

										<span class="time">Durée : <? the_field('temps') ?></span>
										<span class="artiste">Artiste :
											<?php
												$posts = get_field('artiste');
												if($posts):
											?>
										<? foreach( $posts as $post): ?>
											<?setup_postdata($post); ?>
											<? the_title() ?>,
										<? endforeach ?>
											 ...</span>
										<? endif; ?>
									</div>
								</div>
							</a>

        	<?php endif; ?>

    <?php endwhile; // endwhile have_posts ?>

<?php endif; // endif have_posts ?>

		</div>
	</section>
</div>
<script type="text/javascript">
$('iframe').jSound({
	mini: true
});

</script>
<? get_footer(); ?>
