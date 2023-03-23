<?php
/*
    Plugin Name: si_cookie
    Description: Создает новую таблицу в базе данных
*/

/*  Copyright ГОД  Vladimir  (email: E-MAIL_АВТОРА)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/
?>

<?php
register_activation_hook(__FILE__, 'si_activation'); // первый параметр - исполняемый файл, второй колбек функция
register_deactivation_hook(__FILE__, 'si_deactivation');
register_uninstall_hook(__FILE__, 'si_delete');

function sc_option()
{
    return [
        'ck_bg' => '#000',
        'ck_color' => '#fff',
        'ck_text' => 'Ми используем cookie',
        'ck_position' => 'bottom'
    ];
}

;

function si_activation()
{
    $option = sc_option();
    foreach ($option as $key => $value) {
        update_option($key, $value);
    };
}

;

function si_deactivation()
{
    $option = sc_option();
    foreach ($option as $key => $value) {
        delete_option($key);
    };
}

;

function si_delete()
{

}

;

add_action('admin_menu', 'si_register_menu');

function si_register_menu()
{
    add_menu_page(
        'cookie уведомление',
        'Cookie',
        'manage_options',
        'si_settings',
        'si_admin_page_view',
        'dashicons-buddicons-pm',
        5
    );
}

;

function si_admin_page_view()
{

    if (!empty($_POST)) {
        update_option('ck_bg', $_POST['ck_bg']);
        update_option('ck_color', $_POST['ck_color']);
        update_option('ck_text', $_POST['ck_text']);
        update_option('ck_position', $_POST['ck_position']);
    };

    $bg = get_option('ck_bg');
    $text_color = get_option('ck_color');
    $text = get_option('ck_text');
    $position = get_option('ck_position');
    ?>
    <h2>Настройки Cookie</h2>
    <form method="post">
        <p>
            <label>
                Введите значение цвета фона:
            </label>
            <input type="text" name="ck_bg" value="<?php echo $bg ?>">
        </p>
        <p>
            <label>
                Введите значение цвета текста:
            </label>
            <input type="text" name="ck_color" value="<?php echo $text_color ?>">
        </p>
        <p>
            <label>
                Введите текст cookie:
            </label>
            <input type="text" name="ck_text" value="<?php echo $text ?>">
        </p>
        <fieldset>
            <legend>Выберите положение для уведомления:</legend>
            <label>
                Сверху
                <input type="radio" value="top" name="ck_position" <?php checked('top', $position, true) ?>>
            </label>
            <label>
                Снузу
                <input type="radio" value="bottom" name="ck_position" <?php checked('bottom', $position, true) ?>>
            </label>
        </fieldset>
        <br>
        <button type="submit">Сохранить</button>
    </form>

    <?php
}

;

add_action('wp_footer', function () {
    if ($_COOKIE['si_cookie'] !== 'cookie') {
        $bg = get_option('ck_bg');
        $text_color = get_option('ck_color');
        $text = get_option('ck_text');
        $position = get_option('ck_position');
        $css = $position . ':0;';
        ?>
        <div class="alert_1">
            <div class="wrapper">
                <?php echo $text ?>
                <button class="alert__btn">Сохранить</button>
            </div>
        </div>
        <style>
            .alert_1 {
                color: <?php echo $text_color; ?>;
                background-color: <?php echo $bg; ?>;
                position: fixed;
            <?php echo $css; ?> left: 0;
                z-index: 9999999;
                text-align: center;
                font-size: 30px;
                padding: 20px 10px;
                width: 100%;
            }

            .alert_1 .alert__btn {
                border: 1px solid<?php echo $text_color; ?>;
                background-color: transparent;
                font: inherit;
                font-size: 14px;
                color: <?php echo $text_color; ?>;
                padding: 10px 20px;
                cursor: pointer;
            }

            .alert_1 .alert__btn:hover, .alert_1 .alert__btn:active, .alert_1 .alert__btn:focus {
                background-color: <?php echo $text_color; ?>;
                color: <?php echo $bg; ?>;
                transition: 0.3s;
            }
        </style>


        <script>
            let button = document.querySelector('.alert__btn')
            console.log(button)
            let url = "<?php echo admin_url('admin-ajax.php'); ?>"
            button.onclick = async function () {
                let data = new FormData()
                data.append('action', 'cookie_ajax')
                let respons = await fetch(url, {
                    method: 'post',
                    body: data
                })
                if (respons.status===200) {
                    button.closest('.alert_1').remove()
                }
            }
        </script>

        <?php
    };
});
?>

<?php

add_action('wp_ajax_nopriv_cookie_ajax', 'cookie_ajax');
add_action('wp_ajax_cookie_ajax', 'cookie_ajax');

function cookie_ajax()
{
    setcookie('si_cookie', 'cookie', time() + 60 * 60 * 24 * 30, '/');
    wp_die();
}

;

?>
