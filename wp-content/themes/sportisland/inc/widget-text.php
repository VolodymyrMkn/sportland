<?php
class Sportland_Widget_Text extends WP_Widget{
    public function __construct(){
        parent::__construct('sportland_widget_text', 'Sportland - Текстовый виджет',[
            'name'=>'Sportland - Текстовый виджет',
            'description'=>'Выводит простой текст без верстки',
        ]);
    }
    public function form($instance){
        ?>
        <p>
            <input
                type="text"
                class="widefat"
                id="<?php echo $this->get_field_id('id-text');?>"
                name="<?php echo $this->get_field_name('text');?>"
                value="<?php echo $instance['text'];?>"
            >
        </p>
        <?php
    }
    public  function  widget($args, $instance){
        //
        // $args['before_widget'];
        echo $instance['text'];
    }

    public  function  update($new_instance, $old_instance){
        return $new_instance;
    }
}
?>
