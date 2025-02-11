<?php 
// Template Name: event
get_header(); ?>
<main class = "p-event">
  <div class = "c-mainVisualPage u-mb120">
    <div class = "c-mainVisualPage__txtWrap">
      <h2 class = "c-title--page u-mb50">
        イベント
      </h2>
      <!--
      <p class = "c-mainVisualPage__txt">
       　テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト
      </p>
      -->
    </div>
    <figure class = "c-mainVisualPage__imgWrap">
      <img src = "<?php echo get_template_directory_uri(); ?>/dist/img/common/archive01.jpg" alt = "メインビジュアル">
    </figure>
  </div>
  <section class = "l-content--middle">
    <ul class = "p-bread__list l-content--large">
      <li class = "p-bread__list__item"><a href = "<?php echo esc_url (home_url('') ); ?>" class = "p-bread__list__link">ホーム</a><span class = "p-bread__list__arrow">></span></li>
      <li class = "p-bread__list__item">イベント</li>
    </ul>
    <h2 class = "c-title--page u-alignCenter u-mb40 js-up u-opacity">
      イベント
    </h2>
    
    <?php $terms = get_terms( 'event-type', 
    [
    'hide_empty' => false,
    'orderby'=>'id',
    'order'=>'ASC',
    ]
    );?>
    <ul class = "p-event__term__list">
      <li class = "p-event__term__item u-current--works js-up u-opacity">
        <a href = "<?php echo esc_url (get_post_type_archive_link('xo_event')); ?>">
          すべて
        </a>
      </li>
      <?php foreach($terms as $term):?>
        <li class = "p-event__term__item js-up u-opacity">
          <a href = "<?php echo get_term_link($term->slug,'event-type'); ?>">
            <?php echo esc_html($term->name); ?>
          </a>
        </li>
      <?php endforeach;?>
    </ul>
    <ul class = "p-event__list">
    <?php
        $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;//get_query_var('paged')で現在表示されているページ番号を取得する。
        $blogs = array(
        'post_type' => 'xo_event',
        'posts_per_page' => 5 ,
        'paged'=>$paged,//get_query_varで得られた現在表示されているページ番号を渡す。この部分は、ページネーションが正しく機能するために非常に重要です。get_query_var('paged') で取得した値を 'paged' => $paged としてクエリに設定することで、正しいページが表示されるようになります。
        'order' => 'DESC',
        );?>

      <?php $blogLoop = new WP_Query($blogs);?>
        <?php if ($blogLoop->have_posts()): ?>
          <?php while ($blogLoop->have_posts()) : $blogLoop->the_post();?>
            <li class = "p-event__item js-up u-opacity">
              <a href = "<?php the_permalink(); ?>" class = "c-overlay__img__wrap c-overlay">
                <figure class = "p-event__item__img">
                  <img src = "<?php the_field('event-img'); ?>" class = "c-overlay__img">
                </figure>
              </a>
              <p class = "p-event__item__ttl"><?php the_title(); ?></p>
              <p class = "p-event__item__tag">
                <?php if(get_field('type')): ?>
                  <?php $queryTerms = get_the_terms(get_the_ID(), 'event-type');?>
                    <?php $queryTerm = /*ループ内で表示する投稿に属するタームが一つの場合はそのタームは
                    自動的にインデックス番号0に格納され、その投稿に紐ずいていないタームは、
                    ０以外にインデックス番号に格納される
                    foreachループを使用していないため、インデックス番号をしてい
                    なければならないが、ループを使用すればインデックス番号の指定は必要ない*/
                      $queryTerms[0] -> name;?>
                  <?php echo $queryTerm;?>
                <?php endif; ?> 
              </p>
              <deta class = "p-event__item__deta"></deta>
            </li>
            <?php endwhile;
          endif;
        wp_reset_postdata();?>
    </ul>
    <div class = "l-content--middle p-blog__pagination js-up u-opacity  u-mb100">
      <?php the_posts_pagination(); ?>
    </div>
  </section>
  <section class = "l-content--large p-event__blog">
    <div class = "p-event__blog__contentOuter">
      <div class = "xo-event__wrap">
        <?php echo do_shortcode('[xo_event_calendar]'); ?>
      </div>

      <div class = "p-event__blog__content">
        <ul class = "p-event__blog__list">
        <?php
          $blogs = array(
            'post_type' => 'xo_event',
            'posts_per_page' => -1 ,
            'order' => 'DESC',
        );?>

      <?php $blogLoop = new WP_Query($blogs);?>
        <?php if ($blogLoop->have_posts()): ?>
          <time class = "p-event__blog__time"></time>
            <div class = "p-event__blog__overflow">
            <?php while ($blogLoop->have_posts()) : $blogLoop->the_post();?>
              <li class = "p-event__blog__listItem">
                <a href = "<?php the_permalink(); ?>" class = "p-event__blog__link">
                  <time class = "p-event__blog__startDate">
                    <?php echo do_shortcode('[xo_event_field field="start_date"]'); ?>
                  </time>
                  <time class = "p-event__blog__endDate">
                    <?php echo do_shortcode('[xo_event_field field="end_date"]'); ?>
                  </time>
                  <figure class = "p-event__blog__imgWrap">
                    <img src = "<?php the_field('event-img'); ?>">
                  </figure>
                  <div class = "p-event__blog__txtContent">
                    <p class = "p-event__blog__ttl eventDate">
                      <?php the_title(); ?>
                    </p>

                    <time class = "p-event__blog__startTime">
                      <?php echo do_shortcode('[xo_event_field field="start_time"]'); ?>
                    </time>
                      ～
                    <time class = "p-event__blog__endTime">
                      <?php echo do_shortcode('[xo_event_field field="end_time"]'); ?>
                    </time>

                    <?php $eventArea = get_field('event-area');?>
                      <?php if($eventArea && !($eventArea === '---')): ?>
                        <p class="p-event__blog__area">
                          <?php the_field('event-area'); ?>
                        </p>
                      <?php endif; ?>

                    <p class = "p-event__blog__tag">
                      <?php if(get_field('type')): ?>
                        <?php $queryTerms = get_the_terms(get_the_ID(), 'event-type');?>
                          <?php $queryTerm = /*ループ内で表示する投稿に属するタームが一つの場合はそのタームは
                          自動的にインデックス番号0に格納され、その投稿に紐ずいていないタームは、
                          ０以外にインデックス番号に格納される*/
                            $queryTerms[0]->name;?>
                        <?php echo $queryTerm;?>
                      <?php endif; ?> 
                    </p>
                  </div>
                </a>
              </li>
              <?php endwhile;
                endif;
              wp_reset_postdata();?>
          </div>
        </ul>
      </div>
    </div>
    
    <a href = "<?php echo esc_url (home_url('application') ); ?>" class = "c-button--event u-mb150 js-up u-opacity">
      イベント予約はこちら
    </a>
  </section>

 

<?php get_footer(); ?>