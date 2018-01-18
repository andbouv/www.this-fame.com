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
	<section class="articles">
		<div class="container">

		<?
					if( have_posts() ){
				    $types = array('artiste', 'video', 'playlist');
				    foreach( $types as $type ){
				        echo 'your container opens here for ' . $type;
				        while( have_posts() ){
				            the_post();
				            if( $type == get_post_type() ){
				                get_template_part('content', $type);
				            }
				        }
				        rewind_posts();
				        echo 'your container closes here for ' . $type;
				    }
				}
		?>

		</div>
	</section>
</div>

<? get_footer(); ?>
