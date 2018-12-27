<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php wp_title( '|', true, 'right' ); ?></title>

    <link rel="stylesheet" type="text/css" href="<?php echo CSS_URL.'/bootstrap.min.css' ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo CSS_URL.'/fontawesome/css/all.css' ?>" />
   
    <?php wp_head(); ?>
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = 'https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v3.2&appId=1486679371476491&autoLogAppEvents=1';
    fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
</head>
<body>

<header id="top">
    <div class="container">
        <div class="row">

            <div class="logo logo-pc col-md-2 ">
                <a href="/"><img  src="<?php echo IMG_URL.'/logo.jpg' ?>" alt="this is logo of page !"></a>
            </div>
            <div class="logo logo-mobile ">
                <a href="/"><img  src="<?php echo IMG_URL.'/logo.jpg' ?>" alt="this is logo of page !"></a>
            </div>
            <div class="col-md-10 main-menu-pc">
                <?php wp_nav_menu( array(
                    'theme_location' => 'primary',  
                    'container' => 'nav', 
                    'container_class' => 'primary',  
                    'menu_class' =>'menu clearfix' 
                ) ) ?>
            </div>
            <div class="main-menu-mobile active-menu">
                <div class="icon">
                    <span class="submenu"></span>
                    <span class="submenu"></span>
                    <span class="submenu"></span>
                    <span class="submenu"></span>
                </div>
                <?php wp_nav_menu( array(
                    'theme_location' => 'primary',  
                    'container' => 'nav', 
                    'container_class' => 'primary',  
                    'menu_class' =>'menu clearfix' 
                ) ) ?>
            </div>
        </div>       
    </div>
</header>


