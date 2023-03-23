<?php
add_action('init', 'registerType');

function registerType()
{
    register_post_type('shedule', [
        'label' => null,
        'labels' => [
            'name' => 'Занятие в спортзале', // основное название для типа записи
            'singular_name' => 'Shedule', // название для одной записи этого типа
            'add_new' => 'Добавить новую запись - занятие', // для добавления новой записи
            'add_new_item' => 'Добавление новго занятия', // заголовка у вновь создаваемой записи в админ-панели.
            'edit_item' => 'Редактирование занятия', // для редактирования типа записи
            'new_item' => 'Новый ', // текст новой записи
            'view_item' => 'Смотреть занятия', // для просмотра записи этого типа.
            'search_items' => 'Искать занятия', // для поиска по этим типам записи
            'not_found' => 'Не найдено', // если в результате поиска ничего не было найдено
            'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
            'parent_item_colon' => '', // для родителей (у древовидных типов)
            'menu_name' => 'Занятие в спортзале', // название меню
        ],
        'public' => true,
        'show_in_menu' => true, // показывать ли в меню адмнки
        'show_in_rest' => false, // добавить в REST API. C WP 4.7
        'menu_position' => 20,
        'menu_icon' => 'dashicons-calendar-alt',
        'hierarchical' => false,
        'supports' => ['title', 'editor', 'thumbnail'], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
        'taxonomies' => [],
        'has_archive' => false,
    ]);
    register_taxonomy('shedule_days', ['shedule'], [
        'labels' => [
            'name' => 'Дни недели',
            'singular_name' => 'День',
            'search_items' => 'Найти день недели',
            'all_items' => 'Все дни недели',
            'view_item ' => 'Посмотреть дни недели',
            'edit_item' => 'Редактировать дни недели',
            'update_item' => 'Обновить',
            'add_new_item' => 'Добавить день недели',
            'new_item_name' => 'Добавить день недели',
            'menu_name' => 'Все дни недели',
        ],
        'description' => '',
        'public' => true, // нам нужен UI т.е. интерфейс для работы с данной таксономией
        'hierarchical' => true
    ]);
    register_taxonomy('shedule_places', ['shedule'], [
        'labels' => [
            'name' => 'Залы',
            'singular_name' => 'Залы',
            'search_items' => 'Найти залы',
            'all_items' => 'Все залы',
            'view_item ' => 'Посмотреть залы',
            'edit_item' => 'Редактировать залы',
            'update_item' => 'Обновить',
            'add_new_item' => 'Добавить залы',
            'new_item_name' => 'Добавить залы',
            'menu_name' => 'Все залы',
        ],
        'description' => '',
        'public' => true, // нам нужен UI т.е. интерфейс для работы с данной таксономией
        'hierarchical' => true
    ]);
    register_post_type('trainers', [
        'label' => null,
        'labels' => [
            'name' => 'Тренера', // основное название для типа записи
            'singular_name' => 'Trainers', // название для одной записи этого типа
            'add_new' => 'Добавить нового тренера', // для добавления новой записи
            'add_new_item' => 'Добавление новго тренера', // заголовка у вновь создаваемой записи в админ-панели.
            'edit_item' => 'Редактирование информации тренера', // для редактирования типа записи
            'new_item' => 'Новый ', // текст новой записи
            'view_item' => 'Смотреть тренеров', // для просмотра записи этого типа.
            'search_items' => 'Искать тренера', // для поиска по этим типам записи
            'not_found' => 'Не найдено', // если в результате поиска ничего не было найдено
            'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
            'parent_item_colon' => '', // для родителей (у древовидных типов)
            'menu_name' => 'Тренера', // название меню
        ],
        'public' => true,
        'show_in_menu' => true, // показывать ли в меню адмнки
        'show_in_rest' => false, // добавить в REST API. C WP 4.7
        'menu_position' => 20,
        'menu_icon' => 'dashicons-groups',
        'hierarchical' => false,
        'supports' => ['title', 'editor', 'thumbnail'], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
        'taxonomies' => [],
        'has_archive' => true,
    ]);
    register_post_type('services', [
        'label' => null,
        'labels' => [
            'name' => 'Услуги в спортзале', // основное название для типа записи
            'singular_name' => 'Сервисы', // название для одной записи этого типа
            'add_new' => 'Добавить новую запись - услуга', // для добавления новой записи
            'add_new_item' => 'Добавление новой услуги', // заголовка у вновь создаваемой записи в админ-панели.
            'edit_item' => 'Редактирование услуги', // для редактирования типа записи
            'new_item' => 'Новый ', // текст новой записи
            'view_item' => 'Смотреть услуги', // для просмотра записи этого типа.
            'search_items' => 'Искать услуги', // для поиска по этим типам записи
            'not_found' => 'Не найдено', // если в результате поиска ничего не было найдено
            'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
            'parent_item_colon' => '', // для родителей (у древовидных типов)
            'menu_name' => 'Услуги в спортзале', // название меню
        ],
        'public' => true,
        'show_in_menu' => true, // показывать ли в меню адмнки
        'show_in_rest' => false, // добавить в REST API. C WP 4.7
        'menu_position' => 20,
        'menu_icon' => 'dashicons-editor-ul',
        'hierarchical' => false,
        'supports' => ['title', 'editor', 'thumbnail'], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
        'taxonomies' => [],
        'has_archive' => true,
    ]);

    register_post_type('prices', [
        'label' => null,
        'labels' => [
            'name' => 'Цены в спортзале', // основное название для типа записи
            'singular_name' => 'prices', // название для одной записи этого типа
            'add_new' => 'Добавить новую запись - цену', // для добавления новой записи
            'add_new_item' => 'Добавление новой цены', // заголовка у вновь создаваемой записи в админ-панели.
            'edit_item' => 'Редактирование цены', // для редактирования типа записи
            'new_item' => 'Новый ', // текст новой записи
            'view_item' => 'Смотреть цены', // для просмотра записи этого типа.
            'search_items' => 'Искать цены', // для поиска по этим типам записи
            'not_found' => 'Не найдено', // если в результате поиска ничего не было найдено
            'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
            'parent_item_colon' => '', // для родителей (у древовидных типов)
            'menu_name' => 'Цены в спортзале', // название меню
        ],
        'public' => true,
        'show_in_menu' => true, // показывать ли в меню адмнки
        'show_in_rest' => false, // добавить в REST API. C WP 4.7
        'menu_position' => 20,
        'menu_icon' => 'dashicons-money-alt',
        'hierarchical' => false,
        'supports' => ['title', 'editor'], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
        'taxonomies' => [],
        'has_archive' => true,
    ]);

    register_post_type('orders', [
        'label' => null,
        'labels' => [
            'name' => 'Заявки на спортзал', // основное название для типа записи
            'singular_name' => 'orders', // название для одной записи этого типа
            'add_new' => 'Добавить новую запись - заявку', // для добавления новой записи
            'add_new_item' => 'Добавление новой заявки', // заголовка у вновь создаваемой записи в админ-панели.
            'edit_item' => 'Редактирование заявки', // для редактирования типа записи
            'new_item' => 'Новый ', // текст новой записи
            'view_item' => 'Смотреть заявки', // для просмотра записи этого типа.
            'search_items' => 'Искать заявки', // для поиска по этим типам записи
            'not_found' => 'Не найдено', // если в результате поиска ничего не было найдено
            'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
            'parent_item_colon' => '', // для родителей (у древовидных типов)
            'menu_name' => 'Заявки на спортзале', // название меню
        ],
        'public' => true,
        'show_in_menu' => true, // показывать ли в меню адмнки
        'show_in_rest' => false, // добавить в REST API. C WP 4.7
        'menu_position' => 20,
        'menu_icon' => 'dashicons-clipboard',
        'hierarchical' => false,
        'supports' => ['title'], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
        'taxonomies' => [],
        'has_archive' => false,
    ]);

    register_post_type('cards', [
        'label' => null,
        'labels' => [
            'name' => 'Клубные карты в спортзал', // основное название для типа записи
            'singular_name' => 'cards', // название для одной записи этого типа
            'add_new' => 'Добавить новую клубную карту', // для добавления новой записи
            'add_new_item' => 'Добавление новой клубной карты', // заголовка у вновь создаваемой записи в админ-панели.
            'edit_item' => 'Редактирование клубную карту', // для редактирования типа записи
            'new_item' => 'Новый ', // текст новой записи
            'view_item' => 'Смотреть клубную карту', // для просмотра записи этого типа.
            'search_items' => 'Искать клубную карту', // для поиска по этим типам записи
            'not_found' => 'Не найдено', // если в результате поиска ничего не было найдено
            'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
            'parent_item_colon' => '', // для родителей (у древовидных типов)
            'menu_name' => __('Клубные карты в спортзал', 'sport-island'), // название меню
        ],
        'public' => true,
        'show_in_menu' => true, // показывать ли в меню адмнки
        'show_in_rest' => false, // добавить в REST API. C WP 4.7
        'menu_position' => 20,
        'menu_icon' => 'dashicons-index-card',
        'hierarchical' => false,
        'supports' => ['title', 'editor', 'thumbnail'], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
        'taxonomies' => [],
        'has_archive' => false,
    ]);


}

;
