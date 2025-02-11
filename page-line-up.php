<?php 
// Template Name: lineUp
get_header(); ?>

<main class = "p-line-up">
  <div class = "c-mainVisualPage u-mb120">
    <div class = "c-mainVisualPage__txtWrap">
      <h2 class = "c-title--page u-mb50 js-up">
        ラインナップ
      </h2>
      <!--
      <p class = "c-mainVisualPage__txt js-up">
        テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト
      </p>
      -->
    </div>
    <figure class = "c-mainVisualPage__imgWrap">
      <img src = "<?php echo get_template_directory_uri(); ?>/dist/img/common/page01.jpg" alt = "メインビジュアル">
    </figure>
  </div>

  <ul class = "p-bread__list l-content--mostLarge">
    <li class = "p-bread__list__item"><a href = "<?php echo esc_url (home_url('') ); ?>" class = "p-bread__list__link">ホーム</a><span class = "p-bread__list__arrow">></span></li>
    <li class = "p-bread__list__item">ラインナップ</li>
  </ul>
  <section class = "l-content--mostLarge">
    <h2 class = "c-title--page u-alignCenter u-mb40 js-up u-opacity">
      商品ラインナップ
    </h2>
    <div class = "p-line-up__content">
      <figure class = "p-line-up__img__wrap js-up u-opacity">
        <a href = "<?php echo esc_url (home_url('external') ); ?>">
          <img src = "<?php echo get_template_directory_uri(); ?>/dist/img/line-up/line-up02.jpg" alt = "エクステリア"  class = "js-delay">
        </a>
      </figure>

      <div class = "p-line-up__txt__outer">
        <div class = "p-line-up__txt__wrap js-up u-opacity">
          <h3 class = "p-line-up__txt__ttl">外構エクステリア</h3>
          <!--
          <p class = "p-line-up__txt">
            テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト
            <br>テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト
          </p>
          -->
        </div>

        <ul class = "p-line-up__slider__list js-line-up__slider js-up u-opacity">
        <?php
          $page_ids = array(83); 
          $args = array(
            'post_type' => 'page',
            'post__in' => $page_ids,
            'orderby' => 'ID',
            'order' => 'ASC',
          );?>
            <?php $exLoop = new WP_Query( $args ); ?>
            <?php if ( $exLoop->have_posts() ): ?>
            <?php while ( $exLoop->have_posts() ): $exLoop->the_post(); ?>
              <?php $items = get_field('lineUpThumbs'); ?>
                <?php if($items): ?>
                  <?php foreach($items as $item ): ?>
                    <li class = "p-line-up__slider__item">
                      <img src = "<?php echo $item['lineUpThumb']; ?>">
                    </li>
                  <?php endforeach; ?>
              <?php endif; ?>
            <?php endwhile; endif; wp_reset_postdata(); ?>
        </ul>
      </div>
    </div>
    <a href = "<?php echo esc_url (home_url('external') ); ?>" class = "c-button--jp  u-mb150 u-opacity js-up">詳しくはこちら</a>
      
    <div class = "p-line-up__content">
      <figure class = "p-line-up__img__wrap js-up u-opacity">
        <a href = "<?php echo esc_url (home_url('regarden') ); ?>">
          <img src = "<?php echo get_template_directory_uri(); ?>/dist/img/common/page02.jpg" alt = "エクステリア"  class = "js-delay">
        </a>
      </figure>

      <div class = "p-line-up__txt__outer">
        <div class = "p-line-up__txt__wrap js-up u-opacity">
          <h3 class = "p-line-up__txt__ttl">リガーデン</h3>
          <!--
          <p class = "p-line-up__txt">
            テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト
            テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト
          </p>
           -->
        </div>

        <ul class = "p-line-up__slider__list--bottom js-line-up__slider js-up u-opacity">
          <?php
            $page_ids = array(206); 
            $args = array(
              'post_type' => 'page',
              'post__in' => $page_ids,
              'orderby' => 'ID',
              'order' => 'ASC',
            );?>
            <?php $exLoop = new WP_Query( $args ); ?>
            <?php if ( $exLoop->have_posts() ): ?>
            <?php while ( $exLoop->have_posts() ): $exLoop->the_post(); ?>
              <?php $items = get_field('lineUpThumbs'); ?>
                <?php if($items): ?>
                  <?php foreach($items as $item ): ?>
                    <li class = "p-line-up__slider__item">
                      <img src = "<?php echo $item['lineUpThumb']; ?>">
                    </li>
                <?php endforeach; ?>
              <?php endif; ?>
            <?php endwhile; endif; wp_reset_postdata(); ?>
        </ul>
      </div>
    </div>
    <a href = "<?php echo esc_url (home_url('regarden') ); ?>" class = "c-button--jp  u-mb150 u-opacity js-up">詳しくはこちら</a>
  <secton class = "c-eventBtn__event">
    <div class = "c-eventBtn__imgWrap u-opacity js-up">
      <a href = "<?php echo esc_url (home_url('xo_event') ); ?>" class = "c-eventBtn__button">
        EVENT
      </a>
    </div>
  </section>
</main>
<?php get_footer(); ?>