<?php get_header(); ?>

<main id="page_top">
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
  <section class="section_mv">
    <div class="container calc_height_o">
      <div class="mv_box calc_height_i">
        <div class="top_zoomslide" data-zs-src='["<?php echo get_template_directory_uri(); ?>/images/slide_1.jpg", "<?php echo get_template_directory_uri(); ?>/images/slide_2.jpg", "<?php echo get_template_directory_uri(); ?>/images/slide_3.jpg"]' data-zs-speed="15000" data-zs-switchSpeed="2000" data-zs-interval="6000" data-zs-overlay="false" data-zs-bullets="false"></div>
      </div>
      <div class="mv_text flex_box">
        <p>
          <?php echo topCopy(); ?>
        </p>
      </div>
      <button class="scroll">
        <span></span>
      </button>
    </div>
  </section><!-- END section_mv -->
  <section id="section_cont" class="section_cont">
    <div class="container flex_box">
      <div class="main_cont">
        <div class="main_btns flex_box">
          <a class="btn_profile" href="https://inoshunnomad.com/profile/">プロフィール</a>
          <a class="btn_category modal_btn" data-modal="cate_modal">カテゴリー一覧</a>
          <a class="btn_contact" href="https://inoshunnomad.com/contact/">お問い合わせ</a>
        </div>
        <ul class="article_lists">
          <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
          <li>
            <a href="<?php the_permalink(); ?>">
              <div class="thumbnail">
                <p class="category">
                  <?php
                  $category = get_the_category();
                  echo $category[0]->cat_name;
                  ?>
                </p>
                <?php if(has_post_thumbnail()): ?><?php the_post_thumbnail(); ?><?php else: ?><img class="cover_img" src="<?php echo get_template_directory_uri(); ?>/images/thumbnail_sample.jpg"><?php endif; ?>
              </div>
              <div class="article_info">
                <h2><?php the_title(); ?></h2>
                <p class="date"><?php the_time('Y.m.j') ?></p>
                <?php the_excerpt(); ?>
              </div>
            </a>
          </li>
          <?php
          endwhile;
          endif;
          ?>
        </ul>
        <?php if( function_exists("the_pagination") ) the_pagination(); ?>
      </div><!-- END main_cont -->
    </div>
  </section><!-- END section_cont -->
</main>

<?php get_footer(); ?>
