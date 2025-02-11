<?php 
// Template Name: depertment-overview
get_header(); ?>
<main>
<ul class = "p-bread__list l-content  u-pt40">
  <li class = "p-bread__list__item"><a href = "<?php echo esc_url (home_url('') ); ?>" class = "p-bread__list__link">ホーム</a><span class = "p-bread__list__arrow">></span></li>
  <li class = "p-bread__list__item">事業概要</li>
</ul>
<section class = "p-depertment-overview">
  <div class = "c-table__wrap"></div>
  
  <table class = "c-table u-opacity js-up">
    <h2 class = "c-title--page u-alignCenter p-depertment-overview__ttl u-mb50 u-opacity js-up">
      事業概要
    </h2>
    <tbody>
        <tr>
          <th>事業所名</th>
          <td>彩緑</td>
        </tr>
        <tr>
          <th>事業所所在地</th>
          <td>鹿児島県鹿児島市卸本町6-4 2F</td>
        </tr>
        <!--
        <tr>
          <th>電話番号</th>
          <td>099-264-8555</td>
        </tr>
        <tr>
          <th>FAX番号</th>
          <td>●●●-●●●-●●●●</td>
        </tr>
        -->
        <tr>
          <th>代表取締役</th>
          <td>馬場  一綱</td>
        </tr>
        <!--
        <tr>
          <th>設立年月日</th>
          <td>●●年●月●日</td>
        </tr>
        <tr>
          <th>資本金</th>
          <td>●●●●円</td>
        </tr>
        -->
        <tr>
          <th>従業員</th>
          <td>6人(営業1名、プランナー3名、左官1名、現場監督1名)</td>
        </tr>
        <tr>
          <th>事業内容</th>
          <td>カーポート、外構エクステリア、リガーデン</td>
        </tr>
        <tr>
          <th class = "c-table__th__last">取り扱いメーカー</th>
          <td class = "c-table__td__last">
            三協立山(株)、(株)リクシル、(株)エクシス、セキスイデザインワークス(株)、
            <br>(株)おしゃ楽、東洋工業(株)、四国化成工業(株)、YKK(株)、(株)ユニソン、
            <br>(株)福彫、(株)タカショー
          </td>
        </tr>
      </tbody>
  </table>  
</section>
  <section class = "u-mb150 l-content--middle">
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