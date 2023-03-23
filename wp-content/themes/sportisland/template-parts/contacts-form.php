<address class="main-header__widget widget-contacts">
    <a href="tel:<?php if (!dynamic_sidebar('contact_numb')) : dynamic_sidebar('contact_numb'); endif; ?>" class="widget-contacts__phone">
        <?php if (!dynamic_sidebar('contact_numb')) : dynamic_sidebar('contact_numb'); endif; ?>
    </a>
    <p class="widget-contacts__address">
        <?php if (!dynamic_sidebar('category_text')) : dynamic_sidebar('category_text'); endif; ?>
    </p>
</address>
