<?php 
// Template Name: guide
get_header(); 
?>
<main class = "p-guide">
  <div class = "c-mainVisualPage u-mb120">
    <div class = "c-mainVisualPage__txtWrap">
      <h2 class = "c-title--page u-mb50">
        事業部案内
      </h2>
      <p class = "c-mainVisualPage__txt">
        テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト
      </p>
    </div>
    <figure class = "c-mainVisualPage__imgWrap">
      <img src = "<?php echo get_template_directory_uri(); ?>/dist/img/top/mv.jpg" alt = "メインビジュアル">
    </figure>
    
  </div>
  <section class = "l-content--middle">
    <h2 class = "c-title--page u-alignCenter u-mb40">
      事業部案内
    </h2>
    <div class = "p-guideBtn__imgWrap__content--large u-mb120">
      <div class = "p-guideBtn__imgWrap__inner">
        <a href = "<?php echo esc_url (home_url('depertment-overview') ); ?>" class = "p-guideBtn__link">
          <figure class = "p-guideBtn__imgWrap--large">
            <img src = "<?php echo get_template_directory_uri(); ?>/dist/img/event/event01.jpg" class = "p-guideBtn__img--large">
          </figure>
        </a>
        <p class = "p-guideBtn__term">
          事業部概要
        </p>
      </div>

      <div class = "p-guideBtn__imgWrap__inner">
        <a href = "#" class = "p-guideBtn__link">
          <figure class = "p-guideBtn__imgWrap--large">
            <img src = "<?php echo get_template_directory_uri(); ?>/dist/img/event/event01.jpg" class = "p-guideBtn__img--large">
          </figure>
        </a>
        <p class = "p-guideBtn__term">
          彩縁の理念・強み
        </p>
      </div>

      <div class = "p-guideBtn__imgWrap__inner">
        <a href = "#" class = "p-guideBtn__link">
          <figure class = "p-guideBtn__imgWrap--large">
            <img src = "<?php echo get_template_directory_uri(); ?>/dist/img/event/event01.jpg" class = "p-guideBtn__img--large">
          </figure>
        </a>
        <p class = "p-guideBtn__term">
          デザインコンセプト
        </p>
      </div>

      <div class = "p-guideBtn__imgWrap__inner">
        <a href = "#" class = "p-guideBtn__link">
          <figure class = "p-guideBtn__imgWrap--large">
            <img src = "<?php echo get_template_directory_uri(); ?>/dist/img/event/event01.jpg" class = "p-guideBtn__img--large">
          </figure>
        </a>
        <p class = "p-guideBtn__term">
          完成までの流れ
        </p>
      </div>
    </div>
  </section>
  <section class = "p-guide__access l-content--middle">
    <p class = "c-title--page u-alignCenter u-mb40">
      アクセス
    </p>
    <div class = "p-guide__access__content">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3401.3510983267693!2d130.5180190122191!3d31.514515574109218!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x353e651c58a6fb3b%3A0x4fb98ec42ea26d55!2z44OI44Kt44Oh44Kt44Gu5qOu!5e0!3m2!1sja!2sjp!4v1705902668714!5m2!1sja!2sjp" width="100%" height="342" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      <p class = "p-guide__access__area">外構事業部</p>
      <address class = "p-guide__access__address">〒891-0123 鹿児島県鹿児島市卸本町6-4 2F</address>
    </div>
     
    <div>
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3400.081495812543!2d130.51202671222003!3d31.549377974093076!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x353e66f52d587409%3A0x12b5f41735839499!2z6aas5aC05bu66Kit77yI5qCq77yJ!5e0!3m2!1sja!2sjp!4v1705902151931!5m2!1sja!2sjp" width="100%" height="342" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      <p class = "p-guide__access__area">馬場建設株式会社</p>
      <address class = "p-guide__access__address">〒891-0175 鹿児島県鹿児島市桜ヶ丘3丁目6-4</address>
    </div>
  </section>

    
</main>
<?php get_footer(); ?>