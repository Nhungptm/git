<?php
// day la code chia ra cac truong hop hien thi 3 loai xe tren calendar
 <?php
     $ninzu=3;
     if($ninzu <= 3)
     {
      include("functions/sedan_miniban_wagon.php");
     }
     //elseif (3 < $ninzu <= 5) 
     else if($ninzu >3 && $ninzu <=5) 

     {
       include("functions/miniban_wagon.php");
     }
     else if($ninzu >5 && $ninzu <=9) 
     {
       include("functions/wagon.php");
     }
     else
     {
      echo "入力された人数が多いため、問合せフォームからお問合わせください。";
     }
      
     ?>
?>