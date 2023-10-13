<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php echo $title; ?></title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta property="og:url" content="http://hwawonpark.com/">
    <meta property="og:type" content="website">
    <meta property="og:image" content="http://hwawonpark.com/common/img/ogp.png">
    <meta property="og:title" content="I Am Hwawon | Portfolio">
    <meta property="og:site_name" content="I Am Hwawon | Portfolio">
    <meta property="og:description" content="ポートフォリオです。">
    <link rel="shortcut icon" href="/common/img/favicon.ico">
    <link rel="apple-touch-icon" href="/common/img/apple-touch-icon.png">
    <link rel="icon" type="image/png" href="/common/img/android-chrome-192×192.png">
    <!-- css -->
    <link rel="stylesheet" href="/common/css/html-5-reset-stylesheet.css">
    <link rel="stylesheet" href="/common/css/common.css">
    <?php $url = $_SERVER[ "REQUEST_URI" ]; ?>
<?php if($url == "/" || $url == "/index.php" || $url == "/index.html") : ?>
    <link rel="stylesheet" href="/css/page.css">
<?php elseif(strpos($url, "contact") !== false) : ?>
    <link rel="stylesheet" href="/contact/css/page.css">
<?php elseif(strpos($url, "work") !== false) : ?>
    <link rel="stylesheet" href="/i_am_hwawon/css/page.css">
<?php else : ?>
    <link rel="stylesheet" href="<?php echo $url; ?>/css/page.css">
<?php endif; ?>
    <!-- script -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@500;700;800;900&family=Open+Sans:wght@500;600;700;800&family=Roboto:wght@500;700;900&display=swap" rel="stylesheet">
</head>