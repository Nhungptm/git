<?php
/*
Template Name: ご予約フォーム ー エラー画面 ー
*/
?>
<?php get_header(); ?>
<main id="main-content">
  <div class="bread-crumbs">
    <ul class="clearfix inner">
      <li><a href="<?php bloginfo('url'); ?>">ホーム</a></li>
      <li>ご予約フォーム </li>
    </ul>
  </div>
  <div id="vivid-trigger" class="wrap">
    <section class="detail-content inner">
      <h2 class="detail-h2-ttl">送信エラー</h2>
      <h2 class="detail-h2-ttl">決済エラー</h2>
      <div class="contact-form-done">
        <p>申し訳ございません。内容を正しく送信できませんでした。</p>
        <p>申し訳ございません。決済が完了できませんでした。<br>詳細はカード会社にお問い合わせください。</p>
        <p>内容に誤りがございました。もう一度入力をし直してください。</p>
        <p class="contact-form-done-back"><a href="<?php bloginfo('url'); ?>">ツアーの詳細に戻る</a></p>
        <p class="contact-form-done-back"><a href="<?php bloginfo('url'); ?>">トップに戻る</a></p>
        <p class="contact-form-done-back"><a href="<?php bloginfo('url'); ?>">再入力</a></p>
      </div>
    </section>
  </div>
</main>
<?php get_footer(); ?>