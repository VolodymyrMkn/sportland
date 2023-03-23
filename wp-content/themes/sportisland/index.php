<?php get_header() ?>
<main class="main-content">
    <h1 class="sr-only">Страница категорий блога на сайте спорт-клуба SportIsland</h1>
    <div class="wrapper">
        <?php get_template_part('template-parts/breadcrumbs') ?>
    </div>
    <section class="last-posts">
        <div class="wrapper">
            <h2 class="main-heading last-posts__h"> последние записи </h2>
            <ul class="posts-list">
                <?php if (have_posts()):
                    while (have_posts()):
                        the_post() ?>
                        <li class="last-post">
                            <a href="<?php the_permalink(); ?>" class="last-post__link"
                               aria-label="Читать текст статьи: <?php the_title() ?>">
                                <figure class="last-post__thumb">
                                    <?php the_post_thumbnail('full', ['class' => "last-post__img"]); ?>
                                </figure>
                                <div class="last-post__wrap">
                                    <h3 class="last-post__h"><?php the_title() ?></h3>
                                    <p class="last-post__text"> <?php echo get_the_excerpt(); ?> </p>
                                    <span class="last-post__more link-more">Подробнее</span>
                                </div>
                            </a>
                        </li>
                    <?php endwhile; endif; ?>
            </ul>
        </div>
    </section>
    <?php $cats = get_categories();
  //  print_anyarray($cats); ?>
    <section class="categories">
        <div class="wrapper">
            <h2 class="categories__h main-heading"> категории </h2>
            <ul class="categories-list">
                <?php foreach ($cats as $cat): ?>
                    <li class="category">
                        <a href="<?php echo get_category_link($cat->cat_ID) ?>" class="category__link">
                            <?php $img = get_field('img_category', 'category_' . $cat->cat_ID); ?>
                            <img src="<?php echo $img['url'];?>" alt="<?php echo $img['alt'];?>" class="category__thumb">
                            <span class="category__name"><?php echo $cat->name ?></span>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </section>
    <?php get_footer() ?>
