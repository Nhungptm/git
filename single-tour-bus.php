<?php
/*
Template Name: プラン詳細ーツアーバスー
*/
?>
<?php
include("functions/connect.php");
include('code_holiday.php');
// Set your timezone!!
date_default_timezone_set('Asia/Tokyo');
  
$tv = "SELECT * FROM xe";
$tv_1 = mysql_query($tv);
$resultTemp = array();
while ($tv_2=mysql_fetch_array($tv_1)) 
{
    array_push($resultTemp, $tv_2);
}
//$soluongHtml = '';
  
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
   $ngays = $ym.'-'.$day;
   $ngays = DateTime::createFromFormat('Y-m-j',$ngays);
   $ngays = $ngays->format('Y/m/d'); 
       //echo $ngays;
   if (strtotime($row["ngay"]) == strtotime($ngays)) 
  //if($row["ngay"]==$ym.'-'.$day)
  //$soluongHtml= '<br /> <br/> <span>'.$row["soluong"].' xe</span>';
   {
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
       $soluongHtml= '<br/> <br/> <span>'.'<font size="7">&#x25B3;</font></span>';
       // cung size thi hinh nay to qua, cho nho size thi no ko nam thang tren 1 row
     }
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
        $week .= '<td class="today">'.$day;    //<a href="#calendar-select"><span class="day">
    } 
  // if today la ngay le thi co red ko?  chua check dc, cho den ngay 17/7?
   else if ($holiday_datetime->holiday()!=false)
    {
      
      $week .= '<td class="ngayle">'.$day;  //<a href="#calendar-select"><span class="day">
    }
    else {
        $week .= '<td>'.$day;    //<a href="#calendar-select"><span class="day">
    }
    $week .= $soluongHtml.'</td>';
     
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

<head>
    <meta charset="utf-8">
    <title></title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
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
        }
    </style>
     
</head>
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
     <?php
      $id=$_GET['id'];
      $tv="select sp.*,pl.hyouji_name,cp.com_name,cp.license,cp.com_address1,cp.com_address2_bldg,cp.com_tel1 from san_pham as sp INNER JOIN m_place as pl ON sp.M_PLACE_from_place_id=pl.place_id INNER JOIN m_company as cp ON sp.com_id = cp.com_id where id='$id'";
      $tv_1=mysql_query($tv);
      $tv_2=mysql_fetch_array($tv_1);
      $link_anh1="../images/tours/".$tv_2['hinh_anh'];
      $link_anh2="../images/tours/".$tv_2['tour_pic2'];
      $link_anh3="../images/tours/".$tv_2['tour_pic3'];
      $link_anh4="../images/tours/".$tv_2['tour_pic4'];
      $link_anh5="../images/tours/".$tv_2['tour_pic5_midokoro'];
      $link_anh6="../images/tours/".$tv_2['tour_pic6_meal'];       
       echo "<h2 class='pickup-taxi-plan-ttl'>".$tv_2['tour_title']."</h2>";
        echo "<div class='summary-image-area'>";
          echo "<ul class='summary-slider'>";
            echo "<li>";
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
           
            echo "<td>".$tv_2['fee_min']."～".$tv_2['fee_max']."円/1人</td>";
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

                  echo $tv_2['date_st']."～".$tv_2['date_end']."の設定日";
              //echo date('m-d',$tv_2['date_st']);
                }
                
              echo "</td>";
          echo "</tr>";
          echo "<tr>";
            echo "<th>最小催行人数</th>"; 
            echo "<td>".$tv_2['number_min']."名</td>";
          echo "</tr>";
         echo "<tr>";
            echo "<th>所要時間</th>";
            echo "<td>".$tv_2['est_time']."</td>";
          echo "</tr>";
          echo "<tr>";
            echo "<th>お食事</th>";
            $meal=$tv_2['meals'];            
            ///////
            switch ($meal) 
            {
              case '7':
                echo "<td>朝食:1食 <span>/</span> 昼食:1食 <span>/</span> 夕食:1食</td>";
                break;
              case '6':
                echo "<td>朝食:- <span>/</span> 昼食:1食 <span>/</span> 夕食:1食</td>";
                break;
              case '2':
                echo "<td>朝食:- <span>/</span> 昼食:1食 <span>/</span> 夕食:-</td>";
                break;
              default:
                echo "<td>朝食:- <span>/</span> 昼食:- <span>/</span> 夕食:-</td>";
                break;
            }
            ///////
          echo "</tr>";
          echo "<tr>";
            echo "<th>添乗員同行有無</th>";
            if ($tv_2['tenjyou']=='1') 
            {
               echo "<td>あり</td>";
            }   
            else
            {
              echo "<td>なし</td>";
            }        
           
          echo "</tr>";
          echo "<tr>";
            echo "<th>案内言語</th>";  
            switch ($tv_2['langage']) 
            {
              case '1':
                echo "<td>日本語</td>";
                break;
              case '2':
                echo "<td>英語</td>";
                break;  
              case '3':
                echo "<td>日英</td>";
                break;        
              default:
                echo "<td>日本語</td>";
                break;
            }          
            
         echo "</tr>";
          echo "<tr>";            
            echo "<th>有効期限</th>";
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
          echo "<a href='#'>予約状況確認・申し込み</a>";
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
        <img src="<?php bloginfo('template_url'); ?>/images/detail-tour-bus/point_bus.png" alt="プランのポイント">
      </div>
      <div class="point-txt-area tour-bus-point">
        <p><?php echo $tv_2['tour_point']; ?></p>
        <br><?php  echo "<img src='$link_anh5'>";?>
      </div>
    </section>
  </div>
  
  <div class="pickup-taxi-info wrap">
    <section class="pickup-taxi-content-in inner">
      <h2 class="pickup-taxi-ttl">コース工程</h2>
      <p class="pickup-taxi-course"><?php echo $tv_2['tour_explanation_dtl']; ?></p>
      <p class="red">混雑の場合がありますのでお時間には余裕をもってお申し込みください。</p> <!-- dang de co dinh. neu luu vao DB thi or ko co mau do, or phai chen luon the html vao DB -->
    </section>

    <section class="pickup-taxi-content-in inner">
      <h2 class="pickup-taxi-ttl">お食事</h2>
      <div class="clearfix">
        <div class="pickup-taxi-txt-img left"><?php  echo "<img src='$link_anh6'>";?></div>
        <div class="pickup-taxi-txt right">
          <p><?php echo $tv_2['meal_txt']; ?></p>
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
          <p id="anchor"></p>   
          <div class="calendar-search-box calendar-search-box-btn">
            <div id="calendar-open" class="search-calendar-submit">
              <input type="submit" value="" class="reload-cancel" onclick="getdata()">
              <!-- <input type="submit" value="" class=""> -->

              <p>カレンダーを表示する</p>
            </div>
          </div>
          
        </form>
       
         <script type="text/javascript">
          // function getdata() 
          // {
            var a = document.getElementById("adult").value;

            alert(a);
          // }          
          </script>
          <?php 
            $adult="<script>document.write(a)</script>";
            echo $adult;
          ?>

      </div>
     
      <div id="calendar" class="calendar-wrap wrap">
        <div class="calendar-pager">
          <!-- <a href="?ym=<?php //echo $prev; ?>">&lt;</a> <?php //echo $html_title; ?> <a href="?ym=<?php //echo $next; ?>">&gt;</a> -->
          <h3><a href="?thamso=chi_tiet_tour&id=8&ym=<?php echo $prev; ?>#anchor">&lt;</a> <?php echo $html_title; ?> <a href="?thamso=chi_tiet_tour&id=8&ym=<?php echo $next; ?>#anchor">&gt;</a></h3>
        </div>
        <div class="calendar-content inner clearfix">
          <!-- <table class="calendar-area"> -->
          <table class="table table-bordered">
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
      <?php
        //<!-- <th><?php //echo $tv_2['period_start']."日前～".$tv_2['period_end']."日前"; 
       $com_id=$tv_2['com_id'];
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
        echo $tv_2['warning'];
      ?>
    </section>
  </div>
  
  <div class="pickup-taxi-info wrap">
    <section class="pickup-taxi-content-in inner">
      <h2 class="pickup-taxi-ttl">企画・実施</h2>
      <?php
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

