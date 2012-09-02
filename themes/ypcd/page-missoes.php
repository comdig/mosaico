<?php
/**
* Template Name: Página de missões
* Description: Lista de todas as missões já executadas.
*/
get_header(); ?>

  <ul id="missions-list">
    
    <?php query_posts(array('post_type' => 'ypcd_missoes')); ?>
      <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		
        <a href="<?php the_permalink(); ?>">

          <li>
            
            <h2 id="post-<?php the_ID(); ?>">#<?php the_title(); ?></h2>

            <p><?php the_date(); ?></p>

            <span class="button">Ver mosaico</span>
          
          </li>
        
        </a>

      <?php endwhile; endif; ?>
    <?php wp_reset_query(); ?>

  </ul>

<?php get_footer(); ?>