<?php
add_action('add_meta_boxes', 'my_meta_boxes');

function my_meta_boxes() {
    add_meta_box('si-like', // id поля в админке
        'Количество лайков: ',
        'si_meta_like_cb1',
        'post',
        'side', // по умолчанию advanced, side - справа
        'default' // Приоритет блока для показа выше или ниже остальных блоков: high или low. Также можно указать core, default.
       // [10,16] // Аргументы, которые нужно передать в callback функцию указанную в параметре $callback. callback функция получит данные поста (объект $post) и аргументы переданные в этом параметре.
    );
    $fields = [
        'si_order_date' => 'Дата заявки: ',
        'si_order_name' => 'Имя клиента: ',
        'si_order_phone' => 'Номер телефона: ',
        'si_order_choise' => 'Выбор клиента: ',
    ];

    foreach ($fields as $slug=>$text){
        add_meta_box(
            $slug,
            $text,
            'saveOrders',
            'orders',
            'advanced',
            'default',
            $slug
        );
    }
};

function saveOrders($post_obj, $slug){
    $slug = $slug['args'];
    $data = '';
    switch ($slug){
        case 'si_order_date':
            $data = $post_obj->post_date;
            break;
        case 'si_order_choise':
            $id = get_post_meta($post_obj->ID, $slug, true);
            $title = get_the_title($id);
            $type = get_post_type_object(get_post_type($id))->labels->singular_name;
            $data = 'Клиент выбрал: <strong>' . $title . '</strong> <br>Из раздела <strong>' . $type . '</strong>';
            break;
        default:
            $data = get_post_meta($post_obj->ID, $slug, true);
            $data = $data ? $data : 'Нет данных';
            break;
    };
    echo '<p>' . $data . '</p>';


//    $slug = $slug['args'];
//    echo $slug;
//    echo "<pre>";
//    print_r($post_obj);
//    echo "</pre>";

//    echo "<pre>";
//    print_r($slug);
//    echo "</pre>";
};

function si_meta_like_cb1(){
    $likes = $likes ? $likes : 0;
//  echo "<input type=\"text\" name=\"si-like\" value=\"${likes}\">";
    echo '<p>' . $likes . '</p>';
};
