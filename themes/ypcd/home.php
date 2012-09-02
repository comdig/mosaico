  <?php get_header(); ?>
  			
    <?php query_posts(array('posts_per_page' => 1, 'post_type' => 'ypcd_missoes')); ?>
      <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <script type="text/javascript">
          $(function(){
            var hash = '<?php global $post; $custom = get_post_custom($post->ID); $hashtag = $custom["hashtag"][0]; echo $hashtag; ?>';
            var access_token = '198463187.f59def8.88c55f5fc8b444478907f7c441d385e3';

            loadMosaic("https://api.instagram.com/v1/tags/"+ hash + "/media/recent?access_token="+ access_token, hash, access_token);
            recentImages(hash, access_token);
            totalImages(hash, access_token);
          });
        </script>
        
        <p id="hash">#<?php global $post; $custom = get_post_custom($post->ID); $hashtag = $custom["hashtag"][0]; echo $hashtag; ?></p>
    		<div id="menu-social">
    			<a href="http://twitter.com/comdig" target="_blank" title="Twitter da ComDig" class="twitter"></a>
    			<a href="http://facebook.com/comdig" target="_blank" title="Facebook da ComDig" class="facebook"></a>
    			<a href="http://instagram.com/" target="_blank" title="Instagram da ComDig" class="instagram-icon"></a>
    			<a href="http://www.youtube.com/user/comunicacaodigital" target="_blank" title="Youtube da ComDig" class="youtube"></a>
    		</div>

        <div class="mosaic">
          <div class="hide">
            <p>Calma aí, o seu mosaico está sendo carregado...</p>
          </div>
          <div class="instagram"></div>
          <?php if(has_post_thumbnail()) { ?>
            <img class="mask" src="<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID)); ?>" />
          <?php } ?>
        </div>
        
        <div id="recent-id"><p><span></span> ACABOU DE ENVIAR UMA IMAGEM</p></div>
        
        <div id="how-to">
          <div class="column">
            <i id="icon-check"></i>
            <p>Confira a missão</p>
          </div>

          <div class="division"></div>

          <div class="column">
            <i id="icon-shot"></i>
            <p>Fotografe via Instagram</p>
          </div>

          <div class="division"></div>

          <div class="column">
            <i id="icon-share"></i>
            <p>Compartilhe com a #</p>
          </div>
        </div>
        
        <a href="#"><div id="download" class="boxes"><p>BAIXAR MOSAICOS (EM BREVE)</p></div></a>
        <div id="recent-imgs" class="boxes"><p>FOTOS RECENTES</p></div>
        <div id="hash-2" class="boxes"><p>#<?php global $post; $custom = get_post_custom($post->ID); $hashtag = $custom["hashtag"][0]; echo $hashtag; ?></p></div>
        <div id="score" class="boxes"><p><span></span> FOTOS ENVIADAS</p></div>
        
        <div class="instagram recent"></div>
        
      <?php endwhile; endif; ?>
    <?php wp_reset_query(); ?>
<?php get_footer(); ?>