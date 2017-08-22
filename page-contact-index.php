<?php
/*
Template Name: お問い合わせ
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
      <h2 class="detail-h2-ttl">お問い合わせ</h2>
      <div class="contact-index">
        <table class="contact-index-table">
          <tr>
            <th>お客様から寄せられるご質問をまとめました</th>
            <td class="link-btn"><a href="<?php bloginfo('url'); ?>/faq">よくあるご質問</a></td>
          </tr>
          <tr>
            <th>大人数でのご利用、バスの貸し切り等様々なご要望にご対応可能なオーダーメイドプラン。まずはお見積りから。</th>
            <td class="link-btn"><a href="<?php bloginfo('url'); ?>/ordermade-input">オーダーメイドプランのお見積り</a></td>
          </tr>
          <tr>
            <th>サービスへのお問い合わせ・ご意見、遺失物のお問い合わせ等はこちらから。</th>
            <td class="link-btn"><a href="<?php bloginfo('url'); ?>/contact-input">お問い合わせ</a></td>
          </tr>
        </table>
        <div class="contact-tel-box">
          <p>お電話でのお問い合わせはこちら</p>
          <p class="tel">0479-76-7177</p>
          <p class="time">受付時間　年中無休9:00-18：00</p>
        </div>
      </div>
    </section>
  </div>
</main>
<?php get_footer(); ?>