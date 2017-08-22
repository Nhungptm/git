<?php
    include("functions/connect.php");
?>

  <div id="vivid-trigger" class="common-search-area wrap">
    <section class="inner clearfix">
      <h2 class="common-search-ttl">ツアー検索</h2>
      <section class="common-search-area-in left tab-box tab-box-cr-1">
        <h3 class="common-search-ttl-left">条件から探す</h3>
        <ul class="tab clearfix">
          <li class="tab-1"><a href="javascript:void(0);" rel="tab-switch-1" class="select"><span class="in"><span class="in-2">空港送迎プラン</span></span></a></li>
          <li class="tab-2"><a href="javascript:void(0);" rel="tab-switch-2"><span class="in"><span class="in-2">ツアープラン</span></span></a></li>
        </ul>
        <div class="box">
          <div class="box-in">
            <section class="common-search-selecttours content content-1">
              <h3 class="common-search-ttl">空港送迎プラン</h3>
              <!-- //////////////////////////////////////////// -->
              <form action="http://localhost/airport-tourisum/plan-list/">

              <input type="hidden" name="thamso" value="search">

                <dl class="search-airport">
                  <dt><label for="airport">ご利用空港</label></dt>
                  <dd>
                    <select id="airport" name="airport">
                      <option value='' disabled selected >空港を選択</option>
                     <!--  <option value="成田空港">成田空港</option>
                      <option value="羽田空港">羽田空港</option>
                      luu luon gia tri place_id vao day -->

                      <option value="22318" <?php if(isset($_GET['airport']) && $_GET['airport'] == 22318) {?> selected="selected" <?php } ?>>成田空港</option>
                      <option value="16993" <?php if(isset($_GET['airport']) && $_GET['airport'] == 16993) {?> selected="selected" <?php } ?>>羽田空港</option>
                      <option value="1" <?php if(isset($_GET['airport']) && $_GET['airport'] == 1) {?> selected="selected" <?php } ?>>A</option>
                      <option value="2" <?php if(isset($_GET['airport']) && $_GET['airport'] == 2) {?> selected="selected" <?php } ?>>B</option>
                      <option value="3" <?php if(isset($_GET['airport']) && $_GET['airport'] == 3) {?> selected="selected" <?php } ?>>C</option>
                      <option value="4" <?php if(isset($_GET['airport']) && $_GET['airport'] == 4) {?> selected="selected" <?php } ?>>D</option>
                      <option value="5" <?php if(isset($_GET['airport']) && $_GET['airport'] == 5) {?> selected="selected" <?php } ?>>E</option>
                      <option value="6" <?php if(isset($_GET['airport']) && $_GET['airport'] == 6) {?> selected="selected" <?php } ?>>F</option>
                      <option value="7" <?php if(isset($_GET['airport']) && $_GET['airport'] == 7) {?> selected="selected" <?php } ?>>G</option>
                      <option value="8" <?php if(isset($_GET['airport']) && $_GET['airport'] == 8) {?> selected="selected" <?php } ?>>H</option>

                    </select>
                  </dd>
                </dl>

                <dl class="search-place">
                  <dt><label for="place">指定地</label></dt>
                  <dd>
                    <!-- <input type="text" name="name" maxlength="20" placeholder="キーワードを入力"> -->
                    <input type="text" name="keyword_" value="<?php if(isset($_GET['keyword_'])) echo $_GET['keyword_'];?>" maxlength="20" placeholder="キーワードを入力">
                  </dd>
                </dl>

                <div class="clearfix">
                  <dl class="common-search-selecttours-in left search-date">
                    <dt><label for="date">ご利用日</label></dt>
                    <dd class="select-calendar">
                      <!-- <input class="search-calendar" type="text" name="date" placeholder="ご利用日を選択"> -->
                      <input class="search-calendar" type="text" name="date" value="<?php if(isset($_GET['date'])) echo $_GET['date'];?>" placeholder="ご利用日を選択">
                    </dd>
                  </dl>

                  <dl class="common-search-selecttours-in right search-genre">
                    <dt><label for="genre">カテゴリ</label></dt>
                    <dd>
                      <!--<select id="genre" name="genre">
                        <option value="空港送迎" selected>空港送迎</option>
                      </select>-->
                      <span>空港送迎</span>
                    </dd>
                  </dl>
                </div>
                
                <div class="search-selecttours-submit">
                  <input type="submit" value="">
                  <p><span>この条件で探す</span></p>
                </div>
              </form>


              <!-- ///////////////////////////////// -->
            </section>
            
            <section  class="common-search-selecttours content content-2">
              <h3 class="common-search-ttl">ツアープラン</h3>

              <form action="http://localhost/airport-tourisum/plan-list/">

              <input type="hidden" name="thamso_" value="search">
                <div class="clearfix">
                  <dl class="common-search-selecttours-in left search-airport">
                    <dt><label for="airport">ご利用空港</label></dt>
                    <dd>
                      <select id="airport" name="airport">
                        <option value='' disabled selected style='display:none;'>空港を選択</option>
                        <!-- <option value="成田空港">成田空港</option>
                        <option value="羽田空港">羽田空港</option> -->
                      <option value="22318" <?php if(isset($_GET['airport']) && $_GET['airport'] == 22318) {?> selected="selected" <?php } ?>>成田空港</option>
                      <option value="16993" <?php if(isset($_GET['airport']) && $_GET['airport'] == 16993) {?> selected="selected" <?php } ?>>羽田空港</option>
                      <option value="1" <?php if(isset($_GET['airport']) && $_GET['airport'] == 1) {?> selected="selected" <?php } ?>>A</option>
                      <option value="2" <?php if(isset($_GET['airport']) && $_GET['airport'] == 2) {?> selected="selected" <?php } ?>>B</option>
                      <option value="3" <?php if(isset($_GET['airport']) && $_GET['airport'] == 3) {?> selected="selected" <?php } ?>>C</option>
                      <option value="4" <?php if(isset($_GET['airport']) && $_GET['airport'] == 4) {?> selected="selected" <?php } ?>>D</option>
                      <option value="5" <?php if(isset($_GET['airport']) && $_GET['airport'] == 5) {?> selected="selected" <?php } ?>>E</option>
                      <option value="6" <?php if(isset($_GET['airport']) && $_GET['airport'] == 6) {?> selected="selected" <?php } ?>>F</option>
                      <option value="7" <?php if(isset($_GET['airport']) && $_GET['airport'] == 7) {?> selected="selected" <?php } ?>>G</option>
                      <option value="8" <?php if(isset($_GET['airport']) && $_GET['airport'] == 8) {?> selected="selected" <?php } ?>>H</option>

                      </select>
                    </dd>
                  </dl>

                  <dl class="common-search-selecttours-in right search-place">
                    <dt><label for="place">都道府県</label></dt>
                    <dd>
                      <select id="place" name="place">
                        <option value='' disabled selected style='display:none;'>都道府県を選択</option>
                        <option value="北海道"<?php if(isset($_GET['place']) && $_GET['place'] == 北海道) {?> selected="selected" <?php } ?>>北海道</option>
                        <option value="青森県"<?php if(isset($_GET['place']) && $_GET['place'] == 青森県) {?> selected="selected" <?php } ?>>青森県</option>
                        <option value="岩手県"<?php if(isset($_GET['place']) && $_GET['place'] == 岩手県) {?> selected="selected" <?php } ?>>岩手県</option>
                        <option value="宮城県"<?php if(isset($_GET['place']) && $_GET['place'] == 宮城県) {?> selected="selected" <?php } ?>>宮城県</option>
                        <option value="秋田県"<?php if(isset($_GET['place']) && $_GET['place'] == 秋田県) {?> selected="selected" <?php } ?>>秋田県</option>
                        <option value="山形県"<?php if(isset($_GET['place']) && $_GET['place'] == 山形県) {?> selected="selected" <?php } ?>>山形県</option>
                        <option value="福島県"<?php if(isset($_GET['place']) && $_GET['place'] == 福島県) {?> selected="selected" <?php } ?>>福島県</option>
                        <option value="茨城県"<?php if(isset($_GET['place']) && $_GET['place'] == 茨城県) {?> selected="selected" <?php } ?>>茨城県</option>
                        <option value="栃木県"<?php if(isset($_GET['place']) && $_GET['place'] == 栃木県) {?> selected="selected" <?php } ?>>栃木県</option>
                        <option value="群馬県"<?php if(isset($_GET['place']) && $_GET['place'] == 群馬県) {?> selected="selected" <?php } ?>>群馬県</option>
                        <option value="埼玉県"<?php if(isset($_GET['place']) && $_GET['place'] == 埼玉県) {?> selected="selected" <?php } ?>>埼玉県</option>
                        <option value="千葉県"<?php if(isset($_GET['place']) && $_GET['place'] == 千葉県) {?> selected="selected" <?php } ?>>千葉県</option>
                        <option value="東京都"<?php if(isset($_GET['place']) && $_GET['place'] == 東京都) {?> selected="selected" <?php } ?>>東京都</option>
                        <option value="神奈川県"<?php if(isset($_GET['place']) && $_GET['place'] == 神奈川県) {?> selected="selected" <?php } ?>>神奈川県</option>
                        <option value="新潟県"<?php if(isset($_GET['place']) && $_GET['place'] == 新潟県) {?> selected="selected" <?php } ?>>新潟県</option>
                        <option value="富山県"<?php if(isset($_GET['place']) && $_GET['place'] == 富山県) {?> selected="selected" <?php } ?>>富山県</option>
                        <option value="石川県"<?php if(isset($_GET['place']) && $_GET['place'] == 石川県) {?> selected="selected" <?php } ?>>石川県</option>
                        <option value="福井県"<?php if(isset($_GET['place']) && $_GET['place'] == 福井県) {?> selected="selected" <?php } ?>>福井県</option>
                        <option value="山梨県"<?php if(isset($_GET['place']) && $_GET['place'] == 山梨県) {?> selected="selected" <?php } ?>>山梨県</option>
                        <option value="長野県"<?php if(isset($_GET['place']) && $_GET['place'] == 長野県) {?> selected="selected" <?php } ?>>長野県</option>
                        <option value="岐阜県"<?php if(isset($_GET['place']) && $_GET['place'] == 岐阜県) {?> selected="selected" <?php } ?>>岐阜県</option>
                        <option value="静岡県"<?php if(isset($_GET['place']) && $_GET['place'] == 静岡県) {?> selected="selected" <?php } ?>>静岡県</option>
                        <option value="愛知県"<?php if(isset($_GET['place']) && $_GET['place'] == 愛知県) {?> selected="selected" <?php } ?>>愛知県</option>
                        <option value="三重県"<?php if(isset($_GET['place']) && $_GET['place'] == 三重県) {?> selected="selected" <?php } ?>>三重県</option>
                        <option value="滋賀県"<?php if(isset($_GET['place']) && $_GET['place'] == 滋賀県) {?> selected="selected" <?php } ?>>滋賀県</option>
                        <option value="京都府"<?php if(isset($_GET['place']) && $_GET['place'] == 京都府) {?> selected="selected" <?php } ?>>京都府</option>
                        <option value="大阪府"<?php if(isset($_GET['place']) && $_GET['place'] == 大阪府) {?> selected="selected" <?php } ?>>大阪府</option>
                        <option value="兵庫県"<?php if(isset($_GET['place']) && $_GET['place'] == 兵庫県) {?> selected="selected" <?php } ?>>兵庫県</option>
                        <option value="奈良県"<?php if(isset($_GET['place']) && $_GET['place'] == 奈良県) {?> selected="selected" <?php } ?>>奈良県</option>
                        <option value="和歌山県"<?php if(isset($_GET['place']) && $_GET['place'] == 和歌山県) {?> selected="selected" <?php } ?>>和歌山県</option>
                        <option value="鳥取県"<?php if(isset($_GET['place']) && $_GET['place'] == 鳥取県) {?> selected="selected" <?php } ?>>鳥取県</option>
                        <option value="島根県"<?php if(isset($_GET['place']) && $_GET['place'] == 島根県) {?> selected="selected" <?php } ?>>島根県</option>
                        <option value="岡山県"<?php if(isset($_GET['place']) && $_GET['place'] == 岡山県) {?> selected="selected" <?php } ?>>岡山県</option>
                        <option value="広島県"<?php if(isset($_GET['place']) && $_GET['place'] == 広島県) {?> selected="selected" <?php } ?>>広島県</option>
                        <option value="山口県"<?php if(isset($_GET['place']) && $_GET['place'] == 山口県) {?> selected="selected" <?php } ?>>山口県</option>
                        <option value="徳島県"<?php if(isset($_GET['place']) && $_GET['place'] == 徳島県) {?> selected="selected" <?php } ?>>徳島県</option>
                        <option value="香川県"<?php if(isset($_GET['place']) && $_GET['place'] == 香川県) {?> selected="selected" <?php } ?>>香川県</option>
                        <option value="愛媛県"<?php if(isset($_GET['place']) && $_GET['place'] == 愛媛県) {?> selected="selected" <?php } ?>>愛媛県</option>
                        <option value="高知県"<?php if(isset($_GET['place']) && $_GET['place'] == 高知県) {?> selected="selected" <?php } ?>>高知県</option>
                        <option value="福岡県"<?php if(isset($_GET['place']) && $_GET['place'] == 福岡県) {?> selected="selected" <?php } ?>>福岡県</option>
                        <option value="佐賀県"<?php if(isset($_GET['place']) && $_GET['place'] == 佐賀県) {?> selected="selected" <?php } ?>>佐賀県</option>
                        <option value="長崎県"<?php if(isset($_GET['place']) && $_GET['place'] == 長崎県) {?> selected="selected" <?php } ?>>長崎県</option>
                        <option value="熊本県"<?php if(isset($_GET['place']) && $_GET['place'] == 熊本県) {?> selected="selected" <?php } ?>>熊本県</option>
                        <option value="大分県"<?php if(isset($_GET['place']) && $_GET['place'] == 大分県) {?> selected="selected" <?php } ?>>大分県</option>
                        <option value="宮崎県"<?php if(isset($_GET['place']) && $_GET['place'] == 宮崎県) {?> selected="selected" <?php } ?>>宮崎県</option>
                        <option value="鹿児島県"<?php if(isset($_GET['place']) && $_GET['place'] == 鹿児島県) {?> selected="selected" <?php } ?>>鹿児島県</option>
                        <option value="沖縄県"<?php if(isset($_GET['place']) && $_GET['place'] == 沖縄県) {?> selected="selected" <?php } ?>>沖縄県</option>
                        </select> 
                      
                      <!--<select id="place2" name="place2" disabled="" class="search-place-more select">
                        <option value='' disabled selected style='display:none;'>観光地・エリアを選択</option>
                        <option value="成田セントラル観光">成田セントラル観光</option>
                        <option value="浅草浅草寺">浅草浅草寺</option>
                        <option value="横浜赤レンガ倉庫">横浜赤レンガ倉庫</option>
                      </select>-->
                    </dd>
                  </dl>
                </div>

                <div class="clearfix">
                  <dl class="common-search-selecttours-in left search-date">
                    <dt><label for="date">ご利用日</label></dt>
                    <dd class="select-calendar">
                      <!-- <input class="search-calendar" type="text" name="date" placeholder="ご利用日を選択"> -->
                      <input class="search-calendar" type="text" name="date" value="<?php if(isset($_GET['date'])) echo $_GET['date'];?>" placeholder="ご利用日を選択">
                    </dd>
                  </dl>

                  <dl class="common-search-selecttours-in right search-genre">
                    <dt><label for="genre">カテゴリ</label></dt>
                    <dd>
                      <select id="category" name="category">
                        <option value='' disabled selected style='display:none;'>カテゴリを選択</option>
                        <option value="体験型バスツアー"<?php if(isset($_GET['category']) && $_GET['category'] == 体験型バスツアー) {?> selected="selected" <?php } ?>>体験型バスツアー</option>
                        <option value="エコツーリズム"<?php if(isset($_GET['category']) && $_GET['category'] == エコツーリズム) {?> selected="selected" <?php } ?>>エコツーリズム</option>
                       
                      </select>
                    </dd>
                  </dl>
                </div>
                
                <div class="search-selecttours-submit">
                  <input type="submit" value="">
                  <p><span>この条件で探す</span></p>
                </div>
              </form>
            </section>
          </div>
        </div>
      </section>

      <div class="common-search-area-in right" id="search">
        <section class="common-search-words">
          <h3 class="common-search-ttl-right">フリーワードから探す</h3>
        <!-- minh co them mot so phan -->
         <form class="search-freeword-box clearfix" action="http://localhost/airport-tourisum/plan-list/">
            <input type="hidden" name="thamso" value="search">
            <input type="text" name="keyword" value="<?php if(isset($_GET['keyword'])) echo $_GET['keyword'];?>" maxlength="20" placeholder="キーワードを入力" class="freeword-area">
           
            <input type="submit" value="検索" class="freeword-submit">
           
          </form> 
         <!--  <script type="text/javascript">
         
            function Redirect() {
               window.location="http://localhost/airport-tourisum/plan-list/";
            }
         
          </script> -->
          <?php
          /*if (isset($_GET['keyword']))
        {
  
         

  }*/

  ?>




</section>
        
        <section class="common-search-picup">
          <h3 class="common-search-ttl-right">おすすめピックアップ</h3>
          <ul class="clearfix">
            
            <?php
              $tv="select id_tour,tour_pic1,div_1 from m_tour where suggest = '998' ORDER BY RAND()  LIMIT 3";
              $tv_1=mysql_query($tv);
              while ($tv_2=mysql_fetch_array($tv_1)) 
              {
                

                 echo "<li>";
                 $link_anh="images/tours/".$tv_2['tour_pic1'];
                 //echo $tv_2['tour_pic1'];
                 //echo '<img src="images/tours/t8_1.jpg">';
                 //die();
                 //$link_chi_tiet="?thamso=chi_tiet_san_pham&id=".$tv_2['id'];
                 //$link_chi_tiet="http://localhost/airport-tourisum/pickup-taxi/?thamso=chi_tiet_taxi&id=".$tv_2['id'];
                if($tv_2['div_1']=='ツアー')
                {
                  $link_chi_tiet="http://localhost/airport-tourisum/tour-bus/?thamso=chi_tiet_tour&id=".$tv_2['id_tour'];
                }
                else if($tv_2['div_1']=='空港送迎') 
                {
                  $link_chi_tiet="http://localhost/airport-tourisum/pickup-taxi/?thamso=chi_tiet_taxi&id=".$tv_2['id_tour'];
                }
                else{
                  $link_chi_tiet='';
                }
                 echo "<a href='$link_chi_tiet'>";
                    
                 echo "<img src='$link_anh'>";
                 
                 echo "</a>";
                 echo "</li>";  
              }
        
            ?>
           <!--  <li>
            <a href="<?php //bloginfo('url'); ?>">
            <img src="<?php //bloginfo('template_url'); ?>/images/home/bnr-serch03.jpg" alt="プランタイトル">
            </a>
            </li> -->

          </ul>
        </section>
      </div>
    </section>
  </div>