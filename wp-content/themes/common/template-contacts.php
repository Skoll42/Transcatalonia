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
                            <br>
                            <div class="phone"><a href="tel:+34672-459-489">+(34) 672-459-489</a></div>
                            <div class="phone-notice">в том числе доступен через Viber и Whatsapp</div>
                        </div>
                        <div class="contacts-email">
                            <div class="title">Email</div>
                            <div class="email"><a href="mailto:info@transcatalonia.tours">info@transcatalonia.tours</a></div>
                        </div>
                        <div class="contacts-message">
                            <div class="title">Написать сообщение</div>
                            <div class="contacts-form">
                                <?php echo do_shortcode('[contact-form-7 id="268" title="Contact us"]'); ?>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php get_footer(); ?>