<?php
/*
Template Name: 空港送迎ご予約フォーム ー 入力画面 ー
*/
?>
<?php get_header(); ?>
<main id="main-content">
  <div class="bread-crumbs">
    <ul class="clearfix inner">
      <li><a href="<?php bloginfo('url'); ?>">ホーム</a></li>
      <li>ご予約フォーム</li>
    </ul>
  </div>
  　
  <div id="vivid-trigger" class="wrap">
    <section class="detail-content inner">
      <h2 class="detail-h2-ttl">ご予約フォーム</h2>
      <div class="step-bar-wrap">
        <ol class="step-bar">
          <li class="current">1.入力</li>
          <li>2.確認</li>
          <li>3.予約完了</li>
        </ol>
      </div>
      <form class="contact-form" id="contactform">
        <div class="contact-form-in">
          <p class="detail-child-ttl">プラン情報</p>
          <dl>
            <dt>旅行区分</dt>
            <dd>手配旅行</dd>
          </dl>
          <dl>
            <dt>プランNo.</dt>
            <dd>ABC-001-1234</dd>
          </dl>
          <dl>
            <dt>プラン名</dt>
            <dd>成田国際空港～東京23区東部エリア 送迎プラン</dd>
          </dl>
          <dl>
            <dt>ご出発日</dt>
            <dd>2017年7月15日（土）</dd>
          </dl>
          <dl>
            <dt>ご乗車場所</dt>
            <dd>成田国際空港ターミナル前</dd>
          </dl>
          <dl>
            <dt>ご降車場所</dt>
            <dd>東京都墨田区押上1丁目1-2</dd>
          </dl>
          <dl>
            <dt><span>[任意]</span>建物名・施設名</dt>
            <dd><input type="text" name="facility" value="" placeholder="東京スカイツリー" /></dd>
          </dl>
          <dl>
            <dt>ご出発時刻</dt>
            <dd>10：30</dd>
          </dl>
          <dl>
            <dt><span>[任意]</span>ご利用便</dt>
            <dd><input type="text" name="arrival-flight" value="" placeholder="AB1100便" /></dd>
          </dl>
          <dl>
            <dt>お申込み人数</dt>
            <dd>大人4人　小人0人</dd>
          </dl>
          <dl>
            <dt><span class="required">[必須]</span>荷物量</dt>
            <dd>
              <dl class="contact-form-in-dl">
                <dt><label for="large-suitcase">大スーツケース（機内持込不可）</label></dt>
                <dd>
                  <select id="large-suitcaset" name="large-suitcaset" class="validate[required]">
                    <option value="0">0</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                  </select>
                  <span>個</span>
                </dd>
              </dl>
              <dl class="contact-form-in-dl">
                <dt><label for="small-suitcase">小スーツケース（機内持込可）</label></dt>
                <dd>
                  <select  id="small-suitcase" name="small-suitcase" class="validate[required]">
                    <option value="0">0</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                  </select>
                  <span>個</span>
                </dd>
              </dl>
            </dd>
          </dl>
          <dl>
            <dt>車種</dt>
            <dd>ミニバン</dd>
          </dl>
          <dl>
            <dt>運輸機関</dt>
            <dd>多古タクシー有限会社</dd>
          </dl>
        </div>
        <div class="contact-form-in reserve-form-pay">
          <p class="detail-child-ttl">旅行代金</p>
          <table>
            <colgroup><col class="cell-01"></colgroup>
            <colgroup><col class="cell-02"></colgroup>
            <colgroup><col class="cell-03"></colgroup>
            <colgroup><col class="cell-04"></colgroup>
            <thead>
              <tr>
                <th colspan="5">（Ａ）プラン料金</th>
              </tr>
            </thead>
            <tr>
              <th>本体</th>
              <td>成田国際空港～東京23区東部エリア 送迎プラン</td>
              <td class="price"><span>25,000</span>円</td>
              <td>×<span>1</span></td>
              <td class="price"><span>25,000</span>円</td>
            </tr>
            <tr>
              <th>オプション</th>
              <td>チャイルドシート</td>
              <td class="price"><span>0</span>円</td>
              <td>×<span>1</span></td>
              <td class="price"><span>0</span>円</td>
            </tr>
            <tr>
              <th>オプション</th>
              <td>〇〇〇〇グレードアップ</td>
              <td class="price"><span>1,000</span>円</td>
              <td>×<span>4</span></td>
              <td class="price"><span>4,000</span>円</td>
            </tr>
            <tr>
              <th>合計</th>
              <td colspan="4" class="price"><span>29,000</span>円</td>
            </tr>
          </table>
          <table>
            <thead>
              <tr>
                <th colspan="2">（Ｂ）その他料金</th>
              </tr>
            </thead>
            <tr>
              <th>旅行業務取扱料金（手配料金）</th>
              <td class="price"><span>0</span>円</td>
            </tr>
            <tr>
              <th>合計</th>
              <td colspan="2" class="price"><span>0</span>円</td>
            </tr>
          </table>
          <table>
            <thead>
              <tr>
                <th colspan="2" class="bold">（Ａ）＋（Ｂ）旅行代金合計</th>
              </tr>
            </thead>
            <tr>
              <th class="bold">合計</th>
              <td colspan="2" class="price bold"><span>29,000</span>円</td>
            </tr>
          </table>
        </div>
        <div class="contact-form-in">
          <p class="detail-child-ttl">お客様情報</p>
          <dl>
            <dt><span class="required">[必須]</span>お名前</dt>
            <dd><input type="text" name="name" value="" placeholder="貸切　太郎" class="validate[required]" /></dd>
          </dl>
          <dl>
            <dt><span class="required">[必須]</span>お名前（ローマ字）</dt>
            <dd><input type="text" name="phonetic-name" value="" placeholder="Kashikiri Taro" class="validate[required]" /></dd>
          </dl>
          <dl>
            <dt><span class="required">[必須]</span>国籍</dt>
            <dd><input type="text" name="	nationality" value="" placeholder="アメリカ合衆国" class="validate[required]" /></dd>
          </dl>
          <dl>
            <dt><span class="required">[必須]</span>性別</dt>
            <dd>
              <label class="radio-style"><input type="radio" name="gender" value="男性" /><span>男性</span></label>
              <label class="radio-style"><input type="radio" name="gender" value="女性" /><span>女性</span></label>
            </dd>
          </dl>
          <dl>
            <dt><span class="required">[必須]</span>お電話番号</dt>
            <dd><input type="tel" name="phone-number" value="" placeholder="090-1234-5678" /></dd>
          </dl>
          <dl>
            <dt><span>[任意]</span>FAX番号</dt>
            <dd><input type="tel" name="fax-number" value="" placeholder="03-1234-5678" /></dd>
          </dl>
          <dl>
            <dt><span class="required">[必須]</span>メールアドレス</dt>
            <dd><input type="email" name="email"  value="" placeholder="kashikiri-taro@airporttourism.jp" class="validate[required]" /></dd>
          </dl>
          <dl>
            <dt><span class="required">[必須]</span>メールアドレス（再入力）</dt>
            <dd><input type="email" name="email"  value="" placeholder="kashikiri-taro@airporttourism.jp" class="validate[required]" /></dd>
          </dl>
          <dl>
            <dt><span>[任意]</span>郵便番号</dt>
            <dd>〒<input type="text" name="postal-code" value="" placeholder="100-0000" /></dd>
          </dl>
          <dl>
            <dt><span>[任意]</span>ご住所</dt>
            <dd><input type="text" name="address" value="" placeholder="千葉県〇〇市〇〇町XX-XX-XX" /></dd>
          </dl>
           <dl>
            <dt><span>[任意]</span>ボードネーム</dt>
            <dd><input type="text" name="address" value="" placeholder="貸切　太郎" /><br>
            お名前と違う表示名をご希望のお客様はご入力ください。</dd>
          </dl>
          <dl>
            <dt><span>[任意]</span>備考・連絡事項</dt>
            <dd>
              <textarea name="message" placeholder="ご連絡事項等がございましたらこちらにご記載ください"></textarea>
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