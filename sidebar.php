<div class="l-sidebar">
    <div class="c-widget">
        <h3 class="c-widget__title">Search</h3>
        <div class="c-search">
            <?php get_search_form(); ?>
        </div>
    </div>
    <div class="c-widget">
        <h3 class="c-widget__title">Category</h3>
        <ul class="c-list">
            <?php wp_list_categories(array('title_li' => '', 'hide_empty' => 0)); ?>
        </ul>
    </div>
    <div class="c-widget">
        <h3 class="c-widget__title">Archive</h3>
        <ul class="c-list">
            <?php wp_get_archives(array('type' => 'yearly', 'after' => '年')); ?>
        </ul>
    </div>
</div>