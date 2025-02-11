<?php
  $default_page_title = "彩緑IRODORI";
  $default_page_description = "彩緑IRODORIは鹿児島県鹿児島市にある、外構、エクステリア、造園、設計施工事業所です";
  $category = "カテゴリー";
  $default_page_ogp_image = get_template_directory_uri()."/dist/img/common/header_logo.png";
  $default_page_ogp_description = "彩緑IRODORIのコーポレートサイトです";
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>
    <?php
      if(is_front_page()) {
        echo $default_page_title;
      }elseif(is_post_type_archive()){
        echo get_the_archive_title().' | '.  $default_page_title;
      }elseif (is_tax()) {
        echo $category .' | '.  $default_page_title;;
      }else{
        echo get_the_title().' | '.$default_page_title;
      }
    ?>
  </title>
  <meta name="description" content="<?php echo $default_page_description;?>">
  <!--og:titleメタタグは、ウェブページのタイトルを定義します。このタグは、ウェブページがFacebook上で共有されたときに、共有されたリンクの見出しとして表示されます。-->
  <meta property="og:title" content="
    <?php
      if(is_front_page()) {
        echo $default_page_title;
      }elseif(is_post_type_archive()){
        echo get_the_archive_title().' | '.  $default_page_title;
      }elseif (is_tax()) {
        echo $category .' | '.  $default_page_title;;
      }else{
        echo get_the_title().' | '.$default_page_title;
      }
    ?>
  ">

  <!--このタグは、ウェブページがFacebookなどのソーシャルメディアで共有された場合に、共有されたリンクの説明として表示されます。-->
  <meta
    property="og:description"
    content="<?php 
      echo $default_page_ogp_description;
  ?>">

  <meta property="og:image" content="<?php
    echo $default_page_ogp_image;
  ?>"/>
  <!--メタタグを設定することで、共有時に適切な言語と地域に基づいてウェブページのメタデータが表示されるようになります。たとえば、共有されたリンクのプレビューやタイトルが、日本語で表示されるようになります。-->
  <meta property="og:locale" content="ja_JP" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Shippori+Antique+B1&family=Shippori+Mincho&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Noto+Serif+JP&display=swap" rel="stylesheet">

  <?php wp_head(); ?>
</head>
<body>
  <div id="loading">
		<div class="spinner">
      <img src = "<?php echo esc_url (get_template_directory_uri() ); ?>/dist/img/common/header_logo.png">
		</div>
	</div>
  <div class = "u-mouse u-none__mobile--xl"></div>
  <header id="js-measure"  class ="l-header">
    <div class = "l-content l-header__content">
      <a href="<?php echo esc_url(home_url('/')); ?>">
        <h1 class = "l-header__logo">
          <img src = "<?php echo esc_url (get_template_directory_uri() ); ?>/dist/img/common/header_logo.png"
            alt="<?php echo $default_page_title; ?>"
          />
        </h1>
      </a>
      <nav class="c-navigation u-none__mobile--xl">
        <ul class="c-navigation__list">
          <li class="c-navigation__list__item">
            <a class="c-navigation__list__link">施工について
            <ul class = "c-navigation__childList">
              <span class = "c-navigation__childList__hoverArea"></span>
              <li class = "c-navigation__childList__item">
                <a href="<?php echo esc_url (home_url('exterior-works') ); ?>">
                  <figure class = "c-navigation__childList__img">
                    <img src = "<?php echo esc_url (get_template_directory_uri() ); ?>/dist/img/common/archive04.jpg">
                  </figure>
                  施工事例
                </a>
              </li>
              <li class = "c-navigation__childList__item">
                <a href="<?php echo esc_url (home_url('line-up') ); ?>">
                  <figure class = "c-navigation__childList__img">
                    <img src = "<?php echo esc_url (get_template_directory_uri() ); ?>/dist/img/common/page01.jpg">
                  </figure>
                  ラインナップ
                </a>
              </li>
              <li class = "c-navigation__childList__item">
                <a href="<?php echo esc_url (home_url('flow') ); ?>">
                  <figure class = "c-navigation__childList__img">
                    <img src = "<?php echo esc_url (get_template_directory_uri() ); ?>/dist/img/flow/flow01.jpg">
                  </figure>
                  完成までの流れ
                </a>
              </li>
            </ul>
          </li>
          <li class="c-navigation__list__item">
            <a href="<?php echo esc_url(home_url('depertment-overview')); ?>" class="c-navigation__list__link">事業概要</a>
          </li>
          <li class="c-navigation__list__item">
            <a href="<?php echo esc_url(home_url("staff")); ?>" class="c-navigation__list__link">スタッフ</a>
          </li>
          <li class="c-navigation__list__item">
            <a href="<?php echo esc_url(home_url("xo_event")); ?>" class="c-navigation__list__link">イベント</a>
          </li>
          <li class="c-navigation__list__item">
            <a href="<?php echo esc_url(home_url("recruit")); ?>" class="c-navigation__list__link">採用情報</a>
          </li>
          <li class="c-navigation__list__item">
            <a href="<?php echo esc_url(home_url('news')); ?>" class="c-navigation__list__link">お知らせ</a>
          </li>
          <li class="c-navigation__list__item">
            <a href="<?php echo esc_url(home_url("blog")); ?>" class="c-navigation__list__link">ブログ</a>
          </li>
          <li class="c-navigation__list__item">
            <a href="<?php echo esc_url(home_url('contact')); ?>" class="c-navigation__list__link">お問い合わせ</a>
          </li>
          <li class="c-navigation__list__item">
            <a class = "l-header__insta" href="https://www.instagram.com/irodori_garden_design/"><img src = "<?php echo esc_url (get_template_directory_uri() ); ?>/dist/img/common/insta.png" style = "width:50px ; height:50px;"></a>
          </li>
        </ul>
      </nav>
    </div>
    
    <div id = "js-hamburger" class = "p-hamburger u-none__pc--xl">
      <div id="js-openHamburger" class="p-hamburger__button">
        <span class="p-hamburger__button__line"></span>
        <span class="p-hamburger__button__line"></span>
        <span class="p-hamburger__button__line"></span>
      </div>
    </div>
    <div class = "p-hamburger__nav" id = "js-hamburger__nav">
      <div class = "p-hamburger__nav__wrap">
        <nav class = "p-hamburger__nav__list">
          <li class = "p-hamburger__nav__item">
            <a href = "<?php echo esc_url (home_url('exterior-works') ); ?>" class = "p-hamburger__nav__link">
              施工事例
            </a>
          </li>
          <li class = "p-hamburger__nav__item">
            <a href = "<?php echo esc_url (home_url('line-up') ); ?>" class = "p-hamburger__nav__link">
              ラインナップ
            </a>
          </li>
          <li class = "p-hamburger__nav__item">
            <a href = "<?php echo esc_url (home_url('flow') ); ?>" class = "p-hamburger__nav__link">
              完成までの流れ
            </a>
          </li>
          <li class = "p-hamburger__nav__item">
            <a href = "<?php echo esc_url (home_url('depertment-overview') ); ?>" class = "p-hamburger__nav__link">
              事業概要
            </a>
          </li>
          <li class = "p-hamburger__nav__item">
            <a href = "<?php echo esc_url (home_url('staff') ); ?>" class = "p-hamburger__nav__link">
              スタッフ
            </a>
          </li>
          <li class = "p-hamburger__nav__item">
            <a href = "<?php echo esc_url (home_url('xo_event') ); ?>" class = "p-hamburger__nav__link">
              イベント
            </a>
          </li>
          <li class = "p-hamburger__nav__item">
            <a class = "p-hamburger__nav__link" href = "<?php echo esc_url (home_url('recruit') ); ?>">
              採用情報
            </a>
          </li>
          <li class = "p-hamburger__nav__item">
            <a class = "p-hamburger__nav__link" href = "<?php echo esc_url (home_url('news') ); ?>">
              お知らせ
            </a>
          </li>
          <li class = "p-hamburger__nav__item">
            <a class = "p-hamburger__nav__link" href = "<?php echo esc_url (home_url('blog') ); ?>">
              ブログ
            </a>
          </li>
          <li class = "p-hamburger__nav__item">
            <a class = "p-hamburger__nav__link" href = "<?php echo esc_url (home_url('contact') ); ?>">
              お問い合わせ
            </a>
          </li>
          <li class = "p-hamburger__nav__item">
            <a class = "p-hamburger__nav__link" href = "https://www.instagram.com/irodori_garden_design/">
              <img src = "<?php echo esc_url (get_template_directory_uri() ); ?>/dist/img/common/insta.png" style = "width:50px ; height:50px;">
            </a>
          </li>
        </nav>
      </div>
    </div>
  </header>
  <a id = "js-top" class = "u-top">
    Top
  </a>

