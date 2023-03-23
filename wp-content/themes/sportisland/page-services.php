<?php
/*
    Template Name: Шаблон страницы услуги
    Template Post Type: page
*/
?>
<?php get_header();?>

<main class="main-content">
    <h1 class="sr-only">Услуги</h1>
    <div class="wrapper">
        <?php get_template_part('template-parts/breadcrumbs') ?>
        <ul class="services-list">
            <li class="services-list__item service">
                <h2 class="service__name main-heading"> ТРЕНАЖЕРНЫЙ ЗАЛ </h2>
                <p class="service__text"> Спорт клуб в Москве «SportIsland» является современным фитнес клубом по проведению тренировок различной направленности и стиля. В тренажерном зале можно развивать силы своего организма и укреплять здоровье. </p>
                <p class="service__action">
                    <a href="#" class="service__subscribe btn">записаться</a>
                    <strong class="service__price price"> 1200 <span class="price__unit">р./мес.</span>
                    </strong>
                </p>
                <figure class="service__thumb">
                    <img src="<?php bloginfo('template_url')?>/img/services__service_pic1.jpg" alt="" class="service__img">
                </figure>
            </li>
            <li class="services-list__item service">
                <h2 class="service__name main-heading"> ЖЕНСКИЙ ФИТНЕС </h2>
                <p class="service__text"> В клубе «SportIsland» вам предложат фитнес программы различных направлений и уровней подготовленности: как для новичков, так и для опытных атлетов. Поставьте себе цель и опытные тренеры приведут вас к телу вашей мечты! </p>
                <p class="service__action">
                    <a href="#" class="service__subscribe btn">записаться</a>
                    <strong class="service__price price"> 2200 <span class="price__unit">р./мес.</span>
                    </strong>
                </p>
                <figure class="service__thumb">
                    <img src="<?php bloginfo('template_url')?>/img/services__service_pic3.jpg" alt="" class="service__img">
                </figure>
            </li>
            <li class="services-list__item service">
                <h2 class="service__name main-heading"> ЕДИНОБОРСТВА </h2>
                <p class="service__text"> Сегодня физическая и духовная подготовка, способность защитить себя и близких очень актуальны. Предлагаем следующие классы по самообороне и боевых искусств: Спортивная борьба - это единоборство двух соперников, использующих в поединке свои физические и морально-волевые качества для достижения победы. Бокс - контактный вид спорта, в котором соперники наносят друг другу удары кулаками. Разрешены удары только выше пояса. </p>
                <p class="service__action">
                    <a href="#" class="service__subscribe btn">записаться</a>
                    <strong class="service__price price"> 1800 <span class="price__unit">р./мес.</span>
                    </strong>
                </p>
                <figure class="service__thumb">
                    <img src="<?php bloginfo('template_url')?>/img/services__service_pic2.jpg" alt="" class="service__img">
                </figure>
            </li>
        </ul>
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

<?php get_footer();?>