<?php

function my_vitos_widgets_init(){

    register_sidebar(array(
        'name' => 'Виджет ввывода адресса',
        'id' => 'category_text',
        'description' => 'Вывод текста',
        'before_widget' => '<p class="widget-contacts__address">', // next level
        'after_widget' => '</p>',
    ));
    register_sidebar(array(
        'name' => 'Виджет ввывода номера телефона',
        'id' => 'contact_numb',
        'description' => 'Вывод текста',
        'before_widget' => '',
        'after_widget' => '',
    ));

    register_sidebar(array(
        'name' => 'Виджет ввывода почты',
        'id' => 'contact_email',
        'description' => 'Вывод текста',
        'before_widget' => '<a href="mailto:sportisland@gmail.ru">',
        'after_widget' => '</a>',
    ));

    register_sidebar(array(
        'name' => 'Виджет соц.сетей',
        'id' => 'social_links',
        'description' => 'Вывод соц.сетей',
        'before_widget' => '<p class="widget-contacts__address">', // next level
        'after_widget' => '</p>',
    ));
    register_sidebar(array(
        'name' => 'Виджет ввывода прав',
        'id' => 'footer_law',
        'description' => 'Выводиться внизу в футере',
        'before_widget' => '<span class="widget-text">',
        'after_widget' => '</span>',
    ));
    register_sidebar(array(
        'name' => 'Виджет ввывода инфо',
        'id' => 'footer_info',
        'description' => 'Выводиться внизу в футере',
        'before_widget' => '<div class="footer-copy">',
        'after_widget' => '</div>',
    ));
    register_sidebar(array(
        'name' => 'Виджет ввывода графика работы',
        'id' => 'info_schedule',
        'description' => 'Выводиться внизу в футере',
        'before_widget' => '<span class="widget-working-time">',
        'after_widget' => '</span>',
    ));

}
add_action('widgets_init', 'my_vitos_widgets_init');
?>
