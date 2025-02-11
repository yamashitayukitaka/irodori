<?php get_header(); ?>
  <main class = "l-content--large p-news">
    
    <ul class = "p-bread__list  u-pt40">
      <li class = "p-bread__list__item"><a href = "<?php echo esc_url (home_url('') ); ?>" class = "p-bread__list__link">ホーム</a><span class = "p-bread__list__arrow">></span></li>
      <li class = "p-bread__list__item">お知らせ</li>
    </ul>

    <h2 class = "c-title--page u-alignCenter u-mb100 u-pt20 js-up u-opacity">News</h2>
    <section class = "p-news__flex">
      <section class = "p-news__content js-up u-opacity">
        <?php
            $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1; //get_query_var('paged')で現在表示されているページ番号を取得する。
            $args = array(
            'post_type' => 'news',
            'posts_per_page' =>5,
            'paged'=>$paged,//get_query_varで得られた現在表示されているページ番号を渡す。この部分は、ページネーションが正しく機能するために非常に重要です。get_query_var('paged') で取得した値を 'paged' => $paged としてクエリに設定することで、正しいページが表示されるようになります。
            'order' => 'DESC',
            );?>

          <?php $newsLoop = new WP_Query($args);?>
          <?php if ($newsLoop->have_posts()): ?>

            <?php while ($newsLoop->have_posts()) : $newsLoop->the_post();?>
            <a href = "<?php the_permalink(); ?>">
            <div class = "p-news__title__wrap">
              <date class = "p-news__date">
                  <?php echo get_the_date('y/m/d'); ?>
                </date>
                <h3 class = "p-news__title">
                  <?php the_title(); ?>
                </h3>
            </div>
            </a>
            <?php endwhile;
          endif;
        wp_reset_postdata();?>
      </section>
      <section class = "p-news__search js-up u-opacity">
        <p class = "p-blog__search__name">
          アーカイブ
        </p>
        <div class = "p-blog__search__linkWrap"> 
          <?php wp_get_archives(array(
            //これらの設定によりarcive-$posttype.phpで月別アーカイブを表示することが可能になる。
              'type' => 'monthly',
              'format' => 'custom',
              'show_post_count' => true,
              'echo' => 1,
              'post_type' => 'news',
              'post_status' => 'publish',
              'before' => '<p class="p-blog__search__link">',
              'after' => '</p>',
          )); ?>
        </div>
      </section>
    </section>
    <div class = "l-content--middle p-blog__pagination">
      <?php the_posts_pagination(); ?>
    </div>
    <a href = "<?php echo esc_url (home_url('') ); ?>" class = "c-button--jp js-up u-opacity">
      ホームに戻る
    </a>
  </main>
<?php get_footer(); ?>

