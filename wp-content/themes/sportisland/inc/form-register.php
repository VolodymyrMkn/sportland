<?php
add_action('wp_ajax_nopriv_registration', 'example_reg');
add_action('wp_ajax_nopriv_auth', 'example_auth');

function example_reg(){
    if(isset($_POST['login'])){
        $log = strip_tags($_POST['login']);
    }
    if(isset($_POST['password'])){
        $pasw = strip_tags($_POST['password']);
    }
    if(isset($_POST['email'])){
        $email = strip_tags($_POST['email']);
    }

    $res = wp_create_user($log, $pasw, $email);

    if(!is_wp_error($res)){
        wp_die($res, 200);
    } else {
        wp_die('Not work', 400);
    }
}

function example_auth(){
    $log = $_POST['login'];
    $pasw = $_POST['password'];
    $res = wp_authenticate($log, $pasw);

    if(!is_wp_error($res)){
        wp_set_auth_cookie($res->ID);
        wp_die(get_userdata($res->ID)->user_login,200);
    } else {
        wp_die('Not work', 400);
    }
}

