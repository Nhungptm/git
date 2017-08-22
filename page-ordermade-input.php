<?php
/*
Template Name: オーダメイドプラン ー 入力画面 ー
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
      <li>オーダーメイド</li>
    </ul>
  </div>
  
  <div id="vivid-trigger" class="wrap">
    <section class="detail-content inner">
      <h2 class="detail-h2-ttl">オーダメイドプランの申し込み</h2>
      <div class="step-bar-wrap">
        <ol class="step-bar">
          <li class="current">1.入力</li>
          <li>2.確認</li>
          <li>3.申し込み完了</li>
        </ol>
      </div>
<!-- PHAN 変更 -->
      <form class="contact-form" id="contactform" action="http://localhost/airport-tourisum/ordermade-output/">
      <input type="hidden" name="thamso" value="ordermade">
        <div class="contact-form-in">
          <dl>
            <dt><span class="required">[必須]</span>お名前</dt>
            <dd><input type="text" name="namae" value="<?php echo isset($get_data['namae']) ? $get_data['namae'] : ''; ?>" placeholder="貸切　太郎" class="validate[required]" /></dd>
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
            <dt><span>[任意]</span>団体名・ツアー名</dt>
            <dd><input type="text" name="corporate_name" value="<?php echo isset($get_data['corporate_name']) ? $get_data['corporate_name'] : ''; ?>" placeholder="〇〇会"/></dd>
          </dl>
          <dl>
            <dt><span class="required">[必須]</span>メールアドレス</dt>
            <dd><input type="email" name="email1"  value="<?php echo isset($get_data['email1']) ? $get_data['email1'] : ''; ?>" placeholder="kashikiri-taro@airporttourism.jp" class="validate[required]" /></dd>
          </dl>
          <dl>
            <dt><span class="required">[必須]</span>メールアドレス（再入力）</dt>
            <dd><input type="email" name="email2"  value="<?php echo isset($get_data['email2']) ? $get_data['email2'] : ''; ?>" placeholder="kashikiri-taro@airporttourism.jp" class="validate[required]" /></dd>
          </dl>
          <dl>
            <dt><span class="required">[必須]</span>お電話番号</dt>
            <dd><input type="tel" name="phone_number" value="<?php echo isset($get_data['phone_number']) ? $get_data['phone_number'] : ''; ?>" placeholder="090-1234-5678" class="validate[required]" /></dd>
          </dl>
          <dl>
            <dt><span>[任意]</span>FAX番号</dt>
            <dd><input type="tel" name="fax_number" value="<?php echo isset($get_data['fax_number']) ? $get_data['fax_number'] : ''; ?>" placeholder="03-1234-5678" /></dd>
          </dl>
          <dl>
            <dt><span>[任意]</span>郵便番号</dt>
            <dd><input type="text" name="postal_code" value="<?php echo isset($get_data['postal_code']) ? $get_data['postal_code'] : ''; ?>" placeholder="100-0000" /></dd>
          </dl>
          <dl>
            <dt><span>[任意]</span>ご住所</dt>
            <dd><input type="text" name="address" value="<?php echo isset($get_data['address']) ? $get_data['address'] : ''; ?>" placeholder="千葉県〇〇市〇〇町XX-XX-XX" /></dd>
          </dl>
          <dl>
            <dt><span class="required">[必須]</span>ご利用目的</dt>
            <dd>
              <select name="purpose" class="validate[required]" >
                <option value="" disabled selected>---</option>
                <option value="成田空港送迎" <?php if(isset($get_data['purpose']) && $get_data['purpose'] == 成田空港送迎) {?> selected="selected" <?php } ?>>成田空港送迎</option>
                <option value="旅行・貸切観光" <?php if(isset($get_data['purpose']) && $get_data['purpose'] == 旅行・貸切観光) {?> selected="selected" <?php } ?>>旅行・貸切観光</option>
                <option value="冠婚葬祭" <?php if(isset($get_data['purpose']) && $get_data['purpose'] == 冠婚葬祭) {?> selected="selected" <?php } ?>>冠婚葬祭</option>
                <option value="学校行事" <?php if(isset($get_data['purpose']) && $get_data['purpose'] == 学校行事) {?> selected="selected" <?php } ?>>学校行事</option>
                <option value="視察・研修" <?php if(isset($get_data['purpose']) && $get_data['purpose'] == 視察・研修) {?> selected="selected" <?php } ?>>視察・研修</option>
                <option value="訪日団体ツアー" <?php if(isset($get_data['purpose']) && $get_data['purpose'] == 訪日団体ツアー) {?> selected="selected" <?php } ?>>訪日団体ツアー</option>
                <option value="ゴルフコンペ" <?php if(isset($get_data['purpose']) && $get_data['purpose'] == ゴルフコンペ) {?> selected="selected" <?php } ?>>ゴルフコンペ</option>
                <option value="年間契約送迎" <?php if(isset($get_data['purpose']) && $get_data['purpose'] == 年間契約送迎) {?> selected="selected" <?php } ?>>年間契約送迎</option>
                <option value="その他" <?php if(isset($get_data['purpose']) && $get_data['purpose'] == その他) {?> selected="selected" <?php } ?>>その他</option>
              </select>
            </dd>
          </dl>
          <dl>
            <dt><span class="required">[必須]</span>ご利用希望日</dt>
            <dd>
              ご利用開始日<span><input type="text" name="departure_date" value="<?php echo isset($get_data['departure_date']) ? $get_data['departure_date'] : ''; ?>" placeholder="2017/10/01" class="validate[required]"/></span>
              ご利用終了日<span><input type="text" name="arrival_date" value="<?php echo isset($get_data['arrival_date']) ? $get_data['arrival_date'] : ''; ?>" size="40" placeholder="2017/10/02" class="validate[required]"/></span>
            </dd>
          </dl>
          <dl>
            <dt><span class="required">[必須]</span>ご出発</dt>
            <dd>
              ご出発場所<span><input type="text" name="departure_point" value="<?php echo isset($get_data['departure_point']) ? $get_data['departure_point'] : ''; ?>" placeholder="成田空港第一ターミナル団体バス乗り場" class="validate[required]"/></span>
              ご出発時刻<span><input type="text" name="departure_time" value="<?php echo isset($get_data['departure_time']) ? $get_data['departure_time'] : ''; ?>" placeholder="2017/10/02" class="validate[required]"/></span>
              空港ご到着便(空港からご乗車の場合のみ入力必須です）<span><input type="text" name="arrival_flight" value="<?php echo isset($get_data['arrival_flight']) ? $get_data['arrival_flight'] : ''; ?>" placeholder="XX101便"/></span>
              空港ご乗車場所(空港からご乗車の場合のみ選択必須です）<span>
              <label class="check-style"><input type="checkbox" name="meet" value="ターミナル前でのお待ち合わせを希望する" <?php if(isset($get_data['meet'])) {?> checked="checked" <?php } ?>> /><span>ターミナル前でのお待ち合わせを希望する</span></label></span>
            </dd>
          </dl>
          <dl>
            <dt><span class="required">[必須]</span>ご到着</dt>
            <dd>
              最終ご到着場所<span><input type="text" name="arrival_point" value="<?php echo isset($get_data['arrival_point']) ? $get_data['arrival_point'] : ''; ?>" placeholder="成田空港第二ターミナル団体バス乗り場" /></span>
              最終ご到着時刻（ご希望）<span><input type="text" name="arrival_time" value="<?php echo isset($get_data['arrival_time']) ? $get_data['arrival_time'] : ''; ?>" size="40" placeholder="17:00"/></span>
              空港ご出発便(空港へご到着の場合のみ入力必須です）<span><input type="text" name="departure_flight" value="<?php echo isset($get_data['departure_flight']) ? $get_data['departure_flight'] : ''; ?>" size="40" placeholder="XX102便"/></span>
            </dd>
          </dl>
          <dl>
            <dt><span class="required">[必須]</span>コース</dt>
            <dd>
              <textarea name="course" placeholder="例：１日目：成田空港第一ターミナル－お台場（3時間観光・昼食）－浅草（3時間観光）－〇〇ホテル２日目：〇〇ホテル－ディズニーリゾート（7時間観光）－成田空港第二ターミナル" class="validate[required]"><?php echo isset($get_data['course']) ? $get_data['course'] : ''; ?></textarea>
            </dd>
          </dl>
          <dl>
            <dt><span class="required">[必須]</span>ご希望車種</dt>
            <dd>
              <select name="bustype" class="validate[required]">
                <option value="" disabled selected>---</option>
                <option value="【53名乗り】大型バス（特大）" <?php if(isset($get_data['bustype']) && $get_data['bustype'] == 【53名乗り】大型バス（特大）) {?> selected="selected" <?php } ?>>【53名乗り】大型バス（特大）　</option>
                <option value="【53名乗り】大型サロンバス" <?php if(isset($get_data['bustype']) && $get_data['bustype'] == 【53名乗り】大型サロンバス) {?> selected="selected" <?php } ?>>【53名乗り】大型サロンバス</option>
                <option value="【56名乗り】大型バス" <?php if(isset($get_data['bustype']) && $get_data['bustype'] == 【56名乗り】大型バス) {?> selected="selected" <?php } ?>>【56名乗り】大型バス</option>
                <option value="【57名乗り】大型バス" <?php if(isset($get_data['bustype']) && $get_data['bustype'] == 【57名乗り】大型バス) {?> selected="selected" <?php } ?>>【57名乗り】大型バス</option>
                <option value="【28名乗り】中型バス" <?php if(isset($get_data['bustype']) && $get_data['bustype'] == 【28名乗り】中型バス) {?> selected="selected" <?php } ?>>【28名乗り】中型バス</option>
                <option value="【23名乗り】マイクロバス（トランク・冷蔵庫あり）" <?php if(isset($get_data['bustype']) && $get_data['bustype'] == 【23名乗り】マイクロバス（トランク・冷蔵庫あり）) {?> selected="selected" <?php } ?>>【23名乗り】マイクロバス（トランク・冷蔵庫あり）</option>
                <option value="【23名乗り】マイクロバス（トランクあり）" <?php if(isset($get_data['bustype']) && $get_data['bustype'] == 【23名乗り】マイクロバス（トランクあり）) {?> selected="selected" <?php } ?>>【23名乗り】マイクロバス（トランクあり）</option>
                <option value="【28名乗り】マイクロバス（トランクなし）" <?php if(isset($get_data['bustype']) && $get_data['bustype'] == 【28名乗り】マイクロバス（トランクなし）) {?> selected="selected" <?php } ?>>【28名乗り】マイクロバス（トランクなし）</option>
              </select>
            </dd>
          </dl>
          <dl>
            <dt><span class="required">[必須]</span>ご乗車人数</dt>
            <dd><input type="text" name="people" value="<?php echo isset($get_data['people']) ? $get_data['people'] : ''; ?>" placeholder="20名" class="validate[required]" /></dd>
          </dl>
          <dl>
            <dt><span>[任意]</span>有料オプション</dt>
            <dd>
              <label class="check-style"><input type="checkbox" name="option1" value="バスガイド" <?php if(isset($get_data['option1']) && $get_data['option1'] !="") {?> checked="checked" <?php } ?> /><span>バスガイド</span></label>
              <label class="check-style"><input type="checkbox" name="option2" value="添乗員" <?php if(isset($get_data['option2']) && $get_data['option2'] !="") {?> checked="checked" <?php } ?> /><span>添乗員</span></label>
              <label class="check-style"><input type="checkbox" name="option3" value="通訳案内士" <?php if(isset($get_data['option3']) && $get_data['option3'] !="") {?> checked="checked" <?php } ?> /><span>通訳案内士</span></label>
            </dd>
          </dl>
          <dl>
            <dt><span>[任意]</span>無料オプション</dt>
            <dd>
              <label class="check-style"><input type="checkbox" name="option4" value="サロン席変更" <?php if(isset($get_data['option4']) && $get_data['option4'] !="") {?> checked="checked" <?php } ?> /><span>サロン席変更</span></label>
              <label class="check-style"><input type="checkbox" name="option5" value="号車指定" <?php if(isset($get_data['option5']) && $get_data['option5'] !="") {?> checked="checked" <?php } ?> /><span>号車指定</span></label>
              <label class="check-style"><input type="checkbox" name="option6" value="Wi-Fi搭載" <?php if(isset($get_data['option6']) && $get_data['option6'] !="") {?> checked="checked" <?php } ?> /><span>Wi-Fi搭載</span></label>
              <label class="check-style"><input type="checkbox" name="option7" value="AED搭載" <?php if(isset($get_data['option7']) && $get_data['option7'] !="") {?> checked="checked" <?php } ?> /><span>AED搭載</span></label>
            </dd>
          </dl>
          <dl>
            <dt><span class="required">[必須]</span>お支払い方法</dt>
            <dd>
              <label class="radio-style"><input type="radio" name="payment" value="銀行振込" <?php if(isset($get_data['payment']) && $get_data['payment'] == 銀行振込) {?> checked="checked" <?php } ?> class="validate[required] radio" /><span>銀行振込</span></label>
              <label class="radio-style"><input type="radio" name="payment" value="当日現金支払" <?php if(isset($get_data['payment']) && $get_data['payment'] == 当日現金支払) {?> checked="checked" <?php } ?> class="validate[required] radio"/><span>当日現金支払</span></label>
            </dd>
          </dl>
          <dl>
            <dt><span class="required">[必須]</span>ご希望連絡方法</dt>
            <dd>
              <label class="radio-style"><input type="radio" name="contact" value="お電話" <?php if(isset($get_data['contact']) && $get_data['contact'] == お電話) {?> checked="checked" <?php } ?> class="validate[required] radio" /><span>お電話</span></label>
              <label class="radio-style"><input type="radio" name="contact" value="メール" <?php if(isset($get_data['contact']) && $get_data['contact'] == メール) {?> checked="checked" <?php } ?> class="validate[required] radio" /><span>メール</span></label>
              <label class="radio-style"><input type="radio" name="contact" value="FAX" <?php if(isset($get_data['contact']) && $get_data['contact'] == FAX) {?> checked="checked" <?php } ?> class="validate[required] radio"/><span>FAX</span></label>
            </dd>
          </dl>
          <dl>
            <dt><span>[任意]</span>ご質問・連絡事項など</dt>
            <dd>
              <textarea name="situmon" placeholder="ご連絡事項やご質問・ご要望がございましたらこちらにご記載ください"><?php echo isset($get_data['situmon']) ? $get_data['situmon'] : ''; ?></textarea>
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