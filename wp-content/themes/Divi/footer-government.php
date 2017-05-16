

        <div class="container-fluid">
            <div class="page-header">
                <h5 class="text-right">Forked from <a href="https://github.com/TrumpTracker/trumptracker.github.io"> <i class="fa fa-github fa-fw"></i></a></h5>
            </div>
        </div>


        <!-- Libraries -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js" integrity="sha384-3ceskX3iaEnIogmQchP8opvBy3Mi7Ce34nWjpBIwVTHfGYWQS9jwHDVRnpKKHJg7" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/list.js/1.5.0/list .min.js" integrity="sha384-JDmRxRiXkNkskRM5AD4qHRGk9ItwZ9flbqOpsRYs8SOrIRwcMtTGKP2Scnjptzgm" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.17.4/lodash.min.js" integrity="sha384-FwbQ7A+X0UT99MG4WBjhZHvU0lvi67zmsIYxAREyhabGDXt1x0jDiwi3xubEYDYw" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js" integrity="sha384-KgEy7s3ThYKule8wWiu2WJkm0AmJeSLkXku5PY5X8MhVgdm8K1ebsVRKHfNfWPrR" crossorigin="anonymous"></script>

        <!-- Custom js -->
            <footer id="main-footer">
                <?php get_sidebar( 'footer' ); ?>


        <?php
            if ( has_nav_menu( 'footer-menu' ) ) : ?>

                <div id="et-footer-nav">
                    <div class="container">
                        <?php
                            wp_nav_menu( array(
                                'theme_location' => 'footer-menu',
                                'depth'          => '1',
                                'menu_class'     => 'bottom-nav',
                                'container'      => '',
                                'fallback_cb'    => '',
                            ) );
                        ?>
                    </div>
                </div> <!-- #et-footer-nav -->

            <?php endif; ?>

                <div id="footer-bottom">
                    <div class="container clearfix">
                <?php
                    if ( false !== et_get_option( 'show_footer_social_icons', true ) ) {
                        get_template_part( 'includes/social_icons', 'footer' );
                    }

                    echo et_get_footer_credits();
                ?>
                    </div>  <!-- .container -->
                </div>
            </footer> <!-- #main-footer -->
    
    <?php wp_footer(); ?>
    
    </body>
</html>