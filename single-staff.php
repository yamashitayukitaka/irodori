<?php get_header(); ?>
<main class = "p-staff__single l-content--middle u-mb150">
<ul class = "p-bread__list l-content--large">
  <li class = "p-bread__list__item"><a href = "<?php echo esc_url (home_url('') ); ?>" class = "p-bread__list__link">ホーム</a><span class = "p-bread__list__arrow">></span></li>
  <li class = "p-bread__list__item"><a href = "<?php echo esc_url (home_url('staff') ); ?>">スタッフ</a><span class = "p-bread__list__arrow">></span></li>
  <li class = "p-bread__list__item">スタッフ詳細</a></li>
</ul>
<?php if(have_posts() ): ?>
  <?php
    while(have_posts() ):
      the_post();
      ?>
        <div class = "p-staff__single__content u-mb150">
          <figure class = "p-staff__single__imgWrap u-opacity js-up">
            <img src = "<?php the_field('staffImg'); ?>" class = "p-staff__single__img js-delay" alt = "スタッフ">
          </figure>
          <div class = "p-staff__single__txtWrap u-opacity js-up">
            <div class = "p-staff__single__txtWrapInner">
              <figure class = "p-staff__single__logo"><img src = "<?php echo esc_url (get_template_directory_uri() ); ?>/dist/img/common/header_logo.png"></figure>
              <p class = "p-staff__single__company">彩緑IRODORI</p>
            </div>
            <p class = "p-staff__single__name"><?php the_title(); ?></p>
            <p class = "p-staff__list__position"><?php the_field('position'); ?></p>
            <p class = "p-staff__list__careea">入社歴 &nbsp; <?php the_field('careea'); ?></dt>
          </div>
        </div>
        <div class = "u-mb60">
          <date class = "p-staff__single__date u-opacity js-up">
            <?php echo get_the_date('Y/m/d'); ?>
          </date>
          <dl>
            <?php if(get_field('concept')): ?>
              <dt class = "p-staff__dt u-opacity js-up">----仕事へのこだわりをおしえてください</dt>
              <dd class = "p-staff__dd u-opacity js-up"><?php the_field('concept'); ?></dd>
            <?php endif; ?>
            
            <?php if(get_field('message')): ?>
              <dt class = "p-staff__dt u-opacity js-up">----ひとことメッセージ</dt>
              <dd class = "p-staff__dd u-opacity js-up"><?php the_field('message'); ?></dd>
            <?php endif; ?>

            <?php if(get_field('lisence')): ?>
              <dt class = "p-staff__dt u-opacity js-up">----資格</dt>
              <dd class = "p-staff__dd u-opacity js-up"><?php the_field('lisence'); ?></dd>
            <?php endif; ?>
            
            <?php if(get_field('hobby')): ?>
              <dt class = "p-staff__dt u-opacity js-up">----趣味</dt>
              <dd class = "p-staff__dd u-opacity js-up"><?php the_field('hobby'); ?></dd>
            <?php endif; ?>
            
            <?php if(get_field('dream')): ?>
              <dt class = "p-staff__dt u-opacity js-up">----夢をおしえてください</dt>
              <dd class = "p-staff__dd u-opacity js-up"><?php the_field('dream'); ?></dd>
            <?php endif; ?>

          </dl>
        </div>

      <?php endwhile; ?>
    <?php endif; ?>
    <a href ="<?php echo esc_url (home_url('blog') ); ?>" class = "c-button--jp u-mb80 u-opacity js-up">一覧に戻る</a>
  </main>
<?php get_footer(); ?>