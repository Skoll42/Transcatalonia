<?php
/*
Template Name: Front Page
*/
?>
<?php get_header(); ?>

<?php if (have_posts()): the_post(); ?>

<?php endif; ?>
<div class="articles-grid">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<article class="main-article">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/article-image-big.png" alt="article image" />
					<div class="description">
						<div class="place">
							<div class="city">Тортоса</div>
							<div class="details">
								<span>нетуристическая Испания</span>
								<span class="duration">Продолжительность: около 8 часов</span>
							</div>
						</div>
						<div class="price">
							<span>от 46 $</span>
							<div class="order-button">
								<a href="#" data-toggle="modal" data-target="#order-popup">Заказать тур</a>
							</div>
						</div>
					</div>
				</article>
				<div class="modal fade" id="order-popup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					<div class="modal-dialog" role="document">
						<div class="order-popup-header">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/order-image.png" alt="order image" />
							<div class="order-info">
								<div class="order-title">
									Заказать тур "Музей Дали и замок Пуболь"
								</div>
								<div class="order-excerpt">Расширяющие сознание шедевры Сальвадора Дали</div>
								<div class="order-duration">Продолжительность: 10-12 часов</div>
							</div>
						</div>
						<div class="order-popup-form">
							<form>
								<input type="text" name="name" placeholder="Ваше имя *" class="required">
								<input type="text" name="email" placeholder="E-mail *" class="required">
								<input type="text" name="phone" placeholder="Телефон">
								<input type="text" name="message" placeholder="Сообщение">
							</form>
						</div>
						<div class="order-popup-buttons">
							<a href="#" class="cancel-button">Отмена</a>
							<a href="#" class="order-button">Заказать тур</a>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-sm-6 left">
				<article>
					<div class="article-common">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/article-image-1.png" alt="article image" />
						<div class="main-description">
							<div class="place">
								<div class="city">Барселона</div>
							</div>
							<div class="price">
								<span>от 70 $</span>
							</div>
						</div>
					</div>
					<div class="detailed-description">
						<div class="details">
							<span>Столица Каталонии</span>
							<span class="duration">Продолжительность: около 8 часов</span>
						</div>
						<div class="order-button">
							<a href="#" data-toggle="modal" data-target="#order-popup">Заказать</a>
						</div>
						<div class="more-button">
							<a href="<?php echo get_permalink(190); ?>">Подробнее</a>
						</div>
					</div>
				</article>
			</div>
			<div class="col-xs-12 col-sm-6 right">
				<article>
					<div class="article-common">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/article-image-2.png" alt="article image" />
						<div class="main-description">
							<div class="place">
								<div class="city">Монсеррат</div>
							</div>
							<div class="price">
								<span>от 62 $</span>
							</div>
						</div>
					</div>
					<div class="detailed-description">
						<div class="details">
							<span>Место силы христиан и язычников, красота природы</span>
							<span class="duration">Продолжительность: около 7 часов</span>
						</div>
						<div class="order-button">
							<a href="#" data-toggle="modal" data-target="#order-popup">Заказать</a>
						</div>
						<div class="more-button">
							<a href="#">Подробнее</a>
						</div>
					</div>
				</article>
			</div>
			<div class="col-xs-12 col-sm-6 left">
				<article>
					<div class="article-common">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/article-image-3.png" alt="article image" />
						<div class="main-description">
							<div class="place">
								<div class="city">Таррагона</div>
							</div>
							<div class="price">
								<span>от 37 $</span>
							</div>
						</div>
					</div>
					<div class="detailed-description">
						<div class="details">
							<span>Античная столица древнеримской Испании</span>
							<span class="duration">Продолжительность: около 4 часов</span>
						</div>
						<div class="order-button">
							<a href="#" data-toggle="modal" data-target="#order-popup">Заказать</a>
						</div>
						<div class="more-button">
							<a href="#">Подробнее</a>
						</div>
					</div>
				</article>
			</div>
			<div class="col-xs-12 col-sm-6 right">
				<article>
					<div class="article-common">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/article-image-4.png" alt="article image" />
						<div class="main-description">
							<div class="place">
								<div class="city">Монтбланк и Поблет</div>
							</div>
							<div class="price">
								<span>от 62 $</span>
							</div>
						</div>
					</div>
					<div class="detailed-description">
						<div class="details">
							<span>Великолепно сохранившийся средневековый город и гигантский монастырь</span>
							<span class="duration">Продолжительность: около 4 часов</span>
						</div>
						<div class="order-button">
							<a href="#" data-toggle="modal" data-target="#order-popup">Заказать</a>
						</div>
						<div class="more-button">
							<a href="#">Подробнее</a>
						</div>
					</div>
				</article>
			</div>
			<div class="col-xs-12 col-sm-6 left">
				<article>
					<div class="article-common">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/article-image-5.png" alt="article image" />
						<div class="main-description">
							<div class="place">
								<div class="city">Замок Миравет и пещеры Бенифайет</div>
							</div>
							<div class="price">
								<span>от 62 $</span>
							</div>
						</div>
					</div>
					<div class="detailed-description">
						<div class="details">
							<span>Столица Каталонии</span>
							<span class="duration">Продолжительность: около 7 часов</span>
						</div>
						<div class="order-button">
							<a href="#" data-toggle="modal" data-target="#order-popup">Заказать</a>
						</div>
						<div class="more-button">
							<a href="#">Подробнее</a>
						</div>
					</div>
				</article>
			</div>
			<div class="col-xs-12 col-sm-6 right">
				<article>
					<div class="article-common">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/article-image-6.png" alt="article image" />
						<div class="main-description">
							<div class="place">
								<div class="city">Жирона и Бесалу</div>
							</div>
							<div class="price">
								<span></span>
							</div>
						</div>
					</div>
					<div class="detailed-description">
						<div class="details">
							<span>Средневековые священные города адептов каббалы</span>
							<span class="duration">Продолжительность: около 10 часов</span>
						</div>
						<div class="order-button">
							<a href="#" data-toggle="modal" data-target="#order-popup">Заказать</a>
						</div>
						<div class="more-button">
							<a href="#">Подробнее</a>
						</div>
					</div>
				</article>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>
