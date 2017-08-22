<?php
/*
Template Name: プラン詳細ーTAXIー
*/
?>
<?php
session_start();
include("functions/connect.php");
include('code_holiday.php');
// Set your timezone!!
date_default_timezone_set('Asia/Tokyo');

$com_id=$_SESSION['com_id'];
$tv = "select * FROM m_carstock where com_id='$com_id'";
$tv_1 = mysql_query($tv);
$resultTemp = array();
while ($tv_2=mysql_fetch_array($tv_1)) 
{
    array_push($resultTemp, $tv_2);
}
//$soluongHtml = '';
  
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
/////////////////////////// do du lieu vao o lich// calendar of sedan
$soluongHtml ='';
for($x=0;$x<count($resultTemp);$x++)
  {
   $row = $resultTemp[$x];
  if($row["date"]==$ym.'-'.$day)
  //$soluongHtml= '<br /> <br/> <span>'.$row["sedan_stock"].' xe</span>';
 //add 19/06, show 〇、X、△、
 if ($row["sedan_stock"]>2)
 {
  //$soluongHtml= '<br /> <br/> <span>'.$row["sedan_stock"].' 台</span>';
   $soluongHtml= '<br /> <br/> <span>'.'<font size="7">&#x25CB;</font></span>';
 }
 else if($row["sedan_stock"]==0)
 {
   //$soluongHtml= '<br /> <br/> <span>'.$row["sedan_stock"].' 台</span>';
   $soluongHtml= '<br /> <br/> <span>'.'<font size="7">&#x00D7;</font></span>';
 }
 else
 {
   //$soluongHtml= '<br /> <br/> <span>'.$row["sedan_stock"].' 台</span>';
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
<!-- <head>
    <meta charset="utf-8">
    <title></title>
    <!-Latest compiled and minified CSS -->
   <!--  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link href='https://fonts.googleapis.com/css?family=Noto+Sans:400,700' rel='stylesheet' type='text/css'>
    <style>
        .container {
            font-family: 'Noto Sans', sans-serif;
            margin-top: 80px;
        }
        th {
            height: 30px;
            text-align: center;
            font-weight: 700;
        }
        td {
            height: 100px;
        }
        .today {
            background: orange;
        }
        th:nth-of-type(6),td:nth-of-type(6) {
            color: blue;
        }
        th:nth-of-type(7),td:nth-of-type(7) {
            color: red;
        }
        .ngayle{
            color: red !important;
      
    </style>
     
</head> --> 
<?php get_header(); ?>

<main id="main-content">
  <div class="bread-crumbs">
    <ul class="clearfix inner">
      <li><a href="<?php bloginfo('url'); ?>">ホーム</a></li>
      <li><a href="<?php bloginfo('url'); ?>/plan-list">プラン一覧</a></li>
      <?php
      $id=$_GET['id'];
      $_SESSION['id']=$id;     
      $tv="select t.*,fee_hyouji_min,fee_hyouji_max,m_price.fee_include,pl.hyouji_name,cp.com_name,cp.license,cp.com_address1,cp.com_address2_bldg,cp.com_tel1 from m_tour as t INNER JOIN m_place as pl ON t.M_PLACE_from_place_id=pl.place_id INNER JOIN m_company as cp ON t.com_id = cp.com_id inner join m_price on t.id_tour=m_price.id_tour where t.id_tour='$id'";
      $tv_1=mysql_query($tv);
      $tv_2=mysql_fetch_array($tv_1);
      echo "<li>".$tv_2['tour_title']."</li>";
      $_SESSION['plan_id']=$tv_2['plan_id'];
      $_SESSION['tour_title']=$tv_2['tour_title'];
      $_SESSION['com_id'] =$tv_2['com_id'];
      $com_id=$_SESSION['com_id'];
      ?>
      
    </ul>
  </div>
  
  <div id="vivid-trigger" class="pickup-taxi-summary wrap">
    <section class="pickup-taxi-content-in inner clearfix">
    <?php

      $link_anh1="../images/tours/".$tv_2['tour_pic1'];
      $link_anh2="../images/tours/".$tv_2['tour_pic2'];
      $link_anh3="../images/tours/".$tv_2['tour_pic3'];
      $link_anh4="../images/tours/".$tv_2['tour_pic4'];

      echo "<h2 class='pickup-taxi-plan-ttl'>".$tv_2['tour_title']."</h2>";
      echo "<div class='summary-image-area'>";
        echo "<ul class='summary-slider'>";
          echo "<li>";
           //echo '<img src="../images/tours/t2_1.jpg">';
            echo "<img src='$link_anh1' width='' >";
          echo "</li>";
          echo "<li>";
           //echo '<img src="../images/tours/t1_1.jpg">';
            echo "<img src='$link_anh2'>";
          echo "</li>"; 
          echo "<li>";
           //echo '<img src="../images/tours/t3_1.jpg">';
            echo "<img src='$link_anh3'>";
          echo "</li>";
          echo "<li>";
           //echo '<img src="../images/tours/t8_1.jpg">';
            echo "<img src='$link_anh4'>";
          echo "</li>";
         
        echo "</ul>";
        echo "<ul class='summary-slider-thumb'>";
          echo "<li>";
           //echo '<img src="../images/tours/t2_1.jpg">';
           echo "<img src='$link_anh1' width='' >";
          echo "</li>";
          echo "<li>";
           //echo '<img src="../images/tours/t1_1.jpg">';
            echo "<img src='$link_anh2'>";
          echo "</li>"; 
          echo "<li>";
           //echo '<img src="../images/tours/t3_1.jpg">';
            echo "<img src='$link_anh3'>";
          echo "</li>";
          echo "<li>";
           //echo '<img src="../images/tours/t8_1.jpg">';
            echo "<img src='$link_anh4'>";
          echo "</li>";
        echo "</ul>";
        echo "<p class='small'>※写真はすべてイメージです</p>";
      echo "</div>";
      echo "<div class='summary-txt-area'>";
        echo "<p class='plan-num'>".$tv_2['plan_id']."</p>";
        echo "<p class='plan-desc'>".$tv_2['tour_explanation']."</p>";
        echo "<table>";
          echo "<tr>";
            echo "<th>エリア</th>";
            echo "<td>".$tv_2['hyouji_name']."</td>";
          echo "</tr>";
          echo "<tr>";
            echo "<th>ジャンル</th>";
            echo "<td>".$tv_2['div_2']."</td>";
          echo "</tr>";
          echo "<tr>";
            echo "<th>料金</th>";
            //dinh dang gia tien
            $fee_hyouji_min = $tv_2['fee_hyouji_min'];
            $fee_hyouji_min=number_format($fee_hyouji_min,0,",",",");
            $fee_hyouji_max = $tv_2['fee_hyouji_max'];
            $fee_hyouji_max=number_format($fee_hyouji_max,0,",",",");                            
            echo "<td>".$fee_hyouji_min."～".$fee_hyouji_max."円/1台</td>";
            //echo "<td>18,500円/1台</td>";
          echo "</tr>";
          echo "<tr>";
            echo "<th>料金に含まれるもの</th>";
            //echo "<td>車両代・ドライバー代<br><span class='red small'>※高速道路料金は3,000円を上限に当日社内にてクレジットカードまたは日本円にて別途決済が発生しますためご注意ください。</span></td>";
            echo "<td>".$tv_2['fee_include']."</td>";
          echo "</tr>";
          echo "<tr>";
            echo "<th>実施期間</th>";
            //echo "<td>通年</td>";
              echo "<td>";
                if($tv_2['date_txt']=='通年')
                {
                  echo $tv_2['date_txt'];
                }
                else{

                  echo $tv_2['date_st']."～".$tv_2['date_end'];
              //echo date('m-d',$tv_2['date_st']);
                }
                
              echo "</td>";
          echo "</tr>";
          echo "<tr>";
            echo "<th>所要時間</th>";
            echo "<td>".$tv_2['est_time']."</td>";
          echo "</tr>";
          echo "<tr>";
            echo "<th>有効期限</th>";
            //echo "<td>2018年3月31日</td>";
            $date_end = $tv_2['date_end'];
            $date = new DateTime($date_end);
            $days = $tv_2['entry_limit'];
            // trừ đi days ngày
            // >= php version 5.3
            date_sub($date, date_interval_create_from_date_string($days.' days'));
            $date_nd = date_format($date, 'Y-m-d');
            echo "<td>".$date_nd."</td>";
          echo "</tr>";
        echo "</table>";
        
        echo "<div class='calendar-check-btn'>";
          echo "<a href='#reserve-area'>予約状況確認・申し込み</a>";
        echo "</div>";
      echo "</div>";
      ?>
    </section>
  </div>
  
  <div class="pickup-taxi-point wrap bk-gray">
    <section class="pickup-taxi-content-in inner clearfix">
      <div class="point-ttl-area">
        <h2>プランのポイント</h2>
        <hr>
        <img src="<?php bloginfo('template_url'); ?>/images/detail-pickup-taxi/point_taxi.png" alt="プランのポイント">
      </div>
      <div class="point-txt-area">
        <p><?php echo $tv_2['tour_point']; ?></p>  <!-- doan code trong cap the php nay co the dung duoc trong cap the php khac! That tuyet voi!!! -->
      </div>
    </section>
  </div>
  
  <div class="pickup-taxi-info wrap">
    <section class="pickup-taxi-content-in inner">
      <h2 class="pickup-taxi-ttl">ご乗車定員</h2>
      <p>各車両について詳しい情報は<a href="#">車両紹介ページ</a>をご覧ください。<br>
      9名様以上でのお申し込みの場合は、別途<a href="#">お問い合わせページ</a>からご相談ください。</p>
      <table class="table-type01">
        <tr>
          <th>セダン</th>
          <th>ミニバン</th>
          <th>ワゴン</th>
        </tr>
        <tr>
          <td>3名</td>
          <td>5名</td>
          <td>9名</td>
        </tr>
      </table>
    </section>
  </div>
  
  <div id="reserve-area" class="pickup-taxi-info wrap">
    <section class="pickup-taxi-content-in inner">
      <h2 class="pickup-taxi-ttl">予約状況確認・お申込み</h2>
      <p>ご利用人数を入力（必須）し、ご希望の日時を入力（任意）の上、「予約状況を確認する」ボタンを押してください。<br>カレンダー上の車種をクリックすると該当する車種タイプごとに空き状況がカレンダーに表示されます。ご利用人数によって手配できる車種に制限があります。</p>
      <p>予約可能な日付のカレンダーのマークをクリックすると、出発場所、出発時刻の入力画面が表示されます。<br>入力完了後に「予約する」ボタンを押すと、確認画面へ進みます。<br><span class="red">混雑の場合がありますのでお時間には余裕をもってお申し込みください。</span></p>
      
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
          <ul class="calendar-content-tab clearfix">
            <li>セダン</li>
            <li>ミニバン</li>
            <li>ワゴン</li>
          </ul>
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

        <form class="calendar-detail-wrap" action="http://localhost/airport-tourisum/pickup-taxi-confirm/"> <!--PHAN-->
          <input type="hidden" name="thamso" value="confirm_taxi">                                                   <!--PHAN-->
          <input type="hidden" name="id" value="<?php echo $id; ?>">  <!--cai nay hay:nhet php vao the html-->       <!--PHAN-->
          <div class="calendar-detail-wrap-in">
            <div class="calendar-detail-box">
              <dl class="calendar-detail-time">
                <dt>ご出発時間（必須）</dt>
                <dd>
                   <span><?php $_SESSION['date']='カレンダーから選んだ日(0000年00月00日)';echo $_SESSION['date']; ?></span>　<!--PHAN　javascript 通り-->
                  <input type="hidden" name="date" value= "カレンダーから選んだ日">　<!--PHAN　javascript 通り-->

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
              <?php
              $_SESSION['start']='成田空港';
              $_SESSION['end']='東京駅';
              ?>
             <dl class="calendar-detail-place">
                <dt>乗車場所（必須）</dt>
                <dd>
                  <select id="date" name="noru">
                    <option value='' disabled selected >空港を選択</option>
                    <option value="成田空港国際ターミナルA">成田空港国際ターミナルA</option>
                    <option value="成田空港国際ターミナルB">成田空港国際ターミナルB</option>
                    <option value="成田空港国際ターミナルC">成田空港国際ターミナルC</option>
                  </select>
                </dd>
              </dl>
              <dl class="calendar-detail-place">
                <dt>降車場所（必須）</dt>
                <dd><input type="text" id="end_adr" name="oriru" value="<?php echo $_SESSION['end']; ?>" readonly></dd>
              </dl>
            </div>
          <!-- <input type="hidden" id="txtSource_1" value="<?php //echo $_SESSION['start']; ?>" style="width: 200px" readonly>  -->    
         <input type="hidden" id="txtSource_1" value="<?php echo $_SESSION['start']; ?>">  
         <input type="hidden" id="txtDestination_1" value="<?php echo $_SESSION['end']; ?>">   

            <div class="calendar-detail-box calendar-detail-option">
              <dl>
                <dt>オプション</dt>
                <dd>
                  ※このプランには追加できるオプションはありません。
                  <ul id="option"><!--青木変更-->
                      <?php
                      $tv="select * from T_OPTION where id_tour= '$id' ORDER BY option_id";
                      $tv_1=mysql_query($tv);
                      $resultTemp = array();
                      while ($tv_3=mysql_fetch_array($tv_1)) 
                      {
                          array_push($resultTemp, $tv_3);  // use mang tam de hung ket qua
                      }
                      for($x=0;$x<count($resultTemp);$x++)
                      {
                        $row = $resultTemp[$x];
                          echo "<li>";
                          echo "<div class='option-caption'>";
                        
                            echo "<p>".$row['option_name']."</p>";
                            //dinh dang gia tien
                            $op_price = $row['op_price'];
                            $op_price=number_format($op_price,0,",",",");
                            echo "<p>".$op_price."円</p>";
                          echo "</div>";
                          echo "<div class='option-select-wrap'>";
                            echo "<div class='option-select-in'>";
                              echo "<p>数量</p>";
                              $tagid=$row['option_id'];                              
                              echo "<select name='$tagid' class='option-select'>";
                               echo "<option value='' disabled selected >--</option>";
                               for($i=1;$i<=$row['max_vol'];$i++)
                               {
                                $pr=$i*$row['op_price'];
                               echo "<option value='$pr'>".$i."</option>";
                               }
                              echo "</select>";      
                                ///
                          // echo "<p id='demo'>aaaaaaaaaaaaaaaaaaaaaaaa</p>";
                          // echo "<script>function myFunction() {var x = document.getElementById('$tagid').value;document.getElementById('demo').innerHTML = 'You selected: ' + x;}</script>";
                          ///                        
                           echo "</div>";
                         echo "</div>";
                        echo "</li>";                             

                     }
                   ?> 


                  </ul>
                  
                </dd>
              </dl>
            </div>
          
            <div class="calendar-detail-box calendar-detail-price">
              <dl>
                <dt>合計金額</dt>               
               <!--  <dd><span id="total"><input type="hidden" value="20000">20,000</span>円</dd> -->
               <dd><span id="total">20,000</span>円</dd>
              </dl>
            <p class="red small">※高速道路料金は3,000円を上限に当日車内にてクレジットカードまたは日本円にて別途決済が発生しますためご注意ください。</p>
          </div>
        </div> 
        <input name="gokei" id="total2" type="hidden" value="20000">                       
        <!-- <div class="calendar-detail-map-area">  da add in showmap file-->
        <!--   <p>ここにマップを埋め込む</p> -->
        <?php
         $lat= 34.66875705370255; //latitude
         $lng= 133.90750786450008; //longitude
        ?>
          <label for="latitude">緯度</label>
          <input type="text" id="latitude" name="lat" value="<?php echo $lat; ?>" size="20" />
          <label for="longitude">経度</label>
          <input type="text" id="longitude" name="lng" value="<?php echo $lng; ?>" size="20" />
        <?php include('functions/showmap.php'); ?>

        
        
        
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
      
      <?php
        //<!-- <th><?php //echo $tv_2['period_start']."日前～".$tv_2['period_end']."日前";      
       
       $tv1="select * from m_cancel_fee WHERE com_id= '$com_id' ORDER BY rate";
       $tv1_1 = mysql_query($tv1);
       echo "<table class='tour-cancel-caut'>";
       while ($tv1_2=mysql_fetch_array($tv1_1)) 
       {
         echo "<tr>";
          echo "<th>".$tv1_2['period_start']."日前～".$tv1_2['period_end']."日前</th>";
          echo "<td>".$tv1_2['rate']."％</td>";
         echo "</tr>";
       }
        echo "</table>";
      ?>    
      
    </section>
  </div>
  
  <div class="pickup-taxi-info wrap">
    <section class="pickup-taxi-content-in inner">
      <h2 class="pickup-taxi-ttl">ご案内と諸注意</h2>

      <?php
        $_SESSION['warning']=$tv_2['warning'];
        echo $_SESSION['warning'];
      ?>
    </section>
  </div>  
  <div class="pickup-taxi-info wrap">
    <section class="pickup-taxi-content-in inner">
      <h2 class="pickup-taxi-ttl">企画・実施</h2>
      <?php
      $_SESSION['com_name']=$tv_2['com_name'];
      $_SESSION['license']=$tv_2['license'];
      $_SESSION['com_address1']=$tv_2['com_address1'];
      $_SESSION['com_address2_bldg']=$tv_2['com_address2_bldg'];
      $_SESSION['com_tel1']=$tv_2['com_tel1'];
      echo "<p>".$tv_2['com_name']."</p>";
      echo "<p>".$tv_2['license']."</p>";
      echo "<p>".$tv_2['com_address1']."</p>";
      echo "<p>".$tv_2['com_address2_bldg']."</p>";
      echo "<p>TEL: ".$tv_2['com_tel1']."</p>";
      ?>
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

