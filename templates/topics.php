<?php
/*
Template Name: Topics
*/
?>
<?php get_header(); ?>
<main class="p-topics">
    <div class="c-title c-title--page">
        <h1>TOPICS</h1>
    </div>
    <div class="l-container">
        <ul class="c-listpost">
            <?php
            $topics = get_posts(array('orderby' => 'date', 'order' => 'DESC', 'numberposts' => 10, ));
            foreach ($topics as $topic):
                setup_postdata($topic);
                ?>
                <li>
                    <span class="datepost"><?php echo get_the_date('Y/m/d', $topic); ?></span>
                    <span class="c-labellist">
                        <?php
                        $cats = get_the_category($topic); foreach ($cats as $cat) {
                            if ($cat->cat_name != 'サービス') {
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
        </ul>
        <div class="c-pnav">
            <?php the_posts_pagination(
                array(
                    'mid_size' => 4,
                    'prev_text' => __('', 'textdomain'),
                    'next_text' => __('', 'textdomain'),
                )
            ); ?>
        </div>
    </div>
</main>
<?php get_footer(); ?>