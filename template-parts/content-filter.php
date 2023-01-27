<?php

?>

<li>
    <span class="datepost"><?php echo get_the_date('Y/m/d'); ?></span>
    <span class="c-labellist">
        <?php
        $cats = get_the_category($post);
        foreach ($cats as $cat) {
            if ($cat->cat_name != 'サービス' || $cat->cat_name != 'Uncategorized') {
        ?>
                <a href="<?php echo get_category_link($cat->term_id); ?>" class="c-label">
                    <?php echo $cat->cat_name; ?>
                </a>
        <?php }
        } ?>
    </span>
    <a href="<?php echo get_permalink($post->ID); ?>">
        <?php the_title(); ?>
    </a>
</li>