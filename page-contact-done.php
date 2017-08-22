<?php
/*
Template Name: お問い合わせ ー 完了画面 ー
*/
?>
<?php get_header(); ?>
<main id="main-content">
  <div class="bread-crumbs">
    <ul class="clearfix inner">
      <li><a href="<?php bloginfo('url'); ?>">ホーム</a></li>
      <li>お問い合わせ</li>
    </ul>
  </div>
  <div id="vivid-trigger" class="wrap">
    <section class="detail-content inner">
      <h2 class="detail-h2-ttl">お問い合わせー 申し込み完了 ー</h2>
      <div class="step-bar-wrap">
        <ol class="step-bar">
          <li class="current">1.入力</li>
          <li class="current">2.確認</li>
          <li class="current">3.送信完了</li>
        </ol>
      </div>
      <div class="contact-form-done">
        <p>お問い合わせいただきありがとうございます。</p>
        <p>後日、弊社担当よりご返答いたしますので、今しばらくお待ちください。</p>
        <p class="contact-form-done-back"><a href="<?php bloginfo('url'); ?>">サイトのTOPへ戻る</a></p>
      </div>
    </section>
  </div>
</main>
<?php get_footer(); ?>