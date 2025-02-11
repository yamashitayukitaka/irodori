<?php get_header(); ?>
<?php
  $taxonomy = 'recruit-department';
?>
  <div class = "p-recruit__mv">
    <img src = "<?php echo esc_url (get_template_directory_uri() ); ?>/dist/img/top/blog01.jpg" class = "p-recruit__mv__img">
    <span class = "p-recruit__mv__overlay js-opacity"></span>
    <p class = "p-recruit__mv__ttl--en js-up">
      彩緑
      <br>IRODORI
    </p>
    <!--
    <p class = "p-recruit__mv__txt js-up">
      テキストテキストテキストテキスト
      <br>テキストテキストテキストテキスト
    </p>
    -->
  </div>
  
  <ul class = "p-bread__list  l-content--large">
    <li class = "p-bread__list__item"><a href = "<?php echo esc_url (home_url('') ); ?>" class = "p-bread__list__link">ホーム</a><span class = "p-bread__list__arrow">></span></li>
    <li class = "p-bread__list__item">採用情報</li>
  </ul>

  <figure class = "c-logo u-mb50 js-up u-opacity">
    <img src = "<?php echo esc_url (get_template_directory_uri() ); ?>/dist/img/common/header_logo.png">
  </figure>

  <h2 class = "c-title--page u-alignCenter js-up u-opacity">募集職種</h2>
  <p class = "c-title--largeEn u-alignCenter u-mb100 js-up u-opacity">
    recruit
  </p>
  <section class = "u-mb50">
    <ul class = "p-recruit-department__list l-content--mostLarge">
     
    
    <?php $types = get_terms($taxonomy, 
      [
      'hide_empty' => false,
      'orderby'=>'id',
      'order'=>'ASC',
      ]
    );?>
    
    <?php foreach($types as $type):?>
    <?php $term_id = $type->term_id ;?>
    <?php
        $args = array(
        'post_type' => 'recruit',
        'posts_per_page' => -1,
        'orderby' => 'menu_order',
        'order'=>'ASC',
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
    
      <li class = "p-recruit-department__list__item js-up u-opacity">
        <h3 class = "p-recruit-department__list__type">
          <?php echo ($type->name); ?>
        </h3>
        <div class = "p-recruit-department__list__inner">
          <figure class = "p-recruit-department__list__img">
            <img src = "<?php echo esc_url (get_template_directory_uri() ); ?>/dist/img/exterior/ex04.jpg">
          </figure>
          <!--
          <p class = "p-recruit-department__list__txt">テキストテキストテキストテキストテキストテキスト
            テキストテキストテキストテキストテキストテキスト
            テキストテキストテキストテキストテキストテキスト
            テキストテキストテキストテキストテキストテキスト
            テキストテキストテキストテキストテキストテキス
          </p>
          -->
        <?php while ( $recruitLoop->have_posts() ): $recruitLoop->the_post(); ?>
          <a href = "<?php the_permalink(); ?>" class = "c-button--jp p-recruit-department__list__button">
            <?php the_title(); ?>
          </a>
          <?php endwhile;?> 
          <?php endif; ?>
          <?php wp_reset_postdata(); ?>
        </div>
      </li>
    <?php endforeach;?>
    <?php
        $sorry = array(
        'post_type' => 'recruit',
        'posts_per_page' => -1,
        'orderby' => 'menu_order',
        'order'=>'ASC',
        'tax_query' => array(
      ),
    );
    $sorryLoop = new WP_Query( $sorry ); ?>
    <?php if ( !($sorryLoop->have_posts()) ): ?>
      <p class = "p-recruit__sorry">
        ご訪問有難うございます。
        <br>申し訳ございません。
        <br>現在募集しておりません。
        <br>またの機会にご応募お願いいたします。
      </p>
    <?php endif; ?>
  </ul>
  </section>
  <a href ="<?php echo esc_url (home_url('') ); ?>" class = "c-button--jp u-mb150 u-opacity js-up">ホームに戻る</a>
</main>
<?php get_footer(); ?>