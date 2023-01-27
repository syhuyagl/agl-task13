<?php get_header(); ?>
<div class="c-mainvisual">
	<div class="l-container">
		<div class="c-mainvisual__inner js-slider">
			<?php
			$images = get_field('group');
			if ($images) : ?>
				<?php foreach ($images as $image) : ?>
					<a href="<?php echo esc_url($image['link']['url']); ?>">
						<img src="<?php echo esc_url($image['img']['url']); ?>" alt="<?php echo esc_attr($image['img']['alt']); ?>" />
					</a>
				<?php endforeach; ?>
			<?php endif; ?>
		</div>
	</div>
</div>
<main>
	<div class="l-container">
		<div class="c-grouplink">
			<a href="#"><img src="<?php echo get_template_directory_uri(); ?>/img/img_01_no.png" alt="Basic Wordpress" class="js-imglink"></a>
			<a href="#"><img src="<?php echo get_template_directory_uri(); ?>/img/img_02_no.png" alt="Basic Wordpress" class="js-imglink"></a>
			<a href="#"><img src="<?php echo get_template_directory_uri(); ?>/img/img_03_no.png" alt="Basic Wordpress" class="js-imglink"></a>
		</div>

		<div class="p-topics">
			<h2 class="c-title">Topics</h2>
			<div class="c-select">
				<select id="select" data-url="<?php echo admin_url('admin-ajax.php') ?>">
					<?php $categories = get_categories();
					?>
					<option value="0">All</option>
					<?php foreach ($categories as $category) : ?>
						<option value="<?= $category->term_id; ?>"><?= $category->name; ?></option>
					<?php endforeach; ?>
				</select>
			</div>
			<ul class="c-listpost">
				<?php
				$topics = get_posts(array('orderby' => 'date', 'order' => 'DESC'));
				foreach ($topics as $topic) :
					setup_postdata($topic);
				?>
					<li>
						<span class="datepost"><?php echo get_the_date('Y/m/d', $topic); ?></span>
						<span class="c-labellist">
							<?php
							$cats = get_the_category($topic);
							foreach ($cats as $cat) {
								if ($cat->cat_name != 'サービス' || $cat->cat_name != 'Uncategorized') {
							?>
									<a href="<?php echo get_category_link($cat->term_id); ?>" class="c-label">
										<?php echo $cat->cat_name; ?>
									</a>
							<?php }
							} ?>
						</span>
						<a href="<?php echo get_permalink($topic->ID); ?>">
							<?php echo get_the_title($topic->ID); ?>
						</a>
					</li>
				<?php endforeach; ?>
			</ul>

			<div class="l-btn">
				<a href="<?php echo get_site_url(); ?>/topics" class="c-btn c-btn--small">一覧を見る</a>
			</div>
		</div>

		<div class="c-grouplink">
			<a href="#"><img src="<?php echo get_template_directory_uri(); ?>/img/btn_03_no.png" alt="所員紹介" class="js-imglink"></a>
			<a href="#"><img src="<?php echo get_template_directory_uri(); ?>/img/btn_04_no.png" alt="事務所案内" class="js-imglink"></a>
		</div>

		<!-- <div class="c-access"> -->
		<?php
		$access = get_field('access');
		if ($access) : ?>
			<?php foreach ($access as $item) : ?>
				<div class="c-access">
					<div class="c-access__info">
						<h3 class="c-title c-title--sub">
							<?php echo $item['title_map']; ?>
						</h3>
						<p class="address"><?php echo $item['address']; ?></p>
						<p class="time">
							<?php echo $item['time']; ?>
						</p>
						<br />
						<p>
							<?php if ($item['tel']) : ?>
								<span class="tel">tel : <?php echo $item['tel']; ?></span>
							<?php endif; ?>
							<?php if ($item['fax']) : ?>
								<span class="fax">fax : <?php echo $item['fax']; ?></span>
							<?php endif; ?>
							<br />
							<?php if ($item['email']) : ?>
								<span class="email">
									mail : <?php echo $item['email']; ?>
								</span>
							<?php endif; ?>
						</p>
					</div>
					<div class="c-access__img">
						<img src="<?php echo esc_url($item['image_map']['url']); ?>" alt="<?php echo esc_url($item['image_map']['alt']); ?>" />
					</div>
				</div>
			<?php endforeach; ?>
		<?php endif; ?>



		<!-- </div> -->
	</div>
</main>

<?php get_footer(); ?>