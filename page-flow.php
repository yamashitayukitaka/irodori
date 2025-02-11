<?php get_header(); ?>
<main class = "p-flow l-content--middle">
<ul class = "p-bread__list">
  <li class = "p-bread__list__item"><a href = "<?php echo esc_url (home_url('') ); ?>" class = "p-bread__list__link">ホーム</a><span class = "p-bread__list__arrow">></span></li>
  <li class = "p-bread__list__item">完成までの流れ</li>
</ul>
<h2 class = "c-title--page u-alignCenter u-mb100 js-up u-opacity">
   完成までの流れ
</h2>
<section>
  <ul class = "p-flow__list u-opacity js-up">
  <div class = "p-flow__list__lineWrap">
    <span class = "p-flow__list__line"></span>
    <div class = "p-flow__list__cercleWrap">
      <span class = "p-flow__list__cercle"></span>
    </div>
  </div>
    <li class = "p-flow__list__item js-color">
      <div class = "p-flow__list__txtWrap">
        <h3 class = "p-flow__list__ttl">
          ① お問い合わせ・お見積もりの依頼
        </h3>
        <p class = "p-flow__list__txt">
          電話またはホームページのお問い合わせフォームよりお問い合わせください。
          <br>初回お打ち合わせの日程を決めさせていただきます。
        </p>
        <aside class = "p-flow__list__aside">
          ※土日は混み合いますのでご予約をお勧めいたします
        </aside>
      </div>
      <figure class = "p-flow__list__img">
        <img src = "<?php echo get_template_directory_uri(); ?>/dist/img/flow/flow01.jpg">
      </figure>
    </li>

    <li class = "p-flow__list__item js-color">
      <div class = "p-flow__list__txtWrap">
        <h3 class = "p-flow__list__ttl">
        ② ヒアリング
        </h3>
        <p class = "p-flow__list__txt">
        弊社事務所(鹿児島市卸本町)にて初回お打合せをさせていただき、プランナーよりご希望をお伺いさせていただきます。
        </p>
        <aside class = "p-flow__list__aside">
          ※必要なもの:敷地･配置図面、平面図、立面図、建物の色などが分かるﾊﾟｰｽ図、また好みのイメージ写真等ございましたらお持ち下さい。
          ご不明な場合は図面一式お持ち下さい。
        </aside>
      </div>
      <figure class = "p-flow__list__img">
        <img src = "<?php echo get_template_directory_uri(); ?>/dist/img/flow/flow02.jpg">
      </figure>
    </li>

    <li class = "p-flow__list__item  js-color">
      <div class = "p-flow__list__txtWrap">
        <h3 class = "p-flow__list__ttl">
        ③ 現場調査
        </h3>
        <p class = "p-flow__list__txt">
        現地にて敷地の形状、高低差、近隣状況等を確認させていただきます。
        </p>
      </div>
      <figure class = "p-flow__list__img">
        <img src = "<?php echo get_template_directory_uri(); ?>/dist/img/flow/flow03.jpg">
      </figure>
    </li>

    <li class = "p-flow__list__item  js-color">
      <div class = "p-flow__list__txtWrap">
        <h3 class = "p-flow__list__ttl">
          ④ プランのご提案・お見積もりの提示
        </h3>
        <p class = "p-flow__list__txt">
        現場確認後、お時間を2週間程度いただきます。
        弊社事務所にて、モニターを使用しながらプランのご提案と御見積(概算)をご提示させていただきます。
        </p>
      </div>
      <figure class = "p-flow__list__img">
        <img src = "<?php echo get_template_directory_uri(); ?>/dist/img/flow/flow04.jpg">
      </figure>
    </li>

    <li class = "p-flow__list__item js-color">
      <div class = "p-flow__list__txtWrap">
        <h3 class = "p-flow__list__ttl">
          ⑤ プラン修正・お見積もりの提示
        </h3>
        <p class = "p-flow__list__txt">
          プランと御見積の変更を行い、再度お打合せをさせていただきます。
        </p>
      </div>
      <figure class = "p-flow__list__img">
        <img src = "<?php echo get_template_directory_uri(); ?>/dist/img/flow/flow05.jpg">
      </figure>
    </li>

    <li class = "p-flow__list__item js-color">
      <div class = "p-flow__list__txtWrap">
        <h3 class = "p-flow__list__ttl">
          ⑥ ご契約
        </h3>
        <p class = "p-flow__list__txt">
        プラン･御見積金額にご納得いただいた上でご契約。
        素材の色決めや詳細の決定をさせていただきます。
        ご契約を頂いたお客様から順に工事の段取りに入らさせていただきます。
        </p>
      </div>
      <figure class = "p-flow__list__img">
        <img src = "<?php echo get_template_directory_uri(); ?>/dist/img/flow/flow06.jpg">
      </figure>
    </li>

    <li class = "p-flow__list__item js-color">
      <div class = "p-flow__list__txtWrap">
        <h3 class = "p-flow__list__ttl">
        ⑦ 着工
        </h3>
        <p class = "p-flow__list__txt">
        工事期間は規模にもよりますが、通常2週間から1か月程度頂いております。
        </p>
      </div>
      <figure class = "p-flow__list__img">
        <img src = "<?php echo get_template_directory_uri(); ?>/dist/img/flow/flow07.jpg">
      </figure>
    </li>

    <li class = "p-flow__list__item js-color">
      <div class = "p-flow__list__txtWrap">
        <h3 class = "p-flow__list__ttl">
        ⑧ 完成・お引き渡し
        </h3>
        <p class = "p-flow__list__txt">
        弊社保証基準に基づき、アフターメンテナンスをさせていただきます。
        気になる点がございましたら、お気軽にお申しつけ下さい。
        ※ご契約時に保証書をお渡ししております。
        </p>
      </div>
      <figure class = "p-flow__list__img">
        <img src = "<?php echo get_template_directory_uri(); ?>/dist/img/flow/flow08.jpg">
      </figure>
    </li>
  </ul>
  <a href = "<?php echo esc_url (home_url('contact') ); ?>" class = "c-button--contact u-mb150 u-opacity js-up">お問い合わせはこちら</a>
</section>
<section class = "p-guideBtn u-mb150">
  <h3 class = "c-title--page u-alignCenter u-mb50 u-opacity js-up">
    事業案内
  </h3>
  <div class = "p-guideBtn__imgWrap__content">
    <div class = "p-guideBtn__imgWrap__inner u-opacity js-up">
      <a href = "<?php echo esc_url (home_url('exterior-works') ); ?>" class = "p-guideBtn__link">
        <figure class = "p-guideBtn__imgWrap">
          <img src = "<?php echo get_template_directory_uri(); ?>/dist/img/common/archive04.jpg" class = "p-guideBtn__img">
        </figure>
      </a>
      <p class = "p-guideBtn__term">
        施工事例
      </p>
    </div>

    <div class = "p-guideBtn__imgWrap__inner u-opacity js-up">
      <a href = "<?php echo esc_url (home_url('line-up') ); ?>" class = "p-guideBtn__link">
        <figure class = "p-guideBtn__imgWrap">
          <img src = "<?php echo get_template_directory_uri(); ?>/dist/img/common/page01.jpg" class = "p-guideBtn__img">
        </figure>
      </a>
      <p class = "p-guideBtn__term">
        ラインナップ
      </p>
    </div>

    <div class = "p-guideBtn__imgWrap__inner u-opacity js-up">
      <a href = "<?php echo esc_url (home_url('xo_event') ); ?>" class = "p-guideBtn__link">
        <figure class = "p-guideBtn__imgWrap">
          <img src = "<?php echo get_template_directory_uri(); ?>/dist/img/common/archive01.jpg" class = "p-guideBtn__img">
        </figure>
      </a>
      <p class = "p-guideBtn__term">
        イベント
      </p>
    </div>
  </div>
</section>
<a href ="<?php echo esc_url (home_url('') ); ?>" class = "c-button--jp u-mb150 u-opacity js-up">ホームに戻る</a>
</main>
<?php get_footer(); ?>