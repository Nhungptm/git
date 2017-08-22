<?php 
session_start();
include("functions/connect.php");
?>
<?php get_header(); ?>
<main id="main-content">
  <div class="bread-crumbs">
    <ul class="clearfix inner">
      <li><a href="<?php bloginfo('url'); ?>">ホーム</a></li>
      <li><a href="<?php bloginfo('url'); ?>/plan-list">プラン一覧</a></li>
      <li><a><?php echo $_SESSION['tour_title'];?></a></li>
      <li>プラン内容のご確認</li>

    </ul>
  </div>
  
  <div id="vivid-trigger" class="inner">
    <h2 class="plan-confirm-page-ttl">プラン内容のご確認</h2>

  </div>
  
  <div class="plan-confirm-summary wrap">
    <section class="plan-confirm-content-in inner">
      <h3 class="plan-confirm-ttl">プラン基本情報</h3>
       <?php   
              
      $time=$_GET['time'] ;           
      ?>
      <p class="plan-num">プランNo.<?php echo $_SESSION['plan_id'];?><p>
      <p class="plan-ttl"><?php echo $_SESSION['tour_title'];?></p>
      <div class="dl-type01-box">
        <dl class="dl-type01">
          <dt>ご出発日時</dd>
          <!-- <dd>2017年7月15日（土）10:30</dd> -->
          <dd><?php echo $_SESSION['date'].$time; ?></dd>
        </dl>
        <dl class="dl-type01">
          <dt>ご乗車場所</dd>
          <dd><?php echo $_SESSION['start'];?></dd>
        </dl>
        <dl class="dl-type01">
          <dt>ご降車場所</dd>
          <dd><?php echo $_SESSION['end'];?></dd>
        </dl>
      </div>
      
      <div class="plan-confirm-map">
      <!-- 　<p>ここにマップを埋め込む</p> -->



   
            <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyBp8Mf4PJMAn8tTvU_am67VHp6mk3_RvZA&sensor=false&libraries=places"></script>
            <script type="text/javascript">
                var source, destination;
                var directionsDisplay;
                var directionsService = new google.maps.DirectionsService();
                google.maps.event.addDomListener(window, 'load', function () {
                    debugger;
                    new google.maps.places.SearchBox(document.getElementById('txtSource'));
                    new google.maps.places.SearchBox(document.getElementById('txtDestination'));
                    directionsDisplay = new google.maps.DirectionsRenderer({ 'draggable': true });   // khai bao muon dung Google Map kieu nao
                });

                function GetRoute() {     // route la lo trinh
                    var mumbai = new google.maps.LatLng(18.9750, 72.8258);
                    var mapOptions = {
                        zoom: 7,
                        center: mumbai,
                        durationInTraffic: true
                    };
                    map = new google.maps.Map(document.getElementById('dvMap'), mapOptions);
                    directionsDisplay.setMap(map);
                    directionsDisplay.setPanel(document.getElementById('dvPanel'));

                    //*********DIRECTIONS AND ROUTE**********************//
                    source = document.getElementById("txtSource").value;
                    destination = document.getElementById("txtDestination").value;

                    var request = {
                        origin: source,
                        destination: destination,
                        //travelMode: google.maps.TravelMode.DRIVING
                        travelMode: google.maps.TravelMode.WALKING
                    };
                    directionsService.route(request, function (response, status) {
                        if (status == google.maps.DirectionsStatus.OK) {
                            directionsDisplay.setDirections(response);
                      google.maps.event.addListener(directionsDisplay, 'directions_changed', function() {
                    var directions = directionsDisplay.getDirections();  // cai nay quan trong: khai bao mang de hung cac thong tin chi duong cua google map
                    //console.log(directions); lenh debug nay show ra giá trị của tất cả các loại dữ liệu như number, integer, array, object    
                  
                    
                      // lay dia chi satrt va end
                     document.getElementById('address').value = directions.routes[0].legs[0].start_address;
                     var a5=document.getElementById('address').value;  
                     document.getElementById('address').value = directions.routes[0].legs[directions.routes[0].legs.length-1].end_address;
                     var a6=document.getElementById('address').value;         
                      
                   
                     //document.getElementById("address").innerHTML= "Start address: "+a5+ "</br>";
                     //document.getElementById("address").innerHTML+="End address: "+a6+ "</br>";
                    
                  })           
                        }
                    });

                    //*********DISTANCE AND DURATION**********************//
                    var service = new google.maps.DistanceMatrixService();
                    service.getDistanceMatrix({
                        origins: [source],
                        destinations: [destination],
                        //travelMode: google.maps.TravelMode.DRIVING,
                         travelMode: google.maps.TravelMode.WALKING,
                        unitSystem: google.maps.UnitSystem.METRIC,
                        avoidHighways: true,
                        avoidTolls: true
                    }, function (response, status) {
                        debugger;
                        if (status == google.maps.DistanceMatrixStatus.OK && response.rows[0].elements[0].status != "ZERO_RESULTS") {
                         
                        } else {
                            alert("Unable to find the distance via road.");
                        }
                    });
                   
                }
                window.onload = GetRoute;
            </script>


            <form id="form1" runat="server">
              <div>
                <table border="0" cellpadding="0" cellspacing="3">
                  <tr>
                    <td>
                    <input type="hidden" id="txtSource" value="<?php echo $_SESSION['start']; ?>"/>
                  
                    <input type="hidden" id="txtDestination" value="<?php echo $_SESSION['end']; ?>"/>
                    
                    </td>
                  </tr>
                  <tr>
                      <td colspan="2">
                         <!--  <div id="dvDistance"> -->
                          <div id ="address">
                          

                          </div>
                      </td>
                  </tr>
                  <tr>
                      <td>
                          <div id="dvMap" style="width: 1355px; height: 320px">
                          </div>
                      </td>
                      <td>
            <!--         <div id="dvPanel" style="width: 500px; height: 500px">
             -->        </div>
                      </td>
                  </tr>
                </table>
              </div>
            </form>


             <!-- ////////////////////////////////////////////////////////////////////////////// -->
        
      </div>
      
      <div class="dl-type01-box">
        <dl class="dl-type01">
          <dt>お申込み人数</dd>
          <dd>カレンダーから選んだ人数　名様</dd>
        </dl>
        <dl class="dl-type01">
          <dt>車種</dd>
          <dd>カレンダーから選んだ車</dd>
        </dl>
        <dl class="dl-type01">
          <dt>オプション</dd>
          <dd>
          <?php
           $id_tour=$_SESSION['id'];
           $tv="select * from T_OPTION where id_tour= '$id_tour' ORDER BY option_id";
           $tv_1=mysql_query($tv);
          
           //$resultTemp = array();
            $option="";
           while ($tv_2=mysql_fetch_array($tv_1)) 
           {
           
              //array_push($resultTemp, $tv_2);  // use mang tam de hung ket qua
            $op_id=$tv_2['option_id'];

            if(isset($_GET[$op_id]))
            {
              $option = $option.$tv_2['option_name'].", ";              
            }
           }
           $option=trim($option);
           $option=trim($option,',');
           echo $option;
          ?>
          </dd>
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
         <?php
        //<!-- <th><?php //echo $tv_2['period_start']."日前～".$tv_2['period_end']."日前";       
       $com_id=$_SESSION['com_id'];
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
      
      <section class="plan-confirm-info">
        <h4 class="plan-confirm-info-ttl">ご案内と諸注意</h4>
        <?php       
        echo $_SESSION['warning'];
        ?>
      </section>
      
      <section class="plan-confirm-info">
        <h4 class="plan-confirm-info-ttl">企画・実施</h4>
        <?php
        echo "<p>". $_SESSION['com_name']."</p>";
        echo "<p>". $_SESSION['license']."</p>";
        echo "<p>". $_SESSION['com_address1']."</p>";
        echo "<p>". $_SESSION['com_address2_bldg']."</p>";
        echo "<p>TEL: ". $_SESSION['com_tel1']."</p>";
        ?>
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

