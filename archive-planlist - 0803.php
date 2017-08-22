<!-- khi dua len server nho sua lai cho form acction va the <a> link den trang chi tiet.
 -->
<?php
    include("functions/connect.php");
?>


<?php
/*
Template Name: プラン一覧
*/
?>
<?php //get_header(); ?>
<?php get_header(); ?>
<main id="main-content">
  <div class="bread-crumbs">
    <ul class="clearfix inner">
      <li><a href="<?php bloginfo('url'); ?>">ホーム</a></li>
      <li>プラン一覧</li>
    </ul>
  </div>
    
<?php get_sidebar("search"); ?>
<div class="archive-plan-content wrap">
  <section class="inner">
    <h2 class="home-h2-ttl">おすすめプラン</h2>
<!--  /////////////////////////////////////////////minh code////////////////////////////////////////////    -->
<?php
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////truong hop 1
// se gan cung trong dieu kien WHERE cua SQL la div_1='空港送迎' >> -----------------------------------------------------OK 1
if(isset($_GET['keyword_']))    // neu ko co keyword thi ko phai tim kiem >> xuat ra danh sach binh thuong.
{
  $category='空港送迎';
  $airport=$keyword_=$date="";
  if(!isset($_GET['airport']))
  {
    echo '<script type="text/javascript"> alert("空港を選択して下さい。");</script>';
  }
  else
  {
    $airport=$_GET['airport'];
    //echo $airport;  -------------------------------------------------------------------------------------------------- OK 2
    if ($_GET['keyword_']=="") 
    {
      echo '<script type="text/javascript"> alert("指定地を入力して下さい。");</script>';
    }
    else{
      function CallAPI($method, $url, $data = false)
      {
          $curl = curl_init();

          switch ($method)
          {
              case "POST":
                  curl_setopt($curl, CURLOPT_POST, 1);

                  if ($data)
                      curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                  break;
              case "PUT":
                  curl_setopt($curl, CURLOPT_PUT, 1);
                  break;
              default:
                  if ($data)
                      $url = sprintf("%s?%s", $url, http_build_query($data));
          }

          // Optional Authentication:
          curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
          curl_setopt($curl, CURLOPT_USERPWD, "username:password");

          curl_setopt($curl, CURLOPT_URL, $url);
          curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

          $result = curl_exec($curl);

          curl_close($curl);

          return $result;
      }
      $keyword_ = $_GET['keyword_'];
      $rs= CallAPI("GET",'http://maps.googleapis.com/maps/api/geocode/json?address='.$keyword_.'&sensor=true_or_false',$data=false);
      //var_dump(json_decode($rs));
        $rs=json_decode($rs);
          //var_dump($rs);
        $stt=$rs->status;
        //var_dump($stt);
        if ($stt=='OK')
        {         

          $cnt=count($rs->results[0]->address_components);
          
          //var_dump($rs->results[0]->address_components[$cnt-1]->long_name);
          $zipcode= ($rs->results[0]->address_components[$cnt-1]->long_name);
          $zipcode = str_replace( '-', '', $zipcode ); 
          //echo $zipcode; -----------------------------------------------------------------------------------------------------OK 3.1
          //$result = $zipcode;
          //echo "郵便番号：　".$result; echo "<br>";echo "<br>";
          $tv = "select place_id from m_place where zip_cd = '$zipcode'";
          $tv_1 = mysql_query($tv);
          $tv_2 = mysql_fetch_array($tv_1);
          $place2 = $tv_2[0];
          //echo $place2; ------------------------------------------------------------------------------------------------------OK 3.2

        }
        else {
          //$result = 'もう一度住所を入れてください。';
          $result='「サービスの対象地域ではありません」';
          //echo $result;
          }
      ///////////////////////
      if($_GET['date']=="")
      {
        echo '<script type="text/javascript"> alert("ご利用日を選択して下さい。");</script>';
      }
      else{
        $date=$_GET['date'];
        //$datee='2017年07月31日 (月)';
        //$datee='2017A07B31C (月)';
        $date=substr($date,0,17);
        $date = DateTime::createFromFormat('Y年m月d日',$date );
        $date = $date->format('Y/m/d');
        //echo $date;
        $today = date('Y/m/d');

        $date1 = new DateTime($today);
        $date2 = new DateTime($date);
        $interval = $date1->diff($date2);
        $day = $interval->days;
        ///echo $day; ----------------------------------------------------------------------------------------------------------- OK 4
        // sau khi co duoc 4 cai OK roi, ta tien hanh truy van va show du lieu
        $so_du_lieu=10;
        //$tv="select count(*) from san_pham where (div_1='空港送迎') AND (entry_limit <= 5)";
        //$tv="select count(*) from san_pham where (div_1='空港送迎') AND (entry_limit <= 5) AND (((M_PLACE_from_place_id =1) and (M_PLACE_to_place_id =5)) or ((M_PLACE_from_place_id =5) and (M_PLACE_to_place_id =1)))";
        $tv="select count(*) from san_pham where (div_1='空港送迎') AND (div_2='空港送迎') AND (entry_limit <='$day') AND (((M_PLACE_from_place_id ='$airport') and (M_PLACE_to_place_id ='$place2')) or ((M_PLACE_from_place_id ='$place2') and (M_PLACE_to_place_id ='$airport')))";
        $tv_1= mysql_query($tv);
        $tv_2=mysql_fetch_array($tv_1);
        $row_count=$tv_2[0];
        $so_trang=ceil($tv_2[0]/$so_du_lieu);

        if(!isset($_GET['trang']))
        {
          $vtbd=0;
        }
          else{
            $vtbd=($_GET['trang']-1)*$so_du_lieu;
            }
        
        //$tv = "select id, hinh_anh, tour_name,plan_id,noi_dung,to_place,div_2,fee_min,fee_max,date_txt,number_min from san_pham where (div_1='空港送迎') AND (entry_limit <= 5) order by id desc limit $vtbd,$so_du_lieu";
        //$tv = "select id, hinh_anh, tour_name,plan_id,noi_dung,to_place,div_2,fee_min,fee_max,date_txt,number_min from san_pham where (div_1='空港送迎') AND (entry_limit <= 5) AND (((M_PLACE_from_place_id =1) and (M_PLACE_to_place_id =5)) or ((M_PLACE_from_place_id =5) and (M_PLACE_to_place_id =1))) order by id desc limit $vtbd,$so_du_lieu";
        $tv = "select id, hinh_anh, tour_title,plan_id,noi_dung,to_place,div_2,fee_min,fee_max,date_txt,number_min from san_pham where (div_1='空港送迎') AND (div_2='空港送迎') AND (entry_limit <= '$day') AND (((M_PLACE_from_place_id = '$airport') and (M_PLACE_to_place_id = '$place2')) or ((M_PLACE_from_place_id = '$place2') and (M_PLACE_to_place_id = '$airport'))) order by id desc limit $vtbd,$so_du_lieu";
        $tv_1= mysql_query($tv);
        // khi lay data, dong dau tien duoc tinh la dong thu [0], nhung khi dem data thi dong dau tien la dong thu 1.
        $lay_tu_row_thu=$vtbd+1;
        if($_GET['trang']==$so_trang)
        {
          $lay_den_row_thu=$row_count;
        }
        else{
          $lay_den_row_thu=$vtbd+$so_du_lieu;
        }

       if($tv_2[0]>$so_du_lieu)
      {
        echo "<p class='archive-plan-display'>検索結果: <span>$tv_2[0]<span>件です。（".$lay_tu_row_thu."～".$lay_den_row_thu."件目を表示）</p>";
      }
      else{
        echo "<p class='archive-plan-display'>検索結果: <span>$tv_2[0]<span>件です。</p>";
      }
        echo "<div class='plan-list clearfix'>";

          echo "<table>";
            echo "<tr>";
              while ($tv_2=mysql_fetch_array($tv_1))
              {
                $link_anh="../images/tours/".$tv_2['hinh_anh'];
                //$link_chi_tiet="?thamso=chi_tiet_san_pham&id=".$tv_2['id'];
                $link_chi_tiet="http://localhost/airport-tourisum/pickup-taxi/?thamso=chi_tiet_taxi&id=".$tv_2['id'];
                echo "<article>";
                  echo "<div class='plan-list-in pc-none'>";
                  //echo "<img src="images/home/img01.jpg" alt="成田国際空港～東京23区東部エリア 送迎プラン">";
                  //echo '<img src="../images/tours/t2_1.jpg">';
                    echo "<img src='$link_anh'>";
                  echo "</div>";
                  echo "<h3 class='plan-list-ttl'>";
                    echo "<span class='plan-num pc-none'>";
                    echo $tv_2['plan_id'];
                    echo "</span>";
                    echo $tv_2['tour_title'];
                  echo "</h3>";
                  echo "<div class='clearfix'>";
                    echo "<figure class='plan-list-in left sp-none'>";
              
                    //echo "<img src="images/home/img01.jpg" alt="成田国際空港～東京23区東部エリア 送迎プラン">";
                    //echo '<img src="../images/tours/t2_1.jpg">';
                        echo "<img src='$link_anh'>";
                    echo "</figure>";
                    echo "<div class='plan-list-in right'>";
                      echo "<div class='plan-list-in-text'>";
                        echo "<p class='plan-num sp-none'>";
                        echo $tv_2['plan_id'];
                        echo "</p>";
                        echo "<p>";
                        echo $tv_2['noi_dung'];
                        echo "</p>";

                        echo "<div class='clearfix'>";
                          echo "<ul class='plan-list-flag'>";
                            echo "<li>".$tv_2['to_place']."</li>";
                            echo "<li>".$tv_2['div_2']."</li>";
                            echo "<li>".$tv_2['fee_min']."～".$tv_2['fee_max']."円 / 1台</li>";
                          echo "</ul>";
                          echo "<dl class='plan-list-caut clearfix'>";
                            echo "<dt>実施期間</dt>";
                            echo "<dd>".$tv_2['date_txt']."</dd>";
                            echo "<dt>最少催行人数</dt>";
                            echo "<dd>".$tv_2['number_min']."名様</dd>";
                          echo "</dl>";
                        echo "</div>";
                      echo "</div>";
                      /*<a href="<?php bloginfo('url'); ?>/pickup-taxi" class="plan-list-more">プラン詳細を見る</a>*/
                      echo "<a href='$link_chi_tiet' class='plan-list-more'>プラン詳細を見る</a>";   
                      // day la dia chi tuyet doi, nho thay doi khi dua len server               
                  echo "</div>";
                echo "</div>";
              echo "</article>";
            }
          echo "</tr>";
        // phan trang. code gioi han khi nguoi dung nhap so trang ko dung de lam sau
        // gioi han so trang hien thi se lam sau
          if($row_count>$so_du_lieu)
          {
            echo "<tr>";
              echo "<div class='phan_trang' align='center'>";
                if(isset($_GET['trang']) && $_GET['trang'] !=1)
                {
                  $prevPage= $_GET['trang'] - 1;
                  //$link="?thamso=xuat_plan&trang=".$prevPage;
                  $link = "?thamso=search&airport=".$_GET['airport']."&keyword_=".$_GET['keyword_']."&date=".$_GET['date']."&trang=".$prevPage;
                  echo "<a class='prev page-numbers' href='$link'>«PREV</a>";
                }
                 ///////////// gan mac dinh khi load la trang 1
                  if(!isset($_GET['trang']))
                  {
                    $get_trang=1;
                  }
                  else
                  {
                    $get_trang=$_GET['trang'];
                  }
                  //////////////////
                for($i=1;$i<=$so_trang;$i++)
                {
                  //if(isset($_GET['trang'])&&$_GET['trang']==$i)
                  if($get_trang==$i)
                  {
                    //$active = "active";
                    $active="page-numbers current";
                  }
                  else{
                    $active= "";
                  }
                  //$link="?thamso=xuat_plan&trang=".$i;
                  $link = "?thamso=search&airport=".$_GET['airport']."&keyword_=".$_GET['keyword_']."&date=".$_GET['date']."&trang=".$i;
                  echo "<a class='page-numbers ".$active."' href='$link'>"; // mot tag co the co nhieu thuoc tinh class (noi chuoi, cong don cac thuoc tinh)
                  echo $i; echo " ";
                  echo "</a>";
                }
                //////////////////////////
                 //if(isset($_GET['trang']) && $_GET['trang'] <$so_trang)
                if($get_trang<$so_trang)
                {
                    $nextPage= $get_trang + 1;
                    //$link="?thamso=xuat_plan&trang=".$nextPage;
                    $link = "?thamso=search&airport=".$_GET['airport']."&keyword_=".$_GET['keyword_']."&date=".$_GET['date']."&trang=".$nextPage;
                    echo "<a class='next page-numbers' href='$link'>»NEXT</a>";
                }
               echo "</div>";
              echo "</tr>";
            }
          echo "</table>";
        echo "</div>";
      }
    }
  }
}
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////truong hop 2
elseif (isset($_GET['thamso_'])) 
{  
  $airport=$place=$date=$category="";
  if(!isset($_GET['airport']))
  {
    echo '<script type="text/javascript"> alert("空港を選択して下さい。");</script>';
  }
  else
  {
    $airport=$_GET['airport'];
    //echo $airport;  -------------------------------------------------------------------------------------------------- OK 2
    if(!isset($_GET['place']))
    {
      echo '<script type="text/javascript"> alert("都道府県を選択して下さい。");</script>';
    }
    else{
     
      $place = $_GET['place'];
      if(!isset($_GET['category']))
      {
        echo '<script type="text/javascript"> alert("カテゴリを選択して下さい。");</script>';
      }
      else
      {

        $category = $_GET['category'];
      ///////////////////////
        if($_GET['date']=="")
        {
          echo '<script type="text/javascript"> alert("ご利用日を選択して下さい。");</script>';
        }
        else{
          $date=$_GET['date'];
          //$datee='2017年07月31日 (月)';
          //$datee='2017A07B31C (月)';
          $date=substr($date,0,17);
          $date = DateTime::createFromFormat('Y年m月d日',$date );
          $date = $date->format('Y/m/d');
          //echo $date;
          $today = date('Y/m/d');

          $date1 = new DateTime($today);
          $date2 = new DateTime($date);
          $interval = $date1->diff($date2);
          $day = $interval->days;
          ///echo $day; ----------------------------------------------------------------------------------------------------------- OK 4
          // sau khi co duoc 4 cai OK roi, ta tien hanh truy van va show du lieu
          $so_du_lieu=10;
          // luu y truong hop tim kiem TOUR thi ta biet ra div_1 luon luon = ツアー nen ta ko can dua vao dieu kien where.
          $tv="select count(*) from san_pham where (div_2='$category') AND (entry_limit <= $day) AND (M_PLACE_from_place_id ='$airport') AND (M_PLACE_to_place_id in (SELECT `place_id`FROM `m_place` WHERE `prf`='$place'))";
          //$tv="select count(*) from san_pham where (div_1='空港送迎') AND (entry_limit <= 5) AND (((M_PLACE_from_place_id =1) and (M_PLACE_to_place_id =5)) or ((M_PLACE_from_place_id =5) and (M_PLACE_to_place_id =1)))";
          //$tv="select count(*) from san_pham where (div_1='空港送迎') AND (entry_limit <='$day') AND (((M_PLACE_from_place_id ='$airport') and (M_PLACE_to_place_id ='$place2')) or ((M_PLACE_from_place_id ='$place2') and (M_PLACE_to_place_id ='$airport')))";
          $tv_1= mysql_query($tv);
          $tv_2=mysql_fetch_array($tv_1);
          $row_count=$tv_2[0];
          $so_trang=ceil($tv_2[0]/$so_du_lieu);

          if(!isset($_GET['trang']))
          {
            $vtbd=0;
          }
            else{
              $vtbd=($_GET['trang']-1)*$so_du_lieu;
              }
          // luu y truong hop tim kiem TOUR thi ta biet ra div_1 luon luon = ツアー nen ta ko can dua vao dieu kien where.
          $tv = "select id, hinh_anh, tour_title,plan_id,noi_dung,to_place,div_2,fee_min,fee_max,date_txt,number_min from san_pham where (div_2='$category') AND (entry_limit <= $day) AND (M_PLACE_from_place_id ='$airport') AND (M_PLACE_to_place_id in (SELECT `place_id`FROM `m_place` WHERE `prf`='$place')) order by id desc limit $vtbd,$so_du_lieu";
          //$tv = "select id, hinh_anh, tour_name,plan_id,noi_dung,to_place,div_2,fee_min,fee_max,date_txt,number_min from san_pham where (div_1='空港送迎') AND (entry_limit <= 5) AND (((M_PLACE_from_place_id =1) and (M_PLACE_to_place_id =5)) or ((M_PLACE_from_place_id =5) and (M_PLACE_to_place_id =1))) order by id desc limit $vtbd,$so_du_lieu";
          //$tv = "select id, hinh_anh, tour_name,plan_id,noi_dung,to_place,div_2,fee_min,fee_max,date_txt,number_min from san_pham where (div_1='空港送迎') AND (entry_limit <= '$day') AND (((M_PLACE_from_place_id = '$airport') and (M_PLACE_to_place_id = '$place2')) or ((M_PLACE_from_place_id = '$place2') and (M_PLACE_to_place_id = '$airport'))) order by id desc limit $vtbd,$so_du_lieu";
          $tv_1= mysql_query($tv);
          // khi lay data, dong dau tien duoc tinh la dong thu [0], nhung khi dem data thi dong dau tien la dong thu 1.
          $lay_tu_row_thu=$vtbd+1;
          if($_GET['trang']==$so_trang)
          {
            $lay_den_row_thu=$row_count;
          }
          else{
            $lay_den_row_thu=$vtbd+$so_du_lieu;
          }

         if($tv_2[0]>$so_du_lieu)
        {
          echo "<p class='archive-plan-display'>検索結果: <span>$tv_2[0]<span>件です。（".$lay_tu_row_thu."～".$lay_den_row_thu."件目を表示）</p>";
        }
        else{
          echo "<p class='archive-plan-display'>検索結果: <span>$tv_2[0]<span>件です。</p>";
        }
          echo "<div class='plan-list clearfix'>";

            echo "<table>";
              echo "<tr>";
                while ($tv_2=mysql_fetch_array($tv_1))
                {
                  $link_anh="../images/tours/".$tv_2['hinh_anh'];
                  //$link_chi_tiet="?thamso=chi_tiet_san_pham&id=".$tv_2['id'];
                  //$link_chi_tiet="http://localhost/airport-tourisum/pickup-taxi/?thamso=chi_tiet_taxi&id=".$tv_2['id'];
                  $link_chi_tiet="http://localhost/airport-tourisum/tour-bus/?thamso=chi_tiet_tour&id=".$tv_2['id'];
                  echo "<article>";
                    echo "<div class='plan-list-in pc-none'>";
                    //echo "<img src="images/home/img01.jpg" alt="成田国際空港～東京23区東部エリア 送迎プラン">";
                    //echo '<img src="../images/tours/t2_1.jpg">';
                      echo "<img src='$link_anh'>";
                    echo "</div>";
                    echo "<h3 class='plan-list-ttl'>";
                      echo "<span class='plan-num pc-none'>";
                      echo $tv_2['plan_id'];
                      echo "</span>";
                      echo $tv_2['tour_title'];
                    echo "</h3>";
                    echo "<div class='clearfix'>";
                      echo "<figure class='plan-list-in left sp-none'>";
                
                      //echo "<img src="images/home/img01.jpg" alt="成田国際空港～東京23区東部エリア 送迎プラン">";
                      //echo '<img src="../images/tours/t2_1.jpg">';
                          echo "<img src='$link_anh'>";
                      echo "</figure>";
                      echo "<div class='plan-list-in right'>";
                        echo "<div class='plan-list-in-text'>";
                          echo "<p class='plan-num sp-none'>";
                          echo $tv_2['plan_id'];
                          echo "</p>";
                          echo "<p>";
                          echo $tv_2['noi_dung'];
                          echo "</p>";

                          echo "<div class='clearfix'>";
                            echo "<ul class='plan-list-flag'>";
                              echo "<li>".$tv_2['to_place']."</li>";
                              echo "<li>".$tv_2['div_2']."</li>";
                              echo "<li>".$tv_2['fee_min']."～".$tv_2['fee_max']."円 / 1台</li>";
                            echo "</ul>";
                            echo "<dl class='plan-list-caut clearfix'>";
                              echo "<dt>実施期間</dt>";
                              echo "<dd>".$tv_2['date_txt']."</dd>";
                              echo "<dt>最少催行人数</dt>";
                              echo "<dd>".$tv_2['number_min']."名様</dd>";
                            echo "</dl>";
                          echo "</div>";
                        echo "</div>";
                        /*<a href="<?php bloginfo('url'); ?>/pickup-taxi" class="plan-list-more">プラン詳細を見る</a>*/
                        echo "<a href='$link_chi_tiet' class='plan-list-more'>プラン詳細を見る</a>";   
                        // day la dia chi tuyet doi, nho thay doi khi dua len server               
                    echo "</div>";
                  echo "</div>";
                echo "</article>";
              }
            echo "</tr>";
          // phan trang. code gioi han khi nguoi dung nhap so trang ko dung de lam sau
          // gioi han so trang hien thi se lam sau
            if($row_count>$so_du_lieu)
            {
              echo "<tr>";
                echo "<div class='phan_trang' align='center'>";
                  if(isset($_GET['trang']) && $_GET['trang'] !=1)
                  {
                    $prevPage= $_GET['trang'] - 1;
                    //$link="?thamso=xuat_plan&trang=".$prevPage;
                    //$link = "?thamso=search&airport=".$_GET['airport']."&keyword_=".$_GET['keyword_']."&date=".$_GET['date']."&trang=".$prevPage;
                    $link = "?thamso_=search&airport=".$_GET['airport']."&place=".$_GET['place']."&date=".$_GET['date']."&trang=".$prevPage;
                    echo "<a class='prev page-numbers' href='$link'>«PREV</a>";
                  }
                   ///////////// gan mac dinh khi load la trang 1
                    if(!isset($_GET['trang']))
                    {
                      $get_trang=1;
                    }
                    else
                    {
                      $get_trang=$_GET['trang'];
                    }
                    //////////////////
                  for($i=1;$i<=$so_trang;$i++)
                  {
                    //if(isset($_GET['trang'])&&$_GET['trang']==$i)
                    if($get_trang==$i)
                    {
                      //$active = "active";
                      $active="page-numbers current";
                    }
                    else{
                      $active= "";
                    }
                    //$link="?thamso=xuat_plan&trang=".$i;
                    //$link = "?thamso=search&airport=".$_GET['airport']."&keyword_=".$_GET['keyword_']."&date=".$_GET['date']."&trang=".$i;
                    $link = "?thamso_=search&airport=".$_GET['airport']."&place=".$_GET['place']."&date=".$_GET['date']."&trang=".$i;
                    echo "<a class='page-numbers ".$active."' href='$link'>"; // mot tag co the co nhieu thuoc tinh class (noi chuoi, cong don cac thuoc tinh)
                    echo $i; echo " ";
                    echo "</a>";
                  }
                  //////////////////////////
                   //if(isset($_GET['trang']) && $_GET['trang'] <$so_trang)
                  if($get_trang<$so_trang)
                  {
                      $nextPage= $get_trang + 1;
                      //$link="?thamso=xuat_plan&trang=".$nextPage;
                      //$link = "?thamso=search&airport=".$_GET['airport']."&keyword_=".$_GET['keyword_']."&date=".$_GET['date']."&trang=".$nextPage;
                      $link = "?thamso_=search&airport=".$_GET['airport']."&place=".$_GET['place']."&date=".$_GET['date']."&trang=".$nextPage;
                      echo "<a class='next page-numbers' href='$link'>»NEXT</a>";
                  }
                 echo "</div>";
                echo "</tr>";
              }
            echo "</table>";
          echo "</div>";
        }
      }
    }
  }

}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////truong hop 3
elseif (isset($_GET['keyword']))
  ///////////////////////////////// truong hop co keyword thi xuat ket qua tim kiem du vao keyword
{   
  // php da lay dc keyword, gio lam sao de php truyen cho javascript, sau do js in ra man hinh.
  //echo '<script type="text/javascript">alert("co bien keyword");</script>';
  if(trim($_GET['keyword'])!="")
  {
    $m=explode(" ",$_GET['keyword']);  
    $chuoi_tim_sql="";
    $chuoi_tim_sql1="";
    for($i=0;$i<count($m);$i++)
    {
      $tu=trim($m[$i]);
      if($tu!="")
      {
        //$chuoi_tim_sql=$chuoi_tim_sql." tour_explanation like '%".$tu."%' or";
        $chuoi_tim_sql=$chuoi_tim_sql." ten like '%".$tu."%' or";
        $chuoi_tim_sql1=$chuoi_tim_sql1." tour_title like '%".$tu."%' or";
      }
    }

    $m_2=explode(" ",$chuoi_tim_sql);  
    $chuoi_tim_sql_2="";
    for($i=0;$i<count($m_2)-1;$i++)
    {
      $chuoi_tim_sql_2=$chuoi_tim_sql_2.$m_2[$i]." ";
    }
    ////
    $m1_2=explode(" ",$chuoi_tim_sql1);  
    $chuoi_tim_sql1_2="";
    for($i=0;$i<count($m1_2)-1;$i++)
    {
      $chuoi_tim_sql1_2=$chuoi_tim_sql1_2.$m1_2[$i]." ";
    }
    ////
    $so_du_lieu=10;
    $tv="select count(*) from san_pham  where $chuoi_tim_sql_2 or $chuoi_tim_sql1_2";
    $tv_1=mysql_query($tv);
    $tv_2=mysql_fetch_array($tv_1);
    $row_count=$tv_2[0];
    $so_trang=ceil($tv_2[0]/$so_du_lieu);
      
    if(!isset($_GET['trang']))
      {
        $vtbd=0;
      }
    else
      {
        $vtbd=($_GET['trang']-1)*$so_du_lieu;
      }
        /////////////////////////////////////
        //$tv="select id,ten,gia,hinh_anh,thuoc_menu from san_pham where $chuoi_tim_sql_2 order by id desc limit $vtbd,$so_du_lieu";
    $tv="select id, hinh_anh, tour_title,plan_id,noi_dung,to_place,div_2,fee_min,fee_max,date_txt,number_min from san_pham where $chuoi_tim_sql_2 or $chuoi_tim_sql1_2 order by id desc limit $vtbd,$so_du_lieu";
    $tv_1=mysql_query($tv);
    if(mysql_num_rows($tv_1) >0)
    {
      // khi lay data, dong dau tien duoc tinh la dong thu [0], nhung khi dem data thi dong dau tien la dong thu 1.
      $lay_tu_row_thu=$vtbd+1;
      if($_GET['trang']==$so_trang)
      {
        $lay_den_row_thu=$row_count;
      }
      else{
        $lay_den_row_thu=$vtbd+$so_du_lieu;
      }
      if($tv_2[0]>$so_du_lieu)
      {
        echo "<p class='archive-plan-display'>検索結果: <span>$tv_2[0]<span>件です。（".$lay_tu_row_thu."～".$lay_den_row_thu."件目を表示）</p>";
      }
      else{
        echo "<p class='archive-plan-display'>検索結果: <span>$tv_2[0]<span>件です。</p>";
      }
      echo "<div class='plan-list clearfix'>";

        echo "<table>";
          echo "<tr>";
            while ($tv_2=mysql_fetch_array($tv_1))
            {
              $link_anh="../images/tours/".$tv_2['hinh_anh'];
              //$link_chi_tiet="?thamso=chi_tiet_san_pham&id=".$tv_2['id'];
              $link_chi_tiet="http://localhost/airport-tourisum/pickup-taxi/?thamso=chi_tiet_taxi&id=".$tv_2['id'];
              echo "<article>";
                echo "<div class='plan-list-in pc-none'>";
                  //echo "<img src="images/home/img01.jpg" alt="成田国際空港～東京23区東部エリア 送迎プラン">";
                  //echo '<img src="../images/tours/t2_1.jpg">';
                  echo "<img src='$link_anh'>";
                echo "</div>";
                echo "<h3 class='plan-list-ttl'>";
                  echo "<span class='plan-num pc-none'>";
                  echo $tv_2['plan_id'];
                  echo "</span>";
                  echo $tv_2['tour_title'];
                echo "</h3>";
                echo "<div class='clearfix'>";
                  echo "<figure class='plan-list-in left sp-none'>";
                    
                  //echo "<img src="images/home/img01.jpg" alt="成田国際空港～東京23区東部エリア 送迎プラン">";
                  //echo '<img src="../images/tours/t2_1.jpg">';
                    echo "<img src='$link_anh'>";
                  echo "</figure>";
                echo "<div class='plan-list-in right'>";
                echo "<div class='plan-list-in-text'>";
                  echo "<p class='plan-num sp-none'>";
                    echo $tv_2['plan_id'];
                  echo "</p>";
                  echo "<p>";
                    echo $tv_2['noi_dung'];
                  echo "</p>";

                echo "<div class='clearfix'>";
                  echo "<ul class='plan-list-flag'>";
                    echo "<li>".$tv_2['to_place']."</li>";
                    echo "<li>".$tv_2['div_2']."</li>";
                    echo "<li>".$tv_2['fee_min']."～".$tv_2['fee_max']."円 / 1台</li>";
                  echo "</ul>";
                  echo "<dl class='plan-list-caut clearfix'>";
                    echo "<dt>実施期間</dt>";
                    echo "<dd>".$tv_2['date_txt']."</dd>";
                    echo "<dt>最少催行人数</dt>";
                    echo "<dd>".$tv_2['number_min']."名様</dd>";
                  echo "</dl>";
                echo "</div>";
              echo "</div>";
            /*<a href="<?php bloginfo('url'); ?>/pickup-taxi" class="plan-list-more">プラン詳細を見る</a>*/
              echo "<a href='$link_chi_tiet' class='plan-list-more'>プラン詳細を見る</a>";   
                            // day la dia chi tuyet doi, nho thay doi khi dua len server               
          echo "</div>";
        echo "</div>";
      echo "</article>";
      }
    echo "</tr>";
              // phan trang. code gioi han khi nguoi dung nhap so trang ko dung de lam sau
              // gioi han so trang hien thi se lam sau
    if($row_count>$so_du_lieu)
    {
      echo "<tr>";
        echo "<div class='phan_trang' align='center'>";
            if(isset($_GET['trang']) && $_GET['trang'] !=1)
            {
              $prevPage= $_GET['trang'] - 1;
              //$link="?thamso=tim_kiem&tu_khoa=".$_GET['tu_khoa'].$prevPage;
              $link="?thamso=search&keyword=".$_GET['keyword']."&trang=".$prevPage;
              echo "<a class='prev page-numbers' href='$link'>«PREV</a>"; //page number
            }
            ///////////// gan mac dinh khi load la trang 1
             if(!isset($_GET['trang']))
            {
              $get_trang=1;
            }
            else
            {
              $get_trang=$_GET['trang'];
            }
            //////////////
            for($i=1;$i<=$so_trang;$i++)
            {
              //if(isset($_GET['trang'])&&$_GET['trang']==$i)
              if($get_trang==$i)
              {
                //$active = "active";
                $active="page-numbers current";
              }
              else{
                $active= "";
              }

              //$link="?thamso=xuat_plan&trang=".$i;
              $link="?thamso=search&keyword=".$_GET['keyword']."&trang=".$i;
              echo "<a class='page-numbers ".$active."' href='$link'>"; // mot tag co the co nhieu thuoc tinh class (noi chuoi, cong don cac thuoc tinh)
                echo $i; echo " ";
              echo "</a>";
            }
           /////////////////////
            //if(isset($_GET['trang']) && $_GET['trang'] <$so_trang)
            if($get_trang<$so_trang)
            {
              //$nextPage= $_GET['trang'] + 1;
              $nextPage=$get_trang+1;
              //$link="?thamso=xuat_plan&trang=".$nextPage;
              $link="?thamso=search&keyword=".$_GET['keyword']."&trang=".$nextPage;
              echo "<a class='next page-numbers' href='$link'>»NEXT</a>";
            }
          echo "</div>";
        echo "</tr>";
      } 
      echo "</table>";
    echo "</div>";
    }
    else {
            //echo '結果はありません。';
      echo '<script type="text/javascript"> alert("検索の結果は０件です。");</script>';
    }
  }
  else
  {
    echo '<script type="text/javascript"> alert("キーワードを入力して下さい。");</script>';
  }

}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////truong hop 4, ko tim kiem ma show het danh sach tour
else
{
  $so_du_lieu=10;
  $tv="select count(*) from san_pham";
  $tv_1= mysql_query($tv);
  $tv_2=mysql_fetch_array($tv_1);
  $row_count=$tv_2[0];
  $so_trang=ceil($tv_2[0]/$so_du_lieu);

  if(!isset($_GET['trang']))
  {
    $vtbd=0;
  }
    else{
      $vtbd=($_GET['trang']-1)*$so_du_lieu;
      }
  $tv="select id, hinh_anh, tour_title,plan_id,noi_dung,to_place,div_1,div_2,fee_min,fee_max,date_txt,number_min from san_pham order by id desc limit $vtbd,$so_du_lieu";
  $tv_1= mysql_query($tv);
  // khi lay data, dong dau tien duoc tinh la dong thu [0], nhung khi dem data thi dong dau tien la dong thu 1.
  $lay_tu_row_thu=$vtbd+1;
  if($_GET['trang']==$so_trang)
  {
    $lay_den_row_thu=$row_count;
  }
  else{
    $lay_den_row_thu=$vtbd+$so_du_lieu;
  }

 if($tv_2[0]>$so_du_lieu)
  {
    echo "<p class='archive-plan-display'>全<span>$tv_2[0]<span>件中".$lay_tu_row_thu."～".$lay_den_row_thu."件目を表示</p>";
  }
  else{
    echo "<p class='archive-plan-display'>全<span>$tv_2[0]<span>件</p>";
  }
  echo "<div class='plan-list clearfix'>";

    echo "<table>";
      echo "<tr>";
        while ($tv_2=mysql_fetch_array($tv_1))
        {
          echo $tv_2['div_1'];
          $link_anh="../images/tours/".$tv_2['hinh_anh'];
          //$link_chi_tiet="?thamso=chi_tiet_san_pham&id=".$tv_2['id'];
          if($tv_2['div_1']=='ツアー')
          {
            $link_chi_tiet="http://localhost/airport-tourisum/tour-bus/?thamso=chi_tiet_tour&id=".$tv_2['id'];
          }
          else if($tv_2['div_1']=='空港送迎') 
          {
            $link_chi_tiet="http://localhost/airport-tourisum/pickup-taxi/?thamso=chi_tiet_taxi&id=".$tv_2['id'];
          }
          else{
            $link_chi_tiet='';
          }
          
          echo "<article>";
            echo "<div class='plan-list-in pc-none'>";
            //echo "<img src="images/home/img01.jpg" alt="成田国際空港～東京23区東部エリア 送迎プラン">";
            //echo '<img src="../images/tours/t2_1.jpg">';
              echo "<img src='$link_anh'>";
            echo "</div>";
            echo "<h3 class='plan-list-ttl'>";
              echo "<span class='plan-num pc-none'>";
              echo $tv_2['plan_id'];
              echo "</span>";
              echo $tv_2['tour_title'];
            echo "</h3>";
            echo "<div class='clearfix'>";
              echo "<figure class='plan-list-in left sp-none'>";
        
              //echo "<img src="images/home/img01.jpg" alt="成田国際空港～東京23区東部エリア 送迎プラン">";
              //echo '<img src="../images/tours/t2_1.jpg">';
                  echo "<img src='$link_anh'>";
              echo "</figure>";
              echo "<div class='plan-list-in right'>";
                echo "<div class='plan-list-in-text'>";
                  echo "<p class='plan-num sp-none'>";
                  echo $tv_2['plan_id'];
                  echo "</p>";
                  echo "<p>";
                  echo $tv_2['noi_dung'];
                  echo "</p>";

                  echo "<div class='clearfix'>";
                    echo "<ul class='plan-list-flag'>";
                      echo "<li>".$tv_2['to_place']."</li>";
                      echo "<li>".$tv_2['div_2']."</li>";
                      echo "<li>".$tv_2['fee_min']."～".$tv_2['fee_max']."円 / 1台</li>";
                    echo "</ul>";
                    echo "<dl class='plan-list-caut clearfix'>";
                      echo "<dt>実施期間</dt>";
                      echo "<dd>".$tv_2['date_txt']."</dd>";
                      echo "<dt>最少催行人数</dt>";
                      echo "<dd>".$tv_2['number_min']."名様</dd>";
                    echo "</dl>";
                  echo "</div>";
                echo "</div>";
                /*<a href="<?php bloginfo('url'); ?>/pickup-taxi" class="plan-list-more">プラン詳細を見る</a>*/
                //echo "<a href='http://localhost/airport-tourisum/pickup-taxi/' class='plan-list-more'>プラン詳細を見る</a>";   
                echo "<a href='$link_chi_tiet' class='plan-list-more'>プラン詳細を見る</a>"; 
                // day la dia chi tuyet doi, nho thay doi khi dua len server               
            echo "</div>";
          echo "</div>";
        echo "</article>";
      }
    echo "</tr>";
  // phan trang. code gioi han khi nguoi dung nhap so trang ko dung de lam sau
  // gioi han so trang hien thi se lam sau
    if($row_count>$so_du_lieu)
    {
      echo "<tr>";
        echo "<div class='phan_trang' align='center'>";
          if(isset($_GET['trang']) && $_GET['trang'] !=1)
          {
            $prevPage= $_GET['trang'] - 1;
            $link="?thamso=xuat_plan&trang=".$prevPage;
            echo "<a class='prev page-numbers' href='$link'>«PREV</a>";
          }
           ///////////// gan mac dinh khi load la trang 1
            if(!isset($_GET['trang']))
            {
              $get_trang=1;
            }
            else
            {
              $get_trang=$_GET['trang'];
            }
            //////////////////
          for($i=1;$i<=$so_trang;$i++)
          {
            //if(isset($_GET['trang'])&&$_GET['trang']==$i)
            if($get_trang==$i)
            {
              //$active = "active";
              $active="page-numbers current";
            }
            else{
              $active= "";
            }
            $link="?thamso=xuat_plan&trang=".$i;
            echo "<a class='page-numbers ".$active."' href='$link'>"; // mot tag co the co nhieu thuoc tinh class (noi chuoi, cong don cac thuoc tinh)
            echo $i; echo " ";
            echo "</a>";
          }
          //////////////////////////
           //if(isset($_GET['trang']) && $_GET['trang'] <$so_trang)
          if($get_trang<$so_trang)
          {
              $nextPage= $get_trang + 1;
              $link="?thamso=xuat_plan&trang=".$nextPage;
              echo "<a class='next page-numbers' href='$link'>»NEXT</a>";
          }
         echo "</div>";
        echo "</tr>";
      }
    echo "</table>";
  echo "</div>";
}

?>

        

      
      <!-- <div class="pager">
        <a class="prev page-numbers" href="＃">«PREV</a>
        <a class='page-numbers' href='＃'>1</a>
        <span class='page-numbers current'>2</span>
        <a class='page-numbers' href='＃'>3</a>
        <a class="next page-numbers" href="<?php //bloginfo('url'); ?>">»NEXT</a>
      </div> -->
      
</section>
</div>
</main>
<?php get_footer(); ?>