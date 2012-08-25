  <?php get_header(); ?>
  			
    <?php query_posts(array('posts_per_page' => 1, 'post_type' => 'ypcd_missoes')); ?>
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
                mouseOver();
                $('.hide').fadeOut(1500);
              } else if (insta_next_url == undefined) {
                clearTimeout(loader);
                mouseOver();
                $('.hide').fadeOut(1500);
              } else {
                var loader = setTimeout(loadImages(), 100);
              }
            }

            var hash = '<?php global $post; $custom = get_post_custom($post->ID); $hashtag = $custom["hashtag"][0]; echo $hashtag; ?>';

            recentImages = function() {
              $.getJSON("https://api.instagram.com/v1/tags/"+ hash + "/media/recent?access_token=198463187.f59def8.88c55f5fc8b444478907f7c441d385e3&callback=?", 
                {},
                function (data) {
                  $.each(data.data, function(i, data) {
                    $('#recent-id p span').html(data.caption.from.full_name);
                    if (i == 0) return false;
                  });  
                }
              );
            };

            totalImages = function() {
              $.getJSON("https://api.instagram.com/v1/tags/"+ hash + "?access_token=198463187.f59def8.88c55f5fc8b444478907f7c441d385e3&callback=?", 
                {},
                function (data) {
                  $('#score p span').html(data.data.media_count);
                }
              );
            };

            loadMosaic = function(next_url, count) {
              var count = 0;

              $.getJSON(nexturl,
                {},
                function (data) {
                  $.each(data.data, function(i, data) {
                    $('.instagram').append(
                      '<div class="instagram-placeholder"><a href="'+ data.link +'" target="_blank"><img class="instagram-image" src="'+ data.images.thumbnail.url +'" /></a></div>'
                    );

                    if (i == 20) {
                      loadMosaic(pagination.next_url);
                      i = 0;
                    }
                  });

                  if (count != 3) {
                    count = count + 1;
                  } else {
                    return false;
                  }
                }
              );
            };

            //loadMosaic("https://api.instagram.com/v1/tags/"+ hash + "/media/recent?access_token=198463187.f59def8.88c55f5fc8b444478907f7c441d385e3&callback=?");
            recentImages();
            totalImages();

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
        
        <div id="recent-id"><p><span>Amelia Lily</span> ACABOU DE ENVIAR UMA IMAGEM</p></div>
        
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
        <div id="hash-2" class="boxes"><p>#<?php global $post; $custom = get_post_custom($post->ID); $hashtag = $custom["hashtag"][0]; echo $hashtag; ?></p></div>
        <div id="score" class="boxes"><p><span>(número)</span> FOTOS ENVIADAS</p></div>
        
        <div id="recent-imgs"><p>FOTOS RECENTES</p></div>
        <div class="instagram recent"></div>
        
      <?php endwhile; endif; ?>
    <?php wp_reset_query(); ?>
<?php get_footer(); ?>