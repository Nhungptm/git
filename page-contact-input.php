<?php
/*
Template Name: お問い合わせ ー 入力画面 ー
*/
session_start();

$get_data = null;
if(!isset($_GET['reset'])){
    unset($_SESSION['data']);
} else {
  if(isset($_SESSION['data'])) $get_data = $_SESSION['data'];
}

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
      <div class="step-bar-wrap">
        <ol class="step-bar">
          <li class="current">1.入力</li>
          <li>2.確認</li>
          <li>3.送信完了</li>
        </ol>
      </div>      
      <form class="contact-form" id="contactform" action="http://localhost/airport-tourisum/contact-output/">
      <input type="hidden" name="thamso" value="contact">
        <div class="contact-form-in">
         <dl>
            <dt><span>[任意]</span>ご予約番号</dt>
            <dd><input type="text" name="res_id" value="<?php echo isset($get_data['res_id']) ? $get_data['res_id'] : ''; ?>" placeholder="20170101000001" /><br>
            <span>ご予約番号をお持ちの方はご入力くださいませ。</dd>
          </dl>
          <dl>
            <dt><span class="required">[必須]</span>お名前</dt>
            <dd><input type="text" name="namae" value="<?php echo isset($get_data['namae']) ? $get_data['namae'] : ''; ?>" placeholder="貸切　太郎" class="validate[required]"/></dd>
          </dl>
          <dl>
            <dt><span class="required">[必須]</span>お名前（ローマ字）</dt>
            <dd><input type="text" name="phonetic_name" value="<?php echo isset($get_data['phonetic_name']) ? $get_data['phonetic_name'] : ''; ?>" placeholder="Kashikiri Taro" class="validate[required]" /></dd>
          </dl>
          <dl>
            <dt><span class="required">[必須]</span>国籍</dt>
            <dd><input type="text" name="nationality" value="<?php echo isset($get_data['nationality']) ? $get_data['nationality'] : ''; ?>" placeholder="アメリカ合衆国" class="validate[required]" /></dd>
          </dl>
          <dl>
            <dt><span class="required">[必須]</span>お電話番号</dt>
            <dd><input type="tel" name="phone_number" value="<?php echo isset($get_data['phone_number']) ? $get_data['phone_number'] : ''; ?>" placeholder="090-1234-5678" class="validate[required]" /></dd>
          </dl>
          <dl>
            <dt><span class="required">[必須]</span>メールアドレス</dt>
            <dd><input type="email" name="email1"  value="<?php echo isset($get_data['email1']) ? $get_data['email1'] : ''; ?>" placeholder="kashikiri-taro@airporttourism.jp" class="validate[required]" /></dd>
          </dl>
          <dl>
            <dt><span class="required">[必須]</span>メールアドレス(再入力）</dt>
            <dd><input type="email" name="email2"  value="<?php echo isset($get_data['email2']) ? $get_data['email2'] : ''; ?>" placeholder="kashikiri-taro@airporttourism.jp" class="validate[required]" /></dd>
          </dl>
          <dl>
            <dt><span>[任意]</span>問い合わせ種別</dt>
            <dd>
              <label class="check-style"><input type="checkbox" name="option1" value="商品内容" <?php if(isset($get_data['option1']) && $get_data['option1'] !="") {?> checked="checked" <?php } ?> /><span>商品内容</span></label>
              <label class="check-style"><input type="checkbox" name="option2" value="予約方法" <?php if(isset($get_data['option2']) && $get_data['option2'] !="") {?> checked="checked" <?php } ?> /><span>予約方法</span></label>
              <label class="check-style"><input type="checkbox" name="option3" value="会員登録・変更・ログイン" <?php if(isset($get_data['option3']) && $get_data['option3'] !="") {?> checked="checked" <?php } ?> /><span>会員登録・変更・ログイン</span></label>
              <label class="check-style"><input type="checkbox" name="option4" value="お支払い・領収証" <?php if(isset($get_data['option4']) && $get_data['option4'] !="") {?> checked="checked" <?php } ?> /><span>お支払い・領収証</span></label>
              <label class="check-style"><input type="checkbox" name="option5" value="予約内容" <?php if(isset($get_data['option5']) && $get_data['option5'] !="") {?> checked="checked" <?php } ?> /><span>予約内容</span></label>
              <label class="check-style"><input type="checkbox" name="option6" value="予約変更" <?php if(isset($get_data['option6']) && $get_data['option6'] !="") {?> checked="checked" <?php } ?> /><span>予約変更</span></label>
              <label class="check-style"><input type="checkbox" name="option7" value="予約キャンセル" <?php if(isset($get_data['option7']) && $get_data['option7'] !="") {?> checked="checked" <?php } ?> /><span>予約キャンセル</span></label>
              <label class="check-style"><input type="checkbox" name="option8" value="旅行保険" <?php if(isset($get_data['option8']) && $get_data['option8'] !="") {?> checked="checked" <?php } ?> /><span>旅行保険</span></label>
              <label class="check-style"><input type="checkbox" name="option9" value="苦情・ご意見・ご感想" <?php if(isset($get_data['option9']) && $get_data['option9'] !="") {?> checked="checked" <?php } ?> /><span>苦情・ご意見・ご感想</span></label>
              <label class="check-style"><input type="checkbox" name="option10" value="その他" <?php if(isset($get_data['option10']) && $get_data['option10'] !="") {?> checked="checked" <?php } ?> /><span>その他</span></label>
            </dd>
          </dl>
          <dl>
            <dt><span class="required">[必須]</span>お問い合わせ内容</dt>
            <dd>
              <textarea name="course" placeholder="問い合わせ内容をご入力ください" class="validate[required]" ><?php echo isset($get_data['course']) ? $get_data['course'] : ''; ?></textarea>
            </dd>
          </dl>
        </div>
        <div class="privacy-area">
          <label for="privacy"><p><a href="<?php bloginfo('url'); ?>/privacy" target="_blank">※個人情報保護方針</a>をご確認の上、同意いただける場合は「個人情報保護方針に同意する」にチェックを入れてください。</p>
            <div class="privacy-check"><input type="checkbox" name="confirm" id="privacy" class="validate[required]" onclick="setSendEnable('commit', this.checked)"/><span>個人情報保護方針に同意する</span></div>
          </label>
        </div>
        <div class="contact-form-submit">
          <input type="submit" name="commit" value="" disabled="disabled" />
          <p class="text-xs-center">入力内容を確認する</p>
        </div>
      </form>

    </section>
  </div>
</main>
<?php get_footer(); ?>