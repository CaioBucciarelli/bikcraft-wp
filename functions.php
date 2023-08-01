<?php 

function get_field($key, $page_id = 0) {
  $id = $page_id !== 0 ? $page_id : get_the_ID();
  return get_post_meta($id, $key, true);
}

function the_field($key, $page_id = 0) {
  echo get_field($key, $page_id);
}

// Todos os Tipos (Página, Produto) SEO
add_action('cmb2_admin_init', 'cmb2_fields_seo');
function cmb2_fields_seo() {
  $cmb = new_cmb2_box([
    'id' => 'seo_box',
    'title' => 'SEO',
    'object_types' => ['page', 'produtos'],
  ]);

  $cmb->add_field([
    'name' => 'Título SEO',
    'id' => 'title_seo',
    'type' => 'text',
  ]);

  $cmb->add_field([
    'name' => 'Descrição SEO',
    'id' => 'description_seo',
    'type' => 'textarea_small',
  ]);

}

// Páginas Internas (sobre, produtos, portfolio e contato)
add_action('cmb2_admin_init', 'cmb2_fields_interno');
function cmb2_fields_interno() {
  $cmb = new_cmb2_box([
    'id' => 'interno_box',
    'title' => 'Interno',
    'object_types' => ['page'],
    'show_on' => [
      'key' => 'page-template',
      'value' => ['page-sobre.php', 'page-produtos.php', 'page-portfolio.php', 'page-contato.php'],
    ],
  ]);

  $cmb->add_field([
    'name' => 'Subtitulo',
    'id' => 'subtitulo',
    'type' => 'text',
  ]);

  $cmb->add_field([
    'name' => 'Background Interno',
    'description' => 'Aqui você colocar a imagem que vai de background atrás do título.',
    'id' => 'background_interno',
    'type' => 'file',
    'options' => [
      'url' => false,
    ],
  ]);
}

// Página Home
add_action('cmb2_admin_init', 'cmb2_fields_home');
function cmb2_fields_home() {
  $cmb = new_cmb2_box([
    'id' => 'home_box',
    'title' => 'Home',
    'object_types' => ['page'],
    'show_on' => [
      'key' => 'page-template',
      'value' => 'page-home.php',
    ],
  ]);

  $cmb->add_field([
    'name' => 'Título Introdução',
    'id' => 'titulo_introducao',
    'type' => 'text',
  ]);

  $cmb->add_field([
    'name' => 'Quote Introdução',
    'id' => 'quote_introducao',
    'type' => 'text',
  ]);

  $cmb->add_field([
    'name' => 'Citação Introdução',
    'id' => 'citacao_introducao',
    'type' => 'text',
  ]);
  
  $cmb->add_field([
    'name' => 'Background Home',
    'description' => 'Aqui você colocar a imagem que vai de background atrás do título.',
    'id' => 'background_home',
    'type' => 'file',
    'options' => [
      'url' => false,
    ],
  ]);

  $cmb->add_field([
    'name' => 'Chamada Produtos',
    'description' => 'Essa é a chamada para a página Produtos, que fica em cima do botão Produtos. (Ela não vai aparecer na página Produtos e sim em outras páginas como a home)',
    'id' => 'chamada_produtos',
    'type' => 'text',
  ]);


}

// Página Sobre
add_action('cmb2_admin_init', 'cmb2_fields_sobre');
function cmb2_fields_sobre() { 
  $cmb = new_cmb2_box([
    'id' => 'sobre_box',
    'title' => 'Sobre',
    'object_types' => ['page'],
    'show_on' => [
      'key' => 'page-template',
      'value' => 'page-sobre.php',
    ],
  ]);

  $cmb->add_field([
    'name' => 'Texto História, Missão e Visão',
    'id' => 'missao',
    'type' => 'textarea',
  ]);

  $cmb->add_field([
    'name' => 'Lista Valores',
    'description' => 'Coloque aqui os valores da empresa.',
    'id' => 'valores',
    'type' => 'wysiwyg',
  ]);

  $cmb->add_field([
    'name' => 'Imagem Equipe',
    'description' => 'Coloque aqui uma foto da equipe Bikcraft. O ideal é uma imagem de 940px por 320px.',
    'id' => 'imagem_equipe',
    'type' => 'file',
    'options' => [
      'url' => false,
    ],
  ]);

  $cmb->add_field([
    'name' => 'Título Qualidade',
    'id' => 'titulo_qualidade',
    'type' => 'text',
  ]);

  $cmb->add_field([
    'name' => 'Logo Bikcraft',
    'id' => 'logo_bikcraft',
    'type' => 'file',
    'options' => [
      'url' => false,
    ],
  ]);

  $itens_qualidade = $cmb->add_field([
    'name' => 'Itens Qualidade',
    'id' => 'itens_qualidade',
    'type' => 'group',
    'repeatable' => true,
    'options' => [
      'group_title' => 'Item {#}',
      'add_button' => 'Adicionar Item',
      'sortable' => true,
    ]
  ]);

  $cmb->add_group_field($itens_qualidade, [
    'name' => 'Título Item Qualidade',
    'id' => 'titulo_item_qualidade',
    'type' => 'text',
  ]);

  $cmb->add_group_field($itens_qualidade, [
    'name' => 'Descrição Item Qualidade',
    'id' => 'descricao_item_qualidade',
    'type' => 'text',
  ]);

  $cmb->add_field([
    'name' => 'Chamada Sobre',
    'description' => 'Essa é a chamada para a página sobre, que fica em cima do botão Sobre. (Ela não vai aparecer na página sobre e sim em outras páginas como a home)',
    'id' => 'chamada_sobre',
    'type' => 'text',
  ]);

}

// Página Portfolio
add_action('cmb2_admin_init', 'cmb2_fields_portfolio');
function cmb2_fields_portfolio() {

  $cmb = new_cmb2_box([
    'id' => 'portfolio_box',
    'title' => 'Portfolio',
    'object_types' => ['page'],
    'show_on' => [
      'key' => 'page-template',
      'value' => 'page-portfolio.php',
    ],
  ]);

  $quotes_portfolio = $cmb->add_field([
    'name' => 'Quotes Portfolio',
    'id' => 'quotes_portfolio',
    'type' => 'group',
    'repeatable' => true,
    'options' => [
      'group_title' => 'Quote {#}',
      'add_button' => 'Adicionar Quote',
      'sortable' => true,
    ]
  ]);

  $cmb->add_group_field($quotes_portfolio, [
    'name' => 'Quote',
    'description' => 'Adicione a frase do cliente aqui.',
    'id' => 'quote',
    'type' => 'textarea_small',
  ]);

  $cmb->add_group_field($quotes_portfolio, [
    'name' => 'Nome do Cliente',
    'description' => 'Digite aqui o nome do cliente que citou a frase.',
    'id' => 'nome_quote',
    'type' => 'text',
  ]);

  $itens_portfolio = $cmb->add_field([
    'name' => 'Itens Portfolio',
    'id' => 'itens_portfolio',
    'type' => 'group',
    'repeatable' => true,
    'options' => [
      'group_title' => 'Item {#}',
      'add_button' => 'Adicionar Item',
      'sortable' => true,
    ]
  ]);

  $cmb->add_group_field($itens_portfolio, [
    'name' => 'Portfolio Imagem 1',
    'id' => 'portfolio_imagem1',
    'type' => 'file',
    'options' => [
      'url' => false,
    ],
  ]);

  $cmb->add_group_field($itens_portfolio, [
    'name' => 'Portfolio Imagem Descrição 1',
    'desc' => 'Essa é a descrição da imagem caso ela não carregue. (Não deixar este campo vazio)',
    'default' => 'Imagem 1',
    'id' => 'portfolio_imagem_descricao1',
    'type' => 'text',
  ]);

  $cmb->add_group_field($itens_portfolio, [
    'name' => 'Portfolio Imagem 2',
    'id' => 'portfolio_imagem2',
    'type' => 'file',
    'options' => [
      'url' => false,
    ],
  ]);

  $cmb->add_group_field($itens_portfolio, [
    'name' => 'Portfolio Imagem Descrição 2',
    'desc' => 'Essa é a descrição da imagem caso ela não carregue. (Não deixar este campo vazio)',
    'default' => 'Imagem 2',
    'id' => 'portfolio_imagem_descricao2',
    'type' => 'text',
  ]);

  $cmb->add_group_field($itens_portfolio, [
    'name' => 'Portfolio Imagem 3',
    'id' => 'portfolio_imagem3',
    'type' => 'file',
    'options' => [
      'url' => false,
    ],
  ]);

  $cmb->add_group_field($itens_portfolio, [
    'name' => 'Portfolio Imagem Descrição 3',
    'desc' => 'Essa é a descrição da imagem caso ela não carregue. (Não deixar este campo vazio)',
    'default' => 'Imagem 3',
    'id' => 'portfolio_imagem_descricao3',
    'type' => 'text',
  ]);

  $cmb->add_field([
    'name' => 'Chamada Portfolio',
    'description' => 'Essa é a chamada para a página Portfolio, que fica em cima do botão Portfolio. (Ela não vai aparecer na página Portfolio e sim em outras páginas como a home)',
    'id' => 'chamada_portfolio',
    'type' => 'text',
  ]);

}

// Página Contato
add_action('cmb2_admin_init', 'cmb2_fields_contato');
function cmb2_fields_contato() {
  $cmb = new_cmb2_box([
    'id' => 'contato_box',
    'title' => 'Contato',
    'object_types' => ['page'],
    'show_on' => [
      'key' => 'page-template',
      'value' => 'page-contato.php',
    ],
  ]);

  $cmb->add_field([
    'name' => 'Telefone',
    'id' => 'telefone',
    'type' => 'text',
  ]);

  $cmb->add_field([
    'name' => 'Email',
    'id' => 'email',
    'type' => 'text',
  ]);

  $cmb->add_field([
    'name' => 'Endereço 1',
    'id' => 'endereco1',
    'type' => 'text',
  ]);

  $cmb->add_field([
    'name' => 'Endereço 2',
    'id' => 'endereco2',
    'type' => 'text',
  ]);

  $redes_sociais = $cmb->add_field([
    'name' => 'Redes Sociais',
    'id' => 'redes_sociais',
    'type' => 'group',
    'repeatable' => true,
    'options' => [
      'group_title' => 'Item {#}',
      'add_button' => 'Adicionar Item',
      'sortable' => true,
    ]
  ]);

  $cmb->add_group_field($redes_sociais, [
    'name' => 'Link Rede Social',
    'id' => 'link_social',
    'type' => 'text_url',
  ]);

  $cmb->add_group_field($redes_sociais, [
    'name' => 'Imagem Rede Social',
    'id' => 'imagem_social',
    'type' => 'file',
    'options' => [
      'url' => false,
    ],
  ]);

  $cmb->add_group_field($redes_sociais, [
    'name' => 'Nome Rede Social',
    'id' => 'nome_social',
    'type' => 'text',
  ]);

  $cmb->add_field([
    'name' => 'Link do Mapa',
    'id' => 'link_mapa',
    'type' => 'text_url',
  ]);

  $cmb->add_field([
    'name' => 'Imagem do Mapa',
    'description' => 'Imagem do mapa do local da empresa.',
    'id' => 'imagem_mapa',
    'type' => 'file',
    'options' => [
      'url' => false,
    ],
  ]);

  $cmb->add_field([
    'name' => 'Texto Alternativo Mapa',
    'description' => 'Adicione aqui o endereço que está marcado na imagem.',
    'id' => 'texto_mapa',
    'type' => 'text',
  ]);

  $cmb->add_field([
    'name' => 'Frase Footer',
    'id' => 'frase_footer',
    'type' => 'textarea_small',
  ]);

  $cmb->add_field([
    'name' => 'Autor Footer',
    'id' => 'autor_footer',
    'type' => 'text',
  ]);

  $cmb->add_field([
    'name' => 'Background Footer',
    'id' => 'background_footer',
    'type' => 'file',
    'options' => [
      'url' => false,
    ],
  ]);

  $cmb->add_field([
    'name' => 'Resumo História',
    'id' => 'resumo_historia',
    'type' => 'textarea_small',
  ]);


}

// Página Produtos
add_action('cmb2_admin_init', 'cmb2_fields_produtos');
function cmb2_fields_produtos() {
  $cmb = new_cmb2_box([
    'id' => 'produtos_box',
    'title' => 'Produtos',
    'object_types' => ['page'],
    'show_on' => [
      'key' => 'page-template',
      'value' => 'page-produtos.php',
    ],
  ]);

  $cmb->add_field([
    'name' => 'Itens Orçamento',
    'description' => 'Adicione aqui itens do orçamento.',
    'id' => 'itens_orcamento',
    'type' => 'wysiwyg',
  ]);



}

// Página Single Produtos
add_action('cmb2_admin_init', 'cmb2_fields_singleProdutos');
function cmb2_fields_singleProdutos() {
  $cmb = new_cmb2_box([
    'id' => 'singleProdutos_box',
    'title' => 'Sigle Produtos',
    'object_types' => ['produtos'],
  ]);

  $cmb->add_field([
    'name' => 'Foto Produto 1',
    'id' => 'foto_produto1',
    'type' => 'file',
    'options' => [
      'url' => false,
    ],
  ]);

  $cmb->add_field([
    'name' => 'Ícone Produto',
    'id' => 'icone_produto',
    'type' => 'file',
    'options' => [
      'url' => false,
    ],
  ]);

  $cmb->add_field([
    'name' => 'Foto Produto 2',
    'id' => 'foto_produto2',
    'type' => 'file',
    'options' => [
      'url' => false,
    ],
  ]);

  $cmb->add_field([
    'name' => 'Resumo Produto',
    'id' => 'resumo_produto',
    'type' => 'text',
  ]);

}

?>

<?php

// Função para registrar os Scripts e o CSS

function bikcraft_scripts() {
	// Desregistra o jQuery do Wordpress
	wp_deregister_script('jquery');

	// Registra o jQuery Novo
	wp_register_script( 'jquery', get_template_directory_uri() . '/js/libs/jquery-1.11.2.min.js', array(), "1.11.2", true );

	// Registra o Script de Plugins, com dependência do jquery, sem especificar versão e no footer do site
	wp_register_script( 'plugins-script', get_template_directory_uri() . '/js/plugins.js', array( 'jquery' ), false, true );

	// Registra o Script Principal, com dependência do jquery e plugins, sem especificar versão e no footer do site
	wp_register_script( 'main-script', get_template_directory_uri() . '/js/main.js', array( 'jquery', 'plugins-script' ), false, true );

  //Registrar Modernizr
  wp_register_script( 'modernizr', get_template_directory_uri() . '/js/libs/modernizr.custom.45655.js', array(), "45655", false );

	// Coloca script no site
	wp_enqueue_script( 'modernizr' );
	wp_enqueue_script( 'main-script' );
}
add_action( 'wp_enqueue_scripts', 'bikcraft_scripts' );

function bikcraft_css() {
  wp_register_style( 'bikcraft-style', get_template_directory_uri() . '/style.css', array(), false, false );
  wp_enqueue_style( 'bikcraft-style' );
}
add_action( 'wp_enqueue_scripts', 'bikcraft_css' );

// Funções para Limpar o Header
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'start_post_rel_link', 10, 0 );
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('admin_print_scripts', 'print_emoji_detection_script');
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('admin_print_styles', 'print_emoji_styles');

//Habilitar Menus
add_theme_support('menus');

// Custom Images Sizes
function my_custom_sizes() {
  add_image_size('large', 1400, 380, true);
  add_image_size('medium', 768, 380, true);
}
add_action('after_setup_theme', 'my_custom_sizes');

//Custom Post Type
function custom_post_type_produtos() {
	register_post_type('produtos', array(
		'label' => 'Produtos',
		'description' => 'Produtos',
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'capability_type' => 'post',
		'map_meta_cap' => true,
		'hierarchical' => false,
		'rewrite' => array('slug' => 'produtos', 'with_front' => true),
		'query_var' => true,
		'supports' => array('title', 'editor', 'page-attributes','post-formats'),

		'labels' => array (
			'name' => 'Produtos',
			'singular_name' => 'Produto',
			'menu_name' => 'Produtos',
			'add_new' => 'Adicionar Novo',
			'add_new_item' => 'Adicionar Novo Produto',
			'edit' => 'Editar',
			'edit_item' => 'Editar Produto',
			'new_item' => 'Novo Produto',
			'view' => 'Ver Produto',
			'view_item' => 'Ver Produto',
			'search_items' => 'Procurar Produtos',
			'not_found' => 'Nenhum Produto Encontrado',
			'not_found_in_trash' => 'Nenhum Produto Encontrado no Lixo',
		)
	));
}
add_action('init', 'custom_post_type_produtos');

// Habilitar Menus
add_theme_support('menus');

// Registrar o Menu
function register_my_menu() {
  register_nav_menu('menu-principal',__( 'Menu Principal' ));
}
add_action( 'init', 'register_my_menu' );

?>