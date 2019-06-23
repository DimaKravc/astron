<?php
/**
 * The template for displaying the footer.
 *
 * @package Astron
 * @version 1.0.0
 */

?>
<footer class="site-footer angle angle_top_right <?php if (is_home()) echo 'angle_no_indent'; ?>">
    <div class="container">
        <div class="site-footer__inner">
            <?php echo '<p class="copyright">' . sprintf(__('%s copyright - astron llc. %d', 'astron'), '&#169;', date('Y')) . '</p>'; ?>
            <?php wp_nav_menu(array(
                'theme_location' => 'site-nav',
                'container' => 'nav',
                'container_class' => 'site-nav site-nav_loc_footer',
                'menu_class' => 'site-nav__list'
            )); ?>
        </div>
    </div>
</footer>
</div>
</div>
<div class="site-preloader" data-sp>
    <div class="site-preloader__bar" data-spb></div>
</div>
<?php wp_footer(); ?>
</body>
</html>
