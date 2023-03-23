<?php get_header()?>
<main class="main-content">
    <h1 class="sr-only"> Домашняя страница спортклуба SportIsland. </h1>
    <div class="banner">
        <span class="sr-only">Будь в форме!</span>
        <a href="trainers.html" class="banner__link btn"><?php _e('записаться', 'sport-island') ?></a>
    </div>
    <article class="about">
        <div class="wrapper about__flex">
            <div class="about__wrap">
                <h2 class="main-heading about__h"> кто мы такие </h2>
                <p class="about__text"> Спортивный клуб SPORTISLAND существует уже более 5 лет. За это время большое количество посетителей получили положительный результат от своих тренировок. Мы предлагаем посещать просторный и укомплектованный тренажерный зал с персональными тренерами, массаж, групповые занятия (фитнес), занятия единоборствами в группах и индивидуально, и большое количество тренировок для детей. В каждый абонемент входит посещение финской сауны </p>
                <a href="blog.html" class="about__link btn">подробнее</a>
            </div>
            <figure class="about__thumb">
                <img src="<?php bloginfo('template_url')?>/index__about_img.jpg" alt="Power lifter">
            </figure>
        </div>
    </article>
    <section class="sales">
        <div class="wrapper">
            <header class="sales__header">
                <h2 class="main-heading sales__h"> акции и скидки </h2>
                <p class="sales__btns">
                    <button class="sales__btn sales__btn_prev">
                        <span class="sr-only"> Предыдущие акции </span>
                    </button>
                    <button class="sales__btn sales__btn_next">
                        <span class="sr-only"> Следующие акции </span>
                    </button>
                </p>
            </header>
            <div class="sales__slider slider">
                <section class="slider__slide stock">
                    <a href="blog.html" class="stock__link" aria-label="Подробнее об акции скидка 20% на групповые занятия">
                        <img src="<?php bloginfo('template_url')?>/index__sales_pic1.jpg" alt="" class="stock__thumb">
                        <h3 class="stock__h"> Групповые занятия 20% скидка </h3>
                        <p class="stock__text"> Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев более менее осмысленного текста рыбы на русском языке. </p>
                        <span class="stock__more link-more_inverse link-more">Подробнее</span>
                    </a>
                </section>
                <section class="slider__slide stock">
                    <a href="blog.html" class="stock__link" aria-label="Подробнее об акции Скидка 30% на занятия с тренером">
                        <img src="<?php bloginfo('template_url')?>/index__sales_pic2.jpg" alt="" class="stock__thumb">
                        <h3 class="stock__h"> Скидка 30% на занятия с тренером </h3>
                        <p class="stock__text"> Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев более менее осмысленного текста рыбы на русском языке. </p>
                        <span class="stock__more  link-more_inverse link-more">Подробнее</span>
                    </a>
                </section>
                <section class="slider__slide stock">
                    <a href="blog.html" class="stock__link" aria-label="Подробнее об акции Скидка 30% на занятия с тренером">
                        <img src="<?php bloginfo('template_url')?>/index__sales_pic2.jpg" alt="" class="stock__thumb">
                        <h3 class="stock__h"> Скидка 30% на занятия с тренером </h3>
                        <p class="stock__text"> Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев более менее осмысленного текста рыбы на русском языке. </p>
                        <span class="stock__more  link-more_inverse link-more">Подробнее</span>
                    </a>
                </section>
            </div>
        </div>
    </section>
    <!-- Content-cards -->
    <?php get_template_part('template-parts/content','cards') ?>

</main>
<div class="modal">
    <div class="wrapper">
        <section class="modal-content modal-form" id="modal-form">
            <button class="modal__closer">
                <span class="sr-only">Закрыть</span>
            </button>
            <form method="post" action="<?php echo esc_url(admin_url('admin-post.php')) ?>" class="modal-form__form">
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
                        <input type="text" name="si-user-phone" placeholder="Телефон" pattern="^\+{0,1}[0-9]{4,}$" required>
                    </label>
                </p>
                <button class="btn" type="submit">Отправить</button>
                <input type="hidden" name="action" value="si-modal-form">
                <input type="hidden" name="formPostId" value="stop">
            </form>
        </section>
    </div>
</div>

<?php get_footer() ?>

