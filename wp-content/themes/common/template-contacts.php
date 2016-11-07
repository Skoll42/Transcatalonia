<?php
/*
Template Name: Contacts Page
*/
?>

<?php get_header(); ?>
<div class="contacts">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="contacts-block">
                    <div class="contacts-title">Контакты</div>
                    <div class="contacts-costa">
                        <div class="title">Если вы на Коста Дорада (Таррагона, Салоу, Кап Салоу, Ла Пинеда, Камбрилс):</div>
                        <div class="phone">+(34) 672-459-489</div>
                        <div class="phone-notice">в том числе доступен через Viber и Whatsapp</div>
                    </div>
                    <div class="contacts-barcelona">
                        <div class="title">Если вы в Барселоне или ее окресностях:</div>
                        <div class="phone">+(34) 652-142-705</div>
                        <div class="phone">+(34) 634-013-867</div>
                    </div>
                    <div class="contacts-email">
                        <div class="title">Email</div>
                        <div class="email">info@transcatalonia.tours</div>
                    </div>
                    <div class="contacts-message">
                        <div class="title">Написать сообщение</div>
                        <div class="contacts-form">
                            <form>
                                <input type="text" name="name" placeholder="Ваше имя *" class="required">
                                <input type="text" name="email" placeholder="E-mail *" class="required">
                                <input type="text" name="phone" placeholder="Телефон">
                                <input type="text" name="message" placeholder="Сообщение">
                            </form>
                        </div>
                        <div class="send-button">
                            <a href="#">Отправить</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>
