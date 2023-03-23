<?php
add_action('manage_posts_custom_column', 'si_like_column',5,2); // срабатывает в момент когда создаются колонки
add_filter('manage_posts_columns', 'si_add_col_likes'); // ф-ция при регестрации колонки
add_action('wp_ajax_nopriv_like', 'like_r'); // si-modal-form - берем из  <input type="hidden" name="action" value="si-modal-form">
add_action('wp_ajax_like', 'like_r');


function like_r(){
    $id = $_POST['id'];
    $todo = $_POST['todo'];
    $like = get_post_meta($id, 'si-like', true);
    $like = $like ? $like : 0;
    if($todo==='plus'){
        $like++;
    } else {
        $like--;
    };
    $res = update_post_meta($id, 'si-like', $like);
    if($res) {
        echo $like;
        wp_die();
    } else{
        wp_die('Like not saved', 500);
    }
}

function si_like_column($col_name, $id) {
    if($col_name !== 'col_likes')
        return;
    $likes = get_post_meta($id, 'si-like', true);
    echo $likes ? $likes : 0;
}

function si_add_col_likes($default) {
    $type = get_current_screen();
   // print_anyarray(get_current_screen());
    if($type->post_type === 'post'){
        $default['col_likes'] = 'Лайки';
    }
    return $default;
}


