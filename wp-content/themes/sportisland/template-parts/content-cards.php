<section class="cards cards_index">
    <div class="wrapper">
        <h2 class="main-heading cards__h"> клубные карты </h2>
        <ul class="cards__list row">
            <?php
            $query = new WP_Query (array(
                'post_type' => 'cards',
                'posts_per_page' => 6,
                'meta_key' => 'card_orderby',
                'orderby' => 'meta_value_num',
                'order' => 'ASC',

            ));
            // print_anyarray($query);
            if ($query->have_posts())
                while ($query->have_posts()):
                    $query->the_post(); ?>
                    <?php
                    $img_card = get_the_post_thumbnail_url();
                    $profitable = get_field('cadr_best_proposition');
                    $cardList = get_field('card_benefits_list');
                    $lists = explode(',', $cardList);
                    // print_r($lists);?>
                    <li class="card <?php echo $profitable == 1 ? 'card_profitable' : '' ?>"
                        style="background-image: url('<?php echo $img_card; ?>')">
                        <h3 class="card__name"> <?php the_title() ?> </h3>
                        <p class="card__time"> <?php the_field('card_begin_time') ?>
                            - <?php the_field('card_end_time') ?></p>
                        <p class="card__price price"> <?php the_field('card_price') ?>
                            <span class="price__unit" aria-label="рублей в месяц">р.-/мес.</span>
                        </p>
                        <ul class="card__features">
                            <?php foreach ($lists as $list): ?>
                                <li class="card__feature"><?php echo $list; ?></li>
                            <?php endforeach; ?>
                        </ul>
                        <a data-post-id="99" href="#modal-form" class="card__buy btn btn_modal">купить</a>
                    </li>
                <?php endwhile; ?>
        </ul>
    </div>
</section>
<?php get_template_part('template-parts/modal-forms') ?>
