<? if( have_rows('blocs') ): ?>
	<div class="blocs">
		<? while ( have_rows('blocs') ) : the_row(); ?>
			<? if( get_row_layout() == 'bloc_texte' ): ?>

				<section class="texte container">
					<? if(get_sub_field('titre')) : ?>
						<h2 class="title"><? the_sub_field('titre'); ?></h2>
					<? endif; ?>

					<? the_sub_field('texte'); ?>
				</section>

			<? elseif( get_row_layout() == 'bloc_2_textes' ): ?>

				<section class="texte container">
					<? if(get_sub_field('titre')) : ?>
						<h2 class="title"><? the_sub_field('titre'); ?></h2>
					<? endif; ?>

					<div class="blocs">
						<div class="bloc_2"><? the_sub_field('texte_1'); ?></div>
						<div class="bloc_2"><? the_sub_field('texte_2'); ?></div>
					</div>
				</section>

			<? elseif( get_row_layout() == 'bloc_3_textes' ): ?>

				<section class="texte container">
					<? if(get_sub_field('titre')) : ?>
						<h2 class="title"><? the_sub_field('titre'); ?></h2>
					<? endif; ?>

					<div class="blocs">
						<div class="bloc_3"><? the_sub_field('texte_1'); ?></div>
						<div class="bloc_3"><? the_sub_field('texte_2'); ?></div>
						<div class="bloc_3"><? the_sub_field('texte_3'); ?></div>
					</div>
				</section>

			<? elseif( get_row_layout() == 'bloc_4_textes' ): ?>

				<section class="texte container">
					<? if(get_sub_field('titre')) : ?>
						<h2 class="title"><? the_sub_field('titre'); ?></h2>
					<? endif; ?>

					<div class="blocs">
						<div class="bloc_4"><? the_sub_field('texte_1'); ?></div>
						<div class="bloc_4"><? the_sub_field('texte_2'); ?></div>
						<div class="bloc_4"><? the_sub_field('texte_3'); ?></div>
						<div class="bloc_4"><? the_sub_field('texte_4'); ?></div>
					</div>
				</section>

			<? elseif( get_row_layout() == 'bloc_image_texte' ): ?>

				<section class="image_texte container">
					<? $image = get_sub_field('image'); ?>
					<? if(!empty($image)): ?>
						<div class="layout-image" style="background-image: url('<?= $image['url']; ?>');"></div>
					<? endif; ?>

					<div class="layout">
						<div class="texte">
							<? if(get_sub_field('titre')) : ?>
								<h2 class="title"><? the_sub_field('titre'); ?></h2>
							<? endif; ?>
							<? the_sub_field('texte'); ?>
						</div>
					</div>
				</section>

			<? elseif( get_row_layout() == 'bloc_references' ): ?>
			<section class="references container">
				<div class="layout">
					<? the_sub_field('texte'); ?>
				</div>
			</section>

			<? elseif( get_row_layout() == 'bloc_texte_image' ): ?>

				<section class="texte_image container">
					<div class="layout">
						<div class="texte">
							<? if(get_sub_field('titre')) : ?>
								<h2 class="title"><? the_sub_field('titre'); ?></h2>
							<? endif; ?>
							<? the_sub_field('texte'); ?>
						</div>
					</div>

					<? $image = get_sub_field('image'); ?>
					<? if(!empty($image)): ?>
						<div class="layout-image" style="background-image: url('<?= $image['url']; ?>');"></div>
					<? endif; ?>
				</section>

			<? endif; ?>
		<? endwhile; ?>
	</div>
<? endif; ?>
