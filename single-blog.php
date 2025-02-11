<?php get_header(); ?>
<ul class = "p-bread__list l-content--middle  u-pt40">
  <li class = "p-bread__list__item"><a href = "<?php echo esc_url (home_url('') ); ?>" class = "p-bread__list__link">ホーム</a><span class = "p-bread__list__arrow">></span></li>
  <li class = "p-bread__list__item"><a href = "<?php echo esc_url (home_url('blog') ); ?>" class = "p-bread__list__link">ブログ</a><span class = "p-bread__list__arrow">></span></li>
  <li class = "p-bread__list__item">ブログ詳細</li>
</ul>
<main class = "l-content--middle">
<div class = "p-blog__single u-mb100">
  
  <section class = "p-blog__single__content">
    <?php if(have_posts() ): ?>
        <?php
        while(have_posts() ):
          the_post();
          ?>

        <date class = "p-blog__single__date js-up">
          <?php echo get_the_date('Y/m/d'); ?>
        </date>
        
        <h2 class = "p-blog__single__ttl c-title--page js-up">
          <?php the_title(); ?>
        </h2>
        <figure class = "p-blog__single__img js-up">
          <?php the_post_thumbnail(); ?>
        </figure>
        <div class = "p-blog__single__txtContent js-up">
          <?php the_content(); ?>
        </div>
      <?php endwhile; ?>
    <?php endif; ?>
  </section>
  <section class = "p-blog__search p-blog__search__single js-up">
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
      '//posts_per_page' => -1,
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
</div>
<a href = "<?php echo esc_url (home_url('blog') ); ?>" class = "c-button--jp js-up u-mb150 u-opacity">
  一覧に戻る
</a>
</main>
<?php get_footer(); ?>