<?php
/*
Template Name: プラン詳細ーツアーバスー
*/
?>
<?php
include('code_holiday.php');
// Set your timezone!!
date_default_timezone_set('Asia/Tokyo');
  
 //Select Data From a MySQL Database 
  /*$servername = "localhost";
  $username = "root";
  $password = "root";
  $dbname = "abc";*/
$servername = "ja-cdbr-azure-east-a.cloudapp.net";
  $username = "b1317ee6a2a1f8";
  $password = "dd630b58";
  $dbname = "travelwebsitedb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM xe";
$result = $conn->query($sql);
// query chi tra kq ve 1 lan, neu minh muon dung nhieu lan (trong vong lap for chang han) thi phai luu kq vao bien tam
$resultTemp = array();

$soluongHtml = '';
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {

    array_push($resultTemp,$row);
       // echo "id: " . $row["ngay"]. " - Name: " . $row["soluong"]. "<br>";

    }
} 
$conn->close(); //use thu vien MySQLi Object-oriented
  
////////////////////////////////////////////////////////////
  
// Get prev & next month
if (isset($_GET['ym'])) {
    $ym = $_GET['ym'];
} else {
    // This month
    $ym = date('Y-m');
}
  
// Check format
$timestamp = strtotime($ym,"-01");
if ($timestamp === false) {
    $timestamp = time();
}
  
// Today
$today = date('Y-m-j', time());
  
// For H3 title
$html_title = date('Y / m', $timestamp);
  
// Create prev & next month link     mktime(hour,minute,second,month,day,year)
$prev = date('Y-m', mktime(0, 0, 0, date('m', $timestamp)-1, 1, date('Y', $timestamp)));
$next = date('Y-m', mktime(0, 0, 0, date('m', $timestamp)+1, 1, date('Y', $timestamp)));
 $month = date('m', mktime(0, 0, 0, date('m', $timestamp)+1, 1, date('Y', $timestamp)));
// Number of days in the month
$day_count = date('t', $timestamp);
  
// 0:Mon 1:Tue 2:Wed ...
$str = date('w', mktime(0, 0, 0, date('m', $timestamp), 0, date('Y', $timestamp)));
  
  
// Create Calendar!!
$weeks = array();
$week = '';
  
// Add empty cell
$week .= str_repeat('<td></td>', $str);
  
for ( $day = 1; $day <= $day_count; $day++, $str++) {
//echo $ym.'-'.$day;
/////////////////////////// do du lieu vao o lich
$soluongHtml ='';
for($x=0;$x<count($resultTemp);$x++)
  {
   $row = $resultTemp[$x];
  if($row["ngay"]==$ym.'-'.$day)
	//$soluongHtml= '<br /> <br/> <span>'.$row["soluong"].' xe</span>';
 //add 19/06, show 〇、X、△、
 if ($row["soluong"]>2)
 {
	//$soluongHtml= '<br /> <br/> <span>'.$row["soluong"].' 台</span>';
	 $soluongHtml= '<br /> <br/> <span>'.'<font size="7">&#x25CB;</font></span>';
 }
 else if($row["soluong"]==0)
 {
	 //$soluongHtml= '<br /> <br/> <span>'.$row["soluong"].' 台</span>';
	 $soluongHtml= '<br /> <br/> <span>'.'<font size="7">&#x00D7;</font></span>';
 }
 else
 {
	 //$soluongHtml= '<br /> <br/> <span>'.$row["soluong"].' 台</span>';
	 $soluongHtml= '<br /> <br/> <br/> <span>'.'<font size="5.5">&#x25B3;</font></span>';
	 // cung size thi hinh nay to qua, cho nho size thi no ko nam thang tren 1 row
 }
  }
$holiday_datetime = new HolidayDateTime($ym.'-'.$day);
    //$holiday_datetime->holiday();
    $date = $ym.'-'.$day;
    //strlen($datetime);
    //echo  $ym.'-'.$day;
    //var_dump($holiday_datetime->holiday());
    
    //var_dump($month -1 );
    //die();
    if ($today == $date) {
        $week .= '<td class="today"><a href="#calendar-select"><span class="day">'.$day;
    } 
	// if today la ngay le thi co red ko?  chua check dc, cho den ngay 17/7?
   else if ($holiday_datetime->holiday()!=false)
    {
      
      $week .= '<td class="ngayle"><a href="#calendar-select"><span class="day">'.$day;
    }
    else {
        $week .= '<td><a href="#calendar-select"><span class="day">'.$day;
    }
    $week .= $soluongHtml.'</span></a></td>';
     
    // End of the week OR End of the month
    if ($str % 7 == 6 || $day == $day_count) {
         
        if($day == $day_count) {
            // Add empty cell
            $week .= str_repeat('<td></td>', 6 - ($str % 7));
        }
         
        $weeks[] = '<tr>'.$week.'</tr>';
         
        // Prepare for new week
        $week = '';
         
    }
  
}
  
?>
<?php get_header(); ?>
<main id="main-content">
  <div class="bread-crumbs">
    <ul class="clearfix inner">
      <li><a href="<?php bloginfo('url'); ?>">ホーム</a></li>
      <li><a href="<?php bloginfo('url'); ?>/plan-list">プラン一覧</a></li>
      <li>英語ツアーガイドがご案内！成田周辺半日体験バスツアー</li>
    </ul>
  </div>
  
  <div id="vivid-trigger" class="pickup-taxi-summary wrap">
    <section class="pickup-taxi-content-in inner clearfix">
      <h2 class="pickup-taxi-plan-ttl">英語ツアーガイドがご案内！成田周辺半日体験バスツアー</h2>
      <div class="summary-image-area">
        <ul class="summary-slider">
          <li style="background-image: url(<?php bloginfo('template_url'); ?>/images/detail-tour-bus/img01.jpg)"></li>
          <li style="background-image: url(<?php bloginfo('template_url'); ?>/images/detail-tour-bus/img02.jpg)"></li>
          <li style="background-image: url(<?php bloginfo('template_url'); ?>/images/detail-tour-bus/img03.jpg)"></li>
          <li style="background-image: url(<?php bloginfo('template_url'); ?>/images/detail-tour-bus/img04.jpg)"></li>
        </ul>
        <ul class="summary-slider-thumb">
          <li style="background-image: url(<?php bloginfo('template_url'); ?>/images/detail-tour-bus/img01.jpg)"></li>
          <li style="background-image: url(<?php bloginfo('template_url'); ?>/images/detail-tour-bus/img02.jpg)"></li>
          <li style="background-image: url(<?php bloginfo('template_url'); ?>/images/detail-tour-bus/img03.jpg)"></li>
          <li style="background-image: url(<?php bloginfo('template_url'); ?>/images/detail-tour-bus/img04.jpg)"></li>
        </ul>
        <p class="small">※写真はすべてイメージです</p>
      </div>
      <div class="summary-txt-area">
        <p class="plan-num">PBE-001-0001</p>
        <p class="plan-desc">英語ガイドが案内する成田空港発着半日バスツアーです。</p>
        <table>
          <tr>
            <th>エリア</th>
            <td>成田空港周辺地域</td>
          </tr>
          <tr>
            <th>ジャンル</th>
            <td>体験型バスツアー</td>
          </tr>
          <tr>
            <th>料金</th>
            <td>4,000～5,000円/1人</td>
          </tr>
          <tr>
            <th>料金に含まれるもの</th>
            <td>ツアー参加費用</td>
          </tr>
          <tr>
            <th>実施期間</th>
            <td>2017/04/01<span>〜</span>2017/09/30の設定日</td>
          </tr>
          <tr>
            <th>最小催行人数</th>
            <td>10名</td>
          </tr>
          <tr>
            <th>所要時間</th>
            <td>3～4時間／日帰り</td>
          </tr>
          <tr>
            <th>お食事</th>
            <td>朝食:- <span>/</span> 昼食:1食 <span>/</span> 夕食:-</td>
          </tr>
          <tr>
            <th>添乗員同行有無</th>
            <td>同行（英語通訳ガイドと兼務）</td>
          </tr>
          <tr>
            <th>案内言語</th>
            <td>英語</td>
          </tr>
          <tr>
            <th>有効期限</th>
            <td>2018/03/31</td>
          </tr>
        </table>
        <div class="calendar-check-btn">
          <a href="#">予約状況確認・申し込み</a>
        </div>
      </div>
    </section>
  </div>
  
  
  <div class="pickup-taxi-point wrap bk-gray">
    <section class="pickup-taxi-content-in inner clearfix">
      <div class="point-ttl-area">
        <h2>プランのポイント</h2>
        <hr>
        <img src="<?php bloginfo('template_url'); ?>/images/detail-tour-bus/point_bus.png" alt="プランのポイント">
      </div>
      <div class="point-txt-area tour-bus-point">
        <p>英語のツアーガイドが一緒で安心！普段なかなか訪れることができない成田空港周辺地域にみなさまをご案内いたします。<br>成田空港発着のためフライトまでの時間調整にもピッタリな半日観光ツアーです。日本人の生活になじみ深い「道の駅」での自由時間もあります。</p>
      </div>
    </section>
  </div>
  
  <div class="pickup-taxi-info wrap">
    <section class="pickup-taxi-content-in inner">
      <h2 class="pickup-taxi-ttl">コース工程</h2>
      <p class="pickup-taxi-course">成田空港第一ターミナル前（9：00発）<span>・・・</span>1か所目の目的地（見学）<span>・・・</span>昼食（〇〇〇〇）<span>・・・</span>△△工房（陶芸体験）<span>・・・</span>道の駅（お土産タイム）<span>・・・</span>最期の目的地（自由見学）<span>・・・</span>成田空港第一ターミナル前（19：00着予定）</p>
      <p class="red">混雑の場合がありますのでお時間には余裕をもってお申し込みください。</p>
    </section>

    <section class="pickup-taxi-content-in inner">
      <h2 class="pickup-taxi-ttl">お食事</h2>
      <div class="clearfix">
        <div class="pickup-taxi-txt-img left"><img src="<?php bloginfo('template_url'); ?>/images/detail-tour-bus/lunch.jpg" alt="お食事イメージ"></div>
        <div class="pickup-taxi-txt right">
          <p>昼食付<br>〇〇専門店<br>満腹！〇〇たっぷり贅沢ランチビュッフェ</p>
        <p class="pickup-taxi-txt-caut">※写真はイメージです<br>※日程・仕入れの状況等によりメニューが変更になる場合がございます</p>
        </div>
      </div>
    </section>
  </div>
  
  <div class="pickup-taxi-info wrap">
    <section class="pickup-taxi-content-in inner">
      <h2 class="pickup-taxi-ttl">予約状況確認・お申込み</h2>
      <p>ご利用人数を入力（必須）し、ご希望の日時を入力（任意）の上、「予約状況を確認する」ボタンを押してください。</p>
      
      <div id="calendar-select" class="calendar-search-area clearfix">
        <form class="calendar-search-wrap">
          <div class="calendar-search-box calendar-search-box-people">
            <dl>
              <dt>ご利用人数（必須）</dt>
              <dd class="clearfix">
                <dl>
                  <dt><label for="adult">大人</label></dt>
                  <dd>
                    <select  id="adult" name="adult">
                      <option value="0">0</option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                      <option value="6">6</option>
                      <option value="7">7</option>
                      <option value="8">8</option>
                      <option value="9">9</option>
                    </select>
                    <span>人</span>
                  </dd>
                </dl>
                <dl>
                  <dt><label for="child">小人</label></dt>
                  <dd>
                    <select id="child" name="child">
                      <option value="0">0</option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                      <option value="6">6</option>
                      <option value="7">7</option>
                    </select>
                    <span>人</span>
                  </dd>
                </dl>
              </dd>
            </dl>
          </div>
          
          <div class="calendar-search-box calendar-search-box-date">
            <dl>
              <dt>ご利用希望日（任意）</dt>
              <dd>
                <ol class="clearfix">
                  <li>
                    <select id="year" name="year">
                      <option value="2017">2017</option>
                      <option value="2018">2018</option>
                    </select>
                    <span>年</span>
                  </li>
                  <li>
                    <select id="month" name="month">
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                      <option value="6">6</option>
                      <option value="7">7</option>
                      <option value="8">8</option>
                      <option value="9">9</option>
                      <option value="10">10</option>
                      <option value="11">11</option>
                      <option value="12">12</option>
                    </select>
                    <span>月</span>
                  </li>
                  <li>
                    <select id="date" name="date">
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                      <option value="6">6</option>
                      <option value="7">7</option>
                      <option value="8">8</option>
                      <option value="9">9</option>
                      <option value="10">10</option>
                      <option value="11">11</option>
                      <option value="12">12</option>
                      <option value="13">13</option>
                      <option value="14">14</option>
                      <option value="15">15</option>
                      <option value="16">16</option>
                      <option value="17">17</option>
                      <option value="18">18</option>
                      <option value="19">19</option>
                      <option value="20">20</option>
                      <option value="21">21</option>
                      <option value="22">22</option>
                      <option value="23">23</option>
                      <option value="24">24</option>
                      <option value="25">25</option>
                      <option value="26">26</option>
                      <option value="27">27</option>
                      <option value="28">28</option>
                      <option value="29">29</option>
                      <option value="30">30</option>
                      <option value="31">31</option>
                    </select>
                    <span>日</span>
                  </li>
                </ol>
              </dd>
            </dl>
          </div>
          
          <div class="calendar-search-box calendar-search-box-btn">
            <div id="calendar-open" class="search-calendar-submit">
              <input type="submit" value="" class="reload-cancel">
              <p>カレンダーを表示する</p>
            </div>
          </div>
          
        </form>
      </div>
      
      <div id="calendar" class="calendar-wrap wrap">
        <div class="calendar-pager">
          <a href="?ym=<?php echo $prev; ?>">&lt;</a> <?php echo $html_title; ?> <a href="?ym=<?php echo $next; ?>">&gt;</a>
        </div>
        <div class="calendar-content inner clearfix">
          <table class="calendar-area">
            <tr class="week">
              <th>月</th>
              <th>火</th>
              <th>水</th>
              <th>木</th>
              <th>金</th>
              <th class="saturday">土</th>
              <th class="sunday">日</th>
            </tr>
            <?php
              foreach ($weeks as $week) {
                echo $week;
              }
            ?>
          </table>
        </div>
      </div>
      
      
      
      
      <div class="calendar-detail-area clearfix">
        <form class="calendar-detail-wrap">
          <div class="calendar-detail-wrap-in">
            <div class="calendar-detail-box">
              <dl class="calendar-detail-time">
                <dt>ご出発時間（必須）</dt>
                <dd>
                  <span>0000年00月00日</span>
                  <select id="time" name="time">
                    <option value="5:00">5:00</option>
                    <option value="5:30">5:30</option>
                    <option value="6:00">6:00</option>
                    <option value="6:30">6:30</option>
                    <option value="7:00">7:00</option>
                    <option value="7:30">7:30</option>
                    <option value="8:00">8:00</option>
                    <option value="8:30">8:30</option>
                    <option value="9:00">9:00</option>
                    <option value="9:30">9:30</option>
                    <option value="10:00">10:00</option>
                    <option value="10:30">10:30</option>
                    <option value="11:00">11:00</option>
                    <option value="11:30">11:30</option>
                    <option value="12:00">12:00</option>
                    <option value="12:30">12:30</option>
                    <option value="13:00">13:00</option>
                    <option value="13:30">13:30</option>
                    <option value="14:00">14:00</option>
                    <option value="14:30">14:30</option>
                    <option value="15:00">15:00</option>
                    <option value="15:30">15:30</option>
                    <option value="16:00">16:00</option>
                    <option value="16:30">16:30</option>
                    <option value="17:00">17:00</option>
                    <option value="17:30">17:30</option>
                    <option value="18:00">18:00</option>
                    <option value="18:30">18:30</option>
                    <option value="19:00">19:00</option>
                    <option value="19:30">19:30</option>
                    <option value="20:00">20:00</option>
                    <option value="20:30">20:30</option>
                    <option value="21:00">21:00</option>
                    <option value="21:30">21:30</option>
                  </select>
                </dd>
              </dl>
              <dl class="calendar-detail-place">
                <dt>乗車場所（必須）</dt>
                <dd>
                  <select id="date" name="date">
                    <option value='' disabled selected >空港・駅を選択</option>
                    <option value="成田空港国際ターミナルA">成田空港国際ターミナルA</option>
                    <option value="成田空港国際ターミナルB">成田空港国際ターミナルB</option>
                    <option value="成田空港国際ターミナルC">成田空港国際ターミナルC</option>
                    <option value="東京駅">東京駅</option>
                    <option value="新宿駅">新宿駅</option>
                  </select>
                </dd>
              </dl>
              <dl class="calendar-detail-place">
                <dt>降車場所（必須）</dt>
                <dd>
                  <select id="date" name="date">
                    <option value='' disabled selected >空港・駅を選択</option>
                    <option value="成田空港国際ターミナルA">成田空港国際ターミナルA</option>
                    <option value="成田空港国際ターミナルB">成田空港国際ターミナルB</option>
                    <option value="成田空港国際ターミナルC">成田空港国際ターミナルC</option>
                    <option value="東京駅">東京駅</option>
                    <option value="新宿駅">新宿駅</option>
                  </select>
                </dd>
              </dl>
            </div>
          
            <div class="calendar-detail-box calendar-detail-option">
              <dl>
                <dt>オプション</dt>
                <dd>
                  <ul>
                    <li>
                      <label>
                        <input type="checkbox" name="option" class="option-input">
                        <p class="option-parts">〇〇〇〇〇〇グレードアップ（1,500円）</p>
                      </label>
                    </li>
                    <li>
                      <label>
                        <input type="checkbox" name="option" class="option-input">
                        <p class="option-parts">〇〇〇〇〇〇グレードアップ（2,500円）</p>
                      </label>
                    </li>
                    <li>
                      <label>
                        <input type="checkbox" name="option" class="option-input">
                        <p class="option-parts">〇〇〇〇〇〇グレードアップを特別にグレードアップ（3,000円）</p>
                      </label>
                    </li>
                  </ul>
                </dd>
              </dl>
            </div>
          
            <div class="calendar-detail-box calendar-detail-price">
              <dl>
                <dt>合計金額</dt>
                <dd><span><input type="hidden" value="18,500">18,500</span>円</dd>
              </dl>
            <p class="red small">※高速道路料金は3,000円を上限に当日車内にてクレジットカードまたは日本円にて別途決済が発生しますためご注意ください。</p>
          </div>
        </div>

        
        
        
        <div class="calendar-detail-btn-area">
          <div class="detail-btn-area-submit">
            <ul>
              <li>
                <a href="#calendar-select" >カレンダーから日付を再度選択する</a>
              </li>
              <li>
                <input type="submit" value="">
                <p>このプランを申し込む</p>
              </li>
            </ul>
          </div>
        </div>
        </form>
      </div>
    </section>
  </div>
  <div class="modal-main">
    <p>このプランでは対象外のエリアです。</p>
    <ul>
      <li><a href="#">オーダーメイドプラン</a></li>
      <li><a href="#">該当プラン</a></li>
      <li><a href="#">入力をやり直す</a></li>
      </ul>
  </div>
  
  <div class="pickup-taxi-info wrap">
    <section class="pickup-taxi-content-in inner">
      <h2 class="pickup-taxi-ttl">お支払い・キャンセル料について</h2>
      <p>お支払方法：クレジット決済<br><span class="red">※高速道路料金は3,000円を上限に当日車内にてクレジットカードまたは日本円にて別途決済が発生しますためご注意ください</span></p>
      <p>ご予約確定後は一般貸切旅客自動車事業標準運送約款に基づき所定のキャンセル料が発生いたします。<br>ご予約をキャンセルされる場合は、お早めにお申し出ください。</p>
      <table class="tour-cancel-caut">
        <tr>
          <th>ご予約確定から配車前々日まで</th>
          <td>0％</td>
        </tr>
        <tr>
          <th>ご予約確定から配車前日まで</th>
          <td>50％</td>
        </tr>
        <tr>
          <th>配車当日および無連絡でのキャンセル</th>
          <td>100％</td>
        </tr>
      </table>
    </section>
  </div>
  
  <div class="pickup-taxi-info wrap">
    <section class="pickup-taxi-content-in inner">
      <h2 class="pickup-taxi-ttl">ご案内と諸注意</h2>
      <p>ご案内と諸注意ご案内と諸注意ご案内と諸注意ご案内と諸注意ご案内と諸注意ご案内と諸注意。<br>ご案内と諸注意ご案内と諸注意ご案内と諸注意ご案内と諸注意ご案内と諸注意ご案内と諸注意ご案内と諸注意ご案内と諸注意。<br>ご案内と諸注意ご案内と諸注意ご案内と諸注意ご案内と諸注意ご案内と諸注意ご案内。<br>ご案内と諸注意ご案内と諸注意ご案内と諸注意ご案内と諸注意ご案内と諸注意ご案内と諸注意ご案内と諸注意ご案内と諸注意ご案内と諸注意ご案内と諸注意ご案内と諸注意ご案内と諸注意ご案内と諸注意ご案内と諸注意ご案内と諸注意ご案内と諸注意ご案内と諸注意ご案内と諸注意。</p>
    </section>
  </div>
  
  <div class="pickup-taxi-info wrap">
    <section class="pickup-taxi-content-in inner">
      <h2 class="pickup-taxi-ttl">企画・実施</h2>
      <p>株式会社成田セントラル観光</p>
      <p>一般貸切旅客自動車運送事業　関自旅1第702号<br>旅行業 千葉県知事登録第3-509号</p>
      <p>千葉県香取郡多古町喜多389-23</p>
      <p>TEL:0479-76-7177</p>
    </section>
  </div>
  
  
  <div class="pickup-taxi-info wrap">
    <section class="pickup-taxi-content-in inner">
      <div class="calendar-check-btn">
        <a href="#">予約状況確認・申し込み</a>
      </div>
    </section>
  </div>


</main>
<?php get_footer(); ?>

