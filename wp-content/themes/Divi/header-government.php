<!doctype html>
<html itemscope itemtype="http://schema.org/Article" lang="en">
    <head>
        <?php wp_head(); ?>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
        <meta name="description" content="Track Aam Aadmi Party&#x27;'s Electoral Promises with Election Promises Tracker." />
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Election Promises Tracker</title>
        <!-- Schema.org markup for Google+ -->
        <meta itemprop="name" content="Election Promises Tracker"/>
        <meta itemprop="author" content="Anurag Kundu"/>
        <meta itemprop="datePublished" content="2017-02-14T00:51:00-05:00"/>
        <meta itemprop="publisher" content="Ungineering"/>
        <meta itemprop="description" content="Track Aam Aadmi Party&#x27;'s Electoral Promises with Election Promises Tracker."/>
        <meta itemprop="headline" content="Election Promises Tracker - The Best Way to track electoral promises." />
        <meta itemprop="image" content="assets/aap.jpg"/>
        <!-- Twitter Card data -->
        <meta name="twitter:card" content="summary_large_image"/>
        <meta name="twitter:site" content="@AnuragKunduAK"/>
        <meta name="twitter:title" content="Election Promises Tracker"/>
        <meta name="twitter:description" content="Track Aam Aadmi Party&#x27;'s Electoral Promises with Election Promises Tracker."/>
        <meta name="twitter:creator" content="@AnuragKunduAK"/>
        <!-- Twitter summary card with large image must be at least 280x150px -->
        <meta name="twitter:image" content="assets/aap.jpg"/>

        <!-- Open Graph data -->
        <meta property="og:title" content="Election Promises" />
        <meta property="og:type" content="article" />
        <meta property="og:url" content="http://www.electionpromisestracker.in/" />
        <meta property="og:image" content="assets/aap.jpg"/>
        <meta property="og:description" content="Track Aam Aadmi Party&#x27;'s Electoral Promises with Election Promises Tracker." />
        <meta property="og:site_name" content="Election Promises Tracker" />
        <meta property="article:published_time" content="2017-02-14T00:51:00-05:00" />
        <meta property="article:modified_time" content="2017-02-14T00:52:47-05:00" />
        <meta property="article:section" content="Politics" />
        <meta property="article:tag" content="Politics" />
        <meta property="fb:admins" content="785013260" />
        <link rel="shortcut icon"                       href="/assets/favicon.ico" type="image/x-icon" />
        <link rel="apple-touch-icon"                    href="/assets/apple-touch-icon.png" />
        <link rel="apple-touch-icon" sizes="57x57"      href="/assets/apple-touch-icon-57x57.png" />
        <link rel="apple-touch-icon" sizes="72x72"      href="/assets/apple-touch-icon-72x72.png" />
        <link rel="apple-touch-icon" sizes="76x76"      href="/assets/apple-touch-icon-76x76.png" />
        <link rel="apple-touch-icon" sizes="114x114"    href="/assets/apple-touch-icon-114x114.png" />
        <link rel="apple-touch-icon" sizes="120x120"    href="/assets/apple-touch-icon-120x120.png" />
        <link rel="apple-touch-icon" sizes="144x144"    href="/assets/apple-touch-icon-144x144.png" />
        <link rel="apple-touch-icon" sizes="152x152"    href="/assets/apple-touch-icon-152x152.png" />
        <link rel="apple-touch-icon" sizes="180x180"    href="/assets/apple-touch-icon-180x180.png" />
        <meta name="apple-mobile-web-app-title"         content="Election Promises Tracker">
        <meta name="application-name"                   content="Election Promises Tracker">
        <meta name="theme-color"                        content="#ffffff">
        <!-- CSS libraries -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <!-- CSS custom -->
        <link rel="stylesheet" href={{ "/css/styles.css" | relative_url }}>
        <!-- Analytics JS -->
        <script>
          (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
          (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
          m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
          })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

          ga('create', 'UA-11672162-3', 'auto');
          ga('send', 'pageview');

        </script>    
    </head>

<body <?php body_class( ); ?>>


        <header id="main-header" data-height-onload="<?php echo esc_attr( et_get_option( 'menu_height', '66' ) ); ?>">
            <div class="container clearfix et_menu_container">
            <?php
                $logo = ( $user_logo = et_get_option( 'divi_logo' ) ) && '' != $user_logo
                    ? $user_logo
                    : $template_directory_uri . '/images/logo.png';
            ?>
                <div class="logo_container">
                    <span class="logo_helper"></span>
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                        <img src="<?php echo esc_attr( $logo ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" id="logo" data-height-percentage="<?php echo esc_attr( et_get_option( 'logo_height', '54' ) ); ?>" />
                    </a>
                </div>
                <div id="et-top-navigation" data-height="<?php echo esc_attr( et_get_option( 'menu_height', '66' ) ); ?>" data-fixed-height="<?php echo esc_attr( et_get_option( 'minimized_menu_height', '40' ) ); ?>">
                    <?php if ( ! $et_slide_header || is_customize_preview() ) : ?>
                        <nav id="top-menu-nav">
                        <?php
                            $menuClass = 'nav';
                            if ( 'on' == et_get_option( 'divi_disable_toptier' ) ) $menuClass .= ' et_disable_top_tier';
                            $primaryNav = '';

                            $primaryNav = wp_nav_menu( array( 'theme_location' => 'primary-menu', 'container' => '', 'fallback_cb' => '', 'menu_class' => $menuClass, 'menu_id' => 'top-menu', 'echo' => false ) );

                            if ( '' == $primaryNav ) :
                        ?>
                            <ul id="top-menu" class="<?php echo esc_attr( $menuClass ); ?>">
                                <?php if ( 'on' == et_get_option( 'divi_home_link' ) ) { ?>
                                    <li <?php if ( is_home() ) echo( 'class="current_page_item"' ); ?>><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'Divi' ); ?></a></li>
                                <?php }; ?>

                                <?php show_page_menu( $menuClass, false, false ); ?>
                                <?php show_categories_menu( $menuClass, false ); ?>
                            </ul>
                        <?php
                            else :
                                echo( $primaryNav );
                            endif;
                        ?>
                        </nav>
                    <?php endif; ?>

                    <?php
                    if ( ! $et_top_info_defined && ( ! $et_slide_header || is_customize_preview() ) ) {
                        et_show_cart_total( array(
                            'no_text' => true,
                        ) );
                    }
                    ?>

                    <?php if ( $et_slide_header || is_customize_preview() ) : ?>
                        <span class="mobile_menu_bar et_pb_header_toggle et_toggle_<?php echo esc_attr( et_get_option( 'header_style', 'left' ) ); ?>_menu"></span>
                    <?php endif; ?>

                    <?php if ( ( false !== et_get_option( 'show_search_icon', true ) && ! $et_slide_header ) || is_customize_preview() ) : ?>
                    <div id="et_top_search">
                        <span id="et_search_icon"></span>
                    </div>
                    <?php endif; // true === et_get_option( 'show_search_icon', false ) ?>

                    <?php do_action( 'et_header_top' ); ?>
                </div> <!-- #et-top-navigation -->
            </div> <!-- .container -->
            <div class="et_search_outer">
                <div class="container et_search_form_container">
                    <form role="search" method="get" class="et-search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                    <?php
                        printf( '<input type="search" class="et-search-field" placeholder="%1$s" value="%2$s" name="s" title="%3$s" />',
                            esc_attr__( 'Search &hellip;', 'Divi' ),
                            get_search_query(),
                            esc_attr__( 'Search for:', 'Divi' )
                        );
                    ?>
                    </form>
                    <span class="et_close_search_field"></span>
                </div>
            </div>
        </header> <!-- #main-header -->
   