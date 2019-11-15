<?php get_header(); ?>

<main id="page_single">
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
          <div class="flex_box article_cates">
            <div class="category">
              <?php the_category(); ?>
            </div>
            <p class="date"><?php the_time('Y.m.j') ?></p>
          </div>
          <div class="thumbnail">
            <?php if(has_post_thumbnail()): ?><?php the_post_thumbnail(); ?><?php else: ?><img class="cover_img" src="<?php echo get_template_directory_uri(); ?>/images/thumbnail_sample.jpg"><?php endif; ?>
          </div>
          <div class="article_detail">
            <?php the_content(); ?>
          </div>
        </div><!-- END article -->

        <div class="related">
          <!-- Swiper -->
          <div class="swiper-container related_slide">
            <div class="swiper-wrapper">
              <?php
              // 複数カテゴリーを持つ場合ランダムで取得
              $categories = wp_get_post_categories($post->ID, array('orderby'=>'rand'));
              if ($categories) {
                $args = array(
                  'category__in' => array($categories[0]), // カテゴリーのIDで記事を取得
                  'post__not_in' => array($post->ID), // 表示している記事を除く
                  'showposts'=>6, // 取得記事数
                  'caller_get_posts'=>1, // 取得した記事の何番目から表示するか
                  'orderby'=> 'rand' // 記事をランダムで取得
                );
                $my_query = new WP_Query($args);
                $related_number = $my_query->found_posts;
                if( $my_query->have_posts() ) {
              ?>
              <?php while ($my_query->have_posts()) : $my_query->the_post(); ?>
              <div class="swiper-slide">
                <a href="<?php the_permalink(); ?>">
                  <div class="thumbnail">
                    <?php if(has_post_thumbnail()): ?><?php the_post_thumbnail(); ?><?php else: ?><img class="cover_img" src="<?php echo get_template_directory_uri(); ?>/images/thumbnail_sample.jpg"><?php endif; ?>
                  </div>
                  <p><?php the_title(); ?></p>
                </a>
              </div>
              <?php endwhile; wp_reset_query(); ?>
              <?php if($related_number == 2) { ?>
                <div class="swiper-slide">
                  <div class="thumbnail coming_soon">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/coming_soon.png">
                  </div>
                </div>
              <?php }  ?>
              <?php if($related_number == 1) { ?>
                <div class="swiper-slide">
                  <div class="thumbnail coming_soon">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/coming_soon.png">
                  </div>
                </div>
                <div class="swiper-slide">
                  <div class="thumbnail coming_soon">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/coming_soon.png">
                  </div>
                </div>
              <?php }  ?>
              <?php } else { ?>
              <div class="swiper-slide">
                <div class="thumbnail coming_soon">
                  <img src="<?php echo get_template_directory_uri(); ?>/images/coming_soon.png">
                </div>
              </div>
              <div class="swiper-slide">
                <div class="thumbnail coming_soon">
                  <img src="<?php echo get_template_directory_uri(); ?>/images/coming_soon.png">
                </div>
              </div>
              <div class="swiper-slide">
                <div class="thumbnail coming_soon">
                  <img src="<?php echo get_template_directory_uri(); ?>/images/coming_soon.png">
                </div>
              </div>
              <?php } } ?>
            </div>
          </div>
          <!-- Add Arrows -->
          <div class="swiper-button-next"></div>
          <div class="swiper-button-prev"></div>
        </div>
        <?php
        endwhile;
        endif;
        ?>
        <div class="article_bttm flex_box">
          <?php
          $prev_poxt = get_previous_post();
          if (!empty( $prev_poxt  )):
            echo '<a class="prev" href="',get_permalink( $prev_poxt->ID ),'"><img src="'.get_template_directory_uri().'/images/arrow_prev_on.png"></a>';
          else :
            echo '<p class="prev"><img src="'.get_template_directory_uri().'/images/arrow_prev_off.png"></p>';
          endif;
          ?>
          <?php
          $directory_uri = get_template_directory_uri();
          echo '<a data-uri="'.$directory_uri.'" class="list_btn" href="'.home_url().'"><img src="'.$directory_uri.'/images/list_btn.png"></a>';
          ?>
          <?php
          $next_poxt = get_next_post();
          if (!empty( $next_poxt  )):
            echo '<a class="next" href="',get_permalink( $next_poxt->ID ),'"><img src="'.get_template_directory_uri().'/images/arrow_next_on.png"></a>';
          else :
            echo '<p class="next"><img src="'.get_template_directory_uri().'/images/arrow_next_off.png"></p>';
          endif;
          ?>
        </div>
      </div><!-- END main_cont -->
    </div>
  </section><!-- END section_cont -->
</main>

<?php get_footer(); ?>
