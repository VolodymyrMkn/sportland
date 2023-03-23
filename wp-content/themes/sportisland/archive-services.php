<?php get_header() ?>

<main class="main-content">
    <h1 class="sr-only">Услуги</h1>
    <div class="wrapper">
        <?php get_template_part('template-parts/breadcrumbs') ?>
        <ul class="services-list">
            <?php while (have_posts()):
                            the_post();?>
            <li class="services-list__item service">
                <h2 class="service__name main-heading"> <?php the_title(); ?> </h2>
                <p class="service__text"> <?php echo get_the_content(); ?></p>
                <p class="service__action">
                    <a data-post-id="<?php echo $id; ?>" href="#modal-form" class="service__subscribe btn btn_modal">записаться</a>
                    <strong class="service__price price"> <?php echo get_field('price_service') ?> <span class="price__unit">р./мес.</span>
                    </strong>
                </p>
                <figure class="service__thumb">
                    <?php the_post_thumbnail('full',['class' => 'service__img']);?>
                </figure>
            </li>
            <?php endwhile; ?>
        </ul>
    </div>
</main>
<?php get_template_part('template-parts/modal-forms') ?>

<?php get_footer() ?>
