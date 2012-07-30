  <?php get_header( $name ); ?>

  <body>
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
              } else {
                var loader = setTimeout(loadImages(), 100);
              }
            }

          });
        </script>

        <div class="instagram"></div>
        <img class="mask" src="<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID)); ?>" alt="<?php the_title(); ?>" />
      <?php endwhile; endif; ?>
    <?php wp_reset_query(); ?>
  </body>
</html>