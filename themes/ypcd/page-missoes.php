<?php
/**
* Template Name: Página de missões
* Description: Lista de todas as missões já executada.
*/
get_header(); ?>

<div id="missions-list">
    <?php query_posts(array('post_type' => 'ypcd_missoes')); ?>
      <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	    <script type="text/javascript">
	      $(function(){
	
	        var insta_container = $(".instagram"), insta_next_url, i = 1;
	
	        function loadImages(){
	          insta_container.instagram({
	            next_url : insta_next_url,
	            show : 20,
	            onComplete : function(photos, data) {
	              insta_next_url = data.pagination.next_url, i++, loop()
	            }
	          })
	        };
	
	        insta_container.instagram({
	          hash: '<?php global $post; $custom = get_post_custom($post->ID); $hashtag = $custom["hashtag"][0]; echo $hashtag; ?>',
	          clientId : '9ea65159a89141ceab09c004b157c5cd',
	          show : 20,
	          onComplete : function (photos, data) {
	            insta_next_url = data.pagination.next_url, loadImages()
	          }
	        });
	
	        function loop(){
	          if (i == 15) {
	            clearTimeout(loader);
	            $('.hide').fadeOut(1500);
	          } else {
	            var loader = setTimeout(loadImages(), 100);
	          }
	        }
	
	      });
	    </script>
	    
        <div class="mosaic">
          <div class="hide">
            <p>Calma aí, o seu mosaico está sendo carregado.</p>
          </div>
					<div class="post">
						<h2 id="post-<?php the_ID(); ?>">#<?php the_title();?></h2>
					</div>
          <div class="instagram"></div>
          <img class="mask" src="<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID)); ?>" alt="<?php the_title(); ?>" />
        </div>
      <?php endwhile; endif; ?>
    <?php wp_reset_query(); ?>
<?php get_footer(); ?>