<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo('charset'); ?>" />

    <title>Instant Mosaico <?php wp_title(); ?></title>

    <meta property="og:image" content="http://mosaico.comdig.info/wp-content/themes/ypcd/images/instant-mosaico-fb.png"/>
    <meta property="og:title" content="Instant Mosaico"/>
    <meta property="og:description" content="O Instant Mosaico é a união da paixão pela fotografia e a tecnologia. O resultado é um site que junta as imagens publicadas via Instagram utilizando uma # em um divertido mosaico de memórias."

    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>" type="text/css" media="screen" />
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

    <?php if (is_singular() && get_option('thread_comments')) wp_enqueue_script('comment-reply'); ?>
    <?php wp_head(); ?>
    
    <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/javascripts/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/javascripts/jquery.instagram.js"></script>
    <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/javascripts/application.js"></script>
  </head>
  
	<div id="header">
		<?php wp_nav_menu(array('principal')); ?>		
		<a href="<?php bloginfo('url'); ?>"><div id="logo"></div></a>
	</div>
	<body>