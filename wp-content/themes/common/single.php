<?php get_header(); ?>

<?php if (have_posts()): the_post(); ?>
<main>
	<div class="container">
		<div class="row">
			<div class="news-content">
				<div class="col-sm-9 news-list">
					<div class="row">
						<div class="col-sm-12">
							<article>
								<?php the_post_thumbnail('full', array('class' => 'img-responsive center-block')); ?>
								<h2><?php the_title(); ?></h2>
								<p><span><?php echo get_the_date('M j, Y H:m'); ?></span></p>

								<?php the_content(); ?>
							</article>
							<div class="social-box">
							  <a class="btn btn-social-icon btn-facebook">
								<span class="fa fa-facebook"></span>
							  </a>
							  <a class="btn btn-social-icon btn-twitter">
								<span class="fa fa-twitter"></span>
							  </a>
							  <a class="btn btn-social-icon btn-linkedin">
								<span class="fa fa-linkedin"></span>
							  </a>
							  <span class="text">Share</span>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-3">
					<?php get_sidebar(); ?>
				</div>
			</div>
		</div>
	</div>
</main>
<?php endif; ?>

<?php get_footer(); ?>
