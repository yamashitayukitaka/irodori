<?php get_header(); ?>
  <main class = "p-form l-content--large u-mb150">
    <ul class = "p-bread__list  u-pt40">
      <li class = "p-bread__list__item"><a href = "<?php echo esc_url (home_url('') ); ?>" class = "p-bread__list__link">ホーム</a><span class = "p-bread__list__arrow">></span></li>
      <li class = "p-bread__list__item"><a href = "<?php echo esc_url (home_url('xo_event') ); ?>" class = "p-bread__list__link">イベント</a><span class = "p-bread__list__arrow">></span></li>
      <li class = "p-bread__list__item">お申込みフォーム</li>
    </ul>
    <h2 class = "c-title--page u-alignCenter u-pt20">
      イベントお申込み
    </h2>
    <p class = "p-form__txt">
      下記入力フォームよりお申し込みください。
    </p>
    <section class = "p-form__wrap">
      <?php echo do_shortcode('[mwform_formkey key="266"]');?>
    </section>
  </main>
<?php get_footer(); ?>