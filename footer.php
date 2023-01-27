<footer class="c-footer">
	<div class="c-footer__logo">
		<div class="l-container">
			<?php
			$logo = get_field('flogo', 'option');
			if ($logo): ?>
					<a href="<?php echo esc_url($logo['link']['url']); ?>">
						<img src="<?php echo esc_url($logo['logo']['url']); ?>"
							alt="<?php echo esc_attr($logo['logo']['alt']); ?>" />
					</a>
			<?php endif; ?>
		</div>
	</div>

	<div class="c-footer__link">
		<div class="l-container">
			<?php basic_footermenu('footer'); ?>
		</div>
	</div>

	<div class="c-copyright">
		<div class="l-container">
			<p>Copyright 2015 Shimodaira Tax Accounting Office All Right Reserved.</p>
		</div>
	</div>
</footer>
<?php wp_footer(); ?>
</body>
</html>