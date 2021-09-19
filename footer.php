<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Blogietech
 */

?>

<footer role="contentinfo" style="background: <?php echo get_theme_mod( 'bt_top_footer_bg','#212025' ); ?>;" >
    <div class="footer-top">
        <div class="footer-logo-area">
            <?php
            dynamic_sidebar('footer-1');
            ?>
        </div>
        <div class="footer-about-area">
            <?php dynamic_sidebar('footer-2'); ?>
        </div>
        <div class="footer-social-area">
            <?php dynamic_sidebar('footer-social'); ?>
        </div>
    </div>
    <div class="footer-bottom" style="background: <?php echo get_theme_mod( 'bt_bottom_footer_bg','#0D0D0D' ); ?>;">
        <div class="footer-bottom-wrapper">

            <div class="footer-menu">
                <?php dynamic_sidebar('footer-bottom-menu'); ?>
            </div>

            <div class="footer-copyright">
                <?php
                dynamic_sidebar('footer-copyright'); ?>
            </div>
        </div>
    </div>
    </div>


    <div onclick="topFunction()" id="myBtn" class="scroll-top">
        <i class="icon icon-up-open"></i>
    </div>

</footer>



<?php wp_footer(); ?>

</body>

</html>