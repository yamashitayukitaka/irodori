<?php 
// Template Name: staff
get_header(); 
?>
<main class = "p-staff u-mb150">
  <div class = "c-mainVisualPage u-mb120">
    <div class = "c-mainVisualPage__txtWrap">
      <h2 class = "c-title--page u-mb50">
        スタッフ
      </h2>
      <!--
      <p class = "c-mainVisualPage__txt">
        テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト
      </p>
      -->
    </div>
    <figure class = "c-mainVisualPage__imgWrap">
      <img src = "<?php echo get_template_directory_uri(); ?>/dist/img/common/archive02.jpg" alt = "メインビジュアル">
    </figure>
    
  </div>
  <ul class = "p-bread__list l-content--large">
    <li class = "p-bread__list__item"><a href = "<?php echo esc_url (home_url('') ); ?>" class = "p-bread__list__link">ホーム</a><span class = "p-bread__list__arrow">></span></li>
    <li class = "p-bread__list__item">スタッフ</li>
  </ul>

  <section class = "l-content--large u-mb60">
    <h2 class = "c-title--page u-alignCenter u-mb40 u-opacity js-up">
      スタッフ
    </h2>
    <ul class = "p-staff__list">
      <?php
        $args = array(
        'post_type' => 'staff',
        'posts_per_page' => -1,
        'orderby' => 'menu_order',
        'order' => 'ASC',
      );?>
      <?php $staffLoop = new WP_Query($args);?>
      <?php if ($staffLoop->have_posts()): ?>
        <?php while ($staffLoop->have_posts()) : $staffLoop->the_post();?>
    
          <li class = "p-staff__list__item js-up u-opacity">
            <a href = "<?php the_permalink(); ?>" class = "c-overlay__img__wrap c-overlay">
              <img src = "<?php the_field('staffImg'); ?>" class = "p-staff__list__img c-overlay__img" alt = "スタッフ">
            </a>
              <p class = "p-staff__list__name"><?php the_title(); ?></p>
              <p class = "p-staff__list__position"><?php the_field('position'); ?></p>
          </li>
          <?php endwhile;
        endif;
      wp_reset_postdata();?>
    </ul>
  </section>
  <a href ="<?php echo esc_url (home_url('') ); ?>" class = "c-button--jp u-mb100 u-opacity js-up">ホームに戻る</a>
</main>
<?php 
get_footer(); ?>