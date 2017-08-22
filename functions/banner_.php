<?php
$tv="select id, hinh_anh from san_pham where level = '999'";
$tv_1= mysql_query($tv);
while ($tv_2=mysql_fetch_array($tv_1))
{ 
	echo " <div class='main-visual'>";
	//echo " <ul class='main-slider'>";
	//echo "<li>";
	//$link_anh="hinh_anh/san_pham/".$tv_2['hinh_anh'];
  $link_anh="images/tours/".$tv_2['hinh_anh'];
	$link_chi_tiet="?thamso=chi_tiet_san_pham&id=".$tv_2['id'];
	 echo "<a href='$link_chi_tiet'>";
	    echo "<img src='$link_anh' width='900px' height='200px' >";
	 echo "</a>";
	 //echo "</li>";
	// echo "</ul>";
	 echo "</div>";

}

?>

<div style="text-align:center">
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span>
</div>

<script>
var slideIndex = 0;
showSlides();

function showSlides() {
    var i;
    var slides = document.getElementsByClassName("main-visual");
    var dots = document.getElementsByClassName("dot");
    for (i = 0; i < slides.length; i++) {
       slides[i].style.display = "none";  
    }
    slideIndex++;
    if (slideIndex> slides.length) {slideIndex = 1}    
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex-1].style.display = "block";  
    dots[slideIndex-1].className += " active";
    setTimeout(showSlides, 2000); // Change image every 2 seconds
}
</script>

