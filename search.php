<?php get_header(); ?>
<main class="p-topics">
    <div class="c-title c-title--page">
        <h1>SEARCH RESULTS</h1>
    </div>
    <div class="l-container">
        <?php echo $wp_query->found_posts; ?>

        <ul class="c-listpost">
            <li>
                <span class="datepost">2018/08/27</span>
                <a href="cat.html" class="c-label">特集記事</a>
                <a href="post.html">新しい権利　配偶者終身居住権</a>
            </li>
            <li>
                <span class="datepost">2018/08/22</span>
                <a href="cat.html" class="c-label">デイリーニュース</a>
                <a href="post.html">介護保険の被保険者</a>
            </li>
            <li>
                <span class="datepost">2018/07/07</span>
                <a href="cat.html" class="c-label">デイリーニュース</a>
                <a href="post.html">自然災害と中小企業支援策</a>
            </li>
            <li>
                <span class="datepost">2018/06/20</span>
                <a href="cat.html" class="c-label">特集記事</a>
                <a href="post.html">国税庁レポートから読み解く2018年度の重点事項</a>
            </li>
            <li>
                <span class="datepost">2018/05/20</span>
                <a href="cat.html" class="c-label">事務所ニュース</a>
                <a href="post.html">働き方改革”と管理者</a>
            </li>
            <li>
                <span class="datepost">2018/04/30</span>
                <a href="cat.html" class="c-label">事務所ニュース</a>
                <a href="post.html">働き方改革”と管理者</a>
            </li>
            <li>
                <span class="datepost">2018/04/20</span>
                <a href="cat.html" class="c-label">事務所ニュース</a>
                <a href="post.html">働き方改革”と管理者</a>
            </li>
            <li>
                <span class="datepost">2018/03/23</span>
                <a href="cat.html" class="c-label">事務所ニュース</a>
                <a href="post.html">働き方改革”と管理者</a>
            </li>
            <li>
                <span class="datepost">2018/02/20</span>
                <a href="cat.html" class="c-label">事務所ニュース</a>
                <a href="post.html">働き方改革”と管理者</a>
            </li>
            <li>
                <span class="datepost">2018/01/20</span>
                <a href="cat.html" class="c-label">事務所ニュース</a>
                <a href="post.html">働き方改革”と管理者</a>
            </li>
        </ul>

        <div class="c-pnav">
            <a href="" class="prev"></a>
            <a href="" class="current">1</a>
            <a href="">2</a>
            <a href="">3</a>
            <a href="">4</a>
            <a href="" class="next"></a>
        </div>
    </div>
</main>
<?php get_footer(); ?>