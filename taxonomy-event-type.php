<?php 
// Template Name: event-type
get_header(); ?>
<?php 
  $current_term = get_queried_object();
  $term_name = $current_term->name;
  $term_id = $current_term->term_id; // 現在のタームのIDを取得する
?>
<main class = "p-event">
  <section class = "l-content--middle">
    <ul class = "p-bread__list u-pt40">
      <li class = "p-bread__list__item"><a href = "<?php echo esc_url (home_url('') ); ?>" class = "p-bread__list__link">ホーム</a><span class = "p-bread__list__arrow">></span></li>
      <li class = "p-bread__list__item"><a href = "<?php echo esc_url (home_url('xo_event') ); ?>">イベント</a><span class = "p-bread__list__arrow">></span></li>
      <li class = "p-bread__list__item"><?php echo esc_html($term_name);?></li>
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
      <li class = "p-event__term__item js-up u-opacity">
        <a href = "<?php echo esc_url (get_post_type_archive_link('xo_event')); ?>">
          すべて
        </a>
      </li>
      <?php foreach($terms as $term):?>
        <?php $currentTerm = get_queried_object(); // タームオブジェクトを取得
              $termName = $term->name;
        ?>
        <li class = "p-event__term__item js-up u-opacity <?php if( $currentTerm->name === $termName):?> u-current--works <?php endif; ?>">
          <a href = "<?php echo get_term_link($term->slug,'event-type'); ?>">
            <?php echo esc_html($termName); ?>
          </a>
        </li>
      <?php endforeach;?>
    </ul>
    <ul class = "p-event__list">
    <?php
      $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
      $args = array(
          'post_type' => 'xo_event',
          'posts_per_page' => 5,
          'order' => 'DESC',
          'paged' => $paged,
          'tax_query' => array(
              array(
                  'taxonomy' => 'event-type', // タクソノミー名を指定します
                  'field'    => 'id', // タームのフィールドをIDに設定します
                  'terms'    => $term_id, // タームのIDを指定します
                ),
              ),
            );?>
          <?php $blogLoop= new WP_Query($args);?>
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
                    単一のタームの場合、最初のタームは配列のインデックス [0] に格納されていますので、
                    foreachループを回す必要はありません。
                    その場合、直接 $queryTerms[0]->name などで最初のタームにアクセスして表示することができます。*/
                      $queryTerms[0]->name;?>
                  <?php echo $queryTerm;?>
                <?php endif; ?> 
              </p>
            </li>
          <?php endwhile;?>
        <?php endif;
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
            $args = array(
            'post_type' => 'xo_event',
            'posts_per_page' => -1,
            'order' => 'DESC',
          );?>
          <?php $eventLoop = new WP_Query($args);?>
          <?php if ($eventLoop->have_posts()): ?>
            <time class = "p-event__blog__time"></time>
          <?php while ($eventLoop->have_posts()) : $eventLoop->the_post();?>
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
            <?php endwhile;?>
            <?php endif;
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