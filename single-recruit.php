<?php get_header(); ?>
<?php 
  $taxonomy ='recruit-department';
  $parents = wp_get_post_terms( get_the_ID(), $taxonomy, array('parent' => 0));
  $parent = $parents[0]->name;
  $parent_id = $parents[0]->term_id;
?>
<div class = "p-recruit__mv">
  <img src = "<?php echo esc_url (get_template_directory_uri() ); ?>/dist/img/exterior/works01.jpg" class = "p-recruit__mv__img">
  <span class = "p-recruit__mv__overlay js-opacity"></span>
  <p class = "p-recruit__mv__ttl--en js-up">
    <?php if($parent === '新卒採用'): ?>
      NEW GRADUATE RECRUITMENT
    <?php elseif ($parent === '中途採用'):?>
      MID-CAREEA RECRUITMENT
    <?php elseif ($parent === 'パート採用'):?>
      PART RECRUITMENT
    <?php endif; ?>
    <br><?php  echo esc_html($parent); ?>
  </p>
  
  <p class = "p-recruit__mv__job js-up">
    <?php the_title(); ?>
  </p>
</div>

<ul class = "p-bread__list  l-content--large">
  <li class = "p-bread__list__item"><a href = "<?php echo esc_url (home_url('') ); ?>" class = "p-bread__list__link">ホーム</a><span class = "p-bread__list__arrow">></span></li>
  <li class = "p-bread__list__item"><a href = "<?php echo esc_url (home_url('recruit') ); ?>">採用情報</a><span class = "p-bread__list__arrow">></span></li>
  <li class = "p-bread__list__item"><?php the_title(); ?></li>
</ul>
<main class = "l-content--small">
<h2 class = "c-title--page u-alignCenter js-up u-opacity u-mb100"><?php  echo esc_html($parent); ?><br><?php the_title(); ?>&nbsp; <br>募集要項</h2>
<table class = "p-recruit__table js-up u-opacity">
    <tbody class = "p-recruit__tbody">
      <tr  class = "p-recruit__tr">
        <th class = "p-recruit__th">募集職種名</th>
        <td class = "p-recruit__td"><?php the_field('job-name'); ?></td>
      </tr>
      <tr class = "p-recruit__tr">
        <th class = "p-recruit__th">資格</th>
        <td class = "p-recruit__td"><?php the_field('lisence'); ?></td>
      </tr>
      <tr class = "p-recruit__tr">
        <th class = "p-recruit__th">給与</th>
        <td class = "p-recruit__td"><?php the_field('salary'); ?></td>
      </tr>
      <tr class = "p-recruit__tr">
        <th class = "p-recruit__th">賞与</th>
        <td class = "p-recruit__td"><?php the_field('bonus'); ?></td>
      </tr>
      <tr class = "p-recruit__tr">
        <th class = "p-recruit__th">昇給</th>
        <td class = "p-recruit__td"><?php the_field('raise'); ?></td>
      </tr>
      <tr class = "p-recruit__tr">
        <th class = "p-recruit__th">勤務地</th>
        <td class = "p-recruit__td"><?php the_field('location'); ?></td>
      </tr>
      <tr class = "p-recruit__tr">
        <th class = "p-recruit__th">休日・休暇</th>
        <td class = "p-recruit__td"><?php the_field('vacation'); ?></td>
      </tr>
      <tr class = "p-recruit__tr">
        <th class = "p-recruit__th">使用期間</th>
        <td class = "p-recruit__td"><?php the_field('use'); ?></td>
      </tr>
      <tr class = "p-recruit__tr">
        <th class = "p-recruit__th">社会保険</th>
        <td class = "p-recruit__td"><?php the_field('insurance'); ?></td>
      </tr>
    </tbody>
  </table> 
  <div class = "p-recruit__buttonWrap js-up u-opacity">
    <a href = "<?php echo esc_url (home_url('entry') ); ?>" class = "p-recruit__button">
      エントリーはこちら  >
    </a>
  </div> 
  
  <a href ="<?php echo esc_url (home_url('recruit') ); ?>" class = "c-button--jp u-mb100 u-opacity js-up">一覧に戻る</a>
</main>
<?php get_footer(); ?>