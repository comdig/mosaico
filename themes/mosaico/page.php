<?php
/**
* Template Name: Página de conteúdo
* Description: Modelo de página para conteúdo fixo.
*/
get_header(); ?>

	<div id="inner-content">
		<?php if (have_posts()) : while (have_posts()) : the_post();?>
			<div class="post">
				<h2 id="post-<?php the_ID(); ?>"><?php the_title();?></h2>
				<div class="">
				<?php the_content(); ?>
				</div>
			</div>
		<?php endwhile; endif; ?>
		<?php edit_post_link('Editar', '<p>', '</p>'); ?>
	</div>

<?php get_footer(); ?>