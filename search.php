<?php get_header(); ?>
<main class="p-topics">
    <div class="c-title c-title--page">
        <h1>SEARCH RESULTS</h1>
    </div>
    <div class="l-container">
        <ul class="c-listpost">
            <?php if (have_posts() && $_GET['s'] != ''):
                while (have_posts()):
                    the_post(); ?>
                    <li>
                        <span class="datepost"><?php echo get_the_date('Y/m/d'); ?></span>
                        <?php $cat = get_the_category();
                            foreach ($cat as $cd) {
                        ?>
                             <a href="<?php echo get_category_link($cd->term_id); ?>" class="c-label"> <?php echo $cd->cat_name; ?></a>
                            <?php } ?>
                        <a href="<?php echo get_permalink($post->ID) ?>"><?php echo get_the_title() ?></a>
                    </li>
                <?php endwhile; ?>
            <?php else: ?>
                <a href="">Nothing found</a>
            <?php endif; ?>
        </ul>
        <div class="c-pnav">
        <?php the_posts_pagination( array(
            'mid_size'  => 4,
            'prev_text' => __( '', 'textdomain' ),
            'next_text' => __( '', 'textdomain' ),
            )); ?>
        </div>
    </div>
</main>
<?php get_footer(); ?>