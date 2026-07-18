<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>I Am Hwawon | ポートフォリオ</title> 
  <meta property="og:url" content="<?php echo home_url(); ?>">
  <meta property="og:type" content="website">
  <meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/img/ogp.png">
  <meta property="og:title" content="I Am Hwawon | ポートフォリオ">
  <meta property="og:site_name" content="I Am Hwawon | ポートフォリオ">
  <meta property="og:description" content="ポートフォリオです。">
  <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/img/favicon.ico">
  <link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/img/apple-touch-icon.png">
  <link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/img/android-chrome-192×192.png">
  <?php wp_head(); ?>
</head>

<body>
  <header>
    <div class="container flex">
        <a href="<?php echo home_url(); ?>" class="logo"><span>park</span></a>

        <div class="menu_list">
          <div class="hamburger">
            <span></span>
            <span></span>
            <span></span>
          </div>

        <nav class="nav_menu">
          <div class="nav_content">
            <div class="flex">
                <ul class="nav_list">
                  <li><a href="<?php echo home_url(); ?>">top</a></li>
                  <li><a href="#work">work</a></li>
                  <li><a href="#skill">skill</a></li>
                  <li><a href="#about">about</a></li>
                </ul>
            </div>
          </div>
        </nav>
      </div>
    </div>
  </header>