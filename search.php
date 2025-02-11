<?php get_header(); ?>
<main class = "p-blog">
  <ul class = "p-bread__list u-pt40 l-content--middle">
    <li class = "p-bread__list__item"><a href = "<?php echo esc_url (home_url('') ); ?>" class = "p-bread__list__link">ホーム</a><span class = "p-bread__list__arrow">></span></li>
    <li class = "p-bread__list__item"><a href = "<?php echo esc_url (home_url('blog') ); ?>" class = "p-bread__list__link">ブログ</a><span class = "p-bread__list__arrow">></span></li>
    <li class = "p-bread__list__item">ブログ検索結果</li>
  </ul>
  <div class = "l-content--middle p-blog__list__wrap">
    <ul class = "p-blog__list">
      <?php the_search_query(); ?>の検索結果
        <?php if(have_posts() ): ?>
          <?php
          while(have_posts() ):
            the_post();
            ?> 
            <li class = "p-blog__item js-up u-opacity">
              <a href = "<?php the_permalink(); ?>" class = "p-blog__item__link c-overlay__img__wrap c-overlay">
                <figure class = "p-blog__item__img c-overlay__img">
                  <img src = "<?php the_field('blog-img'); ?>">
                </figure>
              </a>
                <div class = "p-blog__item__content">
                  <deta class = "p-blog__item__deta"><?php echo get_the_date('m/d'); ?> <?php the_ID(); ?></deta>
                  <p class = "p-blog__item__tag">
                    <?php
                      $tags = get_the_tags( get_the_ID() );
                      if ( $tags ) {
                          foreach ( $tags as $tag ) {
                            echo $tag->name . ' '; // リンクなしでタグを出力
                        }
                      }
                    ?>
                  </p>
                    <h3 class = "p-blog__item__ttl"><?php the_title(); ?></h3>
                    <p class = "p-blog__item__txt">
                      <?php the_excerpt(); ?>
                    <p>
                </div>
            </li>
            <?php endwhile;?>
            <?php else: ?>
            投稿はありません
          <?php endif;?>
      </ul>
    <section class = "p-blog__search p-blog__search--large js-up u-opacity">

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
  <div class = "l-content--middle p-blog__pagination js-up u-opacity">
    <?php the_posts_pagination(); ?>
  </div>
  </div>
</main>
<?php get_footer(); ?>