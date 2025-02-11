<?php get_header(); ?>

<?php 
 $taxonomy ='event-type';
 $parents = wp_get_post_terms( get_the_ID(), $taxonomy, array('parent' => 0));
 $parent = $parents[0]->name;
 $parent_id = $parents[0]->term_id;
?>
<main>
  <section class = "l-content--middle">
    <ul class = "p-bread__list u-pt40">
      <!--<li class = "p-bread__list__item"><a href = "<?php echo esc_url (home_url('') ); ?>" class = "p-bread__list__link">ホーム</a><span class = "p-bread__list__arrow">></span></li>
      <li class = "p-bread__list__item"><a href = "<?php echo esc_url (home_url('xo_event') ); ?>">イベント</a><span class = "p-bread__list__arrow">></span></li>
      <li class = "p-bread__list__item"><a href = "<?php echo get_term_link($parent_id,$taxonomy); ?>"><?php echo esc_html($parent);?></a><span class = "p-bread__list__arrow">></span></li>
      <li class = "p-bread__list__item"><?php the_title(); ?></li>-->
    </ul>

    <?php if(have_posts() ): ?>
      <?php
      while(have_posts() ):
        the_post();
        ?>

        <date class = "p-event__start__date">
          <?php echo do_shortcode('[xo_event_field field="start_date"]'); ?>
        </date>
        <date class = "p-event__end__date">
          <?php echo do_shortcode('[xo_event_field field="end_date"]'); ?>
        </date>

        <div class = "p-event__single__dateWrap js-up u-opacity">
          <date class = "p-event__single__startDate">~<date>
          <date class = "p-event__single__endDate"><date>
        </div>

        <h2 class = "c-title--page u-alignCenter u-mb100 js-up u-opacity">
          <?php the_title(); ?>
        </h2>
        <figure class = "p-event__single__img js-up u-opacity">
          <img src = "<?php the_field('event-img'); ?>">
        </figure>
        <div class = "p-event__single__content js-up u-opacity">
          <?php the_content(); ?>
        </div>

      <?php endwhile; ?>
    <?php endif; ?>

  </section>
</main>
<?php get_footer(); ?>