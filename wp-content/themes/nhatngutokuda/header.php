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

            <div class="logo col-md-2">
                <a href="/"><img  src="<?php echo IMG_URL.'/logo.jpg' ?>" alt="this is logo of page !"></a>
            </div>

            <div class="col-md-10 static">
                <?php wp_nav_menu( array(
                    'theme_location' => 'primary',  
                    'container' => 'nav', 
                    'container_class' => 'primary',  
                    'menu_class' =>'menu clearfix' 
                ) ) ?>
                <!-- <nav class="primary">
                    <ul>
                        <li><a>Trang chủ</a></li>
                        <li >
                            <a>Giới thiệu</a>
                            <ul class="sub-menu">
                                <li><a>Liên hệ</a></li>
                            </ul>
                        </li>
                        <li ><a>Khóa học</a>
                            <ul class="sub-menu">
                                <li><a>Khóa học N3</a></li>
                                <li><a>Khóa học N4</a></li>
                                <li><a>Khóa học N5</a></li>
                                <li><a>Khóa học N2</a></li>
                            </ul>
                        </li>
                        <li ><a>Tiếng nhật online</a>
                            <ul class="sub-menu">
                                <li><a>Kiến thức tiếng nhật</a></li>
                                <li><a>Từ Vựng</a></li>
                            </ul>
                        </li>
                        <li ><a>Tài liệu</a>
                            <ul class="sub-menu">
                                <li><a>Giao tiếp</a></li>
                                <li><a>Kanji</a></li>
                            </ul>
                        </li>
                        <li><a>Du học nhật</a></li>
                        <li><a>Tin tức</a></li>
                    </ul>
                </nav> -->
            </div>
        </div>       
    </div>
</header>


