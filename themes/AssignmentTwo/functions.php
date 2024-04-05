<?php
// Add heading and footer menu
function assignment_two_setup() {
  register_nav_menus( array(
    'header' => 'Header menu',
    'footer' => 'Footer menu'
  ) );
}
add_action( 'after_setup_theme', 'assignment_two_setup' );

add_theme_support( 'post-thumbnails' );

// set up the custom post type
function books_init(){
  $args = array(
    'label' => 'Books',
    'public' => true,
    'show_ui' => true,
    'capability_type' => 'post',
    'taxonomies'  => array( 'category'),
    'hierarchical' => 'false',
    'query_var' => true,
    'menu_icon' => 'dashicons-smiley',
    'supports' => array(
      'title',
      'editor',
      'excerpts',
      'comments',
      'thumbnail',
      'author',
      'post-formats',
      'page-attributes',
    )
  );
  register_post_type('books', $args);
}
add_action('init', 'books_init');
// create a shortcode to display books
function books_shortcode(){
  $query = new WP_Query(array('post_type' => 'books', 'post_per_page' => 8, 'order' => 'asc'));
  while ($query -> have_posts()) : $query-> the_post(); ?>
    <div class="col-sm-12 col-md-6 col-lg-4">
      <div class="image-container">
        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
      </div>
      <div class="books-content">
        <h4><?php the_title(); ?></h4>
        <?php the_excerpt(); ?>
        <p><a href="<?php the_permalink(); ?>">Learn More</a></p>
      </div>
    </div>
    <?php wp_reset_postdata(); ?>
  <?php
  endwhile;
  wp_reset_postdata();
}
// set the shortcode
add_shortcode('books', 'books_shortcode');

add_filter( 'excerpt_length', function($length) {
  return 25;
}, PHP_INT_MAX );
// set up the woomcommerce
function assignmenttwo_add_woocommerce_support() {
  add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'assignmenttwo_add_woocommerce_support' );
function enqueue_wc_cart_fragments() { wp_enqueue_script( 'wc-cart-fragments' ); }
add_action( 'wp_enqueue_scripts', 'enqueue_wc_cart_fragments' );