<?php get_header(); ?>
<main>
  <div class="main-visual">
    <ul class="main-slider">
      <li><a href="<?php bloginfo('url'); ?>"><img src="<?php bloginfo('template_url'); ?>/images/home/img-mv.jpg" alt="ツアー名"></a></li>
      <li><a href="<?php bloginfo('url'); ?>"><img src="<?php bloginfo('template_url'); ?>/images/home/img-mv2.jpg" alt="ツアー名"></a></li>
      <li><a href="<?php bloginfo('url'); ?>"><img src="<?php bloginfo('template_url'); ?>/images/home/img-mv.jpg" alt="ツアー名"></a></li>
      <li><a href="<?php bloginfo('url'); ?>"><img src="<?php bloginfo('template_url'); ?>/images/home/img-mv2.jpg" alt="ツアー名"></a></li>
    </ul>
    <div class="lang-area inner">
      <dl>
      <dt>language</dt>
      <dd>
        <ul>
          <li><a href="<?php bloginfo('url'); ?>">English</a></li>
        </ul>
      </dd>
      </dl>
    </div>
  </div>
  
  <?php get_sidebar("search"); ?>
  
  <div class="home-flow wrap">
    <section class="home-content-in inner">
      <h2 class="home-h2-ttl">ご予約のながれ</h2>
      <ol class="home-flow-list clearfix">
        <li>
          <h3>プランを選択</h3>
          <p>ご希望のプランを選択</p>
          <nav class="home-flow-link">
            <a href="<?php bloginfo('url'); ?>">プランを検索</a>
            <a href="<?php bloginfo('url'); ?>">おすすめプランを見る</a>
          </nav>
        </li>
        <li>
          <h3>ご予約フォームの入力・確認</h3>
          <p>ご予約に必要な項目を入力</p>
          <p>ご入力内容に間違いがないか確認</p>
        </li>
        <li>
          <h3>決済・ご予約確定</h3>
          <p>決済は各種クレジットカードをご利用いただけます</p>
          <p>決済後にご予約の確定</p>
        </li>
      </ol>
      <nav class="flow-nav clearfix">
        <ul>
          <li><a href="<?php bloginfo('url'); ?>">初めてご利用の方へ</a></li>
          <li><a href="<?php bloginfo('url'); ?>/faq">よくあるご質問</a></li>
        </ul>
      </nav>
    </section>
  </div>
  
  <div class="home-plan wrap" style="height:500px">
    <!--<section class="home-content-in inner">
      <h2 class="home-h2-ttl ttl-white">各種サービスプラン</h2>
      <ul class="home-service-list clearfix">
        <li>
          <h3>空港送迎プラン</h3>
          <figure><img src="<?php bloginfo('template_url'); ?>/images/home/icon-home-flow01.png" alt="空港送迎プラン"></figure>
          <p>空港から目的地、目的地から空港への送迎プラン（30字程度目安）</p>
        </li>

        <li>
          <h3>空港周辺ツアープラン</h3>
          <figure><img src="<?php bloginfo('template_url'); ?>/images/home/icon-home-flow02.png" alt="空港周辺ツアープラン"></figure>
          <p>空港周辺を観光するツアープラン（30字程度目安）</p>
        </li>

        <li>
          <h3>オーダーメイドプラン</h3>
          <figure><img src="<?php bloginfo('template_url'); ?>/images/home/icon-home-flow03.png" alt="オーダーメイドプラン"></figure>
          <p>お客様によるオーダーメイドのプラン（30字程度目安）</p>
        </li>
      </ul>
    </section>-->
  </div>
  
  <div class="plan-content wrap ">
    <section class="home-content-in inner">
      <h2 class="home-h2-ttl">おすすめプラン</h2>
      <div class="plan-list clearfix">
        <article>
          <a href="<?php bloginfo('url'); ?>">
            <div class="plan-list-in pc-none"><img src="<?php bloginfo('template_url'); ?>/images/home/img01.jpg" alt="成田国際空港～東京23区東部エリア 送迎プラン"></div>
            <h3 class="plan-list-ttl"><span class="plan-num pc-none">ABC-001-1234</span>成田国際空港～東京23区東部エリア 送迎プラン</h3>
            <div class="clearfix">
              <figure class="plan-list-in left sp-none"><img src="<?php bloginfo('template_url'); ?>/images/home/img01.jpg" alt="成田国際空港～東京23区東部エリア 送迎プラン"></figure>
              <div class="plan-list-in right">
                <p class="plan-num sp-none">ABC-001-1234</p>
                <p>成田国際空港から東京23区東部エリアへの送迎プランです。<br>お客様にお好きな目的地をご指定いただくことができます。(最大70字目安）</p>
                <ul class="plan-list-flag">
                  <li>東京 23区東部</li>
                  <li>空港送迎</li>
                  <li>20,000～30,000円 / 1台</li>
                </ul>
              </div>
            </div>
          </a>
        </article>
        
        <article>
          <a href="<?php bloginfo('url'); ?>">
            <div class="plan-list-in pc-none"><img src="<?php bloginfo('template_url'); ?>/images/home/img01.jpg" alt="成田国際空港～東京23区東部エリア 送迎プラン"></div>
            <h3 class="plan-list-ttl"><span class="plan-num pc-none">ABC-001-1234</span>成田国際空港～東京23区東部エリア 送迎プラン</h3>
            <div class="clearfix">
              <figure class="plan-list-in left sp-none"><img src="<?php bloginfo('template_url'); ?>/images/home/img01.jpg" alt="成田国際空港～東京23区東部エリア 送迎プラン"></figure>
              <div class="plan-list-in right">
                <p class="plan-num sp-none">ABC-001-1234</p>
                <p>成田国際空港から東京23区東部エリアへの送迎プランです。<br>お客様にお好きな目的地をご指定いただくことができます。(最大70字目安）</p>
                <ul class="plan-list-flag">
                  <li>東京 23区東部</li>
                  <li>空港送迎</li>
                  <li>20,000～30,000円 / 1台</li>
                </ul>
              </div>
            </div>
          </a>
        </article>

        <article>
          <a href="<?php bloginfo('url'); ?>">
            <div class="plan-list-in pc-none"><img src="<?php bloginfo('template_url'); ?>/images/home/img01.jpg" alt="成田国際空港～東京23区東部エリア 送迎プラン"></div>
            <h3 class="plan-list-ttl"><span class="plan-num pc-none">ABC-001-1234</span>成田国際空港～東京23区東部エリア 送迎プラン</h3>
            <div class="clearfix">
              <figure class="plan-list-in left sp-none"><img src="<?php bloginfo('template_url'); ?>/images/home/img01.jpg" alt="成田国際空港～東京23区東部エリア 送迎プラン"></figure>
              <div class="plan-list-in right">
                <p class="plan-num sp-none">ABC-001-1234</p>
                <p>成田国際空港から東京23区東部エリアへの送迎プランです。<br>お客様にお好きな目的地をご指定いただくことができます。(最大70字目安）</p>
                <ul class="plan-list-flag">
                  <li>東京 23区東部</li>
                  <li>空港送迎</li>
                  <li>20,000～30,000円 / 1台</li>
                </ul>
              </div>
            </div>
          </a>
        </article>

        <article>
          <a href="<?php bloginfo('url'); ?>">
            <div class="plan-list-in pc-none"><img src="<?php bloginfo('template_url'); ?>/images/home/img01.jpg" alt="成田国際空港～東京23区東部エリア 送迎プラン"></div>
            <h3 class="plan-list-ttl"><span class="plan-num pc-none">ABC-001-1234</span>成田国際空港～東京23区東部エリア 送迎プラン</h3>
            <div class="clearfix">
              <figure class="plan-list-in left sp-none"><img src="<?php bloginfo('template_url'); ?>/images/home/img01.jpg" alt="成田国際空港～東京23区東部エリア 送迎プラン"></figure>
              <div class="plan-list-in right">
                <p class="plan-num sp-none">ABC-001-1234</p>
                <p>成田国際空港から東京23区東部エリアへの送迎プランです。<br>お客様にお好きな目的地をご指定いただくことができます。(最大70字目安）</p>
                <ul class="plan-list-flag">
                  <li>東京 23区東部</li>
                  <li>空港送迎</li>
                  <li>20,000～30,000円 / 1台</li>
                </ul>
              </div>
            </div>
          </a>
        </article>

        <article>
          <a href="<?php bloginfo('url'); ?>">
            <div class="plan-list-in pc-none"><img src="<?php bloginfo('template_url'); ?>/images/home/img01.jpg" alt="成田国際空港～東京23区東部エリア 送迎プラン"></div>
            <h3 class="plan-list-ttl"><span class="plan-num pc-none">ABC-001-1234</span>成田国際空港～東京23区東部エリア 送迎プラン</h3>
            <div class="clearfix">
              <figure class="plan-list-in left sp-none"><img src="<?php bloginfo('template_url'); ?>/images/home/img01.jpg" alt="成田国際空港～東京23区東部エリア 送迎プラン"></figure>
              <div class="plan-list-in right">
                <p class="plan-num sp-none">ABC-001-1234</p>
                <p>成田国際空港から東京23区東部エリアへの送迎プランです。<br>お客様にお好きな目的地をご指定いただくことができます。(最大70字目安）</p>
                <ul class="plan-list-flag">
                  <li>東京 23区東部</li>
                  <li>空港送迎</li>
                  <li>20,000～30,000円 / 1台</li>
                </ul>
              </div>
            </div>
          </a>
        </article>
        
        <article>
          <a href="<?php bloginfo('url'); ?>">
            <div class="plan-list-in pc-none"><img src="<?php bloginfo('template_url'); ?>/images/home/img01.jpg" alt="成田国際空港～東京23区東部エリア 送迎プラン"></div>
            <h3 class="plan-list-ttl"><span class="plan-num pc-none">ABC-001-1234</span>成田国際空港～東京23区東部エリア 送迎プラン</h3>
            <div class="clearfix">
              <figure class="plan-list-in left sp-none"><img src="<?php bloginfo('template_url'); ?>/images/home/img01.jpg" alt="成田国際空港～東京23区東部エリア 送迎プラン"></figure>
              <div class="plan-list-in right">
                <p class="plan-num sp-none">ABC-001-1234</p>
                <p>成田国際空港から東京23区東部エリアへの送迎プランです。<br>お客様にお好きな目的地をご指定いただくことができます。(最大70字目安）</p>
                <ul class="plan-list-flag">
                  <li>東京 23区東部</li>
                  <li>空港送迎</li>
                  <li>20,000～30,000円 / 1台</li>
                </ul>
              </div>
            </div>
          </a>
        </article>
        
        <article>
          <a href="<?php bloginfo('url'); ?>">
            <div class="plan-list-in pc-none"><img src="<?php bloginfo('template_url'); ?>/images/home/img01.jpg" alt="成田国際空港～東京23区東部エリア 送迎プラン"></div>
            <h3 class="plan-list-ttl"><span class="plan-num pc-none">ABC-001-1234</span>成田国際空港～東京23区東部エリア 送迎プラン</h3>
            <div class="clearfix">
              <figure class="plan-list-in left sp-none"><img src="<?php bloginfo('template_url'); ?>/images/home/img01.jpg" alt="成田国際空港～東京23区東部エリア 送迎プラン"></figure>
              <div class="plan-list-in right">
                <p class="plan-num sp-none">ABC-001-1234</p>
                <p>成田国際空港から東京23区東部エリアへの送迎プランです。<br>お客様にお好きな目的地をご指定いただくことができます。(最大70字目安）</p>
                <ul class="plan-list-flag">
                  <li>東京 23区東部</li>
                  <li>空港送迎</li>
                  <li>20,000～30,000円 / 1台</li>
                </ul>
              </div>
            </div>
          </a>
        </article>

        <article>
          <a href="<?php bloginfo('url'); ?>">
            <div class="plan-list-in pc-none"><img src="<?php bloginfo('template_url'); ?>/images/home/img01.jpg" alt="成田国際空港～東京23区東部エリア 送迎プラン"></div>
            <h3 class="plan-list-ttl"><span class="plan-num pc-none">ABC-001-1234</span>成田国際空港～東京23区東部エリア 送迎プラン</h3>
            <div class="clearfix">
              <figure class="plan-list-in left sp-none"><img src="<?php bloginfo('template_url'); ?>/images/home/img01.jpg" alt="成田国際空港～東京23区東部エリア 送迎プラン"></figure>
              <div class="plan-list-in right">
                <p class="plan-num sp-none">ABC-001-1234</p>
                <p>成田国際空港から東京23区東部エリアへの送迎プランです。<br>お客様にお好きな目的地をご指定いただくことができます。(最大70字目安）</p>
                <ul class="plan-list-flag">
                  <li>東京 23区東部</li>
                  <li>空港送迎</li>
                  <li>20,000～30,000円 / 1台</li>
                </ul>
              </div>
            </div>
          </a>
        </article>

        <article>
          <a href="<?php bloginfo('url'); ?>">
            <div class="plan-list-in pc-none"><img src="<?php bloginfo('template_url'); ?>/images/home/img01.jpg" alt="成田国際空港～東京23区東部エリア 送迎プラン"></div>
            <h3 class="plan-list-ttl"><span class="plan-num pc-none">ABC-001-1234</span>成田国際空港～東京23区東部エリア 送迎プラン</h3>
            <div class="clearfix">
              <figure class="plan-list-in left sp-none"><img src="<?php bloginfo('template_url'); ?>/images/home/img01.jpg" alt="成田国際空港～東京23区東部エリア 送迎プラン"></figure>
              <div class="plan-list-in right">
                <p class="plan-num sp-none">ABC-001-1234</p>
                <p>成田国際空港から東京23区東部エリアへの送迎プランです。<br>お客様にお好きな目的地をご指定いただくことができます。(最大70字目安）</p>
                <ul class="plan-list-flag">
                  <li>東京 23区東部</li>
                  <li>空港送迎</li>
                  <li>20,000～30,000円 / 1台</li>
                </ul>
              </div>
            </div>
          </a>
        </article>

        <article>
          <a href="<?php bloginfo('url'); ?>">
            <div class="plan-list-in pc-none"><img src="<?php bloginfo('template_url'); ?>/images/home/img01.jpg" alt="成田国際空港～東京23区東部エリア 送迎プラン"></div>
            <h3 class="plan-list-ttl"><span class="plan-num pc-none">ABC-001-1234</span>成田国際空港～東京23区東部エリア 送迎プラン</h3>
            <div class="clearfix">
              <figure class="plan-list-in left sp-none"><img src="<?php bloginfo('template_url'); ?>/images/home/img01.jpg" alt="成田国際空港～東京23区東部エリア 送迎プラン"></figure>
              <div class="plan-list-in right">
                <p class="plan-num sp-none">ABC-001-1234</p>
                <p>成田国際空港から東京23区東部エリアへの送迎プランです。<br>お客様にお好きな目的地をご指定いただくことができます。(最大70字目安）</p>
                <ul class="plan-list-flag">
                  <li>東京 23区東部</li>
                  <li>空港送迎</li>
                  <li>20,000～30,000円 / 1台</li>
                </ul>
              </div>
            </div>
          </a>
        </article>

        <article>
          <a href="<?php bloginfo('url'); ?>">
            <div class="plan-list-in pc-none"><img src="<?php bloginfo('template_url'); ?>/images/home/img01.jpg" alt="成田国際空港～東京23区東部エリア 送迎プラン"></div>
            <h3 class="plan-list-ttl"><span class="plan-num pc-none">ABC-001-1234</span>成田国際空港～東京23区東部エリア 送迎プラン</h3>
            <div class="clearfix">
              <figure class="plan-list-in left sp-none"><img src="<?php bloginfo('template_url'); ?>/images/home/img01.jpg" alt="成田国際空港～東京23区東部エリア 送迎プラン"></figure>
              <div class="plan-list-in right">
                <p class="plan-num sp-none">ABC-001-1234</p>
                <p>成田国際空港から東京23区東部エリアへの送迎プランです。<br>お客様にお好きな目的地をご指定いただくことができます。(最大70字目安）</p>
                <ul class="plan-list-flag">
                  <li>東京 23区東部</li>
                  <li>空港送迎</li>
                  <li>20,000～30,000円 / 1台</li>
                </ul>
              </div>
            </div>
          </a>
        </article>

        <article>
          <a href="<?php bloginfo('url'); ?>">
            <div class="plan-list-in pc-none"><img src="<?php bloginfo('template_url'); ?>/images/home/img01.jpg" alt="成田国際空港～東京23区東部エリア 送迎プラン"></div>
            <h3 class="plan-list-ttl"><span class="plan-num pc-none">ABC-001-1234</span>成田国際空港～東京23区東部エリア 送迎プラン</h3>
            <div class="clearfix">
              <figure class="plan-list-in left sp-none"><img src="<?php bloginfo('template_url'); ?>/images/home/img01.jpg" alt="成田国際空港～東京23区東部エリア 送迎プラン"></figure>
              <div class="plan-list-in right">
                <p class="plan-num sp-none">ABC-001-1234</p>
                <p>成田国際空港から東京23区東部エリアへの送迎プランです。<br>お客様にお好きな目的地をご指定いただくことができます。(最大70字目安）</p>
                <ul class="plan-list-flag">
                  <li>東京 23区東部</li>
                  <li>空港送迎</li>
                  <li>20,000～30,000円 / 1台</li>
                </ul>
              </div>
            </div>
          </a>
        </article>
      </div>
      <nav class="plan-more-btn"><a href="<?php bloginfo('url'); ?>">すべてのプランを見る</a></nav>
    </section>
  </div>
  
  <div class="home-sns-content wrap">
    <section class="home-content-in inner">
      <h2 class="home-last-ttl">メディア</h2>
      <div class="clearfix">
        <div class="home-sns left">
          <a class="twitter-timeline" href="https://twitter.com/hoshizaki_y">Tweets by hoshizaki_y</a> <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
        </div>
        <div class="home-sns right">
        <!-- SnapWidget -->
<script src="https://snapwidget.com/js/snapwidget.js"></script>
<iframe src="https://snapwidget.com/embed/code/265727" class="snapwidget-widget" allowTransparency="true" frameborder="0" scrolling="no" style="border:none; overflow:hidden; width:100%; "></iframe>
        </div>
      </div>
      
      <div class="home-bnr-content">
        <h2 class="home-last-ttl">関連リンク</h2>
        <ul>
          <li><a href="<?php bloginfo('url'); ?>"><img src="<?php bloginfo('template_url'); ?>/images/home/bnr01.jpg" alt="関連リンク1"></a></li>
          <li><a href="<?php bloginfo('url'); ?>"><img src="<?php bloginfo('template_url'); ?>/images/home/bnr02.jpg" alt="関連リンク2"></a></li>
          <li><a href="<?php bloginfo('url'); ?>"><img src="<?php bloginfo('template_url'); ?>/images/home/bnr03.jpg" alt="関連リンク3"></a></li>
        </ul>
      </div>
    </section>
  </div>
</main>
<?php get_footer(); ?>