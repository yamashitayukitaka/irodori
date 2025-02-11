<?php get_header(); ?>
<div class = "p-exterior-works__mv">
  <?php if(get_field('works-topImg')): ?>
    <img src = "<?php the_field('works-topImg'); ?>" class = "p-recruit__mv__img js-delay">
    <span class = "p-recruit__mv__overlay js-opacity"></span>
  <?php endif; ?>
 
  <?php $TopImgContents = get_field('top-img-wrap');?>
  <?php if($TopImgContents):?>
      <?php if($TopImgContents['feature']): ?>
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
        <p class = "p-exterior-works__mv__tag js-up">
          <?php foreach($features as $feature):?>
            <span class = "p-exterior-works__mv__tagTxt"><?php echo esc_html($feature->name); ?></span>
          <?php endforeach;?>
        </p>
      <?php endif; ?> 
    <h2 class = "p-exterior-works__mv__ttl js-up">
      <?php echo $TopImgContents['top-img-ttl']; ?>
    </h2>
    <p class = "p-exterior-works__mv__txt js-up">
      <?php echo $TopImgContents['top-img-txt']; ?>
    </p>
  <?php endif; ?>
  <?php $worksInfo = get_field('works-info');?>
  <?php if($worksInfo): ?>
    <aside class = "p-exterior-works__singleMv__info js-up">
      <?php echo $worksInfo['works-area']; ?>
      <?php if($worksInfo['works-type']): ?>
        <?php $queryTerms = get_the_terms(get_the_ID(), 'works-type');?>
          <?php $queryTerm =
            $queryTerms[0] -> name;?>
        <?php echo $queryTerm;?>
      <?php endif; ?> 
      <?php echo $worksInfo['works-year']; ?>
    </aside>
  <?php endif; ?>
</div>
<main>
  
  <ul class = "p-bread__list l-content--mostLarge">
    <li class = "p-bread__list__item"><a href = "<?php echo esc_url (home_url('') ); ?>" class = "p-bread__list__link">ホーム</a><span class = "p-bread__list__arrow">></span></li>
    <li class = "p-bread__list__item"><a href = "<?php echo esc_url (home_url('exterior-works') ); ?>" class = "p-bread__list__link">施工事例</a><span class = "p-bread__list__arrow">></span></li>
    <li class = "p-bread__list__item"><?php the_title(); ?></li>
  </ul>

  <section class = "l-content--mostLarge p-exterior-detail__imgSection">

  <?php
  $worksList = get_field('works-list');?>
  <?php if ($worksList):?>
  <?php foreach ($worksList as $worksItem): ?>

  <?php  
    $worksImg = $worksItem['works-img'];
    $worksVideo = $worksItem['works-video'];
    $worksTtl = $worksItem['worksTtl'];
    $worksTxt = $worksItem['worksTxt'];
    $worksSmallImg= $worksItem['works-small-img'];
  ?>

    <article class="p-exterior-works__article js-up">
      <div class = "p-exterior-works__article__VideoImgWrap">
        <?php if($worksImg):?>
          <img src="<?php echo $worksImg; ?>">
        <?php elseif ($worksVideo):?>
          <video playsinline muted autoplay loop src="<?php echo $worksVideo; ?>" class = "js-delay"></video>
        <?php endif; ?>
      </div>

      <?php if($worksSmallImg):?>
        <figure class = "p-exterior-works__article__subImg">
          <img src = "<?php echo $worksSmallImg; ?>">
        </figure>
      <?php endif; ?>

      <div class="p-exterior-works__article__txtWrap">
        <div class="p-exterior-works__article__txtWrapInner">
          <?php if($worksTtl):?>
            <h3 class="p-exterior-works__article__ttl" style="color:#000;">
              <?php echo $worksTtl; ?>
            </h3>
          <?php endif; ?>
          <?php if($worksTxt):?>
            <p class="p-exterior-works__article__txt" style="color:#000;">
              <?php echo $worksTxt;?>
            </p>
          <?php endif; ?>
        </div>
      </div>
    </article>
   

  <?php endforeach; ?>
  <?php endif; ?>
  </section>
  
  

  <section class = "u-mb150 l-content--mostLarge">
    <h2 class="c-title--page u-mb45 u-alignCenter">
      その他の施工事例
    </h2>
    <ul class = "p-exterior-works__list js-up">

    <?php
      $currentID = get_the_ID();
      $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;//get_query_var('paged')で現在表示されているページ番号を取得する。
      $args = array(
        'post_type' => 'exterior-works',
        'paged'=>$paged,//get_query_varで得られた現在表示されているページ番号を渡す。この部分は、ページネーションが正しく機能するために非常に重要です。get_query_var('paged') で取得した値を 'paged' => $paged としてクエリに設定することで、正しいページが表示されるようになります。
        'order' => 'DESC',
        'orderby' => 'date',  
        'posts_per_page' =>-1,
        'post__not_in'=>array($currentID),
       );?>

      <?php $myQuery = new WP_Query($args);?>
      <?php if ($myQuery->have_posts()): ?>
        <?php while ($myQuery->have_posts()) : $myQuery->the_post();?>

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
        <?php endwhile;
      endif;
      wp_reset_postdata();?>

    </ul>
    <a href="<?php echo esc_url (get_post_type_archive_link('exterior-works')); ?>" class="c-button--jp">
      一覧はこちら
    </a>
  </section>
</main>
<?php get_footer(); ?>