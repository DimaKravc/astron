<?php
/**
 * The template for displaying the footer.
 *
 * @package Astron
 * @version 1.0.0
 */

?>
<footer class="site-footer angle--top-right">
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
<?php wp_footer(); ?>
</body>
</html>
