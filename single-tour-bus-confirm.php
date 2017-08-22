<?php
/*
Template Name: プラン内容のご確認―ツアーバス―
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
      <li><a>英語ツアーガイドがご案内！成田周辺半日体験バスツアー</a></li>
      <li>プラン内容のご確認</li>
    </ul>
  </div>
  
  <div id="vivid-trigger" class="inner">
    <h2 class="plan-confirm-page-ttl">プラン内容のご確認</h2>
  </div>
  
  <div class="plan-confirm-summary wrap">
    <section class="plan-confirm-content-in inner">
      <h3 class="plan-confirm-ttl">プラン基本情報</h3>
      <p class="plan-num">プランNo.PBE-001-0001<p>
      <p class="plan-ttl">英語ツアーガイドがご案内！成田周辺半日体験バスツアー</p>
      <div class="dl-type01-box">
        <dl class="dl-type01">
          <dt>ご出発日時</dd>
          <dd>2017年7月15日（土）10:30</dd>
        </dl>
        <dl class="dl-type01">
          <dt>ご乗車場所</dd>
          <dd>成田空港国際ターミナル前</dd>
        </dl>
        <dl class="dl-type01">
          <dt>ご降車場所</dd>
          <dd>成田空港国際ターミナル前</dd>
        </dl>
      </div>
      
      <div class="dl-type01-box">
        <dl class="dl-type01">
          <dt>お申込み人数</dd>
          <dd>大人4名様</dd>
        </dl>
        <dl class="dl-type01">
          <dt>オプション</dd>
          <dd>チャイルドシート</dd>
        </dl>
        <dl class="dl-type01">
          <dt>料金</dd>
          <dd>18,500円/1台</dd>
        </dl>
        <dl class="dl-type01">
          <dt>お支払方法</dd>
          <dd>クレジット決済</dd>
        </dl>
      </div>
    </section>
  </div>
  
  <div class="plan-confirm-info wrap">
    <section class="plan-confirm-content-in inner">
      <h3 class="plan-confirm-ttl">その他プラン情報</h3>
      <section class="plan-confirm-info">
        <h4 class="plan-confirm-info-ttl">お支払い・キャンセル料について</h4>
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
      
      <section class="plan-confirm-info">
        <h4 class="plan-confirm-info-ttl">ご案内と諸注意</h4>
        <p>ご案内と諸注意ご案内と諸注意ご案内と諸注意ご案内と諸注意ご案内と諸注意ご案内と諸注意。<br>ご案内と諸注意ご案内と諸注意ご案内と諸注意ご案内と諸注意ご案内と諸注意ご案内と諸注意ご案内と諸注意ご案内と諸注意。<br>ご案内と諸注意ご案内と諸注意ご案内と諸注意ご案内と諸注意ご案内と諸注意ご案内。<br>ご案内と諸注意ご案内と諸注意ご案内と諸注意ご案内と諸注意ご案内と諸注意ご案内と諸注意ご案内と諸注意ご案内と諸注意ご案内と諸注意ご案内と諸注意ご案内と諸注意ご案内と諸注意ご案内と諸注意ご案内と諸注意ご案内と諸注意ご案内と諸注意</p>
      </section>
      
      <section class="plan-confirm-info">
        <h4 class="plan-confirm-info-ttl">企画・実施</h4>
        <p>株式会社成田セントラル観光</p>
        <p>一般貸切旅客自動車運送事業　関自旅1第702号<br>旅行業 千葉県知事登録第3-509号</p>
        <p>千葉県香取郡多古町喜多389-23</p>
        <p>TEL:0479-76-7177</p>
      </section>
    </section>
  </div>
  
  
  <div class="plan-confirm-check-area wrap">
    <div class="plan-confirm-check-in inner">
      <p>ご予約される際は必ず下記条件を確認の上、同意する場合はチェックを入れてください。</p>
      <ul>
        <li>
          <label>
            <input type="checkbox" name="plan-confirm-check" class="plan-confirm-check-input">
            <p class="check-parts">旅行手配のために個人データを該当期間に提供することについて同意する</a></p>
          </label>
        </li>
        <li>
          <label>
            <input type="checkbox" name="plan-confirm-check" class="plan-confirm-check-input">
            <p class="check-parts">このページ及び取引条件説明（共通事項）を保存・印刷した</p>
          </label>
        </li>
        <li>
          <label>
            <input type="checkbox" name="plan-confirm-check" class="plan-confirm-check-input">
            <p class="check-parts">旅行条件書の電磁的交付を受けることに同意した</a></p>
          </label>
        </li>
      </ul>
    </div>
  </div>
  
  <div class="plan-confirm-info wrap">
    <section class="plan-confirm-content-in inner">
      <div class="plan-confirm-reservation-btn">
        <a href="#">このプランを申し込む</a>
      </div>
    </section>
  </div>


</main>
<?php get_footer(); ?>

