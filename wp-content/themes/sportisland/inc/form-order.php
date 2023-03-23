<?php
add_action('admin_post_nopriv_si-modal-form', 'si_modal_form_handler'); // si-modal-form - берем из  <input type="hidden" name="action" value="si-modal-form">
add_action('admin_post_si-modal-form', 'si_modal_form_handler');

add_action('manage_posts_custom_column', 'si_status_orders',5,3); // срабатывает в момент когда создаются колонки
add_filter('manage_posts_columns', 'si_add_col_orders'); // ф-ция при регестрации колонки


function si_modal_form_handler() {

    $name = $_POST['si-user-name'] ? $_POST['si-user-name'] : 'Аноним';
    $phone = $_POST['si-user-phone'] ? $_POST['si-user-phone'] : false;
    $choice = $_POST['form-post-id'] ? $_POST['form-post-id'] : 'empty';

    if($phone) {
        $name = wp_strip_all_tags($name);
        // wp_strip_all_tags - удаляет все HTML теги, а также стили и скрипт
        // Главное отличие функции wp_strip_all_tags() от обычной PHP-функции strip_tags() в том, что она удаляет не только теги сами по себе, но также и то, что внутри тегов <script> и <style>.
        $phone = wp_strip_all_tags($phone);
        $choice = wp_strip_all_tags($choice);
        $id = wp_insert_post(wp_slash(array(
            'post_title' => 'Заявка № ',  // формируем тайтл заявки
            'post_type' => 'orders', // мы его отдельно регестрировали
            'post_status' => 'publish',
            'meta_input' => [ // сюда можем добавить все метаполя
                'si_order_name' => $name,
                'si_order_phone' => $phone,
                'si_order_choise' => $choice
            ],
        )));
        if($id!==0){
            wp_update_post([
                'ID' => $id,
                'post_title' => 'Заявка № ' . $id,
            ]);
            update_field('orders_status', 'new', $id);
        }
    };

    header('Location:' . home_url());
}

function si_status_orders($col_name, $id){
    if($col_name !== 'status')
        return;
    global $id;
    $status_ord = get_field('orders_status', $id);
    $textStatus = ($status_ord['value']=='new') ? 'new' : (($status_ord['value']=='done') ? 'done' : 'processing');
    echo '<span class="'. $textStatus .'">' .$status_ord['label']. '</span>';
};

function si_add_col_orders($default){
    $type = get_current_screen();
    // print_anyarray(get_current_screen());
    if($type->post_type === 'orders'){
        $default['status'] = 'Статус';
    }
    return $default;
};
