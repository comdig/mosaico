<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?>

  <div id="footer">
    <img id="logo-footer" src="<?php bloginfo('template_url'); ?>/images/logo_footer.png" alt="Instant Mosaico" width="170" height="63" />
    
    <ul>
      <li><a href="http://mosaico.comdig.info/?page_id=21">Sobre</a></li>
      <li><a href="http://mosaico.comdig.info/?page_id=19">Missões</a></li>
      <li><a href="http://mosaico.comdig.info/?page_id=23">Como Funciona?</a></li>
    </ul>
    
    <ul>
      <li><a href="http://twitter.com/comdig" target="_blank">Twitter</a></li>
      <li><a href="http://facebook.com/comdig" target="_blank">Facebook</a></li>
      <li><a href="http://youtube.com/user/comunicacaodigital" target="_blank">Youtube</a></li>
    </ul>

    <div class="copyright">
      <a href="http://comdig.info" target="_blank"><img id="logo-comdig" src="<?php bloginfo('template_url'); ?>/images/logo-comdig.png" alt="Curso de Comunicação Digital" /></a>
      <a href="http://unisinos.br" target="_blank"><img id="logo-unisinos" src="<?php bloginfo('template_url'); ?>/images/logo-unisinos.png" alt="Unisinos" /></a>
    </div>
  </div>
</body>
</html>

<?php wp_footer(); ?>