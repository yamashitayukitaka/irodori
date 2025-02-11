<?php get_header(); ?>
  <main class = "l-content--mostLarge p-news__single">
    <ul class = "p-bread__list  u-pt40">
      <li class = "p-bread__list__item"><a href = "<?php echo esc_url (home_url('') ); ?>" class = "p-bread__list__link">ホーム</a><span class = "p-bread__list__arrow">></span></li>
      <li class = "p-bread__list__item"><a href = "<?php echo esc_url (home_url('news') ); ?>" class = "p-bread__list__link">お知らせ</a><span class = "p-bread__list__arrow">></span></li>
      <li class = "p-bread__list__item">ニュース詳細</li>
    </ul>
    <h2 class = "c-title--page u-alignCenter u-mb100 js-up u-opacity">
       News詳細
    </h2>
    <?php if(have_posts() ): ?>
      <?php
      while(have_posts() ):
        the_post();
        ?>

        <?php if(get_field('newsImg')): ?>
          <figure class = "p-news__single__img  js-up u-opacity">
            <img src = "<?php the_field('newsImg'); ?>">
          </figure>
        <?php endif; ?>
        <date class = "p-news__single__date js-up u-opacity"><?php echo get_the_date('y/m/d'); ?></date>
        <p class = "p-news__single__title js-up u-opacity">
          <?php the_title(); ?>
        </p>
        <div class = "p-news__single__contentWrap js-up u-opacity">
          <?php the_content(); ?>
        </div>

      <?php endwhile; ?>
    <?php endif; ?>

    <a href = "<?php echo esc_url (get_post_type_archive_link('news')); ?>" class = "c-button--jp js-up u-opacity">
      ニュース一覧
    </a>
  </main>
<?php get_footer(); ?>