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
								if ($cat->cat_name != '未分類') {
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
			<div class="c-access">
				<div class="c-access__info">
					<h3 class="c-title c-title--sub">本店</h3>
					<p class="address">〒210-0005　川崎市川崎区東田町8 パレール三井ビル8階</p>
					<p class="time">JR川崎駅東口より徒歩7分　京急川崎駅より徒歩5分</p>
					<br />
					<p>
						<span class="tel">tel : 044-233-2811</span>
						<span class="fax">fax : 044-233-0818</span>
						<br />
						<span class="email">mail : info@wms.or.jp</span>
					</p>
				</div>
				<div class="c-access__img">
					<img src="<?php echo esc_url($access['map1']['url']); ?>"
						alt="<?php echo esc_attr($access['map1']['alt']); ?>" />
				</div>
			</div>
			<div class="c-access">
				<div class="c-access__info">
					<h3 class="c-title c-title--sub">相模原支店</h3>
					<p class="address">〒252-0231　相模原市中央区相模原3-8-25 第3JSビル7階</p>
					<p class="time">JR横浜線相模原駅より徒歩2分</p>
					<br />
					<p>
						<span class="tel">tel : 042-704-9581</span>
						<span class="fax">fax : 042-704-9582</span>
						<br />
						<span class="email"></span>
					</p>
				</div>
				<div class="c-access__img">
					<img src="<?php echo esc_url($access['map2']['url']); ?>"
						alt="<?php echo esc_attr($access['map2']['alt']); ?>" />
				</div>
			</div>
		<?php endif; ?>



		<!-- </div> -->
	</div>
</main>

<?php get_footer(); ?>