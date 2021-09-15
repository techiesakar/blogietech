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

<footer role="contentinfo">
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
    <div class="sub-footer">
        <div class="sub-footer-wrapper">

            <div class="footer-menu">
                <?php dynamic_sidebar('sub-footer-menu'); ?>
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