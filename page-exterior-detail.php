<?php 
// Template Name: exterior-detail
get_header();?>

<main class = "p-exterior-detail">
  <div class = "c-mainVisualPage u-mb120">
    <div class = "c-mainVisualPage__txtWrap">
      <h2 class = "c-title--page u-mb50">
        <?php echo get_the_title();?>
      </h2>
      <!--
      <p class = "c-mainVisualPage__txt">
        テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト
      </p>
      -->
    </div>
    <figure class = "c-mainVisualPage__imgWrap">
      <?php if (is_page('external')):?>
        <img src = "<?php echo get_template_directory_uri(); ?>/dist/img/line-up/line-up02.jpg" alt = "メインビジュアル">
      <?php elseif (is_page('regarden')):?>
        <img src = "<?php echo get_template_directory_uri(); ?>/dist/img/common/page02.jpg" alt = "メインビジュアル">
      <?php endif; ?>
    </figure>
  </div>
  <ul class = "p-bread__list l-content">
    <li class = "p-bread__list__item"><a href = "<?php echo esc_url (home_url('') ); ?>" class = "p-bread__list__link">ホーム</a><span class = "p-bread__list__arrow">></span></li>
    <li class = "p-bread__list__item"><a href = "<?php echo esc_url (home_url('line-up') ); ?>" class = "p-bread__list__link">ラインナップ</a><span class = "p-bread__list__arrow">></span></li>
    <li><?php the_title(); ?></li>
  </ul>
  <section class = "l-content p-exterior-detail__imgSection">

  <?php
    $lineUpContents = get_field('lineUpContents');
    foreach ($lineUpContents as $lineUpContent): ?>
  <?php  
    $lineUpImg = $lineUpContent['lineUpImg'];
    $lineUpVideo = $lineUpContent['lineUpVideo'];
    $lineUpTitle= $lineUpContent['lineUpTitle'];
    $lineUpTxt= $lineUpContent['lineUpTxt'];
  ?>

    <article class="p-exterior-detail__article js-up u-opacity">
      <?php if($lineUpImg):?>
          <img src="<?php echo $lineUpImg; ?>">
        <?php elseif ($lineUpVideo) : ?>
          <video playsinline muted autoplay loop src="<?php echo $lineUpVideo; ?>"></video>
      <?php endif; ?>

      <div class="p-exterior-detail__article__txtWrap">
        <div class="p-exterior-detail__article__txtWrapInner">
          <?php if($lineUpTitle):?>
            <h3 class="p-exterior-detail__article__ttl" style="color:#fff;">
              <?php echo $lineUpTitle; ?>
            </h3>
          <?php endif; ?>
          <?php if($lineUpTxt):?>
            <p class="p-exterior-detail__article__txt" style="color:#fff;">
              <?php echo $lineUpTxt;?>
            </p>
          <?php endif; ?>
        </div>
      </div>
    </article>

  <?php endforeach; ?>

    
  </section>
  <secton class = "c-eventBtn__event">
    <div class = "c-eventBtn__imgWrap">
      <a href = "<?php echo esc_url (home_url('xo_event') ); ?>" class = "c-eventBtn__button">
        EVENT
      </a>
    </div>
  </section>
<?php get_footer(); ?>