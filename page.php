<?php get_header(); ?>

<main id="page_page">
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
        <div class="main_btns flex_box">
          <a class="btn_profile" href="https://inoshunnomad.com/profile/">プロフィール</a>
          <a class="btn_category modal_btn" data-modal="cate_modal">カテゴリー一覧</a>
          <a class="btn_contact" href="https://inoshunnomad.com/contact/">お問い合わせ</a>
        </div>
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <div class="article">
          <h1><?php the_title(); ?></h1>
          <div class="thumbnail">
            <?php if(has_post_thumbnail()): ?><?php the_post_thumbnail(); ?><?php else: ?><img class="cover_img" src="<?php echo get_template_directory_uri(); ?>/images/thumbnail_sample.jpg"><?php endif; ?>
          </div>
          <div class="article_detail">
            <?php the_content(); ?>
          </div>
        </div><!-- END article -->
        <?php
        endwhile;
        endif;
        ?>
      </div><!-- END main_cont -->
    </div>
  </section><!-- END section_cont -->
</main>

<?php get_footer(); ?>
