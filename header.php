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
					$logos = get_field('logo');
					if ($logos): ?>
						<?php foreach ($logos as $logo): ?>
							<a href="<?php echo esc_url($logo['link']['url']); ?>">
								<img src="<?php echo esc_url($logo['img']['url']); ?>"
									alt="<?php echo esc_attr($logo['img']['alt']); ?>" />
							</a>
						<?php endforeach; ?>
					<?php endif; ?>
				</div>
				<div class="contact">
					<?php
					$head_left = get_field('head_left');
					if ($head_left): ?>
						<img src="<?php echo esc_url($head_left['tel']['url']); ?>"
							alt="<?php echo esc_attr($head_left['tel']['alt']); ?>" />
						<br>
						<img src="<?php echo esc_url($head_left['con']['url']); ?>"
							alt="<?php echo esc_attr($head_left['con']['alt']); ?>" class="js-imglink" />
					<?php endif; ?>
				</div>
			</div>
			<?php basic_menu('primary'); ?>
		</div>
	</header>