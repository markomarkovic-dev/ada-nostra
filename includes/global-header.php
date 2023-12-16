<?php 
    include('./config.php'); 
    $checkMetaImg = "$siteUrl/assets/images/cvu-metaimg.png";
    $pageTitle = $lang[$pagename]['title'];
    $pageDescription = $lang[$pagename]['description'];
    $contentLang = $language === 'en' ? "English" : "Serbian";
?>
<!DOCTYPE html>
<html lang="<?php echo $language;?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $pageTitle . " | " . $siteName?></title>
    <meta name="title" content="<?= $pageTitle ?> | <?= $siteName ?>">
    <meta name="description" content="<?= $pageDescription ?>">
    <meta name="keywords" content="">
    <meta name="robots" content="index, follow">
    <meta name="language" content="<?= $contentLang ?>">
    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?= $visitor_link?>">
    <meta property="og:title" content="<?= $pageTitle ?> | <?= $siteName ?>">
    <meta property="og:description" content="<?= $pageDescription ?> ">
    <meta property="og:image" content="<?= $checkMetaImg?>">
    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="<?= $visitor_link?>">
    <meta property="twitter:title" content="<?= $pageTitle ?> | <?= $siteName ?>">
    <meta property="twitter:description" content="<?= $pageDescription?>">
    <meta property="twitter:image" content="<?= $checkMetaImg?>">    
    <link rel="apple-touch-icon" sizes="180x180" href="assets/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/favicon/favicon-16x16.png">
    <link rel="manifest" href="assets/favicon/site.webmanifest">
    <meta name="apple-mobile-web-app-title" content="<?= $siteName?>">
    <meta name="application-name" content="<?= $siteName?>">
    <meta name="msapplication-TileColor" content="#ed1c24">
    <meta name="theme-color" content="#ffffff">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Chivo:ital,wght@0,300;0,400;0,600;1,400&display=swap" rel="stylesheet">
    <link href="assets/fonts/stylesheet.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/0d4485daf8.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="assets/css/daterangepicker.css">
    <link rel="stylesheet" href="assets/scss/main.css">

	<?php 
		//generisanje alternate linkova za multijezicke sajtove
		foreach ($langlinks as $link) {
			$langurl = str_replace($language, $link, $url);
			echo '<link rel="alternate" hreflang="'.$link.'" href="'.$langurl.'" />';
		}
	?>

	<script src="assets/js/jquery-3.7.1.min.js"></script>
	
</head>
<body class="<?= $pagename;?>-page">
<?php 
    require 'templates/header.php';
?>