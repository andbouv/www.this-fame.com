		<div class="player" id="player" data-turbolinks-permanent style="display:none;background-color:red;height:40px;width:100%;">
		</div>
		<footer>
			<div class="container">
				<div class="line">
					<a href="<?php bloginfo('url'); ?>/artistes/">Artistes</a>
					<a href="<?php bloginfo('url'); ?>/playlists/">Playlists</a>
					<a href="<?php bloginfo('url'); ?>/" class="home"></a>
					<a href="<?php bloginfo('url'); ?>/videos/">Vidéos</a>
					<a href="<?php bloginfo('url'); ?>/actualites/">Actualités</a>
				</div>
				<div class="line-social">
					<a href="https://soundcloud.com/this-fame" class="soundcloud">soundcloud</a>
					<a href="https://www.instagram.com/this.fame/?hl=fr" class="instagram">instagram</a>
					<a href="" class="spotify">spotify</a>
				</div>
			</div>
		</footer>
		<script>
			$( ".bloc-son" ).click(function() {
				$( ".player" ).show();
			});
		</script>
	<? wp_footer(); ?>

	</body>
</html>
