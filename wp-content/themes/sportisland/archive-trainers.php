<?php get_header() ?>

<main class="main-content">
    <div class="wrapper">
        <ul class="breadcrumbs">
            <?php if (function_exists('bcn_display')) {
                bcn_display();
            }; ?>
        </ul>
    </div>
    <section class="trainers">
        <div class="wrapper">
            <h1 class="main-heading trainers__h">Тренеры</h1>
            <ul class="trainers-list">
                <?php while (have_posts()):
                                the_post(); ?>
                <li class="trainers-list__item">
                    <article class="trainer">
                        <?php the_post_thumbnail('full', array('class'=>'trainer__thumb')); ?>
                        <div class="trainer__wrap">
                            <h2 class="trainer__name"> <?php the_title(); ?> </h2>
                            <p class="trainer__text"><?php echo get_the_content(); ?></p>
                        </div>
                        <a data-post-id="<?php echo $id; ?>" href="#modal-form" class="trainer__subscribe btn btn btn_modal">записаться</a>
<!--                        <a href="#" class="trainer__subscribe btn">записаться</a>-->
                    </article>
                </li>
                <?php endwhile; ?>
            </ul>
        </div>
    </section>
</main>
<?php get_template_part('template-parts/modal-forms') ?>

<?php get_footer() ?>
