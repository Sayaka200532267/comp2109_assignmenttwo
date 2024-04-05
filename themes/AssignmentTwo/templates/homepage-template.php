<?php
/**
 * Template Name: Homepage
 * Template Post Type: page
 */
get_header();
?>
  <main>
<!-- create a hero image -->
      <div>
      <section class="masthead" style="background-image: url('<?php echo wp_kses_post(get_field('masthead_image')); ?>')">
        <h1><?php echo wp_kses_post(get_field('main_heading')); ?></h1> 
        <h2><?php echo wp_kses_post(get_field('sub_heading')); ?></h2>
      </div>
    </section>
    <h2 class="title"><?php echo wp_kses_post(get_field('row_one_and_two_title')); ?></h2>
    <div class="service">
<!-- create pics sections -->
    <section class="home-row-one row">

      <div class="col-sm-6 col-md-6 col-lg-6">
          <h4><?php echo wp_kses_post(get_field('row_one_text')); ?></h4>
          <img class="home-row" src="<?php echo wp_kses_post(get_field('row_one_image')); ?>" alt="<?php echo wp_kses_post(get_field('row_one_image_alt_text')); ?>">
      </div>
    </section>
    <section class="home-row-two row">
      <div class="col-sm-6 col-md-6 col-lg-6">
        <h4><?php echo wp_kses_post(get_field('row_two_text')); ?></h4>
        <img class="home-row" src="<?php echo wp_kses_post(get_field('row_two_image')); ?>" alt="<?php echo wp_kses_post(get_field('row_two_image_alt_text')); ?>">
      </div>
    </section>
    </div>

  </main>
<?php
get_footer();
