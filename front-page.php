<?php 
/*
Template Name: FrontPage
*/
get_header(); ?>

<main class = "p-top">
  <div class = "p-top__mv__fixed">
    <div class = "p-top__mv__outer">
      <ul class = "p-top__mv u-mb150 p-top__mv__slider">
        <li class = "p-top__mv__sliderItem"><img src = "<?php echo get_template_directory_uri(); ?>/dist/img/top/mv02.jpg" alt = "メインビジュアル"></li>
        <li class = "p-top__mv__sliderItem"><img src = "<?php echo get_template_directory_uri(); ?>/dist/img/top/mv03.jpg" alt = "メインビジュアル"></li>
      </ul>
      <p class = "p-top__mv__txt">
        We will color your daily life the garden.
      </p>
      <figure class = "c-logo p-top__mv__logo u-none__mobile--xxl">
        <img src = "<?php echo esc_url (get_template_directory_uri() ); ?>/dist/img/common/header_logo.png">
      </figure>
      <div class="c-scrollBar"><span>Scroll</span></div>
    </div>
  </div>
<section class = "p-top__parallax__wrap"> 
  <section class = "p-exterior__company l-content--mostLarge u-mb150">
    <div class = "l-content--large p-exterior__company__ttlWrap">
      <h2 class = "c-title--page u-alignCenter js-up u-opacity p-top__pageTtl">
        彩緑IRODORI
      </h2>
      <figure class = "c-logo u-mb100 js-up u-opacity">
        <!--<img src = "<?php echo esc_url (get_template_directory_uri() ); ?>/dist/img/common/header_logo.png">-->
      </figure>
      <h3 class = "c-title--section js-up u-opacity">
        BUSSINESS DETAILS
      </h3>
      <a href = "<?php echo esc_url (home_url('depertment-overview') ); ?>" class = "c-button--smallEn js-up u-opacity">
        View More
      </a>
    </div>
    <div class = "p-exterior__company__content u-mb70">
      <div class = "p-exterior__company__imgWrap js-up u-opacity">
        <img src = "<?php echo get_template_directory_uri(); ?>/dist/img/exterior/ex06.jpg" class = "js-delay">
      </div>
      <div class = "p-exterior__company__txtWrap js-up u-opacity">
        <h3 class = "p-exterior__company__txtTtl">
          理想の暮らしを形に
        </h3>
        <span class = "p-exterior__company__txtTtl--sub">
          Give shape to your ideal life.
        </span>
        <p class = "p-exterior__company__txt">
          家づくりを満足いくものにするためには
        <br>“家と外構の調和” がとても重要だと考えます
        <br> 家づくりの計画と同時に外構計画を進める
        <br>ことで、家×庭の魅力を最大限に引き出し、
        <br>自然と共存しながら
        <br>快適で心豊かな暮らしを提供します
        <br>そして、日々の暮らしを彩りあるものにします
        </p>
      </div>
      <figure class = "p-exterior__company__imgWrap--right js-up u-opacity u-delay">
        <img src = "<?php echo get_template_directory_uri(); ?>/dist/img/exterior/ex07.jpg"/ class = "js-delay">
      </figure>
    </div>
    <a href = "<?php echo esc_url (home_url('depertment-overview') ); ?>" class = "c-button--jp js-up">
      詳細はこちら
    </a>
  </section>

  <section class = "p-top__philo u-mb100">
    <div class = "p-top__philo__content">
      <figure class = "p-top__philo__videoWrap">
        <video playsinline muted autoplay loop src="<?php echo get_template_directory_uri(); ?>/dist/img/top/philo.mov" class = "p-top__philo__video"></video>
      </figure>
      <p class = "p-top__philo__ttl">
        PHILOSOPHY
      </p>
      <p class = "p-top__philo__ttl--sub">IRODORIのこと</p>
    </div>
    <div class = "p-top__philo__txtContent">
      <div class = "p-top__philo__txtContentInner">
        <p class = "p-top__philo__txt js-up u-opacity">
          私たちは緑溢れるお庭づくりを通してお客様の
          <br class = "u-none__mobile--md">日常を
            彩りあるものにします。
        </p>
      </div>
    </div>
  </section>

  <section class = "p-exterior__works l-content--mostLarge">
    <h2 class = "c-title--section u-opacity js-up">
      WORKS
    </h2>
    <a class = "c-button--smallEn u-mb70 js-up u-opacity">
      View More
    </a>
    <ul class = "p-exterior__works__list js-up js-workSlider u-opacity">
      <?php
        $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;//get_query_var('paged')で現在表示されているページ番号を取得する。
        $args = array(
        'post_type' => 'exterior-works',
        'paged'=>$paged,//get_query_varで得られた現在表示されているページ番号を渡す。この部分は、ページネーションが正しく機能するために非常に重要です。get_query_var('paged') で取得した値を 'paged' => $paged としてクエリに設定することで、正しいページが表示されるようになります。
        'order' => 'DESC',
        'orderby' => 'date', 
        'posts_per_page' =>8,
      );?>

      <?php $myQuery = new WP_Query($args);?>
        <?php if ($myQuery->have_posts()): ?>
        <?php while ($myQuery->have_posts()) : $myQuery->the_post();?>
          <li class = "p-exterior-works__item">
            <a href = "<?php the_permalink(); ?>" class = "c-overlay__img__wrap c-overlay p-exterior-works__item__imgWrap">
              <img src = "<?php the_field('feature-img'); ?>" class = "c-overlay__img p-exterior-works__item__img">
            </a>
            <p class = "p-exterior-works__listTtl"><?php the_title(); ?></p>
              <div class = "p-exterior-works__listTagWrap">
                <?php if(get_field('feature')): ?>
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
                <?php endif; ?> 
              </div>
            
          </li>
          <?php endwhile;
        endif;
      wp_reset_postdata();?>
    </ul>
    <a href = "<?php echo esc_url (get_post_type_archive_link('exterior-works')); ?>" class = "c-button--jp js-up u-opacity">一覧はこちら</a>
  </section>
  
  <section class = "p-exterior__lineUp">
    <h2 class = "c-title--section u-alignCenter js-up u-opacity">
      LINE UP
    </h2>
    <p class = "c-title--smallEn u-alignCenter js-up u-mb45 u-opacity">Line Up</p>
    <div  class = "p-exterior__lineUp__content js-up u-opacity">
      <div class = "p-exterior__lineUp__videoWrap">
        <video playsinline muted autoplay loop src="<?php echo get_template_directory_uri(); ?>/dist/img/exterior/lineUp01.mp4" class = "js-delay"></video>
      </div>
      <ul class = "p-exterior__lineUp__list">
        <?php
          $page_ids = array(83,206); 
          $args = array(
            'post_type' => 'page',
            'post__in' => $page_ids,
            'orderby' => 'ID',
            'order' => 'ASC',
          );?>
        <?php $myQuery = new WP_Query($args);?>
          <?php if ($myQuery->have_posts()): ?>
            <?php while ($myQuery->have_posts()) : $myQuery->the_post();?>
            <a href = "<?php the_permalink(); ?>" class = "p-exterior__lineUp__item c-overlay--delay  u-hovered">
              <img src = "<?php echo get_template_directory_uri(); ?>/dist/img/exterior/ex04.jpg" class = "p-exterior__lineUp__img c-overlay__img--delay js-delay">
              <p class = "p-exterior__lineUp__itemTtl c-overlay__txt--delay">
                <span class = "c-button--smallEnLarge">ViewMore</span>
                <br><?php the_field('line-up-en'); ?>
              </p>
            </a>
          <?php endwhile;
            endif;
          wp_reset_postdata();?>
      </ul>
    </div>
    <a href = "<?php echo esc_url (home_url('line-up') ); ?>" class = "c-button--jp js-up u-opacity">
      一覧はこちら
    </a>
  </section>

  <section class = "p-exterior__flow  l-content--mostLarge">
    <div class = "p-exterior__flow__inner">
      <div class = "p-exterior__flow__left">
        <figure class = "p-exterior__flow__imgWrap js-up u-opacity">
          <img src = "<?php echo get_template_directory_uri(); ?>/dist/img/top/flow01.jpg" class = "js-delay">
        </figure>
        <!--
        <p class = "p-exterior__flow__txt js-up u-opacity">
        テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト
        </p>
        -->
      </div>
      <div class = "p-exterior__flow__right">
        <h2 class = "c-title--section u-alignRight js-up u-opacity">
          FLOW
        </h2>
        <a href = "<?php echo esc_url (home_url('flow') ); ?>" class = "c-button--smallEnRight u-mb120 js-up u-opacity">
          View More
        </a>
        <figure class = "p-exterior__flow__rightImgWrap js-up u-opacity">
          <img src = "<?php echo get_template_directory_uri(); ?>/dist/img/top/flow02.jpg"/ class = "js-delay">
        </figure>
      </div>
    </div>
    <a href = "<?php echo esc_url (home_url('flow') ); ?>" class = "c-button--jp js-up u-opacity">詳細はこちら</a>
  </section>

  <section class = "p-exterior__staff">
    <div class = "l-content--large">
      <h2 class = "c-title--section js-up u-opacity">
        STAFF
      </h2>
      <a href = "<?php echo esc_url (get_post_type_archive_link('staff')); ?>"class = "js-up u-opacity c-button--smallEn u-mb70">
        View More
      </a>
    </div>
    <ul class = "p-exterior__staff__list u-mb60 l-content--mostLarge js-up u-opacity" id = "js-staffSlider">
      <?php
      $args = array(
        'post_type' => 'staff',
        'posts_per_page' => -1,
        'order' => 'DESC',
      );?>
      <?php $staffLoop = new WP_Query($args);?>
      <?php if ($staffLoop->have_posts()): ?>
      <?php while ($staffLoop->have_posts()) : $staffLoop->the_post();?>
        <?php if(get_field('staffImg')): ?>
          <li class = "p-exterior__staff__item">
            <a href = "<?php the_permalink(); ?>">
              <img src = "<?php the_field('staffImg'); ?>">
            </a>
          </li>
        <?php endif; ?>
      <?php endwhile;
      endif;
      wp_reset_postdata();?>
    </ul>
    <a href = "<?php echo esc_url (home_url('staff') ); ?>"class = "c-button--jp js-up u-opacity">詳細はこちら</a>
  </section>

  <section class = "p-exterior__blog l-content--mostLarge">
    <h2 class = "c-title--section u-alignRight js-up u-opacity">
      BLOG
    </h2>
    <a class = "c-button--smallEnRight u-mb70 js-up u-opacity">
      View More
    </a>
    <div class = "p-exterior__blog__content">
      <figure class = "p-exterior__blog__rightImgWrap js-up u-opacity">
        <img src = "<?php echo get_template_directory_uri(); ?>/dist/img/top/blog04.jpg" class = "js-delay">
      </figure>
      <div class = "p-exterior__blog__leftImgWrap">
        <figure class = "p-exterior__blog__leftImg js-up js-up u-opacity">
          <img src = "<?php echo get_template_directory_uri(); ?>/dist/img/top/blog02.jpg" class = "js-delay">
        </figure>
        <figure class = "p-exterior__blog__leftImg u-marginLeftAuto js-up u-opacity">
          <img src = "<?php echo get_template_directory_uri(); ?>/dist/img/top/blog03.jpg" class = "js-delay">
        </figure>
      </div>
    </div>
    <a href = "<?php echo esc_url (get_post_type_archive_link('blog')); ?>"class = "c-button--jp js-up u-opacity">詳細はこちら</a>
  </section>
  
  <div class = "l-content--large">
    <h2 class = "c-title--section u-mb50 js-up u-opacity">
      RECRUIT
    </h2>
  </div>
  <section class = "p-top__recruit l-content--mostLarge js-up u-opacity">
    <?php $taxonomy = 'recruit-department';?>
    <a href = "<?php echo esc_url (home_url('recruit') ); ?>" class = "p-top__recruit__img__wrap">
      <img src = "<?php echo esc_url (get_template_directory_uri() ); ?>/dist/img/top/blog01.jpg" class = "p-top__recruit__img js-delay">
      
      <p class = "p-top__recruit__ttl">
        <span class = "c-button--smallEnLarge">ViewMore</span>
        <br>IRODORI
        <br>彩緑
      </p>
      <!--
      <p class = "p-top__recruit__txt">
        テキストテキストテキスト
        <br>テキストテキストテキスト
        <br>テキストテキストテキスト
      </p>
      -->
    </a>
  </section>

  <section class = "l-content--large p-event__blog">
    <h2 class = "c-title--section u-mb50 u-alignCenter js-up u-opacity">
      EVENT
    </h2>
    <div class = "p-event__blog__contentOuter">
      <div class = "xo-event__wrap">
        <?php echo do_shortcode('[xo_event_calendar]'); ?>
      </div>
      <div class = "p-event__blog__content">
        <ul class = "p-event__blog__list">
          <?php
            $args = array(
            'post_type' => 'xo_event',
            'posts_per_page' => -1,
            'order' => 'DESC',
          );?>
          <?php $eventLoop = new WP_Query($args);?>
          <?php if ($eventLoop->have_posts()): ?>
          <time class = "p-event__blog__time"></time>

          <div class = "p-event__blog__overflow">
            <?php while ($eventLoop->have_posts()) : $eventLoop->the_post();?>
              <li class = "p-event__blog__listItem">
                <a href = "<?php the_permalink(); ?>" class = "p-event__blog__link">
                  <time class = "p-event__blog__startDate">
                    <?php echo do_shortcode('[xo_event_field field="start_date"]'); ?>
                  </time>
                  <time class = "p-event__blog__endDate">
                    <?php echo do_shortcode('[xo_event_field field="end_date"]'); ?>
                  </time>
                  <figure class = "p-event__blog__imgWrap">
                    <img src = "<?php the_field('event-img'); ?>">
                  </figure>
                  <div class = "p-event__blog__txtContent">
                    <p class = "p-event__blog__ttl eventDate">
                      <?php the_title(); ?>
                    </p>
                    
                    <time class = "p-event__blog__startTime">
                      <?php echo do_shortcode('[xo_event_field field="start_time"]'); ?>
                    </time>
                      ～
                    <time class = "p-event__blog__endTime">
                      <?php echo do_shortcode('[xo_event_field field="end_time"]'); ?>
                    </time>
                    
                    <?php $eventArea = get_field('event-area');?>
                      <?php if($eventArea && !($eventArea === '---')): ?>
                        <p class="p-event__blog__area">
                          <?php the_field('event-area'); ?>
                        </p>
                      <?php endif; ?>

                    <p class = "p-event__blog__tag">
                      <?php if(get_field('type')): ?>
                        <?php $queryTerms = get_the_terms(get_the_ID(), 'event-type');?>
                          <?php $queryTerm = /*ループ内で表示する投稿に属するタームが一つの場合はそのタームは
                          自動的にインデックス番号0に格納され、その投稿に紐ずいていないタームは、
                          ０以外にインデックス番号に格納される*/
                            $queryTerms[0]->name;?>
                        <?php echo $queryTerm;?>
                      <?php endif; ?> 
                    </p>
                  </div>
                </a>
              </li>
              <?php endwhile;?>
            <?php endif;
            wp_reset_postdata();?>
          </div>
        </ul>
        <!--
        <p class= "p-event__blog__noPost">
          イベントはありません        
        </p>
        -->
      </div>
    </div>
    <a href = "<?php echo esc_url (home_url('application') ); ?>" class = "c-button--event u-mb150 js-up u-opacity">
      イベント予約はこちら
    </a>
  </section>

  
  
  <section class = "p-top__news js-up u-opacity">
    <h3 class = "c-title--en u-alignCenter">
       お知らせ
       <span class = "c-title--en">
        -News-
       </span>
    </h3>
    <a href = "<?php echo esc_url (home_url('news') ); ?>" class = "c-button--small p-top__news__button">
      お知らせ一覧
    </a>
    <div class = "l-content--small p-top__news__wrap">
      <?php
      $args = array(
      'post_type' => 'news',
      'posts_per_page' => 3,
      'order' => 'DESC',
      );?>
      <?php $newsLoop = new WP_Query($args);?>
      <?php if ($newsLoop->have_posts()): ?>
      <?php while ($newsLoop->have_posts()) : $newsLoop->the_post();?>
    
      <article class = "p-top__news__article">
        <div class = "p-top__news__detaWrap">
          <p class = "p-top__news__txtTitle">
            ニュース
          </p>
          <time class = "p-top__news__deta">
            <?php echo get_the_date('y/m/d'); ?>
          </time>
        </div>
        <a class = "p-top__news__txt" href = "<?php the_permalink(); ?>">
          <?php the_excerpt(); ?>
        </a>
      </article>
      <?php endwhile;
        endif;
        wp_reset_postdata();
      ?>
    </div>
  </section>
  
  <section class = "p-top__company">
    <div class = "c-table__wrap"></div>
      <table class = "c-table">
      <h2 class = "c-title--section u-alignCenter p-depertment-overview__ttl u-mb50">
        BUSINESS DETAILS
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

  <section class = "p-guide__access l-content--middle">
    <p class = "c-title--section u-alignCenter u-mb40">
      ACCESS
    </p>
    <div class = "p-guide__access__content js-up u-opacity">
      <p class = "p-guide__access__area">彩緑IRODORI</p>
      <address class = "p-guide__access__address">〒891-0123 鹿児島県鹿児島市卸本町6-4 2F</address>
    </div>
  </section>
      
</section>
</main>

<?php get_footer(); ?>