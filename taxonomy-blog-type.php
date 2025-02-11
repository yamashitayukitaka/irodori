<?php get_header(); ?>
<?php 
  $current_term = get_queried_object();
  $term_id = $current_term->term_id; // 現在のタームのIDを取得する
  $term_name = $current_term->name;
?>
<main>
<ul class = "p-bread__list l-content--middle">
  <li class = "p-bread__list__item"><a href = "<?php echo esc_url (home_url('') ); ?>" class = "p-bread__list__link">ホーム</a><span class = "p-bread__list__arrow">></span></li>
  <li class = "p-bread__list__item"><a href = "<?php echo esc_url (get_post_type_archive_link('blog')); ?>">ブログ</a><span class = "p-bread__list__arrow">></span></li>
  <li class = "p-bread__list__item"><?php echo ($term_name);?></li>
</ul>
<div class = " l-content--middle p-blog__list__wrap">
<ul class = "p-blog__list">
<?php
$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
$args = array(
    'post_type' => 'blog',
    'posts_per_page' => 5,
    'order' => 'DESC',
    'paged' => $paged,
    'tax_query' => array(
        array(
            'taxonomy' => 'blog-type', // タクソノミー名を指定します
            'field'    => 'id', // タームのフィールドをIDに設定します
            'terms'    => $term_id, // タームのIDを指定します
          ),
        ),
      );?>

<?php $blogLoop= new WP_Query($args);?>
<?php if ($blogLoop->have_posts()): ?>
<?php while ($blogLoop->have_posts()) : $blogLoop->the_post();?>
      <li class = "p-blog__item js-up u-opacity">
        <a href = "<?php the_permalink(); ?>" class = "p-blog__item__link c-overlay__img__wrap c-overlay">
          <figure class = "p-blog__item__img c-overlay__img">
            <?php the_post_thumbnail();?>
          </figure>
        </a>
        <div class = "p-blog__item__content">
          <deta class = "p-blog__item__deta"><?php echo get_the_date('m/d'); ?> <?php the_ID(); ?></deta>
          <p class = "p-blog__item__tag"><?php echo ($term_name); ?></p>
          <h3 class = "p-blog__item__ttl"><?php the_title(); ?></h3>
          <p class = "p-blog__item__txt">
            <?php the_excerpt(); ?>
          <p>
        </div>
      </li>
      <?php endwhile;?>
    <?php endif;
      wp_reset_postdata();?> 
  </ul>
  <section class = "p-blog__search js-up u-opacity">

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
</div>
<div class = "l-content--middle p-blog__pagination js-up u-opacity">
  <?php the_posts_pagination(); ?>
</div>
<a href = "<?php echo esc_url (home_url('blog') ); ?>" class = "c-button--jp js-up u-mb150 u-opacity">
  一覧に戻る
</a>
</main>
<?php get_footer(); ?>