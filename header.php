<!DOCTYPE html>
<html lang="ja">

<head>
	<meta charset="utf-8">
	<title>Home | Tranning Wordpress</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js"></script>
	<?php wp_head(); ?>
</head>

<body>
	<header class="c-header">
		<div class="l-container">
			<div class="c-header__top">
				<div class="logo">
					<?php
					$logo = get_field('logo','option');
					if ($logo): ?>
						<a href="<?php echo esc_url($logo['link']['url']); ?>">
							<img src="<?php echo esc_url($logo['logo']['url']); ?>"
								alt="<?php echo esc_attr($logo['logo']['alt']); ?>" />
						</a>
					<?php endif; ?>
				</div>
				<div class="contact">
					<?php
					$head_right = get_field('right','option');
					if ($head_right): ?>
						<img src="<?php echo esc_url($head_right['img1']['url']); ?>"
							alt="<?php echo esc_attr($head_right['img1']['alt']); ?>" />
						<br>
						<img src="<?php echo esc_url($head_right['img2']['url']); ?>"
							alt="<?php echo esc_attr($head_right['img2']['alt']); ?>" class="js-imglink" />
					<?php endif; ?>
				</div>
			</div>
			<?php basic_menu('primary'); ?>
		</div>
	</header>