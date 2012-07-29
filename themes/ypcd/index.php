  <?php get_header( $name ); ?>

  <body>
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
          hash: 'youpix',
          clientId : '9ea65159a89141ceab09c004b157c5cd',
          show : 20,
          onComplete : function (photos, data) {
            insta_next_url = data.pagination.next_url, loadImages()
          }
        });

        function loop(){
          if (i == 10) {
            clearTimeout(loader);
          } else {
            var loader = setTimeout(loadImages(), 300);
          }
        }

      });
    </script>
    <div class="instagram"></div>    
  </body>
</html>