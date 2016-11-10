<?php get_header(); ?>
<div class="blog-entry">
	<div class="container">
		<div class="row">
			<?php if (catalonia_have_posts()): the_post(); ?>
				<div class="col-xs-12">
					<div class="entry-body">
						<div class="entry-main">
							<?php the_post_thumbnail('full', array('class' => 'img-responsive center-block')); ?>
							<div class="description">
								<div class="title"><?php the_title(); ?></div>
								<div class="date"><?php echo get_the_date('j F Y, H:m'); ?></div>
							</div>
						</div>
						<div class="entry-content">
							<?php the_content(); ?>
						</div>
						<div class="entry-comments">
							<div class="comments-header">Комментарии</div>
							<?php comments_template( '', true ); ?>
						</div>
					</div>
				</div>
			<?php endif; ?>
		</div>
	</div>
	<div class="related-entries">
		<div class="container">
			<div class="row">
				<div class="related-header">Также интересное в <a href="<?php echo get_category_link(get_category_by_slug('uncategorized')); ?>" title="Блоге">блоге</a></div>
				<?php $related_query = new WP_Query(array(
						'posts_per_page' => 2,
						'post__not_in' => array(get_the_ID()),
					));
				?>
				<?php while (catalonia_have_posts($related_query)) : $related_query->the_post(); ?>
					<?php
						$type = get_field('select_post_type', get_the_ID());
						$text = ($type == 'post') ? 'Читать' : 'Смотреть';
					?>
					<div class="col-xs-12 col-sm-6">
						<article>
							<a class="blog-post-entry" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
								<img src="<?php the_post_thumbnail_url('large'); ?>" alt="blog image" />
								<div class="info-block">
									<div class="blog-title"><?php the_title(); ?></div>
									<div class="blog-info">
										<span class="date"><?php echo get_the_date('j F Y'); ?></span>
										<!-- span class="comments"> | 4 комментария</span-->
									</div>
									<div class="blog-excerpt"><?php the_excerpt(); ?></div>
									<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="read-button"><?php echo $text; ?></a>
								</div>
							</a>
						</article>
					</div>
 				<?php endwhile; ?>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>
