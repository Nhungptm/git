<?php
/*
Template Name: オーダメイドプラン ー 確認画面 ー
*/
?>

<?php get_header(); ?>

<?php
session_start();
$_SESSION['data']['namae']=$_GET['namae'];
$_SESSION['data']['phonetic_name']=$_GET['phonetic_name'];
$_SESSION['data']['nationality']=$_GET['nationality'];
if(isset($_GET['corporate_name']))
{ 
  $_SESSION['data']['corporate_name']=$_GET['corporate_name'];
}
else{$_SESSION['data']['corporate_name']="";}
$_SESSION['data']['email1']=$_GET['email1'];
$_SESSION['data']['email2']=$_GET['email2'];
$_SESSION['data']['phone_number']=$_GET['phone_number'];
if(isset($_GET['fax_number']))
{
  $_SESSION['data']['fax_number']=$_GET['fax_number'];
}
else{$_SESSION['data']['fax_number']="";}
if(isset($_GET['postal_code']))
{
  $_SESSION['data']['postal_code']=$_GET['postal_code'];
}
else{$_SESSION['data']['postal_code']="";}
if(isset($_GET['address']))
{
  $_SESSION['data']['address']=$_GET['address'];
}
else{$_SESSION['data']['address']="";}
$_SESSION['data']['purpose']=$_GET['purpose'];
$_SESSION['data']['departure_date']=$_GET['departure_date'];
$_SESSION['data']['arrival_date']=$_GET['arrival_date'];
$_SESSION['data']['departure_point']=$_GET['departure_point'];
$_SESSION['data']['departure_time']=$_GET['departure_time'];
if(isset($_GET['arrival_flight']))
{
$_SESSION['data']['arrival_flight']=$_GET['arrival_flight'];
}
else{$_SESSION['data']['arrival_flight']="";}
if(isset($_GET['meet']))
{
$_SESSION['data']['meet']=$_GET['meet'];
}
else{$_SESSION['data']['meet']="";}
$_SESSION['data']['arrival_point']=$_GET['arrival_point'];
$_SESSION['data']['arrival_time']=$_GET['arrival_time'];
if(isset($_GET['departure_flight']))
{
$_SESSION['data']['departure_flight']=$_GET['departure_flight'];
}
else{$_SESSION['data']['departure_flight']="";}
$_SESSION['data']['course']=$_GET['course'];
$_SESSION['data']['bustype']=$_GET['bustype'];
$_SESSION['data']['people']=$_GET['people'];
if(isset($_GET['option1']))
{
  $_SESSION['data']['option1']=$_GET['option1'];
}
else{$_SESSION['data']['option1']="";}
if(isset($_GET['option2']))
{
  $_SESSION['data']['option2']=$_GET['option2'];
}
else{$_SESSION['data']['option2']="";}
if(isset($_GET['option3']))
{
  $_SESSION['data']['option3']=$_GET['option3'];
}
else{$_SESSION['data']['option3']="";}
if(isset($_GET['option4']))
{
  $_SESSION['data']['option4']=$_GET['option4'];
}
else{$_SESSION['data']['option4']="";}
if(isset($_GET['option5']))
{
  $_SESSION['data']['option5']=$_GET['option5'];
}
else{$_SESSION['data']['option5']="";}
if(isset($_GET['option6']))
{
  $_SESSION['data']['option6']=$_GET['option6'];
}
else{$_SESSION['data']['option6']="";}
if(isset($_GET['option7']))
{
  $_SESSION['data']['option7']=$_GET['option7'];
}
else{$_SESSION['data']['option7']="";}
$_SESSION['data']['payment']=$_GET['payment'];
$_SESSION['data']['contact']=$_GET['contact'];
if (isset($_GET['situmon'])) 
{
  $_SESSION['data']['situmon']=$_GET['situmon'];
}
else{$_SESSION['data']['situmon']="";}
/////
if(isset($_SESSION['data'])) $get_data = $_SESSION['data'];
?>

<main id="main-content">
  <div class="bread-crumbs">
    <ul class="clearfix inner">
      <li><a href="<?php bloginfo('url'); ?>">ホーム</a></li>
      <li>オーダーメイド</li>
    </ul>
  </div>
  
  <div id="vivid-trigger" class="wrap">
    <section class="detail-content inner">
      <h2 class="detail-h2-ttl">オーダメイドプランー 入力確認 ー</h2>
      <div class="step-bar-wrap">
        <ol class="step-bar">
          <li class="current">1.入力</li>
          <li class="current">2.確認</li>
          <li>3.申し込み完了</li>
        </ol>
      </div>
      <form class="contact-form" action="http://localhost/airport-tourisum/ordermade-done/">
        <div class="contact-form-in">
          <dl>
            <dt><span class="required">[必須]</span>お名前</dt>
            <dd>
            <?php 
            //echo $_SESSION['namae']; 
            echo $get_data['namae'] ;
            ?>
              
            </dd>
          </dl>
          <dl>
            <dt><span class="required">[必須]</span>お名前（ローマ字）</dt>
            <dd><?php echo $get_data['phonetic_name']; ?></dd>
          </dl>
          <dl>
            <dt><span class="required">[必須]</span>国籍</dt>
            <dd><?php echo $get_data['nationality']; ?></dd>
          </dl>
          <dl>
            <dt><span>[任意]</span>団体名・ツアー名</dt>
            <dd><?php echo $get_data['corporate_name']; ?></dd>
          </dl>
          <dl>
            <dt><span class="required">[必須]</span>メールアドレス</dt>
            <dd><?php echo $get_data['email1']; ?></dd>
          </dl>
          <dl>
            <dt><span class="required">[必須]</span>メールアドレス（再入力）</dt>
            <dd><?php echo $get_data['email2']; ?></dd>
          </dl>
          <dl>
            <dt><span class="required">[必須]</span>お電話番号</dt>
            <dd><?php echo $get_data['phone_number']; ?></dd>
          </dl>
          <dl>
            <dt><span>[任意]</span>FAX番号</dt>
            <dd><?php echo $get_data['fax_number']; ?></dd>
          </dl>
          <dl>
            <dt><span>[任意]</span>郵便番号</dt>
            <dd><?php echo $get_data['postal_code']; ?></dd>
          </dl>
          <dl>
            <dt><span>[任意]</span>ご住所</dt>
            <dd><?php echo $get_data['address']; ?></dd>
          </dl>
          <dl>
            <dt><span class="required">[必須]</span>ご利用目的</dt>
            <dd>
              <?php echo $get_data['purpose']; ?>
            </dd>
          </dl>
          <dl>
            <dt><span class="required">[必須]</span>ご利用希望日</dt>
            <dd>
              ご利用開始日<span> <?php echo $get_data['departure_date']; ?></span>
              ご利用終了日<span> <?php echo $get_data['arrival_date']; ?></span>
            </dd>
          </dl>
          <dl>
            <dt><span class="required">[必須]</span>ご出発</dt>
            <dd>
              ご出発場所<span><?php echo $get_data['departure_point']; ?></span>
              ご出発時刻<span><?php echo $get_data['departure_time']; ?></span>
              空港ご到着便(空港からご乗車の場合のみ入力必須です）<span><?php echo $get_data['arrival_flight']; ?></span>
              空港ご乗車場所(空港からご乗車の場合のみ選択必須です）<span>
              <span><?php echo $get_data['meet']; ?></span></span>
            </dd>
          </dl>
          <dl>
            <dt><span class="required">[必須]</span>ご到着</dt>
            <dd>
              最終ご到着場所<span><?php echo $get_data['arrival_point']; ?></span>
              最終ご到着時刻（ご希望）<span><?php echo $get_data['arrival_time']; ?></span>
              空港ご出発便(空港へご到着の場合のみ入力必須です）<span><?php echo $get_data['departure_flight']; ?></span>
            </dd>
          </dl>
          <dl>
            <dt><span class="required">[必須]</span>コース</dt>
            <dd>
              <?php echo $get_data['course']; ?>
            </dd>
          </dl>
          <dl>
            <dt><span class="required">[必須]</span>ご乗車人数</dt>
            <dd><?php echo $get_data['people']; ?></dd>
          </dl>
          <dl>
            <dt><span class="required">[必須]</span>ご希望車種</dt>
            <dd>
              <?php echo $get_data['bustype']; ?>
            </dd>
          </dl>
          <dl>
            <dt><span>[任意]</span>有料オプション</dt>
            <dd>
              <?php 
               $op1= $get_data['option1']."/".$get_data['option2']."/".$get_data['option3'];
               $op1=trim($op1,'/');
               $op1=str_replace('//', '/', $op1);
               echo $op1;
              ?>
            </dd>
          </dl>
          <dl>
            <dt><span>[任意]</span>無料オプション</dt>
            <dd>
               <?php                
                 $op2= $get_data['option4']."/".$get_data['option5']."/".$get_data['option6']."/".$get_data['option7']; 
                 $op2=trim($op2,'/');
                 $op2=str_replace('//', '/', $op2);
                 $op2=str_replace('//', '/', $op2);
                 echo $op2;
               ?>
            </dd>
          </dl>
          <dl>
            <dt><span class="required">[必須]</span>お支払い方法</dt>
            <dd>
              <?php echo $get_data['payment']; ?>
            </dd>
          </dl>
          <dl>
            <dt><span class="required">[必須]</span>ご希望連絡方法</dt>
            <dd>
              <?php echo $get_data['contact']; ?>
            </dd>
          </dl>
          <dl>
            <dt><span>[任意]</span>ご質問・連絡事項など</dt>
            <dd>
              <?php echo $get_data['situmon']; ?>
            </dd>
          </dl>
        </div>
        <div class="clearfix">
          <div class="contact-form-back">            
            <input type="button" value="" onclick="back()" />
            <p class="text-xs-center">修正</p>
          </div>
          <div class="contact-form-submit contact-form-confir-submit">
            <input type="submit" value="" />
            <p class="text-xs-center">送信</p>
          </div>
        </div>
      </form>
    </section>
    <script type="text/javascript">
      function back()
      {
        location.href="http://localhost/airport-tourisum/ordermade-input/?reset";       
      }
    </script>
  </div>
</main>
<?php get_footer(); ?>