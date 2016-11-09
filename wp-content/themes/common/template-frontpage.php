<?php get_header(); ?>

<div class="articles-grid">
	<div class="container">
		<div class="row">
			<?php
			$sticky_posts = get_option('sticky_posts');
			$sticky_args = array(
				'post_type' => 'tours',
				'posts_per_page' => 1,
				'post__in'  => [$sticky_posts[0]],
				'ignore_sticky_posts' => 1
			);
			$sticky_query = new WP_Query($sticky_args);
			if ($sticky_query->have_posts()) : ?>
				<?php while ($sticky_query->have_posts()) : $sticky_query->the_post(); ?>
					<div class="col-xs-12">
						<article class="main-article">
							<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="article-card">
								<?php if (has_post_thumbnail()) : the_post_thumbnail(); endif;?>
							</a>
								<div class="description">
									<div class="place">
										<div class="city">
											<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="article-card">
												<?php the_title(); ?>
											</a>
										</div>
										<div class="details">
											<span><?php the_excerpt(); ?></span>
											<span class="duration">Продолжительность: <?php the_field('duration'); ?></span>
										</div>
									</div>
									<div class="price">
										<span><?php echo 'от ' . get_lowest_tour_price(get_the_ID()) . ' $'; ?></span>
										<div class="order-button">
											<a href="#" data-toggle="modal" data-target="#order-popup">Заказать тур</a>
										</div>
									</div>
								</div>
						</article>
						<div class="modal fade" id="order-popup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
							<div class="modal-dialog" role="document">
								<div class="order-popup-header">
									<img src="assets/img/order-image.png" alt="order image" />
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
					<?php endwhile; ?>
			<?php endif; ?>

			<?php
			$args = [
				'post_type' => 'tours',
				'orderby'   => 'menu_order',
				'order'     => 'ASC',
				'post__not_in' => [$sticky_posts[0]],
				'ignore_sticky_posts' => 1
			];
			$tours_query = new WP_Query($args);
			$curPostNum = 0;
			while ($tours_query->have_posts()) : $tours_query->the_post(); $curPostNum++; ?>
				<div class="col-xs-12 col-sm-6 <?php echo ($curPostNum % 2 == 0 ? 'right' : 'left'); ?>">
					<article>
						<div class="article-common">
							<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="article-card">
								<?php if (has_post_thumbnail()) : the_post_thumbnail(); endif;?>
							</a>
							<div class="main-description">
								<div class="place">
									<div class="city">
										<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="article-card">
											<?php the_title(); ?>
										</a>
									</div>
								</div>
								<div class="price">
									<span><?php echo 'от ' . get_lowest_tour_price(get_the_ID()) . ' $'; ?></span>
								</div>
							</div>
						</div>
						<div class="detailed-description">
							<div class="details">
								<span><?php the_excerpt(); ?></span>
								<span class="duration">Продолжительность: <?php the_field('duration'); ?></span>
							</div>
							<div class="order-button">
								<a href="#" data-toggle="modal" data-target="#order-popup">Заказать</a>
							</div>
							<div class="more-button">
								<a href="<?php the_permalink(); ?>">Подробнее</a>
							</div>
						</div>
					</article>
				</div>
				<?php if($curPostNum % 2 == 0) : ?>
					<div class="clearfix"></div>
				<?php endif ?>
			<?php endwhile; ?>
		</div>
	</div>
</div>
<?php get_footer(); ?>
