<?php
    if(isset($_GET['ref_id']) AND $_GET['ref_id'] != ''){
        $refEmail = intval($_GET['ref_id']);                
        //Set Cookies
        setcookie("refEmail", $refEmail, strtotime('+30 days'));
    }    
?>


<!DOCTYPE HTML>
<html>
<head>
<title><?php echo $pageTitle; ?></title>
<link rel="canonical" href="https://www.cash360.com/"/>
<meta name="description"  content="<?php echo $pageDesc; ?>"/>
<meta name="keywords" content="<?php echo $pageKeywords; ?>"/>
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Favicon
============================================ -->
<?php if(file_exists(ROOT_PATH.str_replace('../', '', $siteInfo['favicon_url'])) AND $siteInfo['favicon_url'] != ''){?>
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo BASE_URL.str_replace('../', '', $siteInfo['favicon_url']);?>">
<?php }else{?>
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo BASE_URL;?>images/favi.png">
<?php }?>
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<link href='//fonts.googleapis.com/css?family=Abril+Fatface' rel='stylesheet' type='text/css'>
<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,600,600i,700,700i,800" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900" rel="stylesheet">
<!--Custom-Theme-files-->
<link href="css/font-awesome.css" rel="stylesheet"> 
<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" property="" /><!--Blog slider-->
<link rel="stylesheet" href="css/slider.css">
<link href="css/style.css" rel='stylesheet' type='text/css' />  
</head>
    <body>
    <div class="top_banner">
        <!-- SVG Arrows -->
        <div class="svg-wrap">
            <svg width="64" height="64" viewBox="0 0 64 64">
                <path id="arrow-left" d="M46.077 55.738c0.858 0.867 0.858 2.266 0 3.133s-2.243 0.867-3.101 0l-25.056-25.302c-0.858-0.867-0.858-2.269 0-3.133l25.056-25.306c0.858-0.867 2.243-0.867 3.101 0s0.858 2.266 0 3.133l-22.848 23.738 22.848 23.738z" />
            </svg>
            <svg width="64" height="64" viewBox="0 0 64 64">
                <path id="arrow-right" d="M17.919 55.738c-0.858 0.867-0.858 2.266 0 3.133s2.243 0.867 3.101 0l25.056-25.302c0.858-0.867 0.858-2.269 0-3.133l-25.056-25.306c-0.858-0.867-2.243-0.867-3.101 0s-0.858 2.266 0 3.133l22.848 23.738-22.848 23.738z" />
            </svg>
        </div>
        <div class="top_header_agile_info_w3ls">
          <nav class="navbar navbar-default">
                <div class="navbar-header navbar-left">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <h1><div class="logo">
    <?php if(file_exists(ROOT_PATH.str_replace('../', '', $siteInfo['logo_url'])) AND $siteInfo['logo_url'] != ''){?>
            <a href="<?php echo BASE_URL;?>">            
            <img src="<?php echo BASE_URL.str_replace('../', '', $siteInfo['logo_url']);?>" alt="<?php echo $siteInfo['site_name'];?> logo"></a>

        <?php }else{?>
            <a href="<?php echo BASE_URL;?>">
            <img src="<?php echo BASE_URL;?>images\logo.png" alt="<?php echo $siteInfo['site_name'];?> logo"></a>
        <?php }?>        
    </div>
        </h1>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">

                    <div id="m_nav_container" class="m_nav wthree_bg">
<nav class="menu menu--sebastian">
<ul id="m_nav_list" class="m_nav menu__list">
    <li class="m_nav_item active" id="m_nav_item_1"> <a href="<?php echo BASE_URL;?>" class="link link--kumya"><i class="fa fa-home" aria-hidden="true"></i><span data-letters="Home">Home</span></a></li>

    <li class="m_nav_item" id="moble_nav_item_3"> <a href="about" class="link link--kumya"><i class="fa fa-info-circle" aria-hidden="true"></i><span data-letters="About Us">About Us</span></a></li>

    <li class="m_nav_item" id="moble_nav_item_4"> <a href="how-it-works" class="link link--kumya"><i class="fa fa-building-o" aria-hidden="true"></i><span data-letters="How It Works">How It Works</span></a></li>

    <li class="m_nav_item" id="moble_nav_item_4"> <a href="<?php echo BASE_URL;?>user/login" class="link link--kumya"><i class="fa fa-lock" aria-hidden="true"></i><span data-letters="Login">Login</span></a></li>

    <li class="m_nav_item" id="moble_nav_item_4"> 
        <a href="<?php echo BASE_URL;?>user/register" class="link link--kumya"><i class="fa fa-user" aria-hidden="true"></i><span data-letters="Signup">Signup</span></a>
    </li>
</ul>
</nav>
                    </div>

                    </nav>
                </div>
        </div>

