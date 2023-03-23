<div class="footer">
    <header class="main-header">
        <div class="wrapper main-header__wrap">
            <a href="index.html" class="main-header__logolink" aria-label="Логотип-ссылка на Главную">
                <img src="<?php bloginfo('template_url')?>/img/logo.png" alt="">
                <span class="slogan"><?php echo get_option('si_footer_slogan');?></span>
            </a>
            <nav class="main-navigation">
                <?php wp_nav_menu(array(
                    "Theme_location" => "footer",
                    "container" => false,
                    "menu_class" => "main-navigation__list",
                ))?>
            </nav>
            <?php get_template_part('template-parts/contacts', 'form') ?>
        </div>
    </header>
    <footer class="main-footer wrapper">
        <div class="row main-footer__row">
            <div class="main-footer__widget main-footer__widget_copyright">
                <span class="widget-text"> <?php if (!dynamic_sidebar('footer_law')) : dynamic_sidebar('footer_law'); endif; ?> </span>
            </div>
            <div class="main-footer__widget">
                <p class="widget-contact-mail">
                    <?php if (!dynamic_sidebar('footer_info')) : dynamic_sidebar('footer_info'); endif; ?>
                    <?php if (!dynamic_sidebar('contact_email')) : dynamic_sidebar('contact_email'); endif; ?>
                </p>
            </div>
            <div class="main-footer__widget main-footer__widget_social">
                <?php if (!dynamic_sidebar('social_links')) : dynamic_sidebar('social_links'); endif; ?>
            </div>
        </div>
    </footer>
</div>
<?php wp_footer() ?>
</body>
</html>
