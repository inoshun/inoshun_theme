<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <?php if ( is_home() || is_category() ): ?>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/zoomslider.css">
    <?php endif; ?>
    <?php if ( is_single() ): ?>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/swiper.css">
    <?php endif; ?>
    <link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/images/favicon.png" type="image/png">
    <title><?php if ( is_home() || is_category() ) { bloginfo('name'); } ?> <?php if ( is_single() || is_page() ) { the_title_attribute(); } ?></title>
    <?php wp_head(); ?>
  </head>
  <body <?php body_class(); ?>>
    <header>
      <div class="container flex_box">
        <?php if ( is_home() ) { echo "<h1>"; } ?>
          <a class="logo_link" href="<?php echo home_url() ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="INONOMAD"></a>
        <?php if ( is_home() ) { echo "</h1>"; } ?>
        <button class="nav_btn">
          <span></span>
          <span></span>
          <span></span>
          <span></span>
        </button>
      </div>
      <div class="nav">
        <ul class="nav_lisks">
          <li>
            <a href="https://inoshunnomad.com/profile/"><img class="nav_icon" src="<?php echo get_template_directory_uri(); ?>/images/icon_profile.png">プロフィール<img class="arrow_right" src="<?php echo get_template_directory_uri(); ?>/images/arrow_right.png"></a>
            <hr>
          </li>
          <li>
            <a class="modal_btn" data-modal="cate_modal"><img class="nav_icon" src="<?php echo get_template_directory_uri(); ?>/images/icon_list.png">カテゴリー一覧<img class="arrow_right" src="<?php echo get_template_directory_uri(); ?>/images/arrow_right.png"></a>
            <hr>
          </li>
          <li>
            <a href="https://inoshunnomad.com/contact/"><img class="nav_icon" src="<?php echo get_template_directory_uri(); ?>/images/icon_contact.png">お問い合わせ<img class="arrow_right" src="<?php echo get_template_directory_uri(); ?>/images/arrow_right.png"></a>
            <hr>
          </li>
        </ul>
      </div>
    </header>
