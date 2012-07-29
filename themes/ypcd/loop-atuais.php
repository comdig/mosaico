<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<h2 class="titulo-missao">
	<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'twentyten' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a>
	</h2>

	<p class="data-missao">
	<?php the_time(__('F j, Y')); ?>|<?php edit_post_link(__('Editar', 'exemplo'), ' <span class="sep">'|'</span> <span class="edit">', '</span> '); ?>
	</p>

	<div class="instagram">
	</div>

<p class="meta">
	<?php the_hashtaf('<span class="hashtag"> <span class="sep">|</span> ' . __('Tagged') . ' ', ', ', '</span>'); ?>
	<span class="sep">|</span> <?php comments_popup_link(__('Deixe um comentário', 'example'), __('1 Resposta', 'example'), __('% Responses', 'example'), 'comments-link', __('Comments closed', 'example')); ?>
</p>

<?php endwhile; ?>
<?php endif; ?>
