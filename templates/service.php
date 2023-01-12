<?php
/*
Template Name: Service
*/
get_header();

?>
<main class="p-service">
    <div class="l-container">
        <div class="c-title c-title--page">
            <h1>
                <?php echo get_the_title(44); ?>
            </h1>
        </div>
        <div class="p-service__top">
            <p class="c-label"> <?php echo get_field('label'); ?></p>
            <p class="label_content">
                <?php echo get_field('content'); ?>
            </p>

            <p class="note">
                <?php the_field('note'); ?>
            </p>
        </div>

        <div class="p-service__content">
            <div class="c-service">
                <h2 class="c-service__title"><span class="c-label c-label--white">Smile Service 1</span></h2>
                <p>自社の経理事務に時間とコストをかけすぎているとお感じなら、<br />
                    経理業務をアウトソーシングしてコストを抑えませんか。<br />
                    日々の記帳代行や給与計算から試算表や決算書の作成まで、<br />
                    税務・会計のプロである私たちがトータルでサポートいたします。</p>
            </div>

            <div class="c-service">
                <h2 class="c-service__title"><span class="c-label c-label--white">Smile Service 2</span></h2>
                <p>経営を強化する近道は、数字に強くなること。<br />
                    成長する会社、永続する会社になるために、決算書をもとに<br />
                    現状を正確に把握しましょう。そのうえでリスクを予測し、自社の強みを<br />
                    生かせる戦略アイデアを出して、利益の確保をいっしょに考えます。</p>
            </div>

            <div class="c-service">
                <h2 class="c-service__title"><span class="c-label c-label--white">Smile Service 3</span></h2>
                <p>人の活性化・定着化にお悩みの場合も、私たちにご相談ください。<br />
                    人事労務の視点と、税務会計の視点とを組み合わせ、<br />
                    人材や社内体制などの問題を解決。<br />
                    組織改善や企業文化づくりをサポートしていきます。</p>
            </div>

            <div class="c-service">
                <h2 class="c-service__title"><span class="c-label c-label--white">Smile Service 4</span></h2>
                <p>専門家とのネットワークを駆使して相続や贈与を<br />
                    スムーズにするお手伝いをします。大きな課税対象となる不動産は、<br />
                    評価額によって納税額に大きな差が出るもの。相続税・贈与税申告の実績が<br />
                    豊富な私たちなら、お客様の不安を安心に変えていきます。</p>
            </div>

            <div class="c-service">
                <h2 class="c-service__title"><span class="c-label c-label--white">Smile Service 5</span></h2>
                <p>専門家とのネットワークを駆使して相続や贈与を<br />
                    スムーズにするお手伝いをします。大きな課税対象となる不動産は、<br />
                    評価額によって納税額に大きな差が出るもの。相続税・贈与税申告の実績が<br />
                    豊富な私たちなら、お客様の不安を安心に変えていきます。</p>
            </div>
        </div>
    </div>
</main>
<?php get_footer(); ?>