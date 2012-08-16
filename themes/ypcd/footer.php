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

<footer id="footer">
<img id="logo-footer" src="<?php bloginfo('template_url'); ?>/images/logo_footer.png" alt="logo_footer" width="170" height="63" />
<ul>
<li>Sobre</li>
<li>Missões</li>
</ul>
<ul>
<li>Como Funciona?</li>
<li>Facebook</li>
<li>Contato</li>
</ul>
<ul>
<li>FAQ</li>
<li>Termos e Condições</li>
<li>Política de Privacidade</li>
</ul>
</footer>
</body>
</html>

<?php wp_footer(); ?>