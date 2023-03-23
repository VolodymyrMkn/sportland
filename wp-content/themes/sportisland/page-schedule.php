<?php
/*
    Template Name: Шаблон страницы расписание
    Template Post Type: page
*/
?>
<?php get_header() ?>
<main class="main-content">
    <div class="wrapper">
        <?php get_template_part('template-parts/breadcrumbs') ?>
        <h1 class="main-heading schedule-page__h">расписание</h1>
        <div class="tabs">
            <ul class="tabs-btns">
                <?php
                $days = get_terms([
                    'taxonomy' => 'shedule_days',
                    'order' => 'ASC',
                    'orderby' => 'slug'
                ]);
                // print_anyarray($days);
                ?>
                <?php
                $index = 0;
                foreach ($days as $day): ?>
                    <li class="tabs-btns__item <?php echo $index === 0 ? 'active-tab' : '' ?>">
                        <a href="#<?php echo $day->slug; ?>" class="tabs-btns__btn"> <?php echo $day->name; ?> </a>
                    </li>
                    <?php
                    // print_anyarray($day);
                    $index++; endforeach ?>

            </ul>
            <ul class="tabs-content">
                <?php
                $index = 0;
                foreach ($days as $day): ?>
                    <li class="tabs-content__item <?php echo $index === 0 ? 'active-tab' : '' ?>" id="<?php echo $day->slug; ?>">
                        <h2 class="sr-only"> <?php echo $day->description; ?> </h2>
                        <ul class="schedule tabs-content__list">
                            <?php $actions = new WP_Query([
                                'posts_per_page' => -1,
                                'post_type' => 'shedule',
                                'tax_query' => [
                                        [
                                                'taxonomy' => 'shedule_days',
                                                'field' => 'slug',
                                                'terms' => $day->slug
                                        ]
                                ]
                            ]);
                            //print_anyarray($actions);
                            ?>
                            <?php
                                if($actions->have_posts()):
                                    while($actions->have_posts()):
                                        $actions->the_post() ?>
                            <li class="schedule__item">
                                <p class="schedule__time"><?php the_field('shedule_time_start')?> : <?php the_field('shedule_time_end'); ?></p>
                                <h2 class="schedule__h"><?php the_field('shedule_name')?> </h2>
                                <p class="schedule__trainer"> <?php echo get_the_title(get_field('shedule_trainer'))?> </p>
                                <p class="schedule__place" style="color: <?php echo get_field('place_color', 'shedule_places_' . get_the_terms($id, 'shedule_places')[0]->term_id);?>"> <?php echo get_the_terms( $id, 'shedule_places' )[0]->name;?> </p>
                            </li>
                            <?php 
                                    endwhile;
                                    wp_reset_postdata();
                                endif;
                            
                            ?>
                        </ul>
                    </li>
                <?php $index++; endforeach; ?>
            </ul>
        </div>
    </div>
</main>
<div class="modal">
    <div class="wrapper">
        <section class="modal-content modal-form" id="modal-form">
            <button class="modal__closer">
                <span class="sr-only">Закрыть</span>
            </button>
            <form action="#" class="modal-form__form">
                <h2 class="modal-content__h"> Отправить заявку </h2>
                <p> Оставьте свои контакты и менеджер с Вами свяжется </p>
                <p>
                    <label>
                        <span class="sr-only">Имя: </span>
                        <input type="text" name="si-user-name" placeholder="Имя">
                    </label>
                </p>
                <p>
                    <label>
                        <span class="sr-only">Телефон:</span>
                        <input type="text" name="si-user-phone" placeholder="Телефон" pattern="^\+{0,1}[0-9]{4,}$"
                               required>
                    </label>
                </p>
                <button class="btn" type="submit">Отправить</button>
                <input type="hidden" name="action" value="si-modal-form">
            </form>
        </section>
    </div>
</div>

<?php get_footer() ?>
