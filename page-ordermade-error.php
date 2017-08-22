<?php
/*
Template Name: オーダメイドプラン ー エラー画面 ー
*/
?>
<?php get_header(); ?>
<main id="main-content">
  <div class="bread-crumbs">
    <ul class="clearfix inner">
      <li><a href="<?php bloginfo('url'); ?>">ホーム</a></li>
      <li>オーダーメイド</li>
    </ul>
  </div>
  <div id="vivid-trigger" class="wrap">
    <section class="detail-content inner">
      <h2 class="detail-h2-ttl">送信エラー</h2>
      <div class="contact-form-done">
        <p>申し訳ございません。内容を正しく送信できませんでした。</p>
        <p>お手数をおかけいたしますが、もう一度入力をやり直してください。</p>
        <p class="contact-form-done-back"><a href="<?php bloginfo('url'); ?>/ordermade-input">オーダーメイドプランの申し込み</a></p>
      </div>
    </section>
  </div>
</main>
<?php get_footer(); ?>