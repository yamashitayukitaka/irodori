<?php get_header(); 
?>
<main class = "p-blog">
  <div class = "c-mainVisualPage u-mb120">
      <div class = "c-mainVisualPage__txtWrap">
        <h2 class = "c-title--page u-mb50">
          ブログ
        </h2>
       
      </div>
      <figure class = "c-mainVisualPage__imgWrap">
        <img src = "<?php echo get_template_directory_uri(); ?>/dist/img/common/archive03.jpg" alt = "メインビジュアル">
      </figure>
    </div>
  </div>
  <ul class = "p-bread__list l-content--middle">
    <li class = "p-bread__list__item"><a href = "<?php echo esc_url (home_url('') ); ?>" class = "p-bread__list__link">ホーム</a><span class = "p-bread__list__arrow">></span></li>
    <li class = "p-bread__list__item">ブログ</li>
  </ul>
  <div class = "l-content--middle p-blog__list__wrap">
    <ul class = "p-blog__list">
      <?php
        $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;//get_query_var('paged')で現在表示されているページ番号を取得する。
        $blogs = array(
        'post_type' => 'blog',
        'posts_per_page' => 5,
        'orderby' => 'date',
        'paged'=>$paged,//get_query_varで得られた現在表示されているページ番号を渡す。この部分は、ページネーションが正しく機能するために非常に重要です。get_query_var('paged') で取得した値を 'paged' => $paged としてクエリに設定することで、正しいページが表示されるようになります。
        'order' => 'DESC',
        );?>

      <?php $blogLoop = new WP_Query($blogs);?>
        <?php if ($blogLoop->have_posts()): ?>
          <?php while ($blogLoop->have_posts()) : $blogLoop->the_post();?>
          <li class = "p-blog__item js-up u-opacity">
              <a href = "<?php the_permalink(); ?>" class = "p-blog__item__link c-overlay__img__wrap c-overlay">
                <figure class = "p-blog__item__img c-overlay__img">
                  <?php the_post_thumbnail();?>
                </figure>
              </a>
              <div class = "p-blog__item__content">
                <deta class = "p-blog__item__deta"><?php echo get_the_date('m/d'); ?></deta>
                <p class = "p-blog__item__tag">
                  <?php
                    $tags = get_the_tags( get_the_ID() );
                    if ( $tags ) {
                        foreach ( $tags as $tag ) {
                          echo $tag->name; // リンクなしでタグを出力
                      }
                    }
                  ?>
                </p>
                <h3 class = "p-blog__item__ttl"><?php the_title(); ?></h3>
                <p class = "p-blog__item__txt">
                  <?php the_excerpt(10); ?>
                <p>
              </div>
            
          </li>
        
      <?php endwhile;
        endif;
      wp_reset_postdata();?>
      
    </ul>

    <section class = "p-blog__search">

      <p class = "p-blog__search__name">
        キーワード検索
      </p>
      <div class ="p-blog__search__linkWrap">
        <?php get_search_form();?>
      </div>

      <p class = "p-blog__search__name">
        最新記事
      </p>
      <div class ="p-blog__search__linkWrap">
        <?php
          $args = array(
          'post_type' => 'blog',
          'posts_per_page' => 4,
          'orderby' => 'date', // 投稿を日付で並べ替えます。
          'order' => 'DESC', // 降順に並べ替えます（新しい順）。
          );?>
          <?php $blogLoop = new WP_Query($args);?>
          <?php if ($blogLoop->have_posts()): ?>
          <?php while ($blogLoop->have_posts()) : $blogLoop->the_post();?>
          <a href = "<?php the_permalink(); ?>">
          <?php the_title(); ?>
          </a>
        <?php endwhile;
        endif;
        wp_reset_postdata();?>
      </div>

      <p class = "p-blog__search__name">
        カテゴリ
      </p>
      <div class ="p-blog__search__linkWrap">
        <?php $blogtypes = get_terms('blog-type',
        [
        'hide_empty' => false,
        'orderby'=>'id',
        'order'=>'ASC',
        ]
        );?>
        <?php foreach ( $blogtypes as $blogtype ) :?>
          <a href = "<?php echo esc_url (get_term_link($blogtype)); ?>">
            <?php echo esc_html($blogtype->name); ?>
          </a>
        <?php endforeach; ?>
      </div>
      
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
            'post_type' => 'blog',
            'post_status' => 'publish',
            'before' => '<p class="p-blog__search__link">',
            'after' => '</p>',
          )); ?>
      </div>
    </div>
    </section> 
  <div class = "l-content--middle p-blog__pagination js-up u-opacity  u-mb100">
    <?php the_posts_pagination(); ?>
  </div>
  <a href = "<?php echo esc_url (home_url('') ); ?>" class = "c-button--jp js-up u-mb150 u-opacity">
    ホームに戻る
  </a>
</main>
<?php get_footer(); ?>