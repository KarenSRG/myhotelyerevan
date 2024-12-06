<div id="footer" class="footer_section">
    <?php
    do_action('hotelone_before_footer_site');

    do_action('hotelone_footer_site');

    do_action('hotelone_after_footer_site');
    ?>
</div><!-- .footer_section -->

<?php do_action('hotelone_before_site_end'); ?>
</div>
<?php
$option = wp_parse_args(get_option('hotelone_option', array()), hotelone_reset_data());
$switcher_hide = $option['switcher_hide'];
if ($switcher_hide == FALSE) {
    ?>
    <!--Switcher Style-->
    <section id="style-switcher">
        <h2><?php _e('Style Changer', 'hotelone'); ?> <a href="#"><i class="fa fa-spinner fa-spin"></i></a></h2>
        <div>
            <h3><?php _e('Select Color Style', 'hotelone'); ?></h3>
            <ul id="colors" class="colors">
                <li><a title="Default" class="default" href="#" data-color="#5c4686"></a></li>
                <li><a class="color1" href="#" data-color="#e8846b"></a></li>
                <li><a class="color2" href="#" data-color="#e54b4b"></a></li>
                <li><a class="color3" href="#" data-color="#df4937"></a></li>
                <li><a class="color4" href="#" data-color="#4694be"></a></li>
                <li><a class="color5" href="#" data-color="#895135"></a></li>
                <li><a class="color6" href="#" data-color="#b2412a"></a></li>
                <li><a class="color7" href="#" data-color="#7c4547"></a></li>
                <li><a class="color8" href="#" data-color="#e4aa78"></a></li>
            </ul>
        </div>
    </section>
    <!--/Switcher Style-->
<?php }

$disable_bt = get_theme_mod('hotelone_btt_hide', false);
if ($disable_bt == false) { ?>
    <a class="bottomScrollBtn" href="#" title="Scroll Top">
        <i class="fa fa-angle-double-up"></i>
    </a>
<?php }
wp_footer(); ?>
</body>
</html>