<?php
/*
Template Name: お問い合わせ ー 確認画面 ー
*/
?>
<?php get_header(); ?>
<?php
session_start();
if(isset($_GET['res_id']))
{ 
  $_SESSION['data']['res_id']=$_GET['res_id'];
}
else{$_SESSION['data']['res_id']="";}
$_SESSION['data']['namae']=$_GET['namae'];
$_SESSION['data']['phonetic_name']=$_GET['phonetic_name'];
$_SESSION['data']['nationality']=$_GET['nationality'];
$_SESSION['data']['phone_number']=$_GET['phone_number'];
$_SESSION['data']['email1']=$_GET['email1'];
$_SESSION['data']['email2']=$_GET['email2'];
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
if(isset($_GET['option8']))
{
  $_SESSION['data']['option8']=$_GET['option8'];
}
else{$_SESSION['data']['option8']="";}
if(isset($_GET['option9']))
{
  $_SESSION['data']['option9']=$_GET['option9'];
}
else{$_SESSION['data']['option9']="";}
if(isset($_GET['option10']))
{
  $_SESSION['data']['option10']=$_GET['option10'];
}
else{$_SESSION['data']['option10']="";}

$_SESSION['data']['course']=$_GET['course'];

/////
if(isset($_SESSION['data'])) $get_data = $_SESSION['data'];
?>

<main id="main-content">
  <div class="bread-crumbs">
    <ul class="clearfix inner">
      <li><a href="<?php bloginfo('url'); ?>">ホーム</a></li>
      <li>お問い合わせ</li>
    </ul>
  </div>
  
  <div id="vivid-trigger" class="wrap">
    <section class="detail-content inner">
      <h2 class="detail-h2-ttl">お問い合わせ ー入力確認ー</h2>
      <div class="step-bar-wrap">
        <ol class="step-bar">
          <li class="current">1.入力</li>
          <li class="current">2.確認</li>
          <li>3.送信完了</li>
        </ol>
      </div>      
       <form class="contact-form" action="http://localhost/airport-tourisum/contact-done/">
        <div class="contact-form-in">
          <dl>
            <dt><span>[任意]</span>ご予約番号</dt>
            <dd><?php echo $get_data['res_id']; ?></dd>
          </dl>
          <dl>
            <dt><span class="required">[必須]</span>お名前</dt>
            <dd><?php echo $get_data['namae']; ?></dd>
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
            <dt><span class="required">[必須]</span>お電話番号</dt>
            <dd><?php echo $get_data['phone_number']; ?></dd>
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
            <dt><span>[任意]</span>問い合わせ種別</dt>
            <dd>
              <?php 
               $op= $get_data['option1']."/".$get_data['option2']."/".$get_data['option3']."/".$get_data['option4']."/".$get_data['option5']."/".$get_data['option6']."/".$get_data['option7']."/".$get_data['option8']."/".$get_data['option9']."/".$get_data['option10'];
               $op=trim($op,'/');
               $op=str_replace('//', '/', $op);
                $op=str_replace('//', '/', $op);
                $op=str_replace('///', '/', $op);
                $op=str_replace('////', '/', $op);
                $op=str_replace('/////', '/', $op);
               echo $op;
              ?>
            </dd>
          </dl>
          <dl>
            <dt><span class="required">[必須]</span>お問い合わせ内容</dt>
            <dd>
             <?php echo $get_data['course']; ?>
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
        location.href="http://localhost/airport-tourisum/contact-input/?reset";       
      }
    </script>
  </div>
</main>
<?php get_footer(); ?>