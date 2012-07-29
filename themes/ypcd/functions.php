<?php 

/* Funcionalidades do tema */

add_theme_support( 'post-thumbnails' );
add_theme_support( 'automatic-feed-links' );

/* Remove itens do painel de controle */

add_action( 'admin_menu', 'my_remove_menu_pages' );
function my_remove_menu_pages() {
  remove_menu_page('link-manager.php');
  remove_menu_page('upload.php');
  remove_menu_page('edit.php');
}

/* Cria taxonomias */

add_action( 'init', 'register_my_taxonomies', 0 );
function register_my_taxonomies() {
    
  /* Hashtag */

  register_taxonomy(
    'hashtag',
    array(''),
    array(
      'hierarchical' => true,
      'public' => true,
      'query_var' => true,
      'rewrite' => true,
      'labels' => array(
        'name' => __( 'Hashtags' ),
        'singular_name' => __( 'Hashtag' )
      ),
    )
  );

	/* Status */

  register_taxonomy(
    'status',
    array(''),
    array(
      'hierarchical' => true,
      'public' => true,
      'query_var' => true,
      'rewrite' => true,
      'labels' => array(
        'name' => __( 'Status' ),
        'singular_name' => __( 'Status' )
      ),
    )
  );

};

/* Cria tipos de publicação */

add_action( 'init', 'create_post_type' );
function create_post_type() {

  /* Missões */

  register_post_type( 'ypcd_missoes',
    array(
      'labels' => array(
        'name' => __( 'Miss&otilde;es' ),
        'singular_name' => __( 'Miss&atildeo' )
      ),
      'public' => true,
      'has_archive' => true,
      'rewrite' => array('slug' => 'missoes'),
      'supports' => array('title', 'editor', 'thumbnail', 'comments'),
      'menu_position' => 4,
      'taxonomies' => array('status', 'hashtag', 'mascara')
    )
  );

};

/* Cria colunas no painel de controle */

/* Missões */

function change_columns_missoes( $cols ) {
  $cols = array(
    'cb' => '<input type="checkbox" />',
    'title' => __( 'T&iacute;tulo', 'trans' ),
    'hashtag' => __( 'Hashtag', 'trans' ),
    'date' => __( 'Publica&ccedil;&atilde;o', 'trans' ),
    'author' => __( 'Autor', 'trans' )
  );
  return $cols;
}
add_filter( "manage_ypcd_missoes_posts_columns", "change_columns_missoes" );

/* Adicionar ícones para os tipos de publicação criados */

add_action( 'admin_head', 'ypcd_missoes_icons' );
function ypcd_missoes_icons() { ?>
  <style type="text/css" media="screen">
    #menu-posts-ypcd_missoes .wp-menu-image {
      background: url(<?php bloginfo('template_url') ?>/images/admin-missoes-icon.png) no-repeat 6px -18px !important;
    }
    #menu-posts-ypcd_missoes:hover .wp-menu-image, #menu-posts-ypcd_missoes.wp-has-current-submenu .wp-menu-image {
      background-position: 6px 6px !important;
    }
    #icon-edit.icon32-posts-ypcd_missoes {
      background: url(<?php bloginfo('template_url') ?>/images/admin-missoes-icon-32.png) 3px 0 no-repeat;
    }
  </style>
<?php }

?>