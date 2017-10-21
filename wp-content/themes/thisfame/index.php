<? get_header(); ?>

	<? if (have_posts()): while (have_posts()) : the_post(); ?>

			<h1><? the_title(); ?></h1>
			<? the_content(); ?>

	<? endwhile; else: ?>
			<h1>Désolé, aucun contenu disponible.</h1>
	<? endif; ?>

<? get_footer(); ?>
