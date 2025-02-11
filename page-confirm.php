<?php get_header(); ?>
<main class = "p-contact l-content--large u-mb150">
  <h2 class = "c-title--page u-alignCenter u-pt20 u-mb100">
    お問い合わせありがとうございます
  </h2>
  <section class = "p-contact__wrap  p-contact__wrap--confirm">
    <?php echo do_shortcode('[mwform_formkey key="219"]'); ?>
  </section>
</main>

<?php get_footer(); ?>