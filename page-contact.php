<?php get_header(); ?>

<main id="page_contact">
  <?php get_template_part('loading'); ?>
  <div class="back_screen"></div>
  <div id="cate_modal" class="modal_back cate_mdlbck">
    <div class="modal cate_mdl">
      <button class="modal_close"><img src="<?php echo get_template_directory_uri(); ?>/images/icon_close.png"></button>
      <div class="catelst_cont">
        <ul class="cate_lists">
          <?php wp_list_categories( 'title_li=' ); ?>
        </ul>
      </div>
    </div>
  </div>
  <section id="section_cont" class="section_cont">
    <div class="container flex_box">
      <div class="main_cont">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <h1><?php the_title(); ?></h1>
        <?php the_content(); ?>
        <?php
        endwhile;
        endif;
        ?>
      </div><!-- END main_cont -->
    </div>
  </section><!-- END section_cont -->
</main>

<?php get_footer(); ?>
