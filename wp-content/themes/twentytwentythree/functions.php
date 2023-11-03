
<?php

/**
 * Enqueue scripts and styles.
 */
function univers_viager_scripts() {

	wp_enqueue_style( 'add_google_fonts', "https://fonts.googleapis.com/css2?family=Karla:wght@300;400;500;600;700;800&family=Lato:wght@300;400;700", false);

    wp_enqueue_style( 'swiper', get_template_directory_uri().'/assets/css/swiper-bundle.css', array());

    wp_enqueue_style( 'custom-css', get_template_directory_uri().'/assets/css/custom-css.css', array());

    wp_register_script('swiper', get_template_directory_uri().'/assets/js/swiper-bundle.min.js' , array('jquery'),'1.1', true);
    wp_enqueue_script('swiper');

    wp_register_script('custom-js', get_template_directory_uri().'/assets/js/custom-js.js' , array('jquery'),'1.1', true);
    wp_enqueue_script('custom-js');


}
add_action( 'wp_enqueue_scripts', 'univers_viager_scripts' );


// Image sizes
add_image_size( 'annonces-list', 300, 200, true );
add_image_size( 'avis-list', 50, 50, true );
add_image_size( 'actualite-main', 715, 420, true );
add_image_size( 'actualite-list', 440, 185, true );


add_filter('wpcf7_autop_or_not', '__return_false');

/**
 * Filter the except length to 20 words.
 *
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 */
function wpdocs_custom_excerpt_length( $length ) {
	return 38;
}
add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );

// CUSTOM POST TYPES
function uv_register_post_types() {

	// Annonces
	$labelsAnnonce = array(
        'name' => 'Annonces',
        'all_items' => 'Toutes les annonces', 
        'singular_name' => 'Annonce',
        'add_new_item' => 'Ajouter une annonce',
        'edit_item' => 'Modifier l\'annonce',
        'menu_name' => 'Annonces'
    );

	$argsAnnonce = array(
        'labels' => $labelsAnnonce,
        'public' => true,
        'show_in_rest' => true,
        'has_archive' => true,
        'supports' => array( 'title', 'editor','thumbnail' ),
        'menu_position' => 5, 
        'menu_icon' => 'dashicons-welcome-widgets-menus',
	);

	register_post_type( 'annonce', $argsAnnonce );

	// Avis client
	$labelsAvis = array(
        'name' => 'Avis clients',
        'all_items' => 'Tous les avis clients', 
        'singular_name' => 'Avis client',
        'add_new_item' => 'Ajouter un avis client',
        'edit_item' => 'Modifier l\'avis client',
        'menu_name' => 'Avis clients'
    );

	$argsAvis = array(
        'labels' => $labelsAvis,
        'public' => true,
        'show_in_rest' => true,
        'has_archive' => true,
        'supports' => array( 'title', 'editor','thumbnail' ),
        'menu_position' => 5, 
        'menu_icon' => 'dashicons-format-status',
	);

	register_post_type( 'avis', $argsAvis );
}
add_action( 'init', 'uv_register_post_types' );


// ACF BLOCKS
function register_acf_block_types() {

	// Bloc "Nos dernières annonces"
    acf_register_block_type( array(
        'name'              => 'annonces',
        'title'             => 'Dernières annonces',
        'description'       => "Présentation des dernières annonces viagers",
        'render_template'   => 'blocks/annonces.php',
        'category'          => 'formatting', 
        'icon'              => 'welcome-widgets-menus', 
        'keywords'          => array( 'annonces', 'acf' ),
    ) );

	// Bloc "Avis"
    acf_register_block_type( array(
        'name'              => 'avis',
        'title'             => 'Derniers avis',
        'description'       => "Présentation des derniers avis clients",
        'render_template'   => 'blocks/avis.php',
        'category'          => 'formatting', 
        'icon'              => 'format-status', 
        'keywords'          => array( 'avis', 'acf' ),
    ) );
	// Bloc Actualités
    acf_register_block_type( array(
        'name'              => 'actualites',
        'title'             => 'Dernières actualités',
        'description'       => "Présentation des dernières actualités",
        'render_template'   => 'blocks/actualites.php',
        'category'          => 'formatting', 
        'icon'              => 'admin-post', 
        'keywords'          => array( 'actualites', 'post', 'acf' ),
    ) );

}

add_action( 'acf/init', 'register_acf_block_types' );

/* AJAX */
function weichie_load_more() {
  $ajaxposts = new WP_Query([
    'post_type' => 'post',
    'posts_per_page' => 3,
    'orderby' => 'date',
    'order' => 'DESC',
    'paged' => $_POST['paged'],
  ]);

  $response = '';

  if($ajaxposts->have_posts()) {
    while($ajaxposts->have_posts()) : $ajaxposts->the_post();
        $response .= '<div class="actualites-block__element">';
        $response .= '<div class="actualites-block__element-image">';
        $categories = get_the_category();
        foreach( $categories as $category ) :
            $response .= '<div class="actualites-block__category '.  $category->slug . '">' .  $category->name .'</div>';
        endforeach;
        $response .= '<a href="'. get_the_permalink() .'">' . get_the_post_thumbnail($post->ID, 'actualite-list') .'</a>';
        $response .= '</div>';
        $response .= '<div class="actualites-block__element-text">';
        $response .= '<h3><a href="' . get_the_permalink() .'">'.get_the_title() .'</a></h3>';
        $response .= '<div class="date">' . get_the_date('d/m/Y') .'</div>';
        $response .= '</div></div>';
    endwhile;
  } else {
    $response = '';
  }

  echo $response;
  exit;
}
add_action('wp_ajax_weichie_load_more', 'weichie_load_more');
add_action('wp_ajax_nopriv_weichie_load_more', 'weichie_load_more');