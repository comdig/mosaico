<?php
/**
* Template Name: Missões atuais
* Description: Modelo de página que exibe as missões que estão acontecendo nesse momento.
*/
get_header(); ?>

		<div id="container">
			<div id="conteudo">

				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'loop', 'atuais' ); ?>

				<?php endwhile; // end of the loop. ?>

			</div><!-- #conteudo -->
		</div><!-- #container -->

<?php get_footer(); ?>