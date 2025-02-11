<?php 
// Template Name: exterior-works
get_header(); ?>
<main class = "p-exterior-works">
  <div class = "c-mainVisualPage u-mb120">
    <div class = "c-mainVisualPage__txtWrap">
      <h2 class = "c-title--page u-mb50">
        施工事例
      </h2>
      <!--
        <p class = "c-mainVisualPage__txt">
          テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト
        </p>
      -->
    </div>
    <figure class = "c-mainVisualPage__imgWrap">
      <img src = "<?php echo get_template_directory_uri(); ?>/dist/img/common/archive04.jpg" alt = "メインビジュアル">
    </figure>
  </div>
  <ul class = "p-bread__list l-content--mostLarge">
    <li class = "p-bread__list__item"><a href = "<?php echo esc_url (home_url('') ); ?>" class = "p-bread__list__link">ホーム</a><span class = "p-bread__list__arrow">></span></li>
    <li class = "p-bread__list__item">施工事例</li>
  </ul>

  <section>
    <h2 class = "c-title--page u-alignCenter u-mb40">
      施工事例
    </h2>
    <?php $terms = get_terms('feature', 
      [
      'hide_empty' => false,
      'parent' =>0,
      'orderby'=>'id',
      'order'=>'ASC',
      ]
    );?>
   
    <ul class = "p-exterior-works__btnList l-content--mostLarge">
      <li class = "p-exterior-works__btnList__item">
        <a href = "<?php echo esc_url (get_post_type_archive_link('exterior-works')); ?>" class ="p-exterior-works__btn u-current--works">
          すべて
        </a>
      </li>
      <?php foreach($terms as $term):?>
        <li class = "p-exterior-works__btnList__item">
          <a href = "<?php echo esc_url (get_term_link($term)); ?>"class ="p-exterior-works__btn">
            <?php echo esc_html($term->name); ?>
          </a>
        </li>
      <?php endforeach;?>
    </ul>

    <ul class = "p-exterior-works__list l-content--mostLarge">

      <?php
        $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;//get_query_var('paged')で現在表示されているページ番号を取得する。
        $args = array(
          'post_type' => 'exterior-works',
          'paged'=>$paged,//get_query_varで得られた現在表示されているページ番号を渡す。この部分は、ページネーションが正しく機能するために非常に重要です。get_query_var('paged') で取得した値を 'paged' => $paged としてクエリに設定することで、正しいページが表示されるようになります。
          'order' => 'DESC',
          'orderby' => 'date',  
          'posts_per_page'=>-1,
      );?>

      <?php $myQuery = new WP_Query($args);?>
        <?php if ($myQuery->have_posts()): ?>
          <?php while ($myQuery->have_posts()) : $myQuery->the_post();?>

          <li class = "p-exterior-works__item  js-up u-opacity">
              <a href = "<?php the_permalink(); ?>" class = "c-overlay__img__wrap c-overlay">
                <img src = "<?php the_field('feature-img'); ?>" class = "c-overlay__img p-exterior-works__item__img">
              </a>
              <p class = "p-exterior-works__listTtl"><?php the_title(); ?></p>
              <div class = "p-exterior-works__listTagWrap">
              
                  <?php $features = get_the_terms(get_the_ID(),'feature', 
                  //get_terms  と　get_the_termsの違いは、get_the_termsはループ内でget_the_idを引数にとれば、
                  //その投稿に紐ずくタームのみを取得でき、get_termsはループ外でターム一覧を取得する
                    [
                      'hide_empty' => false,
                      'parent' =>0,
                      'orderby'=>'id',
                      'order'=>'ASC',
                    ]
                  );?>
                  <?php foreach($features as $feature):?>
                    <p class = "p-exterior-works__listTag">
                      <?php echo esc_html($feature->name); ?>
                    </p>
                  <?php endforeach;?>
               
              </div>
            </a>
          </li>
          <?php endwhile;
        endif;
      wp_reset_postdata();?>
    </ul>

    <div class = "l-content--middle p-blog__pagination">
      <?php the_posts_pagination(); ?>
    </div>
  </section>
  <a href ="<?php echo esc_url (home_url('') ); ?>" class = "c-button--jp u-mb150 u-opacity js-up">ホームに戻る</a>
</main>

<?php get_footer(); ?>