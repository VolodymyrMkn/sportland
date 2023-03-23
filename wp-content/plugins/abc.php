<?php
/*
    Plugin Name: abc.sql
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
    register_activation_hook(__FILE__,'si_activation'); // первый параметр - исполняемый файл, второй колбек функция
    register_deactivation_hook(__FILE__, 'si_deactivation');
    register_uninstall_hook(__FILE__,'si_delete');

    function si_activation(){
        global $wpdb;
        $table_name = $wpdb->prefix . 'si_settings';
        if($wpdb->get_var("SHOW TABLE LIKE $table_name") !== $table_name){
            $sql="CREATE TABLE IF NOT EXISTS `$table_name`(`msg_text` text NOT NULL) CHARSET=utf8;";
            $wpdb->query($sql); // исполняем запрос
            // добавим в таблицу
            $wpdb->query("INSERT INTO `$table_name` (`msg_text`) VALUES ('Hello'); ");
        };
    };

    function si_deactivation(){
        global $wpdb;
        $table_name = $wpdb->prefix . 'si_settings';
        $wpdb->query("DELETE FROM $table_name");
    };

    function si_delete(){
        global $wpdb;
        $table_name = $wpdb->prefix . 'si_settings';
     //   $wpdb->query("DROP TABLE $table_name");
    };

    add_action("wp_footer", function (){
        echo '<p class="abc"> Footer </p>';
    });

?>
