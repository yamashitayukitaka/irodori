<?php get_header(); ?>
<?php
  $taxonomy = 'recruit-department';
  $current_term = get_queried_object();
  $term_slug = $current_term->slug;
  $term_name = $current_term->name;
  $parentTerm_id = $current_term->term_id;
?>
  <div class = "p-recruit__mv">
    <img src = "<?php echo esc_url (get_template_directory_uri() ); ?>/dist/img/exterior/works01.jpg" class = "p-recruit__mv__img">
    <span class = "p-recruit__mv__overlay js-opacity"></span>
    <p class = "p-recruit__mv__ttl--en js-up">
      <?php if($term_name === '外構事業部'): ?>
        EXTERNAL STRUCTURE
      <?php elseif ($term_name === '土木事業部'):?>
        CIVIL ENGINEERING
      <?php elseif ($term_name === '基礎事業部'):?>
        BUILDING FOUNDATION
      <?php endif; ?>
    </p>
    <h2 class = "p-recruit__mv__ttl js-up">
      <?php echo $term_name; ?>
    </h2>
    <p class = "p-recruit__mv__txt js-up">
      テキストテキストテキストテキスト
      <br>テキストテキストテキストテキスト
    </p>
  </div>
  <!--
  <figure class = "p-recruit-department__logo">
    <img src = "<?php echo esc_url (get_template_directory_uri() ); ?>/dist/img/common/logo.png">
  </figure>
-->
  <?php if ($term_slug === 'recruit-exterior') :?>

  <figure class = "c-logo u-mb50">
    <img src = "<?php echo esc_url (get_template_directory_uri() ); ?>/dist/img/common/header_logo.png">
  </figure>

  <?php endif; ?>

  <h2 class = "c-title--page u-alignCenter js-up"><?php echo $term_name; ?>募集職種</h2>
  <p class = "c-title--largeEn u-alignCenter u-mb100 js-up">
    recruit
  </p>
  <section class = "u-mb150">
    <ul class = "p-recruit-department__list u-mb100 l-content--mostLarge">
      
    <?php $types = get_terms($taxonomy, 
      [
      'hide_empty' => false,
      'parent' =>$parentTerm_id,
      'orderby'=>'id',
      'order'=>'DESC',
      ]
    );?>
    <?php foreach($types as $type):?>
    <?php $term_id = $type->term_id ;?>
    <?php
        $args = array(
        'post_type' => 'recruit',
        'posts_per_page' => -1,
        'order' => 'ASC',
        'tax_query' => array(
        array(
        'taxonomy' => $taxonomy,
        'terms' => $term_id,//slugではなくidの使用が推奨
        'field' => 'term_id'
        ),
      ),
    );
    $recruitLoop = new WP_Query( $args ); ?>
    <?php if ( $recruitLoop->have_posts() ): ?>
    
      <li class = "p-recruit-department__list__item">
        <h3 class = "p-recruit-department__list__type">
          <?php echo ($type->name); ?>
        </h3>
        <div class = "p-recruit-department__list__inner">
          <figure class = "p-recruit-department__list__img">
            <img src = "<?php echo esc_url (get_template_directory_uri() ); ?>/dist/img/exterior/ex04.jpg">
          </figure>
          <p class = "p-recruit-department__list__txt">テキストテキストテキストテキストテキストテキスト
            テキストテキストテキストテキストテキストテキスト
            テキストテキストテキストテキストテキストテキスト
            テキストテキストテキストテキストテキストテキスト
            テキストテキストテキストテキストテキストテキス
          </p>
        <?php while ( $recruitLoop->have_posts() ): $recruitLoop->the_post(); ?>
          <a href = "<?php the_permalink(); ?>" class = "c-button--jp p-recruit-department__list__button">
            <?php the_title(); ?>
          </a>
          <?php endwhile; endif; wp_reset_postdata(); ?>
        </div>
      </li>
    <?php endforeach;?>
  </ul>

  <!--
  <div class = "p-recruit-department__bottomButton__wrap">
    <?php $buttons = get_terms($taxonomy, 
      [
      'hide_empty' => false,
      'parent' =>0,
      'orderby'=>'id',
      'order'=>'DESC',
      ]
    );?>
    <?php foreach($buttons as $button):?>
      <?php $button_slug = $button->slug;?>
        <?php if($button_slug != $term_slug ):?>
          <a href = "<?php echo get_term_link($button_slug,$taxonomy); ?>" class = "c-button--jp p-recruit-department__bottomButton">
            <?php echo ($button->name); ?>
          </a>
        <?php endif; ?>
    <?php endforeach;?>
  </div>
   -->
   
  </section>

</main>
<?php get_footer(); ?>s