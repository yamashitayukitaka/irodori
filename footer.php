<footer class = "l-footer">
  <div class = "l-footer__inner">
    <p class = "l-footer__ttl ">
      <a href = "<?php echo esc_url (home_url() ); ?>">
        彩緑IRODORI
      </a>
    </p>
    <address class = "l-footer__address">
    〒000-0000 鹿児島県鹿児島市西別府123 TEL:099-1234-5678 FAX:099-1234-5678
    </address>
    <span class = "l-footer__line u-mb50"></span>
    <div class = "l-footer__list__outer">
      <div class = "l-footer__list__inner">
        <ul class = "l-footer__list">
          <div class = "l-footer__list__flex">
            <li class = "l-footer__list__item">
              <a href = "<?php echo esc_url (home_url('depertment-overview') ); ?>">事業概要</a>
            </li>
            <li class = "l-footer__list__item">
              <a href = "<?php echo esc_url (home_url('exterior-works') ); ?>">
                施工事例
              </a>
            </li>
            <li class = "l-footer__list__item">
              <a href = "<?php echo esc_url (home_url('line-up') ); ?>">ラインナップ</a></li>
            <li class = "l-footer__list__item">
              <a href = "<?php echo esc_url (home_url('flow') ); ?>">
                完成までの流れ
              </a>
            </li>
            <li class = "l-footer__list__item">
              <a href = "<?php echo esc_url (home_url('recruit') ); ?>">
                採用情報
              </a>
            </li>
          </div>
          <div class = "l-footer__list__flex">
            <li class = "l-footer__list__item">
              <a href = "<?php echo esc_url (home_url('xo_event') ); ?>">イベント情報
            </li>
            <li class = "l-footer__list__item">
              <a href = "<?php echo esc_url (get_post_type_archive_link('blog')); ?>">
                ブログ
              </a>
            </li>
            <li class = "l-footer__list__item">
              <a href = "<?php echo esc_url (get_post_type_archive_link('staff')); ?>">
                スタッフ
              </a>
            </li>
            <li class = "l-footer__list__item">
              <a href = "<?php echo esc_url (home_url('contact') ); ?>">
                お問い合わせ
              </a>
            </li>
          <div>
        </ul>
      </div>
    </div>
    <span class = "l-footer__line u-mb40"></span>
  </div>
  <copy class = "l-footer__copy">
    Copyright © 2024 彩緑IRODORI All rights reserved
  </copy>
</footer>
<?php wp_footer(); ?>

</body>
</html>