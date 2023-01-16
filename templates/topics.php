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
            $postOffset = $paged * 5;
            $get_post_query = array(
                'post_type' => 'post',
                'orderby' => 'date',
                'order' => 'DESC',
                'posts_per_page' => 10,
                'paged' => (get_query_var('paged') ? get_query_var('paged') : 1),
            );
            $topics = new WP_Query($get_post_query);
            if ($topics->have_posts()):
                while ($topics->have_posts()):
                    $topics->the_post();
                    ?>
                    <li>
                        <span class="datepost"><?php echo get_the_date('Y/m/d', $topic); ?></span>
                        <span class="c-labellist">
                            <?php
                            $cats = get_the_category($topic);
                            foreach ($cats as $cat) {
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
                <?php endwhile; ?>
            <?php endif; ?>
        </ul>
        <div class="c-topicnav">
            <?php custom_pagination('', 2, $topics); ?>
        </div>
    </div>
</main>
<?php get_footer(); ?>