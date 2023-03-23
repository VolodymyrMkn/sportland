<?php
add_action('admin_init', 'si_slogan');

function si_slogan()
{
    add_settings_field(
        'si_footer_slogan',
        'Слоган Вашего сайта',
        'si_slogan_callback',
        'general',
        'default',
        [
            'label_form' => 'si_footer_slogan',
        ]
    );
    register_setting('general', 'si_footer_slogan', 'strval');
};

function si_slogan_callback($args)
{
    $slug = $args['label_form'];
    // echo $slug;
    ?>
    <input id="<?php echo $slug ?>" name="<?php echo $slug ?>" value="<?php echo get_option($slug); ?>" type="text"
           class="regular-text code">
    <?php
};
?>