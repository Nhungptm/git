<?php get_header(); ?>
<?php
    include("functions/connect.php");
?>


<main>
  <div class="main-visual">
    <ul class="main-slider">


    <?php
$tv="select id_tour, tour_pic1, div_1 from m_tour where suggest = '999'";
$tv_1= mysql_query($tv);
while ($tv_2=mysql_fetch_array($tv_1))


  {

     echo "<li>";
     $link_anh="images/tours/".$tv_2['tour_pic1'];
     //$link_anh="images/tours/t12_1.jpg";
      
     //$link_chi_tiet="?thamso=chi_tiet_san_pham&id_tour=".$tv_2['id_tour'];
     //$link_chi_tiet="http://localhost/airport-tourisum/pickup-taxi/?thamso=chi_tiet_taxi&id_tour=".$tv_2['id_tour'];
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
     //echo "<a href=''>";
     //$link_anh="images/tours/t2_1.jpg";
    
     echo "<img src='$link_anh'>";
     //echo '<img src="images/tours/t2_1.jpg">';
     echo "</a>";
     echo "</li>";
      
    
  }
 ?> 
 </ul>
 </div>

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
          </ul>
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
          <li><a href="<?php bloginfo('url'); ?>">よくあるご質問</a></li>
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

        
        
<?php
$tv="select m_tour.id_tour, tour_pic1, tour_title,plan_id, tour_explanation,to_place,div_1,div_2,fee_hyouji_min,fee_hyouji_max from m_tour inner join m_price on m_tour.id_tour=m_price.id_tour where suggest = '997' order by id_tour desc limit 10";
$tv_1= mysql_query($tv);
while ($tv_2=mysql_fetch_array($tv_1))

  {
     $link_anh="images/tours/".$tv_2['tour_pic1'];
     //$link_chi_tiet="?thamso=chi_tiet_san_pham&id_tour=".$tv_2['id_tour'];
     //$link_chi_tiet="http://localhost/airport-tourisum/pickup-taxi/?thamso=chi_tiet_taxi&id_tour=".$tv_2['id_tour'];
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
      echo "<article>";
          echo "<a href='$link_chi_tiet'>";
            echo "<div class='plan-list-in pc-none'>";
            //echo "<img src='images/tours/t2_1.jpg'>";
            //echo '<img src="images/tours/t2_1.jpg">';
            echo "<img src='$link_anh'>";
            echo "</div>";

            echo "<h3 class='plan-list-ttl'>";
            echo "<span class='plan-num pc-none'>";
            //echo "ABC-001-1234";
            echo $tv_2['plan_id'];
            echo "</span>";
            //echo "成田国際空港～東京23区東部エリア 送迎プラン";
            echo $tv_2['tour_title'];
            echo "</h3>";

            echo "<div class='clearfix'>";
              echo "<figure class='plan-list-in left sp-none'>";
              //echo "<img src='images/tours/t2_1.jpg'>";
              //echo '<img src="images/tours/t2_1.jpg">';
              echo "<img src='$link_anh'>";
              echo "</figure>";

              echo "<div class='plan-list-in right'>";
                echo "<p class='plan-num sp-none'>";
                //echo "ABC-001-1234";
                echo $tv_2['plan_id'];
                echo "</p>";

                echo "<p>";
               /* echo "成田国際空港から東京23区東部エリアへの送迎プランです。";
                echo "<br>";
                echo "お客様にお好きな目的地をご指定いただくことができます。(最大70字目安）";*/
                echo $tv_2['tour_explanation'];
                echo "</p>";

                echo "<ul class='plan-list-flag'>";
                  echo "<li>";
                  //echo "東京 23区東部";
                  echo $tv_2['to_place'];
                  echo "</li>";
                  echo "<li>";
                  //echo "空港送迎";
                  echo $tv_2['div_2'];
                  echo "</li>";
                  echo "<li>";
                  //echo "20,000～30,000円 / 1台";
                  //dinh dang gia tien
                  $fee_hyouji_min = $tv_2['fee_hyouji_min'];
                  $fee_hyouji_min=number_format($fee_hyouji_min,0,",",",");
                  $fee_hyouji_max = $tv_2['fee_hyouji_max'];
                  $fee_hyouji_max=number_format($fee_hyouji_max,0,",",",");
                  echo $fee_hyouji_min."～".$fee_hyouji_max."円 / 1台";
                  echo "</li>";
                echo "</ul>";
              echo "</div>";
            echo "</div>";
          echo "</a>";
        echo "</article>";
  }
?>


      </div>
      <nav class="plan-more-btn"><a href="http://localhost/airport-tourisum/plan-list/">すべてのプランを見る</a></nav>
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