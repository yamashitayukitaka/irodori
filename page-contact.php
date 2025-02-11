<?php get_header(); ?>
<main class = "p-contact l-content--large u-mb150">
  <ul class = "p-bread__list">
    <li class = "p-bread__list__item"><a href = "<?php echo esc_url (home_url('') ); ?>" class = "p-bread__list__link">ホーム</a><span class = "p-bread__list__arrow">></span></li>
    <li class = "p-bread__list__item">お問い合わせ</li>
  </ul>
  <h2 class = "c-title--page u-alignCenter u-pt20">
    お問い合わせ
  </h2>
  <p class = "p-contact__txt">
    下記入力フォームよりお気軽にお問い合わせください。
  </p>
  <section class = "p-contact__wrap">
    <?php echo do_shortcode('[mwform_formkey key="219"]');?>
  </section>
</main>

 

<?php get_footer(); ?>