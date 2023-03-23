<?php
/*
    Template Name: Шаблон страницы цены
    Template Post Type: page
*/
?>
<?php get_header()?>
<main class="main-content">
    <h1 class="sr-only">Цены на наши услуги и клубные карты</h1>
    <div class="wrapper">
        <ul class="breadcrumbs">
            <li class="breadcrumbs__item breadcrumbs__item_home">
                <a href="index.html" class="breadcrumbs__link">Главная</a>
            </li>
            <li class="breadcrumbs__item">
                <a href="prices.html" class="breadcrumbs__link">Цены</a>
            </li>
        </ul>
        <section class="prices">
            <h2 class="main-heading prices__h">Цены</h2>

        </section>
        <!-- Content-cards-->
        <?php get_template_part('template-parts/content','cards')?>
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
                        <input type="text" name="si-user-phone" placeholder="Телефон" pattern="^\+{0,1}[0-9]{4,}$" required>
                    </label>
                </p>
                <button class="btn" type="submit">Отправить</button>
                <input type="hidden" name="action" value="si-modal-form">
            </form>
        </section>
    </div>
</div>


<?php get_footer()?>
