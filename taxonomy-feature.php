<?php 
// Template Name: feature
get_header(); ?>
<?php $currentTerm = get_queried_object();?> 
<main class = "p-exterior-works">
  <section>
    <h2 class = "c-title--page u-alignCenter u-mb40">
      施工事例
    </h2>
    <?php $terms = get_terms('feature', 
      [
      'hide_empty' => false,
      'parent' =>0,
      'orderby'=>'id',
      'order'=>'ASC',
      ]
    );?>
   

    <ul class = "p-bread__list l-content--mostLarge">
      <li class = "p-bread__list__item"><a href = "<?php echo esc_url (home_url('') ); ?>" class = "p-bread__list__link">ホーム</a><span class = "p-bread__list__arrow">></span></li>
      <li class = "p-bread__list__item"><a href = "<?php echo esc_url (home_url('exterior-works') ); ?>" class = "p-bread__list__link">施工事例</a><span class = "p-bread__list__arrow">></span></li>
      <li class = "p-bread__list__item"><?php echo esc_html( $currentTerm->name);?></li>
    </ul>

    <ul class = "p-exterior-works__btnList l-content--large">
      <li class = "p-exterior-works__btnList__item">
        <a href = "<?php echo esc_url (get_post_type_archive_link('exterior-works')); ?>" class ="p-exterior-works__btn">
          すべて
        </a>
      </li>
      <?php foreach($terms as $term):?>
        <?php
          $termName = $term->name;
        ?>
        <li class = "p-exterior-works__btnList__item">
          <a href = "<?php echo esc_url (get_term_link($term)); ?>"class ="p-exterior-works__btn <?php if( $currentTerm->name === $termName):?> u-current--works <?php endif; ?>">
            <?php echo esc_html($term->name); ?>
          </a>
        </li>
      <?php endforeach;?>
    </ul>

    <ul class = "p-exterior-works__list js-up l-content--mostLarge">

      <?php if(have_posts() ): ?>
        <?php
        while(have_posts() ):
          the_post();
          ?>
        <li class = "p-exterior-works__item">
          <a href = "<?php the_permalink(); ?>" class = "c-overlay__img__wrap c-overlay">
            <img src = "<?php the_field('feature-img'); ?>" class = "c-overlay__img">
          </a>
          <p class = "p-exterior-works__listTtl"><?php the_title(); ?></p>
          <div class = "p-exterior-works__listTagWrap">
            <?php $features = get_the_terms(get_the_ID(),'feature', 
              //get_terms  と　get_the_termsの違いは、get_the_termsはループ内でget_the_idを引数にとれば、
              //その投稿に紐ずくタームのみを取得でき、get_termsはループ外でターム一覧を取得する
                [
                  'hide_empty' => false,
                  'parent' =>0,
                  'orderby'=>'id',
                  'order'=>'ASC',
                ]
              );?>
              <?php foreach($features as $feature):?>
                <p class = "p-exterior-works__listTag">
                  <?php echo esc_html($feature->name); ?>
                </p>
              <?php endforeach;?>
          </div>
        </li>
        <?php endwhile; ?>
      <?php endif; ?>
    </ul>

    <div class = "l-content--middle p-blog__pagination">
      <?php the_posts_pagination(); ?>
    </div>
  </section>
  <a href ="<?php echo esc_url (home_url('') ); ?>" class = "c-button--jp u-mb150 u-opacity js-up">ホームに戻る</a>
</main>

<?php get_footer(); ?>