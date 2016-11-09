<?php get_header(); ?>

<div class="articles-grid">
	<div class="container">
		<div class="row">
			<div class="modal fade" id="order-popup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
					<div class="order-popup-header">
						<div class="order-image"></div>
						<div class="order-info">
							<div class="order-title"></div>
							<div class="order-excerpt"></div>
							<div class="order-duration"></div>
						</div>
					</div>
					<?php echo do_shortcode('[contact-form-7 id="218" title="Order tour"]'); ?>
				</div>
			</div>
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
					<?php
						$link = get_the_permalink();
						$title = get_the_title();
						$excerpt = get_the_excerpt();
						$thumbnail = get_the_post_thumbnail();
						$thumbnail_url = get_the_post_thumbnail_url();
						$duration = get_field('duration');
					?>
					<div class="col-xs-12">
						<article class="main-article">
							<a href="<?php echo $link; ?>" title="<?php echo $title; ?>" class="article-card">
								<?php if ($thumbnail_url) : echo $thumbnail; endif;?>
							</a>
							<div class="description">
								<div class="place col-xs-6 pull-left">
									<div class="city">
										<a href="<?php echo $link; ?>" title="<?php echo $title; ?>" class="article-card">
											<?php echo $title; ?>
										</a>
									</div>
									<div class="details">
										<span class="excerpt"></span>
										<span class="duration">Продолжительность: <?php echo $duration ?></span>
									</div>
								</div>
								<div class="price col-xs-6">
									<span class="pull-right"><?php echo 'от ' . get_lowest_tour_price(get_the_ID()) . ' $'; ?></span>
									<div class="clearfix"></div>
									<a href="#" class="order-button pull-right"
									   data-toggle="modal"
									   data-link="<?php echo $link; ?>"
									   data-target="#order-popup"
									   data-thumbnail="<?php if ($thumbnail_url) : echo $thumbnail_url; endif; ?>"
									   data-excerpt="<?php echo $excerpt; ?>"
									   data-duration="<?php echo $duration; ?>"
									   data-title="<?php echo $title; ?>">Заказать тур</a>
								</div>
							</div>
						</article>
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
			while ($tours_query->have_posts()) : $tours_query->the_post(); ?>
				<?php
					$curPostNum++;
					$link = get_the_permalink();
					$title = get_the_title();
					$excerpt = get_the_excerpt();
					$thumbnail = get_the_post_thumbnail();
					$thumbnail_url = get_the_post_thumbnail_url();
					$duration = get_field('duration');
				?>
				<div class="col-xs-12 col-sm-6 <?php echo ($curPostNum % 2 == 0 ? 'right' : 'left'); ?>">
					<article>
						<div class="article-common">
							<a href="<?php echo $link; ?>" title="<?php echo $title; ?>" class="article-card">
								<?php if ($thumbnail_url) : echo $thumbnail; endif;?>
							</a>
							<div class="main-description">
								<div class="place col-xs-6 pull-left">
									<div class="city">
										<a href="<?php echo $link; ?>" title="<?php echo $title; ?>" class="article-card">
											<?php echo $title; ?>
										</a>
									</div>
								</div>
								<div class="price col-xs-6">
									<span class="pull-right"><?php echo 'от ' . get_lowest_tour_price(get_the_ID()) . ' $'; ?></span>
								</div>
							</div>
						</div>
						<div class="detailed-description">
							<div class="details">
								<span class="excerpt"><?php echo $excerpt; ?></span>
								<span class="duration">Продолжительность: <?php echo $duration ?></span>
							</div>
							<a href="#" class="order-button"
							   data-toggle="modal"
							   data-target="#order-popup"
							   data-link="<?php echo $link; ?>"
							   data-thumbnail="<?php if ($thumbnail_url) : echo $thumbnail_url; endif; ?>"
							   data-excerpt="<?php echo $excerpt; ?>"
							   data-duration="<?php echo $duration; ?>"
							   data-title="<?php echo $title; ?>">Заказать тур</a>
							<div class="more-button">
								<a href="<?php echo $link; ?>">Подробнее</a>
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
