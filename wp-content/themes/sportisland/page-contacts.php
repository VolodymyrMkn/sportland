<?php
/*
    Template Name: Шаблон страницы контакты
    Template Post Type: page
*/
?>
<?php get_header() ?>
<main class="main-content">
    <div class="wrapper">
        <?php get_template_part('template-parts/breadcrumbs') ?>
    </div>
    <section class="contacts">
        <div class="wrapper">
            <h1 class="contacts__h main-heading">Контакты</h1>
            <?php if (is_user_logged_in()): ?>
                <div class="map">
                    <a href="#" class="map__fallback">
                        <img src="./img/map.jpg" alt="Карта клуба SportIsland">
                        <span class="sr-only"> Карта </span>
                    </a>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d20309.075323923767!2d30.4721233!3d50.4851493!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sru!2sua!4v1578565396276!5m2!1sru!2sua"
                            width="800" height="600" style="border:0;" allowfullscreen=""></iframe>
                </div>
            <?php else: ?>
            <form action="<?php echo esc_url(admin_url('admin-ajax.php')) ?>" class="registered-user">
                <input type="text" class="contacts-form__input" name="login" placeholder="login" required>
                <input type="text" class="contacts-form__input" name="password" placeholder="password" required>
                <input type="text" class="contacts-form__input" name="email" placeholder="email" required>
                <input type="hidden" name="action" value="registration">
                <button type="submit" class="contacts-form__btn btn">Зарегистрироваться</button>
            </form>

            <form action="<?php echo esc_url(admin_url('admin-ajax.php')) ?>" class="auth">
                <input type="text" class="contacts-form__input" name="login" placeholder="login" required>
                <input type="text" class="contacts-form__input" name="password" placeholder="password" required>
                <input type="hidden" name="action" value="auth">
                <button type="submit" class="contacts-form__btn btn">Авторизация</button>
            </form>

            <?php endif; ?>
            <br>
            <p class="contacts__info">
                <span class="widget-address"> г. Москва,
                    <?php if (!dynamic_sidebar('category_text')) : dynamic_sidebar('category_text'); endif; ?>
                </span>
                <span class="widget-working-time">
                    <?php if (!dynamic_sidebar('info_schedule')) : dynamic_sidebar('info_schedule'); endif; ?>
                </span>
                <a href="tel:88007003030" class="widget-phone">
                    <?php if (!dynamic_sidebar('contact_numb')) : dynamic_sidebar('contact_numb'); endif; ?>
                </a>
                <a href="mailto:<?php if (!dynamic_sidebar('contact_email')) : dynamic_sidebar('contact_email'); endif; ?>" class="widget-email">
                    <?php if (!dynamic_sidebar('contact_email')) : dynamic_sidebar('contact_email'); endif; ?>
                </a>
            </p>
            <h2 class="page-heading contacts__h_form"> форма </h2>
            <form action="#" class="contacts__form contacts-form">
                <label class="contacts-form__label">
                    <span class="sr-only"> Имя </span>
                    <input type="text" class="contacts-form__input" placeholder="Ваше имя">
                </label>
                <label class="contacts-form__label">
                    <span class="sr-only"> Телефон </span>
                    <input type="text" class="contacts-form__input" placeholder="Ваш телефон">
                </label>
                <label class="contacts-form__label">
                    <span class="sr-only"> Почта </span>
                    <input type="text" class="contacts-form__input" placeholder="Ваша почта">
                </label>
                <label class="contacts-form__label contacts-form__label_textarea">
                    <span class="sr-only"> Комментарий </span>
                    <textarea name="" id="" cols="30" rows="10" class="contacts-form__textarea"
                              placeholder="Ваше сообщение"></textarea>
                </label>
                <button class="contacts-form__btn btn"> <?php _e('Отправить', 'sport-island') ?></button>
            </form>
        </div>
    </section>
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

<script>
    const register = document.querySelector('.registered-user')
    const auth = document.querySelector('.auth')
    register.addEventListener('submit', async function (e) {
        e.preventDefault()
        const data = new FormData(e.target)
        console.log(...data)
        const result = await fetch(e.target.getAttribute('action'), {
            method: 'POST',
            body: data
        })
        if (result.ok){
            const user = await result.text()
            console.log(user)
            e.target.style.display = 'none'
            auth.style.display = 'block'
        }
    })
    auth.addEventListener('submit', async e=>{
        e.preventDefault()
        const data = new FormData(e.target) // передаем текущую форму, чтобы были собранны все ее данные
        const result = await fetch(e.target.getAttribute('action'),{ // получаем адрес на который будем стучаться
            method: 'POST',
            body:data
        })
        if(result.ok){
            e.target.style.display = 'none'
            register.style.display = 'none'
            let login = await result.text() // этот метод прочитает ответ как текст
            window.location.reload();
            console.log(login)
            document.body.insertAdjacentHTML('afterbegin',`<h1>Привет, ${login}</h1`)
        }else{
            console.log('Не получилось авторизоваться - такого пользователя нет или неправильно ввели данные')
        }
    })
    // auth.addEventListener('submit', async function (e) {
    //     e.preventDefault()
    //     const data = new FormData(e.target)
    //     console.log(...data)
    //     const result = await fetch(e.target.getAttribute('action'), {
    //         method: 'POST',
    //         body: data
    //     })
    //     if (result.ok){
    //         const user = await result.text()
    //         console.log(user)
    //         e.target.style.display = 'none'
    //         window.location.reload()
    //         document.body.insertAdjacentHTML('afterbegin',`<h1>Привет, ${user}</h1`)
    //     }
    // })
</script>
