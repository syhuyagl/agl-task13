<?php get_header(); ?>
<div class="c-mainvisual">
	<div class="l-container">
		<div class="c-mainvisual__inner js-slider">
			<?php
			$images = get_field('group');
			if ($images): ?>
				<?php foreach ($images as $image): ?>
					<a href="<?php echo esc_url($image['link']['url']); ?>">
						<img src="<?php echo esc_url($image['img']['url']); ?>"
							alt="<?php echo esc_attr($image['img']['alt']); ?>" />
					</a>
				<?php endforeach; ?>
			<?php endif; ?>
		</div>
	</div>
</div>
</div>

<main>
	<div class="l-container">
		<div class="c-grouplink">
			<?php
			$grouplinks = get_field('grouplink');
			if ($grouplinks): ?>
				<?php foreach ($grouplinks as $grouplink): ?>
					<a href="<?php echo esc_url($grouplink['link']['url']); ?>">
						<img src="<?php echo esc_url($grouplink['img']['url']); ?>"
							alt="<?php echo esc_attr($grouplink['img']['alt']); ?>" class="js-imglink" />
					</a>
				<?php endforeach; ?>
			<?php endif; ?>
		</div>

		<div class="p-topics">
			<h2 class="c-title">Topics</h2>
			<ul class="c-listpost">
				<?php
				$topics = get_posts(array('orderby' => 'ID', 'order' => 'ASC')); foreach ($topics as $topic):
					setup_postdata($topic);
					?>
					<li>
						<span class="datepost"><?php echo get_the_date('Y/m/d', $topic); ?></span>
						<span class="c-labellist">
							<?php
							$cats = get_the_category($topic); foreach ($cats as $cat) {
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
				<a href="topics.html" class="c-btn c-btn--small">一覧を見る</a>
			</div>
		</div>

		<div class="c-grouplink">
			<?php
			$grouplinks = get_field('grouplink2');
			if ($grouplinks): ?>
				<?php foreach ($grouplinks as $grouplink): ?>
					<a href="<?php echo esc_url($grouplink['link']['url']); ?>">
						<img src="<?php echo esc_url($grouplink['img']['url']); ?>"
							alt="<?php echo esc_attr($grouplink['img']['alt']); ?>" class="js-imglink" />
					</a>
				<?php endforeach; ?>
			<?php endif; ?>
		</div>

		<!-- <div class="c-access"> -->
		<?php
		$access = get_field('access');
		if ($access): ?>
			<?php foreach ($access as $item): ?>
				<div class="c-access">
				<div class="c-access__info">
					<h3 class="c-title c-title--sub"><?php echo $item['title_map']; ?></h3>
					<p class="address"><?php echo $item['address']; ?></p>
					<p class="time"><?php echo $item['time']; ?></p>
					<br />
					<p>
						<span class="tel">tel : <?php echo $item['tel']; ?></span>
						<span class="fax">fax : <?php echo $item['fax']; ?></span>
						<br />
						<span class="email"><?php echo $item['email']; ?></span>
					</p>
				</div>
				<div class="c-access__img">
					<img src="<?php echo esc_url($item['image_map']['url']); ?>"
						alt="<?php echo esc_url($item['image_map']['alt']); ?>" />
				</div>
			</div>
			<?php endforeach; ?>
		<?php endif; ?>



		<!-- </div> -->
	</div>
</main>

<?php get_footer(); ?>