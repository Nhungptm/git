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
                  <p><span>こ</span></p>
                </div>
              </form>


              <!-- ///////////////////////////////// -->
            </section>
            
            <section class="common-search-selecttours content content-2">
              <h3 class="common-search-ttl">ツアープラン</h3>
              <form>
                <div class="clearfix">
                  <dl class="common-search-selecttours-in left search-airport">
                    <dt><label for="airport">ご利用空港</label></dt>
                    <dd>
                      <select id="airport" name="airport">
                        <option value='' disabled selected style='display:none;'>空港を選択</option>
                        <option value="成田空港">成田空港</option>
                        <option value="羽田空港">羽田空港</option>
                      </select>
                    </dd>
                  </dl>

                  <dl class="common-search-selecttours-in right search-place">
                    <dt><label for="place">都道府県</label></dt>
                    <dd>
                      <select id="place" name="place">
                        <option value='' disabled selected style='display:none;'>都道府県を選択</option>
                        <option value="北海道">北海道</option>
                        <option value="青森県">青森県</option>
                        <option value="岩手県">岩手県</option>
                        <option value="宮城県">宮城県</option>
                        <option value="秋田県">秋田県</option>
                        <option value="山形県">山形県</option>
                        <option value="福島県">福島県</option>
                        <option value="茨城県">茨城県</option>
                        <option value="栃木県">栃木県</option>
                        <option value="群馬県">群馬県</option>
                        <option value="埼玉県">埼玉県</option>
                        <option value="千葉県">千葉県</option>
                        <option value="東京都">東京都</option>
                        <option value="神奈川県">神奈川県</option>
                        <option value="新潟県">新潟県</option>
                        <option value="富山県">富山県</option>
                        <option value="石川県">石川県</option>
                        <option value="福井県">福井県</option>
                        <option value="山梨県">山梨県</option>
                        <option value="長野県">長野県</option>
                        <option value="岐阜県">岐阜県</option>
                        <option value="静岡県">静岡県</option>
                        <option value="愛知県">愛知県</option>
                        <option value="三重県">三重県</option>
                        <option value="滋賀県">滋賀県</option>
                        <option value="京都府">京都府</option>
                        <option value="大阪府">大阪府</option>
                        <option value="兵庫県">兵庫県</option>
                        <option value="奈良県">奈良県</option>
                        <option value="和歌山県">和歌山県</option>
                        <option value="鳥取県">鳥取県</option>
                        <option value="島根県">島根県</option>
                        <option value="岡山県">岡山県</option>
                        <option value="広島県">広島県</option>
                        <option value="山口県">山口県</option>
                        <option value="徳島県">徳島県</option>
                        <option value="香川県">香川県</option>
                        <option value="愛媛県">愛媛県</option>
                        <option value="高知県">高知県</option>
                        <option value="福岡県">福岡県</option>
                        <option value="佐賀県">佐賀県</option>
                        <option value="長崎県">長崎県</option>
                        <option value="熊本県">熊本県</option>
                        <option value="大分県">大分県</option>
                        <option value="宮崎県">宮崎県</option>
                        <option value="鹿児島県">鹿児島県</option>
                        <option value="沖縄県">沖縄県</option>
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
                      <select id="date" name="date">
                        <option value="">ご利用日を選択</option>
                      </select>
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
              $tv="select id,hinh_anh from san_pham where level = '998' ORDER BY RAND()  LIMIT 3";
              $tv_1=mysql_query($tv);
              while ($tv_2=mysql_fetch_array($tv_1)) 
              {
                

                 echo "<li>";
                 $link_anh="images/tours/".$tv_2['hinh_anh'];
                 //echo $tv_2['hinh_anh'];
                 //echo '<img src="images/tours/t8_1.jpg">';
                 //die();
                 $link_chi_tiet="?thamso=chi_tiet_san_pham&id=".$tv_2['id'];
                 echo "<a href=''>";
                    
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